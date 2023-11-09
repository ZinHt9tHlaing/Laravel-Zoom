<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // conditional query
    $blogQuery = Blog::with('category','author')->latest();
    if (request('search')) {
        $blogQuery->where('title', 'like', '%' . request('search') . '%');
    }
    return view('blogs', [
        // 'blogs' => Blog::all()
        'blogs' => $blogQuery->get(),
    ]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blog', [
        'blog' => $blog,
        'randomBlogs' => Blog::inRandomOrder()->take(5)->get()
    ]);
});

// Route::get('/blogs/{blog:slug}', function (Blog $blog) {
//     return view('/blog-detail', [
//         'blog' => $blog,
//     ]);
// });

// all products
Route::get('/products', function () {
    dd(Product::all());
});

// product detail page
Route::get('/products/{product}', function (Product $product) {
    dd($product);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        'blogs' => $category->blogs->load('category','author')
    ]);
});

Route::get('/users/{user:username}', function (User $user) {
    return view('blogs', [
        'blogs' => $user->blogs->load('category','author')
    ]);
});
