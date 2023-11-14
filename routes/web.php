<?php

use App\Http\Controllers\BlogController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);


// Route::get('/blogs/{blog:slug}');

// all products
Route::get('/products', function () {
    dd(Product::all());
});

// product detail page
Route::get('/products/{product}', function (Product $product) {
    dd($product);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs.index', [
        'blogs' => $category->blogs()->with('category', 'author')->paginate(),
    ]);
});

Route::get('/users/{user:username}', function (User $user) {
    return view('blogs.index', [
        'blogs' => $user->blogs()->with('category', 'author')->paginate()
    ]);
});
