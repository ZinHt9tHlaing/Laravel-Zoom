<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // blogs categories

    // a blog belongsTo a category

    // a category hasMany blogs

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function scopeFilter($query, $filters)
    {
        if ($filters['search'] ?? null) {
            $query->where(function ($query) use ($filters) {
                $query->where('title', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('body', 'like', '%' . $filters['search'] . '%');
            });
        }
        if ($filters['category'] ?? null) {
            $query->whereHas('category', function ($cateQuery) use ($filters) {
                $cateQuery->where('slug', $filters['category']);
            });
        }

        if ($filters['author'] ?? null) {
            $query->whereHas('author', function ($userQuery) use ($filters) {
                $userQuery->where('username', $filters['author']);
            });
        }
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return  $this->hasMany(Comment::class);
    }
}
