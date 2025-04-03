<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'commentsable_id', 'commentsable_type'];

    // Define polymorphic relationship
    public function commentsable()
    {
        return $this->morphTo();
    }

    // Relationship with replies
    public function replies()
    {
        return $this->morphMany(Reply::class, 'repliesable');
    }

}
