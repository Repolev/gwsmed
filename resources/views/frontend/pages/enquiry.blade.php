@extends('frontend.layouts.master')

@section('content')
    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>Enquiry</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Enquiry</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- about start -->
    <div class="cv-about">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger mt-4">Note* : Fields marked with an * are required</div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h3 class="px-2 pb-3">Enquiry Form</h3>
                    <form action="{{route('enquiry.submit')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;color:black" for="">Full name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="full_name" placeholder="Full name" value="{{old('full_name')}}">
                                    @error('full_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;color:black" for="">Email <span class="text-danger" >*</span></label>
                                    <input type="email" class="form-control" name="email" placeholder="Email address" value="{{old('email')}}">
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;color:black" for="">Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" placeholder="Phone" class="form-control" value="{{old('phone')}}">
                                    @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;color:black" for="">Country <span class="text-danger">*</span></label>
                                    <input type="text" name="country" placeholder="Country name" class="form-control" value="{{old('country')}}">
                                    @error('country')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="font-weight: bold;color:black" for="">Address</label>
                                    <textarea name="address" placeholder="Address" class="form-control">{{old('address')}}</textarea>
                                    @error('address')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="font-weight: bold;color:black" for="">Describe your requirement in Brief</label>
                                    <textarea name="message" placeholder="Enter text..." class="form-control">{{old('message')}}</textarea>
                                    @error('message')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>




                        </div>

                        <div class="row">
                            @php
                                $products=\App\Models\Product::where('status','active')->orderBy('title','ASC')->get();
                            @endphp

                           <div class="col-md-12">
                               <label style="font-weight: bold;color:black" for="">Products <span class="text-danger">*</span></label>
                              @foreach($products as $product)

                                   <div class="form-group d-flex">
                                       <label for="">{{ucfirst($product->title)}}</label>
                                       <input type="checkbox" name="products[]" value="{{$product->id}}"  style="width: auto" class="ml-2 form-control form-control-sm">
                                   </div>
                               @endforeach
                           </div>
{{--                            <div class="col-md-6">--}}
{{--                                @foreach($products as $product)--}}
{{--                                    <label for="">{{ucfirst($product->title)}}</label>--}}
{{--                                    <input type="checkbox" class="form-control form-control-sm">--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
                        </div>
                        <div class="cv-cart-btn text-left">
                            <button type="submit" class="cv-btn" onclick="confirm('Are you sure?')">Send Enquiry</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- about end -->

@endsection
