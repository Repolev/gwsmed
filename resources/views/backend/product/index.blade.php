@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Products
                            <a class="btn btn-sm btn-outline-secondary" href="{{route('product.create')}}"><i class="icon-plus"></i> Add Product</a></h2>
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ul>
                        <p class="float-right">Total Products :{{\App\Models\Product::count()}}</p>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <h2><strong>Product</strong> List</h2>
                                </div>
                                <div class="col-md-6 d-none" id="category_lists">
                                    <form action="{{ route('product.bulk.categories') }}" method="POST">
                                        {{ csrf_field() }}
                                    <select id="categoryId" name="category_id[]" class="form-control select2  show-tick" multiple>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->title}}</option>
                                            @if(count($cat->subcategories)>0)
                                                @foreach($cat->subcategories as $subCat)
                                                    <option value="{{$subCat->id}}">@for($i = 0; $i <= $cat->level; $i++) - @endfor{{$subCat->title}}</option>
                                                    @if(count($subCat->subcategories)>0)
                                                        @foreach($subCat->subcategories as $sub2Cat)
                                                            <option value="{{$sub2Cat->id}}">@for($i = 0; $i <= $subCat->level; $i++) - @endfor{{$sub2Cat->title}}</option>

                                                            @if(count($sub2Cat->subcategories)>0)
                                                                @foreach($sub2Cat->subcategories as $sub3Cat)
                                                                    <option value="{{$sub3Cat->id}}">@for($i = 0; $i <= $sub2Cat->level; $i++) - @endfor{{$sub3Cat->title}}</option>
                                                                    @if(count($sub3Cat->subcategories)>0)
                                                                        @foreach($sub3Cat->subcategories as $sub4Cat)
                                                                            <option value="{{$sub4Cat->id}}">@for($i = 0; $i <= $sub3Cat->level; $i++) - @endfor{{$sub4Cat->title}}</option>
                                                                            @if(count($sub4Cat->subcategories)>0)
                                                                                @foreach($sub4Cat->subcategories as $sub5Cat)
                                                                                    <option value="{{$sub5Cat->id}}">@for($i = 0; $i <= $sub4Cat->level; $i++) - @endfor{{$sub5Cat->title}}</option>
                                                                                    @if(count($sub5Cat->subcategories)>0)
                                                                                        @foreach($sub5Cat->subcategories as $sub6Cat)
                                                                                            <option value="{{$sub6Cat->id}}">@for($i = 0; $i <= $sub5Cat->level; $i++) - @endfor{{$sub6Cat->title}}</option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                            {{--                                                    <option value="{{$cat->id}}" {{$cat->id == $product->cat_id? 'selected' : ''}}>@for($i = 0; $i < $cat->level; $i++) - @endfor{{$cat->title}}</option>--}}
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="products" id="bulkProducts">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>S.N.</th>

                                        <th>Title</th>
                                        <th>Photo</th>
                                        <th>Categories</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($products as $item)
                                        @php
                                            $photo=explode(',',$item->image_path);
                                        @endphp
                                        <tr>
                                            <td><input type="checkbox" id="check_{{ $item->id }}" class="productCheck" value="{{ $item->id }}"></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ucfirst($item->title)}}</td>
                                            <td>
                                                <img src="{{asset($photo[0])}}" alt="Product image" style="max-height: 90px; max-width: 120px">
                                            </td>
                                            <td>@foreach($item->categories as $category){{ $category->title }} | @endforeach</td>
                                            <td>
                                                <input type="checkbox" name="toggle" value="{{$item->id}}" data-toggle="switchbutton" data-size="sm" {{$item->status=='active' ? 'checked' : ''}}>
                                            </td>
                                            <td>
                                                <a href="{{route('product.detail',$item->slug)}}" target="_blank" data-toggle="tooltip" title="view" class="mr-1 float-left btn btn-sm btn-outline-info" data-placement="bottom"><i class="fas fa-eye"></i> </a>
                                                <a href="{{route('product.edit',$item->id)}}" data-toggle="tooltip" title="edit" class="float-left btn btn-sm btn-outline-warning" data-placement="bottom"><i class="fas fa-edit"></i> </a>
                                                <form class="float-left ml-1" action="{{route('product.destroy',$item->id)}}"  method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fas fa-trash-alt"></i> </a>
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
    <script>
        $('.productCheck').click(function(){
            let arrayNew = [];
            var oldValue = $("#bulkProducts").val();
            var newValue = $(this).val();
            if(oldValue != ''){
                arrayNew.push(oldValue);
            }
            arrayNew.push(newValue);
            console.log(arrayNew);
            $('#bulkProducts').val(arrayNew);
            if($(this).prop("checked")==true){
                $('#category_lists').removeClass('d-none');
            }
        })
    </script>
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
    {{--  Change active & inactive using ajax  --}}
    <script>
        $('input[name=toggle]').change(function () {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            // alert(id);
            $.ajax({
                url:"{{route('product.status')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function (response) {
                    if(response.status){
                        console.log(response.msg);
                    }
                    else{
                        alert('Please try again!');
                    }
                }
            })
        });
    </script>

    {{--  Change deals of the day using ajax  --}}
    <script>
        $('input[name=deal]').change(function () {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            $.ajax({
                url:"{{route('todays.deal')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function (response) {
                    if(response.status){
                        console.log(response.msg);
                    }
                    else{
                        alert('Please try again!');
                    }
                }
            })
        });
    </script>
@endsection
