<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    // get all blogs
    $blogs = Blog::all(); // array
    return view('blogs', [
        'blogs' => $blogs
    ]);
});

// "^[A-Za-z0-9-_]+$" => regex
Route::get("/blogs/{filename}", function ($filename) {
    // dd($filename);

    // find a blog
    return view('blog-detail', [
        'blog' =>  Blog::find($filename)
    ]);
});
