<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display the specified product.
     */
    public function show($idOrSlug)
    {
        $query = Product::query();

        // Check if the slug column exists before querying (defensive for migrations)
        if (\Illuminate\Support\Facades\Schema::hasColumn('products', 'slug')) {
            $query->where(function($q) use ($idOrSlug) {
                $q->where('slug', $idOrSlug)->orWhere('id', $idOrSlug);
            });
        } else {
            $query->where('id', $idOrSlug);
        }

        $product = $query->firstOrFail();
        // Ensure product is active
        if (!$product->is_active) {
            abort(404);
        }

        // Load relations
        $product->load(['category', 'images']);

        // Recommendation: same category products
        $relatedProducts = Product::active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
