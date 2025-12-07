<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPosts extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'author',
        'tags',
        'read_time',
        'published',
        'published_at',
    ];

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];
}
