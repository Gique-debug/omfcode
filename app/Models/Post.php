<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'category', 'read_time', 'image_url', 'is_featured', 'views', 'likes',
    ];

    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }
}
