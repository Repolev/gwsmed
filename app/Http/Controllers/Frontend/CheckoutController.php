<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function checkout(){
        $user=Auth::user();
        return view('frontend.pages.checkout.checkout',compact('user'));
    }

    public function checkoutStore(Request $request){
        $this->validate($request,[
            'full_name'=>'string|required',
            'email'=>'email|required',
            'phone'=>'string|required',
            'address'=>'string|required',
            'address2'=>'string|nullable',
        ]);

        $order=new Order();
        $order['order_number']=Str::upper('ORD-'.Str::random(6));

        $order['quantity']=Cart::instance('shopping')->count();

        $order['condition']='pending';

        $order['full_name']=$request->input('full_name');
        $order['email']=$request->input('email');
        $order['phone']=$request->input('phone');
        $order['address']=$request->input('address');
        $order['address2']=$request->input('address2');
        $order['ip_address'] = request()->ip();
        $order['country'] = $request->input('country');
        $status=$order->save();
        $product_id=[];
        foreach(Cart::instance('shopping')->content() as $item){
            $product_id[]=$item->id;
            $product=Product::find($item->id);
            $quantity=$item->qty;
            $order->products()->attach($product,['quantity'=>$quantity]);
        }
//        return $product;

        if($status){
           Mail::to($order['email'])->bcc($order['semail'])->send(new OrderMail($order));
            Cart::instance('shopping')->destroy();
            return redirect()->route('complete',$order['order_number']);
        }
        else{
            return redirect()->route('checkout')->with('error','Please try again');
        }
    }

    public function complete($order){
        $order=$order;
        return view('frontend.pages.checkout.complete',compact('order'));
    }
}
