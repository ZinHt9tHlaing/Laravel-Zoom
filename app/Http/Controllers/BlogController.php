<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // conditional query
        $blogQuery = Blog::with('category', 'author')->latest();
        if (request('search')) {
            $blogQuery->where('title', 'like', '%' . request('search') . '%');
        }
        return view('blogs.index', [
            'blogs' => $blogQuery->paginate(3)->withQueryString(),
            'categories'=> Category::all()
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
