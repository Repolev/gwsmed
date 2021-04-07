@extends('frontend.layouts.master')
@section('content')
    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>Shop</h1>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- shop start -->
    <div class="cv-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cv-shop-box">
                        <div class="cv-shop-title">
                            <h2 class="cv-sidebar-title">
                                Showing results
                            </h2>
                            <p><span>Total : </span>{{$products->total()}}</p>
                        </div>
                        <div class="cv-product-all wow fadeIn" data-wow-delay="0.5s">
                            <div class="cv-gallery-grid">
                                @if(count($products)>0)
                                    @foreach($products as $product)
                                        <div class="cv-product-box cv-product-item cv-hand">
                                            <div class="cv-product-img">
                                                <img src="{{$product->image_path}}" alt="image"
                                                     class="img-fluid" />
                                                <div class="cv-product-button">
                                                    <a href="javascript:;" class="cv-btn"><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 461.312 461.312">
                                                            <g>
                                                                <path d="M230.656,156.416c-40.96,0-74.24,33.28-74.24,74.24s33.28,74.24,74.24,74.24s74.24-33.28,74.24-74.24
                                                        S271.616,156.416,230.656,156.416z M225.024,208.64c-9.216,0-16.896,7.68-16.896,16.896h-24.576
                                                        c0.512-23.04,18.944-41.472,41.472-41.472V208.64z"></path>
                                                            </g>
                                                            <g>
                                                                <path
                                                                    d="M455.936,215.296c-25.088-31.232-114.688-133.12-225.28-133.12S30.464,184.064,5.376,215.296
                                                        c-7.168,8.704-7.168,21.504,0,30.72c25.088,31.232,114.688,133.12,225.28,133.12s200.192-101.888,225.28-133.12
                                                        C463.104,237.312,463.104,224.512,455.936,215.296z M230.656,338.176c-59.392,0-107.52-48.128-107.52-107.52
                                                        s48.128-107.52,107.52-107.52s107.52,48.128,107.52,107.52S290.048,338.176,230.656,338.176z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                        View detail</a>
                                                    <a href="javascript:;" class="cv-btn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <g>
                                                                <path
                                                                    d="M507.519,116.384C503.721,111.712,498.021,109,492,109H129.736l-1.484-13.632l-0.053-0.438C121.099,40.812,74.583,0,20,0
                                                            C8.954,0,0,8.954,0,20s8.954,20,20,20c34.506,0,63.923,25.749,68.512,59.928l23.773,218.401C91.495,327.765,77,348.722,77,373
                                                            c0,0.167,0.002,0.334,0.006,0.5C77.002,373.666,77,373.833,77,374c0,33.084,26.916,60,60,60h8.138
                                                            c-2.034,5.964-3.138,12.355-3.138,19c0,32.532,26.467,59,59,59s59-26.468,59-59c0-6.645-1.104-13.036-3.138-19h86.277
                                                            c-2.034,5.964-3.138,12.355-3.138,19c0,32.532,26.467,59,59,59c32.533,0,59-26.468,59-59c0-32.532-26.467-59-59-59H137
                                                            c-11.028,0-20-8.972-20-20c0-0.167-0.002-0.334-0.006-0.5c0.004-0.166,0.006-0.333,0.006-0.5c0-11.028,8.972-20,20-20h255.331
                                                            c35.503,0,68.084-21.966,83.006-55.962c4.439-10.114-0.161-21.912-10.275-26.352c-10.114-4.439-21.912,0.161-26.352,10.275
                                                            C430.299,300.125,411.661,313,392.331,313h-240.39L134.09,149h333.308l-9.786,46.916c-2.255,10.813,4.682,21.407,15.495,23.662
                                                            c1.377,0.288,2.75,0.426,4.104,0.426c9.272,0,17.59-6.484,19.558-15.92l14.809-71C512.808,127.19,511.317,121.056,507.519,116.384
                                                            z M399,434c10.477,0,19,8.523,19,19s-8.523,19-19,19s-19-8.523-19-19S388.523,434,399,434z M201,434c10.477,0,19,8.524,19,19
                                                            c0,10.477-8.523,19-19,19s-19-8.523-19-19S190.523,434,201,434z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                        add to Cart</a>
                                                </div>
                                            </div>
                                            <div class="cv-product-data">
                                                <a href="{{route('product.detail',$product->slug)}}" class="cv-price-title">{{ucfirst($product->title)}}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No product found</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop end -->
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
{{--    --}}{{-- Add to compare --}}
{{--    <script>--}}
{{--        $(document).on('click','.add_to_compare',function (e) {--}}
{{--            e.preventDefault();--}}
{{--            var product_id=$(this).data('id');--}}
{{--            var product_price=$(this).data('price');--}}
{{--            var product_qty=$(this).data('quantity');--}}
{{--            var token = "{{ csrf_token() }}";--}}
{{--            var path = "{{ route('compare.store') }}";--}}
{{--            $.ajax({--}}
{{--                url: path,--}}
{{--                type: "POST",--}}
{{--                dataType: "JSON",--}}
{{--                data: {--}}
{{--                    product_id: product_id,--}}
{{--                    product_qty: product_qty,--}}
{{--                    product_price: product_price,--}}
{{--                    _token: token,--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                    console.log(data);--}}

{{--                    if (data['status']) {--}}
{{--                        swal({--}}
{{--                            title: "Success!",--}}
{{--                            text: data['message'],--}}
{{--                            icon: "success",--}}
{{--                            button: "OK!",--}}
{{--                        });--}}

{{--                    } else if (data['present']) {--}}
{{--                        swal({--}}
{{--                            title: "Opps!",--}}
{{--                            text: data['message'],--}}
{{--                            icon: "warning",--}}
{{--                            button: "OK!",--}}
{{--                        });--}}
{{--                    } else {--}}
{{--                        swal({--}}
{{--                            title: "Sorry!",--}}
{{--                            text: data['message'],--}}
{{--                            icon: "error",--}}
{{--                            button: "OK!",--}}
{{--                        });--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (err) {--}}
{{--                    console.log(err);--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--    --}}{{-- Add to wishlist --}}
{{--    <script>--}}
{{--        $(document).on('click', '.add_to_wishlist', function (e) {--}}
{{--            e.preventDefault();--}}
{{--            var product_id = $(this).data('id');--}}
{{--            var product_qty = $(this).data('quantity');--}}

{{--            var token = "{{ csrf_token() }}";--}}
{{--            var path = "{{ route('wishlist.store') }}";--}}

{{--            $.ajax({--}}
{{--                url: path,--}}
{{--                type: "POST",--}}
{{--                dataType: "JSON",--}}
{{--                data: {--}}
{{--                    product_id: product_id,--}}
{{--                    product_qty: product_qty,--}}
{{--                    _token: token,--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                    console.log(data);--}}

{{--                    if (data['status']) {--}}
{{--                        swal({--}}
{{--                            title: "Success!",--}}
{{--                            text: data['message'],--}}
{{--                            icon: "success",--}}
{{--                            button: "OK!",--}}
{{--                        });--}}

{{--                    } else if (data['present']) {--}}
{{--                        swal({--}}
{{--                            title: "Opps!",--}}
{{--                            text: data['message'],--}}
{{--                            icon: "warning",--}}
{{--                            button: "OK!",--}}
{{--                        });--}}
{{--                    } else {--}}
{{--                        swal({--}}
{{--                            title: "Sorry!",--}}
{{--                            text: "You can't add that product",--}}
{{--                            icon: "error",--}}
{{--                            button: "OK!",--}}
{{--                        });--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (err) {--}}
{{--                    console.log(err);--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}
{{--    --}}{{-- Add to cart --}}
{{--    <script>--}}
{{--        $(document).on('click', '.add_to_cart', function (e) {--}}
{{--            e.preventDefault();--}}
{{--            var product_id = $(this).data('product-id');--}}
{{--            var product_qty = $(this).data('quantity');--}}
{{--            var product_price = $(this).data('price');--}}
{{--            var token = "{{ csrf_token() }}";--}}
{{--            var path = "{{ route('cart.store') }}";--}}

{{--            $.ajax({--}}
{{--                url: path,--}}
{{--                type: "POST",--}}
{{--                dataType: "JSON",--}}
{{--                data: {--}}
{{--                    product_id: product_id,--}}
{{--                    product_qty: product_qty,--}}
{{--                    product_price: product_price,--}}
{{--                    _token: token,--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                    console.log(data);--}}

{{--                    if (data['status']) {--}}
{{--                        $('body #header-ajax').html(data['header']);--}}
{{--                        $('body #cart_counter').html(data['cart_count']);--}}
{{--                        swal({--}}
{{--                            title: "Success!",--}}
{{--                            text: data['message'],--}}
{{--                            icon: "success",--}}
{{--                            button: "OK!",--}}
{{--                        });--}}

{{--                    } else {--}}
{{--                        $('body #header-ajax').html(data['header']);--}}
{{--                        $('body #cart_counter').html(data['cart_count']);--}}
{{--                        swal({--}}
{{--                            title: "Sorry!",--}}
{{--                            text: data['message'],--}}
{{--                            icon: "error",--}}
{{--                            button: "OK!",--}}
{{--                        });--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (err) {--}}
{{--                    console.log(err);--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}

{{--    <script>--}}
{{--        $('.qty-text ').change('key up',function () {--}}
{{--            var id=$(this).data('id');--}}
{{--            var spinner=$(this),input=spinner.closest('div.quantity').find('input[type="number"]');--}}
{{--            var newVal=parseFloat(input.val());--}}
{{--            $('#add_to_cart_button_details_'+id).attr('data-quantity',newVal);--}}

{{--        });--}}

{{--        $('.add_to_cart_button_details').on('click',function () {--}}
{{--            var product_qty=$(this).data('quantity');--}}
{{--            var product_id=$(this).data('product_id');--}}
{{--            var product_price=$(this).data('price');--}}
{{--            var token="{{csrf_token()}}";--}}
{{--            var path="{{route('cart.store')}}";--}}

{{--            $.ajax({--}}
{{--                url:path,--}}
{{--                type:"POST",--}}
{{--                data:{--}}
{{--                    _token:token,--}}
{{--                    product_id:product_id,--}}
{{--                    product_price:product_price,--}}
{{--                    product_qty:product_qty,--}}
{{--                },--}}
{{--                beforeSend:function () {--}}
{{--                    $('#add_to_cart_button_details_{{$product->id}}').html('<i class="fa fa-spinner fa-spin"></i> Loading...');--}}

{{--                },--}}
{{--                complete:function () {--}}
{{--                    $('#add_to_cart_button_details_{{$product->id}}').html('Add To Cart');--}}
{{--                },--}}
{{--                success:function (data) {--}}
{{--                    console.log(data['status']);--}}
{{--                    if(data['status']){--}}
{{--                        $('body #header-ajax').html(data['header']);--}}
{{--                        $('body #cart_counter').html(data['cart_count']);--}}
{{--                        swal({--}}
{{--                            title: "Success!",--}}
{{--                            text: data['message'],--}}
{{--                            icon: "success",--}}
{{--                            button: "OK!",--}}
{{--                        });--}}
{{--                    }--}}
{{--                    else{--}}
{{--                        $('body #header-ajax').html(data['header']);--}}
{{--                        $('body #cart_counter').html(data['cart_count']);--}}
{{--                        swal({--}}
{{--                            title: "Sorry!",--}}
{{--                            text: data['message'],--}}
{{--                            icon: "error",--}}
{{--                            button: "OK!",--}}
{{--                        });--}}
{{--                    }--}}

{{--                    window.location.href=window.location.href;--}}

{{--                },--}}
{{--                error:function (err) {--}}
{{--                    console.log(err);--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection
