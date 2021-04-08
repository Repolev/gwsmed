<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'photo',
        'image_path',
        'banner_path',
        'is_parent',
        'parent_id',
        'is_featured',
        'status',
        'level',
        'on_menu'
    ];


    public static function shiftChild($cat_id){
        return Category::whereIn('id',$cat_id)->update(['is_parent'=>1]);
    }

    public static function getChildByParentID($id){
        return Category::where('parent_id',$id)->pluck('title','id');
    }

    /**
     * Many to Many relationship
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }


    // many to many relation with order
    public function enquiries(){
        return $this->belongsToMany(Enquiry::class,'enquiry_categories','category_id','enquiry_id');
    }


    public function subcategories(){
        return $this->hasMany('App\Models\Category','parent_id','id')->with('products')->where('status','active');
    }

    public function parentcategories(){
        return $this->hasOne('App\Models\Category','id','parent_id')->with('products')->where('status','active');
    }

}


