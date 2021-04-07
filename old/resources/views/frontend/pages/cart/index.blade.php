@extends('frontend.layouts.master')

@section('content')

    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>Cart</h1>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- cart start -->
    <div class="cv-cart spacer-top spacer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cv-last-order" id="cart_list">
                        @include('frontend.layouts._cart-lists')
                    </div>
                    <div class="cv-cart-btn">
                        <a href="{{route('checkout')}}" class="cv-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart end -->
@endsection

@section('scripts')
    <script>
        //cart delete
        $(document).on('click','.cart_delete',function(e){
            e.preventDefault();
            var cart_id=$(this).data('id');
            var token="{{csrf_token()}}";
            var path="{{route('cart.delete')}}";

            $.ajax({
                url:path,
                type:"POST",
                dataType:"JSON",
                data:{
                    cart_id:cart_id,
                    _token:token,
                },
                success:function (data) {
                    console.log(data['cart_list']);


                    if(data['status']){
                        $('body #header').html(data['header']);
                        $('#cart_list').html(data['cart_list']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });
                    }
                },
                error:function (err) {
                    console.log(err);
                }
            });
        });
    </script>

    <script>
        $(document).on("click",".cv-add",function(e){
            e.preventDefault();
            var id = $(this).data('id');

            var spinner = $(this),
                input = spinner.closest(".cv-cart-quantity").find('input[type="number"]');
            var newVal = parseFloat(input.val())+1;
            $('#qty-input-'+id ).val(newVal);

            var productQuantity = $("#update-cart-"+id).data('product-quantity');
            update_cart(id,productQuantity);
        });
        $(document).on("click",".cv-sub",function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var spinner = $(this),
                input = spinner.closest(".cv-cart-quantity").find('input[type="number"]');
            if(input.val() == 1){
                return false;
            }
            if(input.val() != 1){
                var newVal = parseFloat(input.val())-1;
                $('#qty-input-'+id ).val(newVal);
            }
            var productQuantity = $("#update-cart-"+id).data('product-quantity');
            update_cart(id,productQuantity);
        });


        $(document).on('click','.qty-text',function () {
            var id=$(this).data('id');

            var spinner=$(this),input=spinner.closest("div.quantity").find('input[type="number"]');


            if(input.val()==0){
                return false;
            }
            if(input.val()!=1){
                var newVal=parseFloat(input.val());
                $('#qty-input-'+id).val(newVal);
            }

            var productQuantity=$("#update-cart-"+id).data('product-quantity');
            update_cart(id,productQuantity)

        });
        function update_cart(id,productQuantity) {
            var rowId=id;
            var product_qty=$('#qty-input-'+rowId).val();
            var token="{{csrf_token()}}";
            var path="{{route('cart.update')}}";

            $.ajax({
                url:path,
                type:"POST",
                data:{
                    _token:token,
                    product_qty:product_qty,
                    rowId:rowId,
                    productQuantity:productQuantity,
                },
                success:function (data) {
                    console.log(data);
                    if(data['status']){
                        $('body #header-ajax').html(data['header']);
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #cart_list').html(data['cart_list']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });
                    }
                    else{
                        swal({
                            title: "Sorrry",
                            text: data['message'],
                            icon: "error",
                            button: "OK!",
                        });
                    }
                }
            })
        }
    </script>
@endsection
