@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Order</h2>
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Order detail</li>
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
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="ordr-date">
                                                        <h2>Invoice</h2>
                                                        <b>Order</b> #{{$order->order_number}}<br>

                                                        <b>Order Date :</b> {{\Carbon\Carbon::parse($order->created_at)->format('d M Y')}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="float-right">
                                                        <b>Shipping Address :</b><br>
                                                        {{$order->address}}<br>
                                                        {{$order->address2}}<br>
                                                        {{$order->state}}<br>
                                                        {{$order->country}},
                                                        {{$order->ip_address}},
                                                        {{$order->postcode}}<br>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="card card-static-2 mb-30 mt-3">
                                                        <div class="card-body-table">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-hover">
                                                                    <thead class="thead-info">
                                                                    <tr>
                                                                        <th style="width:130px">S.N.</th>
                                                                        <th>Item</th>
                                                                        <th style="width:150px" class="text-center">Image</th>
                                                                        <th style="width:150px" class="text-center">Qty</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($order->products as $item)
                                                                        @php
                                                                            $image=explode(',',$item->image_path);
                                                                        @endphp
                                                                    <tr>
                                                                        <td>{{$loop->iteration}}</td>
                                                                        <td>
                                                                            <p>{{ucfirst($item->title)}}</p>
                                                                        </td>
                                                                        <td class="text-center"><img src="{{asset($image[0])}}" style="max-width: 100px"></td>
                                                                        <td class="text-center">{{$item->pivot->quantity}}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8"></div>
                                                <div class="col-lg-4">
                                                    <table class="table">
                                                        <form action="{{route('order.status')}}" id="order-status" method="post">
                                                            @csrf
                                                            <input type="hidden" name="order_id" value="{{$order->id}}">
                                                            <tr>
                                                                <td><b>Status <span class="text-danger">*</span></b> : </td>
                                                                <td style="display: grid">
                                                                    <select class="form-control" name="condition" id="">
                                                                        {{-- Pending order--}}
                                                                        @if($order->condition=='process' || $order->condition=='delivered' || $order->condition=='cancelled' )
                                                                            <option disabled value="pending" {{$order->condition=='pending' ? 'selected' : ''}}>Pending</option>
                                                                        @else
                                                                            <option value="pending" {{$order->condition=='pending' ? 'selected' : ''}}>Pending</option>
                                                                        @endif

                                                                        {{-- Process Order --}}
                                                                        @if($order->condition=='delivered' || $order->condition=='cancelled' )
                                                                            <option disabled value="process" {{$order->condition=='process' ? 'selected' : ''}}>Process</option>
                                                                        @else
                                                                            <option value="process" {{$order->condition=='process' ? 'selected' : ''}}>Process</option>
                                                                        @endif

                                                                        {{-- Delivered Order --}}
                                                                        @if($order->condition=='cancelled' )
                                                                            <option disabled value="delivered" {{$order->condition=='delivered' ? 'selected' : ''}}>Delivered</option>
                                                                        @else
                                                                            <option value="delivered" {{$order->condition=='delivered' ? 'selected' : ''}}>Delivered</option>
                                                                        @endif

                                                                        {{-- Order cancelled --}}
                                                                        @if($order->condition=='delivered')
                                                                            <option disabled value="cancelled" {{$order->condition=='cancelled' ? 'selected' : ''}}>Cancelled</option>
                                                                        @else
                                                                            <option value="cancelled" {{$order->condition=='cancelled' ? 'selected' : ''}}>Cancelled</option>
                                                                        @endif
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
