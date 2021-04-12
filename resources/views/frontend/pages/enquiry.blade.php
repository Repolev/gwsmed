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
            <div class="col-12 col-lg-9">
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
                <form action="{{route('enquiry.category')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label style="font-weight: bold;color:black" for="">Full name <span
                                        class="text-danger">*</span></label> --}}
                                <input type="text" class="form-control" name="full_name" placeholder="Full name"
                                    value="{{old('full_name')}}">
                                @error('full_name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label style="font-weight: bold;color:black" for="">Email <span
                                        class="text-danger">*</span></label> --}}
                                <input type="email" class="form-control" name="email" placeholder="Email address"
                                    value="{{old('email')}}">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label style="font-weight: bold;color:black" for="">Phone <span
                                        class="text-danger">*</span></label> --}}
                                <input type="text" name="phone" placeholder="Phone" class="form-control"
                                    value="{{old('phone')}}">
                                @error('phone')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label style="font-weight: bold;color:black" for="">Country <span
                                        class="text-danger">*</span></label> --}}
                                <input type="text" name="country" placeholder="Country name" class="form-control"
                                    value="{{old('country')}}">
                                @error('country')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label style="font-weight: bold;color:black" for="">Address</label> --}}
                                <textarea name="address" placeholder="Address"
                                    class="form-control">{{old('address')}}</textarea>
                                @error('address')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label style="font-weight: bold;color:black" for="">Describe your requirement in
                                    Brief</label> --}}
                                <textarea name="message" placeholder="Enter message..."
                                    class="form-control">{{old('message')}}</textarea>
                                @error('message')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>


                </form>

            </div>
            <div class="col-12 col-lg-3 mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <label style="font-weight: bold;color:black" for="">Category <span
                                class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-12 categories-list">
                        @foreach($categories as $category)

                        <div class="form-group d-flex">
                            <input type="checkbox" name="cats[]" value="{{$category->id}}" style="width: auto"
                                class="mr-2 form-control form-control-sm">
                            <label class="mb-0" for="">{{ucfirst($category->title)}}</label>
                        </div>
                        @endforeach

                        {{-- <div class="col-md-6">--}}
                            {{-- @foreach($products as $product)--}}
                            {{-- <label for="">{{ucfirst($product->title)}}</label>--}}
                            {{-- <input type="checkbox" class="form-control form-control-sm">--}}
                            {{-- @endforeach--}}
                            {{-- </div>--}}
                    </div>
                </div>
            </div>
            <div class="cv-cart-btn text-center">
                <button type="submit" class="cv-btn" onclick="confirm('Are you sure?')">Send Enquiry</button>
            </div>
        </div>
    </div>
</div>
<!-- about end -->

@endsection