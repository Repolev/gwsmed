@extends('frontend.layouts.master')

@section('content')


    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>Checkout</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- order detail start -->
    <div class="cv-order-detail spacer-top-less ">
        <div class="container">
            <div class="cv-heading">
                <h1>product details</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cv-last-order">
                        <table>
                            <thead>
                            <tr>
                                <th>Product image</th>
                                <th>Product name</th>
                                <th>Product model</th>
                                <th>Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()>0)
                                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                    <tr>
                                        <td>
                                            <div class="cv-cart-img">
                                                @php
                                                    $photo=explode(',',$item->model->image_path);
                                                @endphp
                                                <img src="{{asset($photo[0])}}" alt="{{$item->name}}" class="img-fluid">
                                            </div>
                                        </td>
                                        <td>
                                            {{ucfirst($item->name)}}
                                        </td><td>
                                            {{$item->model->model_no}}
                                        </td>
                                        <td>
                                            {{$item->qty}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- order detail end -->
    <!-- billing start -->
    <div class="cv-billing spacer-top-less spacer-bottom">
        <div class="container">
            <div class="cv-heading">
                <h1>Billing Details</h1>
            </div>
            <form action="{{route('checkout.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Full name <span class="text-danger">*</span></label>
                            <input type="text" name="full_name" placeholder="Full name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email address <span class="text-danger">*</span></label>
                            <input type="email" name="email" placeholder="email address" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" placeholder="Phone" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Country <span class="text-danger">*</span></label>
                            <input type="text" name="country" placeholder="Country name" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address <span class="text-danger">*</span></label>
                            <textarea name="address" placeholder="Shipping Address" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address2</label>
                            <textarea name="address2" placeholder="Shipping Address" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="cv-cart-btn">
                    <button type="submit" class="cv-btn" onclick="confirm('Are you sure?')">place order</button>
                </div>
            </form>
        </div>
    </div>
    <!-- billing end -->

@endsection

