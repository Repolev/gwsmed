<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductReviewResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        $products=Product::where('status','active')->get();
        if(count($products)>0){
            return response(['data'=>ProductResource::collection($products),'message'=>'All products','status'=>true],200);
        }
        else{
            return response(['data'=>ProductResource::collection($products),'message'=>'Successfully fetched products','status'=>false],200);
        }
    }

    //featured products
    public function featuredProducts(){
        $featured_products=Product::where(['is_featured'=>'1','status'=>'active'])->get();
        if(count($featured_products)>0){
            return response(['data'=>ProductResource::collection($featured_products),'message'=>'Freatured products','status'=>true]);
        }
        else{
            return response(['data'=>null,'message'=>'Featured product null','status'=>false]);
        }
    }

    //newProducts
    public function newProducts(){
        $new_products=Product::where(['tags'=>'new','status'=>'active'])->get();
        if(count($new_products)>0){
            return response(['data'=>ProductResource::collection($new_products),'message'=>'New products','status'=>true]);
        }
        else{
            return response(['data'=>null,'message'=>'New products null','status'=>false]);
        }
    }

    //hotProducts
    public function hotProducts(){
        $hot_products=Product::where(['tags'=>'hot','status'=>'active'])->get();
        if(count($hot_products)>0){
            return response(['data'=>ProductResource::collection($hot_products),'message'=>'Hot products','status'=>true]);
        }
        else{
            return response(['data'=>null,'message'=>'Hot products null','status'=>false]);
        }
    }
    //searchProduct
    public function searchProduct(Request $request){
        $query=$request->input('query');

        if($query !=''){
            $products=Product::where('status','active')->where('title','LIKE','%'.$query.'%')->orderBy('id','DESC')->paginate(16);
            if(count($products)>0){
                return response()->json(['data'=>ProductResource::collection($products),'status'=>true,'message'=>'Search product']);
            }
            else{
                return response()->json(['data'=>null,'status'=>false,'message'=>'No product found']);
            }
        }else{
            return response()->json(['data'=>null,'status'=>false,'message'=>'Search must have a keyword']);
        }

    }

    //productDetail
    public function productDetail(Request $request){
        $product=Product::where('id',$request->id)->first();
        if($product){
            return response()->json(['data'=>new ProductResource($product),'message'=>'Product Detail','status'=>true]);
        }
        else{
            return response()->json(['data'=>null,'message'=>'Product not found','status'=>false]);
        }
    }

    //review submit
    public function reviewSubmit(Request $request){
        if(empty($request->product_id)){
            return response()->json(['overview'=>null,'message'=>'Product id is required','status'=>false]);
        }
        elseif(empty($request->user_id)){
            return response()->json(['overview'=>null,'message'=>'User id is required','status'=>false]);
        }
        elseif(empty($request->rate)){
            return response()->json(['overview'=>null,'message'=>'Rating is required','status'=>false]);
        }
        elseif($request->rate<0){
            return response()->json(['overview'=>null,'message'=>'Rating should be greater than 0','status'=>false]);
        }
        elseif($request->rate>5){
            return response()->json(['overview'=>null,'message'=>"Rating should be less than 5",'status'=>true]);
        }

        $review=new ProductReview();
        $review->fill($request->all());
        $review['created_at']=date('Y-m-d H:i:s');
        $review['status']='accept';
        $review->save();
        $reviews=ProductReview::where('product_id',$request->product_id)->paginate(10);

        if(isset($review)){
            return response()->json(['data'=>new ProductReviewResource($review),'overview'=>ProductReviewResource::collection($reviews),'status'=>true]);
        }
        return response()->json(['data'=>null,'overview'=>[],'status'=>false]);
    }

    // deal of the day
    public function dealOfTheDay(){
        $deal_products=Product::where(['status'=>'active','todays_deal'=>1])->orderBy('id','DESC')->limit(5)->get();
        if(count($deal_products)>0){
            return response(['data'=>ProductResource::collection($deal_products),'message'=>'Deal of the day products','status'=>true]);
        }
        else{
            return response(['data'=>null,'message'=>'There is no deal of the day','status'=>false]);
        }

    }


}
