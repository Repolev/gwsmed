<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','meta_tag','model_no','summary','description','stock','price','offer_price','discount','tags','is_featured','status','photo','image_path'];

    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }


    public static function getProductByCart($id){
        return self::where('id',$id)->get()->toArray();
    }

    public function attributes(){
        return $this->hasMany('App\Models\ProductAttribute');
    }

    /**
     * Many to Many relationship
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    // relationship between product & product review
    public function productReviews(){
        return $this->hasMany('App\Models\ProductReview','product_id','id')->where('status','accept')->orderBy('id','DESC');
    }
    // many to many relation with order
    public function orders(){
        return $this->belongsToMany(Order::class,'product_orders')->withPivot('quantity')->withTimestamps();
    }

    // many to many relation with order
    public function enquiries(){
        return $this->belongsToMany(Enquiry::class,'enquiry_products','product_id','enquiry_id');
    }


    public function reviews(){
        return $this->hasMany('App\Models\ProductReview','product_id','id');
    }
}
