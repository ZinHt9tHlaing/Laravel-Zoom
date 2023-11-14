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

    public function scopeFilter($query,$searchValue){
        if ($searchValue) {
            $query->where('title', 'like', '%' . $searchValue . '%');
        }
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
