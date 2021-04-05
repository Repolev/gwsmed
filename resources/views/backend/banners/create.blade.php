@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Banners</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Banners</li>
                            <li class="breadcrumb-item active">Add Banners</li>
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
                            <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Banner Heading </label>
                                            <input type="text" class="form-control" placeholder="Heading" name="title" value="{{old('title')}}">
                                        </div>


                                    </div>


                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Photo <span class="text-danger">*</span></label>
                                            <input type="file" name="photo" class="dropify" id="input-file-now" data-height="100" data-default-file="{{old('photo')}}">
                                        </div>
                                    </div>

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="">Description</label>--}}
{{--                                            <textarea rows="3" class="form-control" placeholder="Write some text..." name="description">{{old('description')}}</textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}



{{--                                    <div class="col-lg-12 col-md-12 col-sm-12 d-none" id="position_div">--}}
{{--                                        <label for="">Position</label>--}}
{{--                                        <select name="position" id="position"  class="form-control show-tick">--}}
{{--                                            <option value="">-- Position --</option>--}}
{{--                                            <option value="top" {{old('position')=='top' ? 'selected' : ''}}>Top</option>--}}
{{--                                            <option value="middle" {{old('position') == 'middle' ? 'selected' : ''}} >Middle</option>--}}
{{--                                            <option value="bottom" {{old('position') == 'bottom' ? 'selected' : ''}} >Bottom</option>--}}
{{--                                            <option value="footer" {{old('position') == 'footer' ? 'selected' : ''}} >footer</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-12 col-md-12 col-sm-12 d-none" id="inner_position_div">--}}
{{--                                        <label for="">Middle Position</label>--}}
{{--                                        <select name="inner_position"  class="form-control show-tick">--}}
{{--                                            <option value="">-- Middle Position --</option>--}}
{{--                                            <option value="top" {{old('inner_position')=='top' ? 'selected' : ''}}>Top</option>--}}
{{--                                            <option value="middle" {{old('inner_position') == 'middle' ? 'selected' : ''}} >Middle</option>--}}
{{--                                            <option value="right" {{old('inner_position') == 'right' ? 'selected' : ''}} >Right</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}


                                    <div class="col-lg-12 col-sm-12" >
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control show-tick">
                                            <option value="active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                            <option value="inactive" {{old('status') == 'inactive' ? 'selected' : ''}} >Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>

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
            }
            else{
                $('#inner_position_div').removeClass('d-none');
            }
        });
    </script>
@endsection
