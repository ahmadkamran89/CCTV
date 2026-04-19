<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('sort_order')->orderBy('name')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:categories',
            'slug'        => 'nullable|string|max:255|unique:categories',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:50',
            'is_active'   => 'boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        Category::create([
            'name'        => $validated['name'],
            'slug'        => $validated['slug'] ?: Str::slug($validated['name']),
            'description' => $validated['description'],
            'icon'        => $validated['icon'],
            'is_active'   => $request->boolean('is_active', true),
            'sort_order'  => $validated['sort_order'] ?: 0,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:categories,name,' . $category->id,
            'slug'        => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:50',
            'is_active'   => 'boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        $category->update([
            'name'        => $validated['name'],
            'slug'        => $validated['slug'] ?: Str::slug($validated['name']),
            'description' => $validated['description'],
            'icon'        => $validated['icon'],
            'is_active'   => $request->boolean('is_active', true),
            'sort_order'  => $validated['sort_order'] ?: 0,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }

    /**
     * Toggle the active status.
     */
    public function toggle(Category $category)
    {
        $category->update(['is_active' => !$category->is_active]);
        return back()->with('success', 'Category status toggled.');
    }
}
