<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /* ─── Index ─────────────────────────────────────────────── */

    public function index(Request $request)
    {
        $categoryId = $request->get('category_id');
        $search     = $request->get('search');

        $products = Product::query()
            ->with('category')
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->when($search,     fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*')
            ->orderBy('categories.name')
            ->orderBy('products.sort_order')
            ->orderBy('products.created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        $allCategories = \App\Models\Category::orderBy('name')->get();

        $stats = [
            'total'  => Product::count(),
            'active' => Product::where('is_active', true)->count(),
        ];

        // Add counts per category
        foreach ($allCategories as $cat) {
            $stats[$cat->slug] = Product::where('category_id', $cat->id)->count();
        }

        return view('admin.products.index', compact('products', 'stats', 'allCategories'));
    }

    /* ─── Create ─────────────────────────────────────────────── */

    public function create()
    {
        $categories = \App\Models\Category::orderBy('name')->get();
        $badges     = Product::badges();
        return view('admin.products.create', compact('categories', 'badges'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'                => 'required|string|max:255',
            'description'         => 'nullable|string',
            'price'               => 'required|numeric|min:0',
            'image_url'           => 'nullable|url|max:2048',
            'image_file'          => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'category_id'         => 'required|exists:categories,id',
            'badge'               => 'nullable|string|max:50',
            'is_active'           => 'boolean',
            'sort_order'          => 'nullable|integer',
            'resolution'          => 'nullable|string|max:255',
            'night_vision'        => 'nullable|string|max:255',
            'weatherproof'        => 'nullable|string|max:255',
            'storage'             => 'nullable|string|max:255',
            'features'            => 'nullable|array',
            'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_file')) {
            $imagePath = $request->file('image_file')->store('products', 'public');
        }

        $product = Product::create([
            'name'         => $validated['name'],
            'description'  => $validated['description'] ?? null,
            'price'        => $validated['price'],
            'image_url'    => $validated['image_url'] ?? null,
            'image_path'   => $imagePath,
            'category_id'  => $validated['category_id'],
            'badge'        => $validated['badge'] ?? null,
            'is_active'    => $request->boolean('is_active', true),
            'sort_order'   => $validated['sort_order'] ?? 0,
            'resolution'   => $validated['resolution'] ?? null,
            'night_vision' => $validated['night_vision'] ?? null,
            'weatherproof' => $validated['weatherproof'] ?? null,
            'storage'      => $validated['storage'] ?? null,
            'features'     => $validated['features'] ?? [],
        ]);

        // Handle additional images
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $file) {
                $path = $file->store('products/gallery', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product "' . $validated['name'] . '" created successfully with images.');
    }

    /* ─── Edit ───────────────────────────────────────────────── */

    public function edit(Product $product)
    {
        $categories = \App\Models\Category::orderBy('name')->get();
        $badges     = Product::badges();
        $product->load('images');
        return view('admin.products.edit', compact('product', 'categories', 'badges'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'                => 'required|string|max:255',
            'description'         => 'nullable|string',
            'price'               => 'required|numeric|min:0',
            'image_url'           => 'nullable|url|max:2048',
            'image_file'          => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'category_id'         => 'required|exists:categories,id',
            'badge'               => 'nullable|string|max:50',
            'is_active'           => 'boolean',
            'sort_order'          => 'nullable|integer',
            'resolution'          => 'nullable|string|max:255',
            'night_vision'        => 'nullable|string|max:255',
            'weatherproof'        => 'nullable|string|max:255',
            'storage'             => 'nullable|string|max:255',
            'features'            => 'nullable|array',
            'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $imagePath = $product->image_path;

        if ($request->hasFile('image_file')) {
            if ($imagePath && \Illuminate\Support\Facades\Storage::disk('public')->exists($imagePath)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image_file')->store('products', 'public');
        }

        $product->update([
            'name'         => $validated['name'],
            'description'  => $validated['description'] ?? null,
            'price'        => $validated['price'],
            'image_url'    => $validated['image_url'] ?? null,
            'image_path'   => $imagePath,
            'category_id'  => $validated['category_id'],
            'badge'        => $validated['badge'] ?? null,
            'is_active'    => $request->boolean('is_active', true),
            'sort_order'   => $validated['sort_order'] ?? 0,
            'resolution'   => $validated['resolution'] ?? null,
            'night_vision' => $validated['night_vision'] ?? null,
            'weatherproof' => $validated['weatherproof'] ?? null,
            'storage'      => $validated['storage'] ?? null,
            'features'     => $validated['features'] ?? [],
        ]);

        // Handle additional images
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $file) {
                $path = $file->store('products/gallery', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product "' . $product->name . '" updated successfully.');
    }

    /* ─── Delete ─────────────────────────────────────────────── */

    public function destroy(Product $product)
    {
        $name = $product->name;

        // Delete main image
        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }

        // Delete additional images
        foreach ($product->images as $image) {
            if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product "' . $name . '" and its images deleted successfully.');
    }

    /* ─── Delete Individual Image ──────────────────────────────── */

    public function deleteImage(\App\Models\ProductImage $image)
    {
        if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }
        $image->delete();
        return back()->with('success', 'Gallery image removed.');
    }

    /* ─── Quick toggle active ─────────────────────────────────── */

    public function toggle(Product $product)
    {
        $product->update(['is_active' => !$product->is_active]);
        return back()->with('success', 'Product status updated.');
    }
}
