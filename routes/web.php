<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blogs', [
        'blogs' => Blog::all()
    ]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('/blog-detail', [
        'blog' => $blog
    ]);
});

// all products
Route::get('/products', function () {
    dd(Product::all());
});

// product detail page
Route::get('/products/{product}',function(Product $product){
    dd($product);
});
