@extends('frontend.layouts.master')
@section('meta_description', $product->description)
@section('meta_title', $product->title)

@section('content')

    <!-- breadcrumb start -->
    <div class="cv-breadcrumb " style="background: linear-gradient(to left, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{asset($product->categories[0]->banner_path)}}');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>{{ucfirst($product->title)}}</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
{{--                            <li><a href="{{route('home')}}">{{$product->category['title']}}</a></li>--}}
                            <li>{{ucfirst($product->title)}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- shop start -->
    <div class="cv-product-single spacer-top spacer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-sm-5">

                            <div class="product__details__images">
                                @php
                                    $photos=explode(',',$product->image_path);
                                @endphp
                                <div id="sync1" class="owl-carousel owl-theme thumbnail-slider">
                                    @foreach($photos as $photo)
                                        <div class="item">
                                            <img src="{{asset($photo)}}" alt="Product Detail Image">
                                        </div>
                                    @endforeach
                                </div>

                                <div id="sync2" class="owl-carousel owl-theme">
                                    @foreach($photos as $photo)
                                        <div class="item">
                                            <img src="{{asset($photo)}}" alt="Product Detail">
                                        </div>
                                    @endforeach
                                </div>

                            </div>
{{--                            @php--}}
{{--                                $photos=explode(',',$product->image_path);--}}
{{--                            @endphp--}}
{{--                            <div class="cv-pro-thumb-img">--}}
{{--                                <img src="{{asset($photos[0])}}" alt="{{$product->title}}" class="img-fluid">--}}
{{--                            </div>--}}
                        </div>
                        <div class="col-sm-7">
                            <div class="cv-prod-content">
                                <h2 class="cv-price-title">{{ucfirst($product->title)}}</h2>
                                <div class="cv-prod-category">
                                    <span>Product Model : <span style="font-weight: 700">{{$product->model_no}}</span></span>

                                </div>
                                <div class="cv-prod-category my-3">
                                    <span>Category :</span>
                                    @foreach($product->categories as $category)
                                    @php
                                    $category_url['slug'] = $category->slug;
                                    if($category->level > 0){
                                        $category_url['parent1'] = $category->parentCategory->slug;
                                        if($category->level > 1){
                                            $category_url['parent2'] = $category->parentCategory->parentCategory->slug;
                                            if($category->level > 2){
                                                $category_url['parent3'] = $category->parentCategory->parentCategory->parentCategory->slug;
                                                if($category->level > 2){
                                                    $category_url['parent4'] = $category->parentCategory->parentCategory->parentCategory->parentCategory->slug;
                                                }
                                            }
                                        }
                                    }
                                @endphp
                                        <a href="{{ route('product.category.' . $category->level, $category_url) }}" style="font-weight: 700" class="cv-prod-category">{{ $category->title }}@if(!$loop->last),@endif</a>
                                    @endforeach
                                </div>
                               <div class="mt-3">
                                   <div class="cv-prod-count">
                                       <div class="cv-cart-quantity">
                                           <button data-id="{{$product->id}}" class="cv-sub"></button>
                                           <input data-id="{{$product->id}}" type="number" class="qty-text" min="1" value="1">
                                           <button data-id="{{$product->id}}" class="cv-add"></button>
                                       </div>

                                    <a href="javascript:void(0);" data-product_id="{{$product->id}}" data-quantity="1" class="mr-2 cv-btn add_to_cart_button_details" id="add_to_cart_button_details_{{$product->id}}"><i class="fas fa-cart-plus"></i> Bulk Query</a>
                                       <a href="javascript:void(0);" class="cv-btn btn btn-success btn-sm" style="background: #218838"  data-target="#exampleModal" data-toggle="modal"><i class="fas fa-paper-plane"></i> Quick Enquiry</a>

                                   </div>



                                   <div class="my-4 pt-3 px-2 px-3" style="border:1px solid #ddd">
                                       <p>{!! html_entity_decode($product->summary) !!}</p>
                                   </div>

                                   <div class=" mt-2 mb-2">

                                       <a href="{{ route('catalog.download', $product->id) }}" class="btn  btn-outline-warning"><i class="fas fa-download"></i> Download Catalog</a>
                                   </div>


                                    {{--Enquiry form--}}
                               <!-- Modal -->
                                   <div class="modal  fade" style="height:100%; overflow-y:scroll;top:22px" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog modal-lg" role="document">
                                           <form action="{{route('enquiry.product')}}" method="post">
                                               @csrf
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                               </div>
                                               <div class="modal-body">

                                                       <div class="row">
                                                           <div class="col-md-6">
                                                               <div class="form-group">
                                                                   <label for="">Full name <span class="text-danger">*</span></label>
                                                                   <input type="text" class="form-control" name="full_name" placeholder="Full name">
                                                                   @error('full_name')
                                                                   <p class="text-danger">{{$message}}</p>
                                                                   @enderror
                                                               </div>
                                                           </div>
                                                           <div class="col-md-6">
                                                               <div class="form-group">
                                                                   <label for="">Email <span class="text-danger">*</span></label>
                                                                   <input type="email" class="form-control" name="email" placeholder="Email address">
                                                                   @error('email')
                                                                   <p class="text-danger">{{$message}}</p>
                                                                   @enderror
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="row">
                                                           <div class="col-md-6">
                                                               <div class="form-group">
                                                                   <label for="">Phone <span class="text-danger">*</span></label>
                                                                   <input type="text" name="phone" placeholder="Phone" class="form-control">
                                                                   @error('phone')
                                                                   <p class="text-danger">{{$message}}</p>
                                                                   @enderror
                                                               </div>
                                                           </div>

                                                           <div class="col-md-6">
                                                               <div class="form-group">
                                                                   <label for="">Country</label>
                                                                   <input type="text" name="country" placeholder="Country name" class="form-control">
                                                                   @error('country')
                                                                   <p class="text-danger">{{$message}}</p>
                                                                   @enderror
                                                               </div>
                                                           </div>

                                                       </div>

                                                       <div class="row">
                                                           <div class="col-md-12">
                                                               <div class="form-group">
                                                                   <label for="">Product <span class="text-danger">*</span></label>
                                                                   <input type="text" name="product" placeholder="Product" class="form-control" value="{{$product->title}}">
                                                                   @error('subject')
                                                                   <p class="text-danger">{{$message}}</p>
                                                                   @enderror
                                                               </div>
                                                           </div>
                                                       </div>

                                                       <div class="row">
                                                           <div class="col-md-12">
                                                               <div class="form-group">
                                                                   <label for="">Address</label>
                                                                   <textarea name="address" placeholder="Address" class="form-control"></textarea>
                                                                   @error('address')
                                                                   <p class="text-danger">{{$message}}</p>
                                                                   @enderror
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="row">

                                                           <div class="col-md-12">
                                                               <div class="form-group">
                                                                   <label for="">Message</label>
                                                                   <textarea name="message" placeholder="Enter text..." class="form-control"></textarea>
                                                                   @error('message')
                                                                   <p class="text-danger">{{$message}}</p>
                                                                   @enderror
                                                               </div>
                                                           </div>
                                                       </div>
                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                   <button type="submit" class="btn btn-primary"  onclick="confirm('Are you sure?')">Send Enquiry</button>
                                               </div>
                                           </div>
                                           </form>

                                       </div>
                                   </div>
                               </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cv-prod-text">
                            </div>
                        </div>
                    </div>
                    <div class="cv-shop-tab">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" data-toggle="tab" href="#cv-pro-description" role="tab" aria-selected="true">description</a>
{{--                            <a class="nav-link" data-toggle="tab" href="#cv-pro-enquiry" role="tab" aria-selected="true">Enquiry</a>--}}
                        </div>
                        <div class="tab-content cv-tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active p-4" style="border:1px solid #ddd" id="cv-pro-description">
                                <p >{!! html_entity_decode($product->description) !!}</p>
                            </div>
{{--                            <div class="tab-pane fade show" id="cv-pro-enquiry">--}}
{{--                                <form action="{{route('enquiry.submit')}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <input type="text" class="form-control" name="full_name" placeholder="Full name">--}}
{{--                                                @error('full_name')--}}
{{--                                                <p class="text-danger">{{$message}}</p>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <input type="email" class="form-control" name="email" placeholder="Email address">--}}
{{--                                                @error('email')--}}
{{--                                                <p class="text-danger">{{$message}}</p>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="">Phone <span class="text-danger">*</span></label>--}}
{{--                                                <input type="text" name="phone" placeholder="Phone" class="form-control">--}}
{{--                                                @error('phone')--}}
{{--                                                    <p class="text-danger">{{$message}}</p>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="">Country</label>--}}
{{--                                                <input type="text" name="country" placeholder="Country name" class="form-control">--}}
{{--                                                @error('country')--}}
{{--                                                <p class="text-danger">{{$message}}</p>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}

{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="">Subject <span class="text-danger">*</span></label>--}}
{{--                                                <input type="text" name="subject" placeholder="Subject" class="form-control" value="{{$product->title}}">--}}
{{--                                                @error('subject')--}}
{{--                                                <p class="text-danger">{{$message}}</p>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="">Address</label>--}}
{{--                                                <textarea name="address" placeholder="Shipping Address" class="form-control"></textarea>--}}
{{--                                                @error('address')--}}
{{--                                                <p class="text-danger">{{$message}}</p>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row">--}}


{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="">Message</label>--}}
{{--                                                <textarea name="message" placeholder="Enter text..." class="form-control"></textarea>--}}
{{--                                                @error('message')--}}
{{--                                                <p class="text-danger">{{$message}}</p>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                    <div class="cv-cart-btn text-left">--}}
{{--                                        <button type="submit" class="cv-btn" onclick="confirm('Are you sure?')">Send Enquiry</button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}

{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop end -->
    @if(count($product->categories)>0)
        <!-- related product start -->
            <div class="cv-arrival cv-related-product cv-product-slider spacer-top-less">
                <div class="container">
                    <div class="cv-heading">
                        <h1>Related products</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($product->categories as $cat)
                                        @if(count($cat->products)>0)
                                            @foreach($cat->products as $item)
                                                <div class="swiper-slide">
                                                    <div class="cv-product-box">
                                                        @php
                                                            $photos=explode(',',$item->image_path);
                                                        @endphp
                                                        <div class="cv-product-img">
                                                            <img src="{{asset($photos[0])}}" alt="{{$item->title}}" class="img-fluid"/>
                                                            <div class="cv-product-button">
                                                                <a href="{{route('product.detail',$item->slug)}}" class="cv-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 461.312 461.312">
                                                                        <g>
                                                                            <path d="M230.656,156.416c-40.96,0-74.24,33.28-74.24,74.24s33.28,74.24,74.24,74.24s74.24-33.28,74.24-74.24
                                                                                                                S271.616,156.416,230.656,156.416z M225.024,208.64c-9.216,0-16.896,7.68-16.896,16.896h-24.576
                                                                                                                c0.512-23.04,18.944-41.472,41.472-41.472V208.64z"></path>
                                                                        </g>
                                                                        <g>
                                                                            <path d="M455.936,215.296c-25.088-31.232-114.688-133.12-225.28-133.12S30.464,184.064,5.376,215.296
                                                                                                                c-7.168,8.704-7.168,21.504,0,30.72c25.088,31.232,114.688,133.12,225.28,133.12s200.192-101.888,225.28-133.12
                                                                                                                C463.104,237.312,463.104,224.512,455.936,215.296z M230.656,338.176c-59.392,0-107.52-48.128-107.52-107.52
                                                                                                                s48.128-107.52,107.52-107.52s107.52,48.128,107.52,107.52S290.048,338.176,230.656,338.176z"></path>
                                                                        </g>
                                                                    </svg> View detail</a>

                                                                    <a href="javascript:;" data-id="{{$item->id}}" id="add_to_cart{{$item->id}}" class="cv-btn add_to_cart" data-quantity="1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                            <g>
                                                                                <path d="M507.519,116.384C503.721,111.712,498.021,109,492,109H129.736l-1.484-13.632l-0.053-0.438C121.099,40.812,74.583,0,20,0
                                                                                C8.954,0,0,8.954,0,20s8.954,20,20,20c34.506,0,63.923,25.749,68.512,59.928l23.773,218.401C91.495,327.765,77,348.722,77,373
                                                                                c0,0.167,0.002,0.334,0.006,0.5C77.002,373.666,77,373.833,77,374c0,33.084,26.916,60,60,60h8.138
                                                                                c-2.034,5.964-3.138,12.355-3.138,19c0,32.532,26.467,59,59,59s59-26.468,59-59c0-6.645-1.104-13.036-3.138-19h86.277
                                                                                c-2.034,5.964-3.138,12.355-3.138,19c0,32.532,26.467,59,59,59c32.533,0,59-26.468,59-59c0-32.532-26.467-59-59-59H137
                                                                                c-11.028,0-20-8.972-20-20c0-0.167-0.002-0.334-0.006-0.5c0.004-0.166,0.006-0.333,0.006-0.5c0-11.028,8.972-20,20-20h255.331
                                                                                c35.503,0,68.084-21.966,83.006-55.962c4.439-10.114-0.161-21.912-10.275-26.352c-10.114-4.439-21.912,0.161-26.352,10.275
                                                                                C430.299,300.125,411.661,313,392.331,313h-240.39L134.09,149h333.308l-9.786,46.916c-2.255,10.813,4.682,21.407,15.495,23.662
                                                                                c1.377,0.288,2.75,0.426,4.104,0.426c9.272,0,17.59-6.484,19.558-15.92l14.809-71C512.808,127.19,511.317,121.056,507.519,116.384
                                                                                z M399,434c10.477,0,19,8.523,19,19s-8.523,19-19,19s-19-8.523-19-19S388.523,434,399,434z M201,434c10.477,0,19,8.524,19,19
                                                                                c0,10.477-8.523,19-19,19s-19-8.523-19-19S190.523,434,201,434z"></path>
                                                                            </g>
                                                                        </svg>
                                                                        add to Cart</a>

                                                            </div>
                                                        </div>
                                                        <div class="cv-product-data">
                                                            <a href="{{route('product.detail',$item->slug)}}" class="cv-price-title">{{ucfirst($item->title)}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        @endif

                                    @endforeach

                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- related product end -->

    @endif
@endsection


@section('styles')
    <style>
        .nice-select.small{
            line-height: 24px;
        }
        form .stars {
            background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAABaCAYAAACv+ebYAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNXG14zYAAAAWdEVYdENyZWF0aW9uIFRpbWUAMDcvMDMvMTNJ3Rb7AAACnklEQVRoge2XwW3bMBSGPxa9NxtIGzTAW8DdRL7o3A0qb+BrdNIm9QAm0G7gbJBMwB5MoVJNUSRFIXGqHwhkmXr68hOPNH9ljOEt9OlNqBs4RlrrSmtdpdZ/Ti0EGnvtUoqTHFunBVCkuk6d6mbi83rggdteSa5THDeB3+UDO9z2inatXFum1roESuAReAB29vp15n2/gRfgZK+/gIuIXLxgrfUO+Bnzn0fom4ic+pvRVNuB/QrQ/RB6A7bwLjN8b985krO5MsKd0ElwJvgk1AteCPdCYWI5/SutddQxRUTU3DOzG4hd01EKqQnZuaLBITUh4F0CeLYm5CDw6PjuFTjaz9+BLwE1I8VO9StwAEoRaUSkseMHO+aqcWq2qwcdfQCOIvIy8dwDV/c/YL6zvWDbnQ3QuH5hltQEreM1dH/n6g28gT8eWLVUqqVKrb+vtGidFkCR6vp+0uLAba8k1/eRFh1ue0W7dv4sqpaSjGnR1Fy8YNWyY8W0aGpO/c1oqu3AKmlxCL0BW3iXGb637xzJ2VwZ4U7oJDgTfBLqBS+Ee6EQeMpULVFHUVOzPC3aNR2lkJotLbr0vtKiqWlMTcNaaXHQ0QfgaGqcaVG1jNLibGcbYyb/eDIlT6bjyZS+51JqtrS4gTfw/wzWqkKrKrU8fQPR6gKAmDKlPM3x1WkBFKmu0xxf3fZR5jnFdbzjv257JbmOdzx22yvadZzjW7e9ol27HWtVkjEtIubiB2u1Y8W0iJhTfzOe6uvAKmlxCL0FX+FdZvjevnMkd3Plgzuh0+A88EmoH7wM7oVC6AaiVdwuI2Z5WrRrOk4BNVtadOl9pUXENIhpWCstDjr6ABwR40yLaDVKi7Od7U1/Z0pzpjNngtNiaM2WFj8++A+motm0NTqjmwAAAABJRU5ErkJggg==") repeat-x 0 0;
            width: 150px; }

        form .stars:before,
        form .stars:after {
            display: table;
            content: ""; }

        form .stars:after {
            clear: both; }

        form .stars input[type="radio"] {
            position: absolute;
            opacity: 0; }

        form .stars input[type="radio"].star-5:checked ~ span {
            width: 100%; }

        form .stars input[type="radio"].star-4:checked ~ span {
            width: 80%; }

        form .stars input[type="radio"].star-3:checked ~ span {
            width: 60%; }

        form .stars input[type="radio"].star-2:checked ~ span {
            width: 40%; }

        form .stars input[type="radio"].star-1:checked ~ span {
            width: 20%; }

        form .stars label {
            display: block;
            width: 30px;
            height: 30px;
            margin: 0 !important;
            padding: 0 !important;
            text-indent: -999rem;
            float: left;
            position: relative;
            z-index: 10;
            background: transparent !important;
            cursor: pointer; }

        form .stars label:hover ~ span {
            background-position: 0 -30px; }

        form .stars label.star-5:hover ~ span {
            width: 100% !important; }

        form .stars label.star-4:hover ~ span {
            width: 80% !important; }

        form .stars label.star-3:hover ~ span {
            width: 60% !important; }

        form .stars label.star-2:hover ~ span {
            width: 40% !important; }

        form .stars label.star-1:hover ~ span {
            width: 20% !important; }

        form .stars span {
            display: block;
            width: 0;
            position: relative;
            top: 0;
            left: 0;
            height: 30px;
            background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAABaCAYAAACv+ebYAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNXG14zYAAAAWdEVYdENyZWF0aW9uIFRpbWUAMDcvMDMvMTNJ3Rb7AAACnklEQVRoge2XwW3bMBSGPxa9NxtIGzTAW8DdRL7o3A0qb+BrdNIm9QAm0G7gbJBMwB5MoVJNUSRFIXGqHwhkmXr68hOPNH9ljOEt9OlNqBs4RlrrSmtdpdZ/Ti0EGnvtUoqTHFunBVCkuk6d6mbi83rggdteSa5THDeB3+UDO9z2inatXFum1roESuAReAB29vp15n2/gRfgZK+/gIuIXLxgrfUO+Bnzn0fom4ic+pvRVNuB/QrQ/RB6A7bwLjN8b985krO5MsKd0ElwJvgk1AteCPdCYWI5/SutddQxRUTU3DOzG4hd01EKqQnZuaLBITUh4F0CeLYm5CDw6PjuFTjaz9+BLwE1I8VO9StwAEoRaUSkseMHO+aqcWq2qwcdfQCOIvIy8dwDV/c/YL6zvWDbnQ3QuH5hltQEreM1dH/n6g28gT8eWLVUqqVKrb+vtGidFkCR6vp+0uLAba8k1/eRFh1ue0W7dv4sqpaSjGnR1Fy8YNWyY8W0aGpO/c1oqu3AKmlxCL0BW3iXGb637xzJ2VwZ4U7oJDgTfBLqBS+Ee6EQeMpULVFHUVOzPC3aNR2lkJotLbr0vtKiqWlMTcNaaXHQ0QfgaGqcaVG1jNLibGcbYyb/eDIlT6bjyZS+51JqtrS4gTfw/wzWqkKrKrU8fQPR6gKAmDKlPM3x1WkBFKmu0xxf3fZR5jnFdbzjv257JbmOdzx22yvadZzjW7e9ol27HWtVkjEtIubiB2u1Y8W0iJhTfzOe6uvAKmlxCL0FX+FdZvjevnMkd3Plgzuh0+A88EmoH7wM7oVC6AaiVdwuI2Z5WrRrOk4BNVtadOl9pUXENIhpWCstDjr6ABwR40yLaDVKi7Od7U1/Z0pzpjNngtNiaM2WFj8++A+motm0NTqjmwAAAABJRU5ErkJggg==") repeat-x 0 -60px;
            -webkit-transition: -webkit-width 0.5s;
            -webkit-transition: width 0.5s;
            transition: width 0.5s; }
    </style>
@endsection

@section('scripts')


    <script>
        // $('.qty-text ').change('key up',function () {
        //     var id=$(this).data('id');
        //     var spinner=$(this),input=spinner.closest('div.quantity').find('input[type="number"]');
        //     var newVal=parseFloat(input.val());
        //     $('#add_to_cart_button_details_'+id).attr('data-quantity',newVal);
        //
        // });

        $(document).on("click",".cv-add",function(e){
            var id = $(this).data('id');

            var spinner = $(this),
                input = spinner.closest(".cv-cart-quantity").find('input[type="number"]');
            var newVal = parseFloat(input.val());
            $('#add_to_cart_button_details_'+id).attr('data-quantity',newVal);

        });
        $(document).on("click",".cv-sub",function(e){
            var id = $(this).data('id');
            var spinner = $(this),
                input = spinner.closest(".cv-cart-quantity").find('input[type="number"]');
            if(input.val() == 1){
                return false;
            }
            if(input.val() != 1){
                var newVal = parseFloat(input.val());
                $('#qty-input-'+id ).val(newVal);
            }
            $('#add_to_cart_button_details_'+id).attr('data-quantity',newVal);

        });



        $('.add_to_cart_button_details').on('click',function () {
            var product_qty=$(this).data('quantity');
            var product_id=$(this).data('product_id');
            var token="{{csrf_token()}}";
            var path="{{route('cart.store')}}";

            $.ajax({
                url:path,
                type:"POST",
                data:{
                    _token:token,
                    product_id:product_id,
                    product_qty:product_qty,
                },
                beforeSend:function () {
                    $('#add_to_cart_button_details_{{$product->id}}').html('<i class="fas fa-spinner fa-spin"></i> Loading...');

                },
                complete:function () {
                    $('#add_to_cart_button_details_{{$product->id}}').html('Add To Cart');
                },
                success:function (data) {
                    $('body #header-ajax').html(data['header']);
                    $('body #cart_counter').html(data['cart_count']);
                    // swal({
                    //     title: "Good job!",
                    //     text: data['message'],
                    //     icon: "success",
                    //     button: "OK!",
                    // });

                    window.location.href=window.location.href;

                },
                error:function (err) {
                    console.log(err);
                }
            });
        });
    </script>
    {{-- Add to cart --}}
    <script>
        $(document).on('click', '.add_to_cart', function (e) {
            e.preventDefault();
            var product_id = $(this).data('product-id');
            var product_qty = $(this).data('quantity');
            var product_price = $(this).data('price');
            var token = "{{ csrf_token() }}";
            var path = "{{ route('cart.store') }}";

            $.ajax({
                url: path,
                type: "POST",
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    product_qty: product_qty,
                    product_price: product_price,
                    _token: token,
                },
                success: function (data) {
                    console.log(data);

                    if (data['status']) {
                        $('body #header-ajax').html(data['header']);
                        $('body #cart_counter').html(data['cart_count']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });

                    } else {
                        $('body #header-ajax').html(data['header']);
                        $('body #cart_counter').html(data['cart_count']);
                        swal({
                            title: "Sorry!",
                            text: data['message'],
                            icon: "error",
                            button: "OK!",
                        });
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });

    </script>

    <script>
        $('.qty-text ').change('key up',function () {
            var id=$(this).data('id');
            var spinner=$(this),input=spinner.closest('div.quantity').find('input[type="number"]');
            var newVal=parseFloat(input.val());
            $('#add_to_cart_button_details_'+id).attr('data-quantity',newVal);

        });

        $('.add_to_cart_button_details').on('click',function () {
            var product_qty=$(this).data('quantity');
            var product_id=$(this).data('product_id');
            var product_price=$(this).data('price');
            var token="{{csrf_token()}}";
            var path="{{route('cart.store')}}";

            $.ajax({
                url:path,
                type:"POST",
                data:{
                    _token:token,
                    product_id:product_id,
                    product_price:product_price,
                    product_qty:product_qty,
                },
                beforeSend:function () {
                    $('#add_to_cart_button_details_{{$product->id}}').html('<i class="fa fa-spinner fa-spin"></i> Loading...');

                },
                complete:function () {
                    $('#add_to_cart_button_details_{{$product->id}}').html('Add To Cart');
                },
                success:function (data) {
                    console.log(data['status']);
                    if(data['status']){
                        $('body #header-ajax').html(data['header']);
                        $('body #cart_counter').html(data['cart_count']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });
                    }
                    else{
                        $('body #header-ajax').html(data['header']);
                        $('body #cart_counter').html(data['cart_count']);
                        swal({
                            title: "Sorry!",
                            text: data['message'],
                            icon: "error",
                            button: "OK!",
                        });
                    }

                    window.location.href=window.location.href;

                },
                error:function (err) {
                    console.log(err);
                }
            });
        });
    </script>


    {{-- Add to cart --}}
    <script>
        $(document).on('click', '.add_to_cart', function (e) {
            e.preventDefault();
            var product_id = $(this).data('id');
            var product_qty = $(this).data('quantity');
            var token = "{{ csrf_token() }}";
            var path = "{{ route('cart.store') }}";

            $.ajax({
                url: path,
                type: "POST",
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    product_qty: product_qty,
                    _token: token,
                },
                beforeSend: function () {
                    $('#add_to_cart' + product_id).html(
                        '<i class="fa fa-spinner fa-spin widget-icon"></i> Loading...');
                },
                complete: function () {
                    $('#add_to_cart' + product_id).html(
                        '<i class="fas fa-cart-plus"></i> add to Cart');
                },
                success: function (data) {
                    console.log(data);

                    if (data['status']) {
                        $('body #header').html(data['header']);
                        $('body #cart_counter').html(data['cart_count']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });

                    } else {
                        $('body #header-ajax').html(data['header']);
                        $('body #cart_counter').html(data['cart_count']);
                        swal({
                            title: "Sorry!",
                            text: data['message'],
                            icon: "error",
                            button: "OK!",
                        });
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });

    </script>

    <script>
        $(document).ready(function() {

            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = 4;
            var syncedSecondary = true;

            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                autoplay: false,
                loop: true,
                animateIn: 'fadeIn',
                animateOut:'fadeOut',
                responsiveRefreshRate: 200,
                navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
            }).on('changed.owl.carousel', syncPosition);

            sync2
                .on('initialized.owl.carousel', function() {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: true,
                    nav: true,
                    navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage,
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {

                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }

                //end block

                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });
        });
    </script>
@endsection
