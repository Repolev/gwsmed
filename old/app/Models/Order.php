<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['order_number',
    'condition','sub_total', 'total_amount','quantity'
    ,'full_name','email','address','address2','phone', 'country', 'ip_address','subject','message'];

    // many to many relation with product
    public function products(){
        return $this->belongsToMany(Product::class,'product_orders')->withPivot('quantity')->withTimestamps();
    }
}
