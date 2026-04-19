<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;

/* ─── Public Routes ──────────────────────────────────────────── */

Route::get('/', function () {
    $categories = \App\Models\Category::query()
        ->active()
        ->with(['products' => function ($q) {
            $q->active()->orderBy('sort_order')->orderBy('created_at', 'desc');
        }])
        ->orderBy('sort_order')
        ->orderBy('name')
        ->get();

    return view('home', compact('categories'));
})->name('home');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

/* ─── Authentication Routes ──────────────────────────────────── */

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* ─── Admin Routes (Protected) ───────────────────────────────── */

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // Redirect /admin → products
    Route::get('/', fn() => redirect()->route('admin.products.index'));

    Route::resource('products', AdminProductController::class);
    Route::resource('categories', AdminCategoryController::class);

    // Quick toggles
    Route::patch('products/{product}/toggle', [AdminProductController::class, 'toggle'])->name('products.toggle');
    Route::patch('categories/{category}/toggle', [AdminCategoryController::class, 'toggle'])->name('categories.toggle');

    // Delete individual gallery image
    Route::delete('products/image/{image}', [AdminProductController::class, 'deleteImage'])
        ->name('products.image.destroy');
});
