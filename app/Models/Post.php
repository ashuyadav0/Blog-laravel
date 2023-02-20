<?php

namespace App\Models;

use Carbon\Exceptions\EndLessPeriodException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Monolog\Processor\HostnameProcessor;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'discription'
    ];

    /**
     * Get the comments for the blog post.
     */
    function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the category that owns the blog post.
     */
    function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user that owns the blog post.
     */
    function author() {
        return $this->belongsTo(User::class);
    }
}