@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Review</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Review</li>
                            <li class="breadcrumb-item active">Edit Review</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form action="{{route('reviews.update',$review->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="eg. Prajwal Rai" name="name" value="{{$review->name}}">
                                        </div>


                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" placeholder="eg. Nepal" name="address" value="{{$review->address}}">
                                        </div>


                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Reviews</label>
                                            <textarea rows="3" class="form-control " id="description" placeholder="Write some review..." name="review">{{$review->review}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="">Rate <span class="text-danger">*</span></label>
                                        <select name="rate" id="" class="form-control show-tick">
                                            <option value="">-- Choose Rate --</option>
                                            <option value="1" {{$review->rate=='1' ? 'selected' : ''}}>1</option>
                                            <option value="2" {{$review->rate=='2' ? 'selected' : ''}}>2</option>
                                            <option value="3" {{$review->rate=='3' ? 'selected' : ''}}>3</option>
                                            <option value="4" {{$review->rate=='4' ? 'selected' : ''}}>4</option>
                                            <option value="5" {{$review->rate=='5' ? 'selected' : ''}}>5</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 col-sm-12" >
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control show-tick">
                                            <option value="">-- Status --</option>
                                            <option value="active" {{$review->status=='active' ? 'selected' : ''}}>Active</option>
                                            <option value="inactive" {{$review->status == 'inactive' ? 'selected' : ''}} >Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
    </script>
    <script>
        $('#condition').change(function () {
            var condition=$(this).val();
            if(condition !='promo'){
                $('#position_div').addClass('d-none');
                $('#position').val('');
            }
            else{
                $('#position_div').removeClass('d-none');
            }
        });
    </script>
    <script>
        $('#position').change(function () {
            var position=$(this).val();
            if(position !='middle'){
                $('#inner_position_div').addClass('d-none');
                $('#inner_position').val('');
            }
            else{
                $('#inner_position_div').removeClass('d-none');
            }
        });
    </script>
@endsection
