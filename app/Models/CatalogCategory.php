<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogCategory extends Model
{
    use HasFactory;

    /**
     * Arrays that are mass assignable
     */
    protected $fillable = ['title', 'slug', 'parent_id', 'status'];

    /**
     *
     */
    public function parentCategory(){
        return $this->belongsTo('App\Models\CatalogCategory','id','parent_id')->where('status','active');
    }

    /**
     *
     */
    public function childCategories(){
        return $this->hasMany('App\Models\CatalogCategory','id','parent_id')->where('status','active');
    }


    public function catalogs()
    {
        return $this->hasMany('App\Models\Catalog', 'category_id', 'id');
    }
}
