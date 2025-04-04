<?php

namespace App\Models;

use App\Enums\Category;
use App\Models\Category as ModelsCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'slug', 'postsable_id', 'postsable_type'];

    // Define polymorphic relationship
    public function postsable()
    {
        return $this->morphTo();
    }

    // Relationship with comments
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentsable');
    }

    // Define the polymorphic relationship
    public function images()
    {
        return $this->morphOne(Image::class, 'imagesable');
    }
    // 
    protected $casts = [
        Category::class => 'string',
    ];

}
