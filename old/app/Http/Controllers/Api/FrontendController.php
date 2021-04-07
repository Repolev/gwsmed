<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CouponResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function brands(){
        $brands=Brand::where('status','active')->get();
        return response(['brands'=>BrandResource::collection($brands),'message'=>'Successfully fetched brands'],200);
    }


    public function coupons(){
        $coupons=Coupon::where('status','active')->get();
        return response(['coupons'=>CouponResource::collection($coupons),'message'=>"Successfully fetched coupon"],200);
    }

    public function orders(){
        $orders=Order::all();
        return response(['orders'=>OrderResource::collection($orders),'message'=>"Successfully fetched order"],200);
    }


    // settings
    public function settings(){
        $settings=Setting::first();
        if($settings){
            return response()->json(['data'=>$settings,'message'=>'General Settings','status'=>true]);
        }
        else{
            return response()->json(['data'=>null,'message'=>'','status'=>false]);
        }
    }




}
