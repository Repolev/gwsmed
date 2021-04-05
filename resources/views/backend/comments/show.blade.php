@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> review</h2>
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">review detail</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    @include('backend.layouts.notification')
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-xl-12 col-md-12">
                                    <div class="card">
                                        <div class="invoice-content">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table">

                                                        @php
                                                            $product=\App\Models\Product::where('id',$review->product_id)->first();
                                                            $user=\App\Models\User::where('id',$review->user_id)->first();
                                                        @endphp
                                                        <tr>
                                                            <td>
                                                                <b>Reviewed By</b> :
                                                            </td>
                                                            <td> {{ucfirst($user->full_name)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>Product name</b> :
                                                            </td>
                                                            <td><a href="{{route('product.detail',$product->slug)}}" target="_blank">{{ucfirst($product->title)}}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>Product Rate</b> :
                                                            </td>
                                                            <td>
                                                                @php
                                                                    $rate = ceil($review->rate);
                                                                @endphp
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    @if ($i < $rate)
                                                                        <i class="fas fa-star text-warning"></i>
                                                                    @else
                                                                        <i class="far fa-star text-warning"></i>
                                                                    @endif
                                                                @endfor
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>Product Reason</b> :
                                                            </td>
                                                            <td>{{ucfirst($review->reason)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>Product Review</b> :
                                                            </td>
                                                            <td width="100"> {!! $review->review !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>Review Date</b> :
                                                            </td>
                                                            <td>{{\Carbon\Carbon::parse($review->created_at)->format('d-M-Y')}}</td>
                                                        </tr>
                                                        <form action="{{route('reviews.update',$review->id)}}" id="order-status" method="post">
                                                            @csrf
                                                            @method('patch')
                                                            <input type="hidden" name="review_id" value="{{$review->id}}">
                                                            <tr>
                                                                <td><b>Status <span class="text-danger">*</span></b> : </td>
                                                                <td style="display: grid">
                                                                    <select class="form-control" name="status" id="">
                                                                        <option value="accept" {{$review->status=='accept' ? 'selected' : ''}}>Accept</option>
                                                                        <option value="reject" {{$review->status=='reject' ? 'selected' : ''}}>Reject</option>
                                                                    </select>
                                                                    <button id="status_btn" class="btn btn-sm btn-success">Update</button>
                                                                </td>
                                                            </tr>

                                                        </form>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#status_btn').click(function () {
            $('#status_btn').html('<i class="fas fa-spinner fa-spin"></i> Updating..');
            $('#order-status').submit();
        });
    </script>
@endsection
