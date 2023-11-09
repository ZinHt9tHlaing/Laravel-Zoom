<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)
        ->has(Blog::factory(3))
        ->create();

        // // Blog::factory(5)->create(); // -> categories 50
        // Category::factory(10)->create(); // -> categories 60
        // Product::factory(20)->create();
    }
}
