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
        'on_menu',
        'meta_title',
        'meta_description',
        'image_alt',
        'banner_alt'
    ];

    protected $appends = ['full_slug'];


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
        return $this->belongsToMany(Product::class, 'product_categories')->orderBy('id','DESC');
    }

    // many to many relation with order
    public function enquiries(){
        return $this->belongsToMany(Enquiry::class,'enquiry_categories','category_id','enquiry_id');
    }


    public function subcategories(){
        return $this->hasMany('App\Models\Category','parent_id','id')->with('products')->where('status','active');
    }

    public function parentCategory(){
        return $this->hasOne('App\Models\Category','id','parent_id')->with('products')->where('status','active');
    }

    /**
     * return the whole slug
     */
    public function getFullSlugAttribute()
    {
        $category_url['slug'] = $this->slug;
        if($this->level > 0){
            $category_url['parent1'] = $this->parentCategory->slug;
            if($this->level > 1){
                $category_url['parent2'] = $this->parentCategory->parentCategory->slug;
                if($this->level > 2){
                    $category_url['parent3'] = $this->parentCategory->parentCategory->parentCategory->slug;
                    if($this->level > 3){
                        $category_url['parent4'] = $this->parentCategory->parentCategory->parentCategory->parentCategory->slug;
                        if($this->level > 4){
                            $category_url['parent5'] = $this->parentCategory->parentCategory->parentCategory->parentCategory->parentCategory->slug;
                            if($this->level > 5){
                                $category_url['parent6'] = $this->parentCategory->parentCategory->parentCategory->parentCategory->parentCategory->parentCategory->slug;
                            }
                        }
                    }
                }
            }
        }
        return $category_url;
    }


}


