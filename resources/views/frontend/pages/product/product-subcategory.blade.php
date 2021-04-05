@extends('frontend.layouts.master')

@section('content')
    <!-- Main Content Starts -->
    <div id="main" class="main-content">
        <!-- Product Grid View Section Start -->
        <section class="product-grid-container">
            <div class="container-fluid">
                <!-- BreadCrumb Section Start -->
                <section class="breadcrumb-section d-none">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Electronics</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mobiles</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>
                <!-- BreadCrumb Section End -->
                <!-- Brand carousel -->
                @if(count($brands)>0)
                    <div class="owl-carousel owl-theme product-brand-carousel pt-3">

                        @foreach($brands as $brand)
                            <div class="item">
                                <div class="brand-categories">
                                    <div class="card">
                                        <div class="img-wrapper">
                                            <img src="{{asset($brand->image_path)}}" alt="Brand Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <form action="{{route('product.subfilter',[$category->slug,$sub_category->slug])}}" method="post" id="filter-form">
                    @csrf
                    <div class="row">

                        <!-- Product Filters -->
                        <div class="col-md-5 col-lg-3 mt-3">

                            <div class="product__filters-sidebar">

                                <!-- Categories Filter -->
                                <div class="product__filters">
                                    <div class="product__filter-title pl-3 pr-3 pt-3 pb-3">
                                        <h5>Filter By</h5>
                                    </div>

                                    <!-- Related Categories -->
                                    @if(count($categories)>0)
                                        <div class="product__filter-subtitle pl-3 pr-3 pt-2 pb-2">
                                            <span>Categories</span>
                                        </div>
                                        <div class="product__categories-list pl-3 pr-3 pt-2 pb-2">
                                            <ul>
                                                @foreach($categories as $cat)

                                                    @if(count($cat->products)>0)
                                                        <li>
                                                            <a href="{{route('product.category',$cat->slug)}}" style="font-weight: {{$cat->slug==$category->slug ? 'bold' : ''}}">{{ucfirst($cat->title)}}
                                                                ({{count($cat->products)}})</a>
                                                        </li>
                                                    @endif

                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                <!-- Price Range -->
                                <div class="product__filters pl-3 pr-3 pt-4 pb-4">
                                    <div class="product__filter-subtitle">
                                        <span>Price Range</span>
                                    </div>
                                    <div class="price-range-wrap mt-4">
                                        @if(!empty($_GET['price']))
                                            @php

                                                $price=explode('-',$_GET['price'])

                                            @endphp
                                        @endif
                                        <div id="slider-range"
                                            class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                            data-min="{{Helper::minPrice()}}" data-max="{{Helper::maxPrice()}}">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                            <span tabindex="0"
                                                  class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                            <span tabindex="0"
                                                  class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        </div>
                                        <div class="range-slider">
                                            <div class="price-input">
                                                <input type="hidden" name="price_range" id="price_range" value="">
                                                <input type="text" id="minamount">
                                                <input type="text" id="maxamount">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if(count($brands)>0)
                                <!-- Brand Filter -->
                                <div class="product__filters pl-3 pr-3 pt-4 pb-4">
                                    <div class="product__filter-subtitle">
                                        <span>Brands</span>
                                    </div>

                                    <!-- Brand Checkboxes -->
                                    <div class="brand-filter mt-4 ml-2">
                                        @if(!empty($_GET['brand']))
                                            @php
                                                $filter_brands=explode(',',$_GET['brand']);
                                            @endphp
                                        @endif
                                        @foreach($brands as $brand)

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox"   @if(!empty($filter_brands) && in_array($brand->slug,$filter_brands)) checked @endif  class="custom-control-input" id="customCheck{{$brand->id}}" name="brand[]" value="{{$brand->slug}}" onchange="this.form.submit();">
                                                <label class="custom-control-label" for="customCheck{{$brand->id}}">{{ucfirst($brand->title)}}</label>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                                @endif

                            </div>

                        </div>
                        <!-- Products Grid View -->
                        <div class="col-md-7 col-lg-9 pl-0 mt-3">
                            <div class="product-grid-view-wrap">
                                <div class="filter-flex">
                                    <div class="row">
                                        <div class="col-lg-7 d-flex align-items-center">
                                            <div class="product-title">
                                                <h6><a href="{{route('product.category',$category->slug)}}">{{ucfirst($category->title)}}</a> / {{ucfirst($sub_category->title)}} <small>(Showing 1-16 products
                                                        of {{$products->total()}}
                                                        products)</small></h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 d-flex justify-content-end">
                                            <div class="product-sort">
                                                <div class="form-inline">
                                                    <label for="">Sort By: </label> &nbsp;&nbsp;
                                                    <select name="sortBy" onchange="this.form.submit();"
                                                            class="custom-select">
                                                        <option value=" ">Default Sort</option>
                                                        <option value="priceAsc"
                                                                @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='priceAsc') selected @endif>
                                                            Price - Lower To Higher
                                                        </option>
                                                        <option value="priceDesc"
                                                                @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='priceDesc') selected @endif>
                                                            Price - Higher To Lower
                                                        </option>
                                                        <option value="titleAsc"
                                                                @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='titleAsc') selected @endif>
                                                            Alphabetical Ascending
                                                        </option>
                                                        <option value="titleDesc"
                                                                @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='titleDesc') selected @endif>
                                                            Alphabetical Descending
                                                        </option>
                                                        <
                                                        <option value="discAsc"
                                                                @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='discAsc') selected @endif>
                                                            Discount - Lower To Higher
                                                        </option>
                                                        <option value="discDesc"
                                                                @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='discDesc') selected @endif>
                                                            Discount - Higher To Lower
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="product-category-filter mt-2">
                                    <div class="row no-gutters">
                                        @if(count($products)>0)
                                        @foreach($products as $item)
                                            <div class="col* col-sm-6 col-md-4 col-lg-3 items">
                                                <div class="product-wrapper">
                                                    <div class="card product-card">
                                                        <div class="product-img-wrapper">
                                                            @php
                                                                $photo=explode(',',$item->image_path);
                                                            @endphp
                                                            <img class="card-img-top product-image"
                                                                 src="{{asset($photo[0])}}" alt="Product Image">
                                                            <p class="product-tag">
                                                                <span
                                                                    class="discount-tag">{{$item->discount}}% off</span>
                                                            </p>
                                                            <!-- Product Widget -->
                                                            <ul class="product-widget">
                                                                <li>
                                                                    <button tabindex="0" data-id="{{$item->id}}" class="add_to_compare" data-quantity="1" data-price="{{$item->offer_price}}" id="add_to_compare{{$item->id}}">
                                                                        <i class="ri-repeat-2-line widget-icon"></i>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button tabindex="0" data-id="{{$item->id}}" data-quantity="1" id="add_to_wishlist_{{$item->id}}" class="add_to_wishlist"><i
                                                                            class="ri-heart-line widget-icon"></i>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button data-price="{{ $item->offer_price }}"
                                                                            data-quantity="1"
                                                                            data-product-id="{{ $item->id }}"
                                                                            id="add_to_cart{{ $item->id }}"
                                                                            class="add_to_cart" tabindex="0"><i
                                                                            class="ri-shopping-cart-line widget-icon"></i>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="card-body product-body">
                                                            <h6 class="card-title product-title"><a
                                                                    href="{{route('product.detail',$item->slug)}}">
                                                                    {{ucfirst($item->title)}}</a>
                                                            </h6>
                                                            <p>{{ucfirst(\App\Models\Brand::where('id',$item->brand_id)->value('title'))}}</p>
                                                            <div class="star-ratings">
                                                                <ul class="d-flex">
                                                                    @php
                                                                        $rate=ceil($item->productReviews->avg('rate'));
                                                                    @endphp
                                                                    @for($i=0; $i<5; $i++)
                                                                        @if($i<$rate)
                                                                            <li><i class="ri-star-fill"></i></li>
                                                                        @else
                                                                            <li><i class="ri-star-line"></i></li>
                                                                        @endif
                                                                    @endfor
                                                                </ul>
                                                            </div>

                                                            <p class="card-text product-price">
                                                                Rs. {{number_format($item->offer_price,2)}}
                                                                @if($item->price>0)
                                                                    <del>Rs. {{number_format($item->price,2)}}</del>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @else
                                            <div class="alert alert-danger">
                                                No product found!
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Pagination -->
                                <div class="pagination-area mt-4 d-flex justify-content-end">
                                    {{$products->appends($_GET)->links('vendor.pagination.custom')}}
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </section>
        <!-- Product Grid View Section End -->
    </div>
    <!-- Main Content Ends -->
@endsection

@section('scripts')

    {{--Price slider--}}

    <script>

        function filter(){
            $('#filter-form').submit();
        }

        $(document).ready(function(){
            if ($("#slider-range").length > 0) {
                const max_value = parseInt( $("#slider-range").data('max') ) || 1000;
                const min_value = parseInt($("#slider-range").data('min')) || 0;
                const currency = $("#slider-range").data('currency') || '';
                let price_range = min_value+'-'+max_value;

                if($("#price_range").length > 0 && $("#price_range").val()){
                    price_range = $("#price_range").val().trim();
                }
                let price=price_range.split('-');

                $('#slider-range').slider({
                    range:true,
                    min:min_value,
                    max:max_value,
                    values:price,
                    slide:function(event,ui){
                        $('#price_range').val(ui.values[0]+"-"+ui.values[1]);
                        $('#minamount').val('Rs ' + ui.values[0]);
                        $('#maxamount').val('Rs ' + ui.values[1]);
                        filter();
                    },


                });


            }
        });
    </script>
    <script>
        function loadmoreData(page) {
            $.ajax({
                url: '?page=' + page,
                type: 'get',
                beforeSend: function () {
                    $('.ajax-load').show();
                },
            })
                .done(function (data) {
                    if (data.html == '') {
                        $('.ajax-load').html('No more product available');
                        return;
                    } else {
                        $('.ajax-load').hide();
                        $('#product-data').append(data.html);
                    }
                })
                .fail(function () {
                    alert('Something went wrong! please try again');
                });
        }

        var page = 1;
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() + 120 >= $(document).height()) {
                page++;
                loadmoreData(page);
            }
        })
    </script>

    {{-- Add to compare --}}
    <script>
        $(document).on('click','.add_to_compare',function (e) {
            e.preventDefault();
            var product_id=$(this).data('id');
            var product_price=$(this).data('price');
            var product_qty=$(this).data('quantity');
            var token = "{{ csrf_token() }}";
            var path = "{{ route('compare.store') }}";
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
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });

                    } else if (data['present']) {
                        swal({
                            title: "Opps!",
                            text: data['message'],
                            icon: "warning",
                            button: "OK!",
                        });
                    } else {
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
    {{--Add to wishlist--}}
    <script>
        $(document).on('click', '.add_to_wishlist', function (e) {
            e.preventDefault();
            var product_id = $(this).data('id');
            var product_qty = $(this).data('quantity');

            var token = "{{csrf_token()}}";
            var path = "{{route('wishlist.store')}}";

            $.ajax({
                url: path,
                type: "POST",
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    product_qty: product_qty,
                    _token: token,
                },
                success: function (data) {
                    console.log(data);

                    if (data['status']) {
                        $('body #header-ajax').html(data['header']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });

                    } else if (data['present']) {
                        $('body #header-ajax').html(data['header']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        swal({
                            title: "Opps!",
                            text: data['message'],
                            icon: "warning",
                            button: "OK!",
                        });
                    } else {
                        swal({
                            title: "Sorry!",
                            text: "You can't add that product",
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
@endsection
