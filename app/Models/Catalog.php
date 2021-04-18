<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    /**
     * Arrays that are mass assignable
     */
    protected $fillable = ['name', 'category_id', 'slug', 'image_path', 'image_name', 'pdf_path'];

    /**
     *
     */
    public function category()
    {
        return $this->belongsTo('App\Models\CatalogCategory', 'category_id');
    }
}
