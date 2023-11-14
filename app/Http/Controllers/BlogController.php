<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // conditional query
        // $blogQuery = Blog::with('category', 'author')->filter(request('search'))->latest();

        return view('blogs.index', [
            'blogs' => Blog::with('category', 'author')
            ->filter(request('search'))
            ->latest()
            ->paginate(3)
            ->withQueryString(),
        ]);
    }

    public function show(Blog $blog)
    {

        return view('blog', [
            'blog' => $blog,
            'randomBlogs' => Blog::inRandomOrder()->take(5)->get()
        ]);
    }
}
