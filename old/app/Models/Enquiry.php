<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $fillable=['full_name','email','phone','address','country','message','subject'];

//    Many to many relation with categories
    public function categories(){
        return $this->belongsToMany(Category::class,'enquiry_categories','enquiry_id','category_id');
    }
}
