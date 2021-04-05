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
    <div class="cv-login">
        <div class="modal-dialog modal-dialog-centered">
            <div class="">
                <div class="modal-body">
                    <div class="cv-login-box">
                        <div class="cv-login-wlcm-box">
                            <div class="cv-login-wlcm">
                                <h2>Sign Up</h2>
                                <p>If you don't have a personal account please sign up</p>
                                <a href="javascript:;" data-toggle="modal" data-target="#signUpModal" data-dismiss="modal" aria-label="Close" class="cv-btn">Sign up</a>
                            </div>
                        </div>
                        <div class="cv-login-form">
                            <h2>Sign in to your account</h2>
                            <p>Use your email for login</p>
                            <form>
                                <input type="text" placeholder="Email"/>
                                <input type="password" placeholder="Password"/>
                                <a href="javascript:;" class="pa-forgot-password" data-toggle="modal" data-target="#forgotModal" data-dismiss="modal" aria-label="Close">Forgot your password?</a>
                                <button class="cv-btn">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Login Area -->
    <div class="reg_log_area mt-5">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <!-- Login Form -->
                <div class="col-12 col-lg-6">
                    <div class="form-wrapper bg-white py-5 px-4">
                        <form action="{{route('login')}}" method="post" class="login-form">
                            <h5 class="login-form-title"><strong>Customer Login</strong></h5>
                            @csrf
                            <div class="wrap-input">
                                <input class="input" type="email" name="email" id="username" placeholder="Email or Username" value="{{old('email')}}">
                                <span class="focus-input"></span>
                                <span class="symbol-input">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="wrap-input" data-validate="Password is required">
                                <input class="input" type="password" name="password" id="password" placeholder="Password">
                                <span class="focus-input"></span>
                                <span class="symbol-input">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                                <span id="showPassword">
                                    <i class="ri-eye-off-line" id="icon"></i>
                                </span>
                            </div>
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="text-left checkbox mt-3 ml-3">
                                <label class="float-left" style="clear: both;" for="customChe">
                                    <input type="checkbox" name="remember" id="customChe">
                                    Keep me logged in
                                </label>
                                <span style="float: right;">
                                    <a href="#" class="forgot-username-link">Forgot
                                        Your Password ?</a>
                                    <p></p>
                                </span>
                            </div>

                            <div class="form-btn-wrapper">
                                <button class="login-form-btn" type="submit">
                                    Login
                                </button>
                            </div>

                            <div class="text-center pt-2">
                                <p class="forgot-username login-footer-main">New to Gwsmed? |
                                    <a href="{{route('register')}}" class="register-link">Register Now</a>
                                </p>

                            </div>

                            <div class="text-center pt-2 pb-2">
                                <span class="txt1">
                                    or connect with
                                </span>
                            </div>

                            <div class="pt-2 login__social-links" style="display: flex; justify-content: center;">
                                <a href="#" class="login-social-item" style="background: #4368af;">
                                    <i class="fa fa-facebook-f"></i>
                                    <span>Sign in with Facebook</span>
                                </a>

                                <a href="#" class="login-social-item" style="background: #e45547;">
                                    <i class="fa fa-google"></i>
                                    <span>Sign in with Google</span>
                                </a>
                            </div>

                        </form>
                    </div>

                    {{-- <div class="login_form mb-50">
                        <h5 class="mb-3">Login</h5>

                        <form action="{{route('login.submit')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="username" placeholder="Email or Username value="{{old('email')}}"">
                                @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-check">
                                <div class="custom-control custom-checkbox mb-3 pl-1">
                                    <input type="checkbox" class="custom-control-input" id="customChe">
                                    <label class="custom-control-label" for="customChe">Remember me for this computer</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Login</button>
                        </form>
                        <!-- Forget Password -->
                        <div class="forget_pass mt-15">
                            <a href="#">Forget Password?</a>
                        </div>
                    </div> --}}
                </div>
                <!-- Login Form Ends-->


                {{-- <div class="col-12 col-md-6">
                    <div class="login_form mb-50">
                        <h5 class="mb-3">Register</h5>

                        <form action="{{route('register.submit')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" class="form-control" name="full_name" id="username" placeholder="Full Name" value="{{old('full_name')}}">
                                @error('full_name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{old('username')}}">
                                @error('username')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="username" placeholder="Email" value="{{old('email')}}">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Repeat Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Register</button>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Login Area End -->
@endsection
