<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];

    /**
     * Get the posts for the blog category.
     */
    function posts() {
        return $this->hasMany(Post::class);
    }
}
