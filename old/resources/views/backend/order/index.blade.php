@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Orders</h2>
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Shipping</li>
                        </ul>
                        <p class="float-right">Total Orders :{{\App\Models\Order::count()}}</p>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    @include('backend.layouts.notification')
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Order</strong> Lists</h2>

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
                                        <th>Country</th>
                                        <th>Address</th>
                                        <th>Ip Address</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->order_number}}</td>
                                            <td>{{$item->full_name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->country}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->ip_address}}</td>
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
                                                   title="view" class="float-left btn btn-sm btn-outline-info"
                                                   data-placement="bottom"><i class="fas fa-eye"></i> </a>
                                                <form class="float-left ml-1"
                                                      action="{{route('orders.destroy',$item->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" data-toggle="tooltip" title="delete"
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
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
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
    <script>
        $('input[name=toogle]').change(function () {
            var mode = $(this).prop('checked');
            var id = $(this).val();
            // alert(id);
            $.ajax({
                url: "{{route('shipping.status')}}",
                type: "POST",
                data: {
                    _token: '{{csrf_token()}}',
                    mode: mode,
                    id: id,
                },
                success: function (response) {
                    if (response.status) {
                        alert(response.msg);
                    } else {
                        alert('Please try again!');
                    }
                }
            })
        });
    </script>
@endsection
