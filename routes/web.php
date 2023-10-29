<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $blogs = [];
    $files = File::files(resource_path('/blogs'));

    foreach ($files as $file) {
        $blogs[] = $file->getContents();
    };

    return view('blogs', [
        'blogs' => $blogs
    ]);
});


Route::get('/blogs/{filename}', function ($filename) {
    // get file content from wildcard filename
    $blog =  file_get_contents(resource_path('/blogs/'. $filename.'.html'));
    return view('blog-detail',[
        'blog' => $blog
    ]);
});

