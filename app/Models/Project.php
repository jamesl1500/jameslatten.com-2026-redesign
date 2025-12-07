<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'long_description',
        'emoji',
        'category',
        'technologies',
        'status',
        'demo_url',
        'github_url',
        'is_featured',
        'is_published',
        'order',
        'completed_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'completed_at' => 'date',
    ];
}
