<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'slug',
        'image_path',
        'content',
        'user_id',
        'meta_title',
        'meta_description'
    ];

    /**
     * One to Many Relationship between Blog and User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Admin', 'user_id');
    }

    /**
     * Blog Comments
     */
    public function comments()
    {
        return $this->hasMany('App\Models\BlogComment', 'blog_id', 'id')->where('status','accept');
    }
}
