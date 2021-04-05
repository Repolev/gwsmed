@extends('frontend.layouts.master')

@section('content')

    <!-- Breadcumb Area -->
    <div class="breadcumb_area d-none">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Checkout</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->


    <!-- Checkout Area -->
    <div class="checkout_area section_padding_100 bg-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="order_completed_area clearfix text-center">
                        <div class="img-wrapper mb-5">
                            <img src="{{ asset('frontend/images/20943863.jpg') }}" alt="" style="max-width: 200px">
                        </div>
                        <h3>Thank You For Your Order!!</h3>
                        <p class="mt-2">You will receive an email of your order details soon.</p>
                        <p class="orderid mb-0">Your Order id <span>#{{ $order }}</span>. </p>

                    </div>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <a href="{{route('home')}}" class="btn btn-info mt-5"><span class="fa fa-long-arrow-left"></span> Go Back to Home
                    </a>
{{--                    <button class="btn primary-btn mt-5">Track Your Order <span class="fa fa-long-arrow-right"></span>--}}
{{--                    </button>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Area End -->
@endsection
