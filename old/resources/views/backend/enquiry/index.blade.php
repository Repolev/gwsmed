@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Enquiry</h2>
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Enquiry</li>
                        </ul>
                        <p class="float-right">Total Enquiry :{{\App\Models\Enquiry::count()}}</p>
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
                            <h2><strong>Enquiry</strong> Lists</h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($enquiries as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->full_name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->country}}</td>
                                            <td>
                                                <a href="javascript:void(0);"  data-toggle="modal" data-target="#enquiryID{{ $item->id }}" title="view"
                                                       data-id="{{$item->id}}"
                                                       class="btn btn-sm btn-outline-success"
                                                       data-placement="bottom"><i class="fas fa-eye"></i> </a>
                                                <form class="float-left ml-1"
                                                      action="{{route('enquiry.destroy',$item->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" data-toggle="tooltip" title="delete"
                                                       data-id="{{$item->id}}"
                                                       class="dltBtn btn btn-sm btn-outline-danger"
                                                       data-placement="bottom"><i class="fas fa-trash-alt"></i> </a>
                                                </form>

                                                  <!-- Modal -->
                                            <div class="modal fade" id="enquiryID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog   modal-lg" role="document">
                                                    @php
                                                    $enquiry=\App\Models\Enquiry::where('id',$item->id)->first();
                                                    @endphp
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Enquiry</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Full name:</strong>
                                                                    <p>{{ucfirst($enquiry->full_name)}}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Email:</strong>
                                                                    <p >{{$enquiry->email}}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Phone:</strong>
                                                                    <p >{{$enquiry->phone}}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Country:</strong>
                                                                    <p >{{$enquiry->country}}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Categories:</strong>
                                                                    <p>
                                                                        <ul>

                                                                            @if(count($enquiry->categories)>0)
                                                                                @foreach($enquiry->categories as $cat)
                                                                                    <li>{{ Str::ucfirst($cat->title) }}</li>
                                                                                @endforeach
                                                                            @endif
                                                                        </ul>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Address:</strong>
                                                                    <p>
                                                                        {{ $enquiry->address }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Subject:</strong>
                                                                    <p>{{$enquiry->subject}}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Message:</strong>
                                                                    <p>{{$enquiry->message}}</p>
                                                                </div>
                                                            </div>



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


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
