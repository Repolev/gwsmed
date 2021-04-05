@extends('frontend.layouts.master')

@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area mt-3 d-none">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    {{-- <h5>Login &amp; Register</h5> --}}
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Login &amp; Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Register Form Area -->
    <div class="reg_log_area mt-5">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="form-wrapper bg-white py-5 px-4">
                        <form action="{{route('register')}}" method="post" class="login-form">
                            <h5 class="login-form-title"><strong>Customer Register</strong></h5>
                            @csrf
                            <div class="wrap-input">
                                <input class="input" type="text" name="full_name" id="username" placeholder="Full Name" value="{{old('full_name')}}">
                                <span class="focus-input"></span>
                                <span class="symbol-input">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('full_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="wrap-input">
                                <input type="text" class="input" name="username" id="username" placeholder="Username" value="{{old('username')}}">
                                <span class="focus-input"></span>
                                <span class="symbol-input">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('username')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="wrap-input">
                                <input type="email" class="input" name="email" id="username" placeholder="Email" value="{{old('email')}}">
                                <span class="focus-input"></span>
                                <span class="symbol-input">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="wrap-input">
                                <input type="password" class="input" name="password" id="password" placeholder="Password">
                                <span class="focus-input"></span>
                                <span class="symbol-input">
                                    <i class="ri-lock-password-fill" aria-hidden="true"></i>
                                </span>
                                <span id="showPassword">
                                    <i class="ri-eye-off-line" id="icon"></i>
                                </span>
                            </div>
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror


                            <div class="wrap-input">
                                <input type="password" class="input" name="password_confirmation" id="password" placeholder="Confirm Password">
                                <span class="focus-input"></span>
                                <span class="symbol-input">
                                    <i class="ri-rotate-lock-line" aria-hidden="true"></i>
                                </span>
                                <span id="showPassword">
                                    <i class="ri-eye-off-line" id="icon"></i>
                                </span>
                            </div>

                            <div class="text-left checkbox mt-4">
                                <label class="float-left" style="clear: both;">
                                    <input type="checkbox" name="remember">
                                    Signup for latest updates & exclusive offers from Gwsmed
                                </label>
                            </div>

                            <div class="form-btn-wrapper">
                                <button class="login-form-btn" type="submit">
                                    Register
                                </button>
                            </div>

                            <div class="text-center pt-2">
                                <p class="forgot-username login-footer-main">Already signed to Gwsmed? |
                                    <a href="{{route('login')}}" class="register-link">Login Now</a>
                                </p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Area End -->
@endsection
