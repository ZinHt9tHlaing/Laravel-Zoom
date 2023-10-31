<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{

    public function __construct(public $title, public $slug, public $body)
    {
    }

    public static function all()
    {
        $files = collect(File::files(resource_path("/blogs")));
        $blogs = $files->map(function ($file) use (&$blogs) {
            $yamlObj = YamlFrontMatter::parse(file_get_contents($file));
            $b = new Blog($yamlObj->title, $yamlObj->slug, $yamlObj->body());
            return $b;
        });
        return $blogs;
    }

    public static function find($slug)
    {
        return  static::all()->firstWhere("slug", $slug);

        // $path = resource_path('/blogs/' . $filename . '.html');
        // if (!file_exists($path)) {
        //     abort(404);
        // }

        // $blogObj = cache()->remember($filename, 30, function () use ($path) {
        //     $yamlObj = YamlFrontMatter::parse(file_get_contents($path));
        //     $b = new Blog($yamlObj->title, $yamlObj->slug, $yamlObj->body());
        //     return $b;
        // });
    }

    public static function findOrFail($slug)
    {
        $blogObj = static::find($slug);

        if (!$blogObj) {
            abort(404);
        }
        return $blogObj;
    }
}
