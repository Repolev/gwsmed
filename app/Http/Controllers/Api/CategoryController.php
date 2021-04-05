<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use http\Env\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function categories(){
        $categories=Category::where('status','active')->get();
        return response(['categories'=>CategoryResource::collection($categories),'message'=>"Successfully fetched categories"],200);
    }



    public function featuredCategory(){
        $featured_category = [];
        $featured_categories=Category::with('products')->where(['status'=>'active','is_featured'=>1,'is_parent'=>1])->orderBy('id','DESC')->get();
        foreach($featured_categories as $featured_category){
            if(count($featured_category->products) > 0){
                $featured_category = $featured_category;
                break;
            }
        }

        if(count($featured_categories)>0){
            return response()->json(['data'=>CategoryResource::collection($featured_categories),'message'=>'All featured category','status'=>true]);
        }
        else{
            return response()->json(['data'=>null,'message'=>'No featured category found','status'=>false]);
        }
    }
}
