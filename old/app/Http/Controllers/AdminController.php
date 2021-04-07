<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        $orders=Order::latest()->paginate(10);
        return view('backend.index',compact('orders'));
    }
}
