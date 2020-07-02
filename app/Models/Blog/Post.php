<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content'
    ];
}
