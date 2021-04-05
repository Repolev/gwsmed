@extends('frontend.layouts.master')

@section('content')

    <!-- Breadcumb Area -->
    <div class="breadcumb_area d-none">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Compare</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Compare</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Compare Area  -->
    <div class="compare_area section_padding_100 bg-white clearfix py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h4>Product <span>Comparison</span></h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="compare-list" id="compare-list">
                        @include('frontend.layouts._compare-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->


@endsection

@section('scripts')
    <script>
        $('.move-to-cart').on('click', function(e) {

            e.preventDefault();
            var rowId = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var path = "{{ route('compare.move.cart') }}";

            $.ajax({
                url: path,
                type: "POST",
                data: {
                    _token: token,
                    rowId: rowId,
                },
                beforeSend: function() {
                    $(this).html('<i class="fas fa-spinner fa-spin widget-icon"></i>');
                },
                complete: function() {
                    $(this).html('<i class="ri-shopping-cart-line widget-icon"></i>');
                },

                success: function(data) {
                    console.log(data);
                    if (data['status']) {
                        $('body #compare-list').html(data['compare_list']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });
                    } else {
                        swal({
                            title: "Opps!",
                            text: data['message'],
                            icon: "Something went wrong",
                            button: "OK!",
                        });
                    }
                },
                error: function(err) {
                    swal({
                        title: "Error!",
                        text: "Some error",
                        icon: "error",
                        button: "OK!",
                    });
                }
            })

        })

    </script>
    <script>
        $('.delete_compare').on('click', function(e) {

            e.preventDefault();
            var rowId = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var path = "{{ route('compare.delete') }}";

            $.ajax({
                url: path,
                type: "POST",
                data: {
                    _token: token,
                    rowId: rowId,
                },
                success: function(data) {
                    if (data['status']) {
                        $('body #compare-list').html(data['compare_list']);

                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });
                    } else {
                        swal({
                            title: "Opps!",
                            text: data['message'],
                            icon: "error",
                            button: "OK!",
                        });
                    }
                },
                error: function(err) {
                    swal({
                        title: "Error!",
                        text: "Some error",
                        icon: "error",
                        button: "OK!",
                    });
                }
            })

        })

    </script>

    {{-- Add to wishlist --}}
    <script>
        $(document).on('click', '.add_to_wishlist', function (e) {
            e.preventDefault();
            var product_id = $(this).data('id');
            var product_qty = $(this).data('quantity');

            var token = "{{ csrf_token() }}";
            var path = "{{ route('wishlist.store') }}";

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
