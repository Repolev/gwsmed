<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function userGetCart(){
        return Cart::instance('shopping')->count();
    }

    public function addToCart(Request $request){
        if(empty($request->product_qty)){
            return response()->json(['data'=>null,'status'=>false,'message'=>'Product quantity required']);
        }
        if(empty($request->product_id)){
            return response()->json(['data'=>null,'status'=>false,'message'=>'Product id required']);
        }

        $product_qty=$request->input('product_qty');
        $product_id=$request->input('product_id');

        $product=Product::getProductByCart($product_id);


        //check here the quantity of products
        if($product[0]['stock']<=0 || $product_qty>$product[0]['stock']){
            return response()->json(['data'=>null,'message'=>"We don't have enough items",'status'=>false]);
        }
        else{
            $price=$product[0]['offer_price'];

            $cart_array=[];

            foreach(Cart::instance('shopping')->content() as $item){
                $cart_array[]=$item->id;
            }

            $result=Cart::instance('shopping')->add($product_id,$product[0]['title'],$product_qty,$price)->associate('App\Models\Product');

            if($result){
                return response()->json(['data'=>$result,'status'=>true,'message'=>'Item was added to your cart']);
                $response['status']=true;
                $response['product_id']=$product_id;
                $response['total']=Cart::subtotal();
                $response['cart_count']=Cart::instance('shopping')->count();
                $response['message']="Item was added to your cart";
            }
        }
        if($request->ajax()){
            $header=view('frontend.layouts.header')->render();
            $response['header']=$header;
        }
        return $response;
    }
}
