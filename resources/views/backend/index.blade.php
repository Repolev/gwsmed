@extends('backend.layouts.master')

@section('content')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Dashboard</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">eCommerce</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{\App\Models\Product::where('status','active')->count()}} <i class="icon-basket-loaded float-right"></i></h3>
                            <span>Total Products</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{\App\Models\Category::where('status','active')->count()}} <i class="icon-organization float-right"></i></h3>
                            <span>Total Category</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-yellow m-b-0">
                            <div class="progress-bar" data-transitiongoal="89"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{number_format(\App\Models\Blog::count())}} <i class="icon-book-open float-right"></i></h3>
                            <span>Total Blogs</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-purple m-b-0">
                            <div class="progress-bar" data-transitiongoal="67"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{\App\Models\Order::count()}} <i class=" icon-question text-success float-right"></i></h3>
                            <span>Total Bulk Enquiries</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                            <div class="progress-bar" data-transitiongoal="68"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if(auth('admin')->user()->is_verified==1)

            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Recent Order</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Order no.</th>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Condition</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->order_number}}</td>
                                            <td>{{$item->first_name}} {{$item->last_name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>
                                                @if($item->condition=='pending')
                                                    <span class="badge badge-primary">
                                                            {{ucfirst($item->condition)}}
                                                        </span>
                                                @elseif($item->condition=='process')
                                                    <span class="badge badge-info">
                                                            {{ucfirst($item->condition)}}
                                                        </span>
                                                @elseif($item->condition=='delivered')
                                                    <span class="badge badge-success">
                                                            {{ucfirst($item->condition)}}
                                                        </span>
                                                @else
                                                    <span class="badge badge-danger">
                                                            {{ucfirst($item->condition)}}
                                                        </span>
                                                @endif

                                            </td>


                                            <td>
                                                <a href="{{route('orders.show',$item->id)}}" data-toggle="tooltip"
                                                   title="view" class="float-left btn btn-sm btn-outline-primary"
                                                   data-placement="bottom"><i class="fas fa-eye"></i> </a>
                                                <form class="float-left ml-1"
                                                      action="{{route('orders.destroy',$item->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="javascript:void(0);" data-toggle="tooltip" title="delete"
                                                       data-id="{{$item->id}}"
                                                       class="dltBtn btn btn-sm btn-outline-danger"
                                                       data-placement="bottom"><i class="fas fa-trash-alt"></i> </a>
                                                </form>

                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @endif

{{--            <div class="row clearfix">--}}
{{--                <div class="col-lg-4 col-md-12 col-sm-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="header">--}}
{{--                            <h2>New Orders</h2>--}}
{{--                        </div>--}}
{{--                        <div class="body">--}}
{{--                            <table class="table table-hover">--}}
{{--                                <thead class="thead-success">--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>Product</th>--}}
{{--                                    <th>Customers</th>--}}
{{--                                    <th>Total</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td>01</td>--}}
{{--                                    <td>IPONE-7</td>--}}
{{--                                    <td>--}}
{{--                                        <ul class="list-unstyled team-info margin-0">--}}
{{--                                            <li><img src="../assets/images/xs/avatar1.jpg" title="Avatar" alt="Avatar"></li>--}}
{{--                                            <li><img src="../assets/images/xs/avatar6.jpg" title="Avatar" alt="Avatar"></li>--}}
{{--                                        </ul>--}}
{{--                                    </td>--}}
{{--                                    <td>$ 356</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>02</td>--}}
{{--                                    <td>NOKIA-8</td>--}}
{{--                                    <td>--}}
{{--                                        <ul class="list-unstyled team-info margin-0">--}}
{{--                                            <li><img src="../assets/images/xs/avatar1.jpg" title="Avatar" alt="Avatar"></li>--}}
{{--                                            <li><img src="../assets/images/xs/avatar5.jpg" title="Avatar" alt="Avatar"></li>--}}
{{--                                            <li><img src="../assets/images/xs/avatar9.jpg" title="Avatar" alt="Avatar"></li>--}}
{{--                                        </ul>--}}
{{--                                    </td>--}}
{{--                                    <td>$ 542</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>01</td>--}}
{{--                                    <td>IPONE-7</td>--}}
{{--                                    <td>--}}
{{--                                        <ul class="list-unstyled team-info margin-0">--}}
{{--                                            <li><img src="../assets/images/xs/avatar5.jpg" title="Avatar" alt="Avatar"></li>--}}
{{--                                        </ul>--}}
{{--                                    </td>--}}
{{--                                    <td>$ 356</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>02</td>--}}
{{--                                    <td>NOKIA-8</td>--}}
{{--                                    <td>--}}
{{--                                        <ul class="list-unstyled team-info margin-0">--}}
{{--                                            <li><img src="../assets/images/xs/avatar3.jpg" title="Avatar" alt="Avatar"></li>--}}
{{--                                            <li><img src="../assets/images/xs/avatar2.jpg" title="Avatar" alt="Avatar"></li>--}}
{{--                                        </ul>--}}
{{--                                    </td>--}}
{{--                                    <td>$ 542</td>--}}
{{--                                </tr>--}}

{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-8 col-md-12 col-sm-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="header">--}}
{{--                            <h2>Top Selling Country</h2>--}}
{{--                            <ul class="header-dropdown">--}}
{{--                                <li class="dropdown">--}}
{{--                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>--}}
{{--                                    <ul class="dropdown-menu dropdown-menu-right">--}}
{{--                                        <li><a href="javascript:void(0);">Action</a></li>--}}
{{--                                        <li><a href="javascript:void(0);">Another Action</a></li>--}}
{{--                                        <li><a href="javascript:void(0);">Something else</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="body">--}}
{{--                            <div id="world-map-markers" class="jvector-map" style="height: 300px"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>

@endsection

@section('scripts')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function (e) {
            var form=$(this).closest('form');
            var dataID=$(this).data('id');
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });

        });
    </script>
@endsection
