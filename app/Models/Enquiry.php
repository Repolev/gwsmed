<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $fillable=['full_name','email','phone','address','country','message','subject'];

//    Many to many relation with products
    public function products(){
        return $this->belongsToMany(Product::class,'enquiry_products','enquiry_id','product_id');
    }
}
