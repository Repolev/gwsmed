<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'blog_id',
        'email',
        'name',
        'contact',
        'website',
        'status'
    ];

    /**
     * One to Many Relationship between Blog and User
     */
    public function blog()
    {
        return $this->belongsTo('App\Models\Blog', 'blog_id');
    }
}
