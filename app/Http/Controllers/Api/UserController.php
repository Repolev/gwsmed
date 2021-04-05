<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userOrder(){
        $user=Auth::user();
        if($user){
            $orders=Order::where('user_id',$user->id)->get();
            if(count($orders)>0){
                return response()->json(['data'=>$orders,'status'=>true,'message'=>'Your orders']);
            }
            else{
                return response()->json(['data'=>null,'status'=>true,'message'=>'You have no orders yet']);
            }
        }
        else{
            return response()->json(['data'=>null,'status'=>false,'message'=>'Please login first']);
        }

    }

    public function userOrderDetail($orderId){
        $order=Order::find($orderId);
        if($order){
            return response()->json(['data'=>new OrderResource($order),'message'=>'Order detail','status'=>true]);
        }
        else{
            return response()->json(['data'=>null,'message'=>'','status'=>false]);
        }
    }
}
