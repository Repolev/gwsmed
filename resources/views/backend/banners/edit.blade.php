@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Banners</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Banners</li>
                            <li class="breadcrumb-item active">Edit Banners</li>
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
                            <form action="{{route('banner.update',$banner->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Banner Heading <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Banner heading" name="title" value="{{$banner->title}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">URL <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="URL" name="slug" value="{{$banner->slug}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Photo <span class="text-danger">*</span></label>
                                            <input type="file" name="photo" class="dropify" id="input-file-now" data-height="100" data-default-file="{{asset($banner->image_path)}}" value="{{asset($banner->image_path)}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea  class="form-control" placeholder="Write some text..." name="description" rows="3">{{$banner->description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="">Condition <span class="text-danger">*</span></label>
                                        <select name="condition" id="condition" class="form-control show-tick">
                                            <option value="">-- Conditions --</option>
                                            <option value="banner" {{$banner->condition=='banner' ? 'selected' : ''}}>Home Banner</option>
                                            <option value="promo" {{$banner->condition == 'promo' ? 'selected' : ''}} >Promotion Banner</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 @if($banner->position) '' @else d-none @endif" id="position_div">
                                        <label for="">Position</label>
                                        <select name="position" id="position"  class="form-control show-tick">
                                            <option value="">-- Position --</option>
                                            <option value="top" {{$banner->position=='top' ? 'selected' : ''}}>Top</option>
                                            <option value="middle" {{$banner->position == 'middle' ? 'selected' : ''}} >Middle</option>
                                            <option value="bottom" {{$banner->position == 'bottom' ? 'selected' : ''}} >Bottom</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 @if($banner->inner_position && $banner->position)  @else d-none @endif" id="inner_position_div">
                                        <label for="">Middle Position</label>
                                        <select name="inner_position" id="inner_position"  class="form-control show-tick">
                                            <option value="">-- Middle Position --</option>
                                            <option value="top" {{$banner->inner_position=='top' ? 'selected' : ''}}>Top</option>
                                            <option value="middle" {{$banner->inner_position == 'middle' ? 'selected' : ''}} >Middle</option>
                                            <option value="right" {{$banner->inner_position == 'right' ? 'selected' : ''}} >Right</option>
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
