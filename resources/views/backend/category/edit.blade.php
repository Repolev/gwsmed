@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Category</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Category</li>
                            <li class="breadcrumb-item active">Edit Category</li>
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
                            <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Category name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{$category->title}}" id="categoryTitle">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                        <label for="">Category URL<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="blog-slug" name="slug" value="{{ $category->slug }}" id="categorySlug">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea id="description" class="form-control" placeholder="Write some text..." name="description">{{$category->description}}</textarea>
                                        </div>
                                    </div>

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="">Is featured : </label>--}}
{{--                                            <input type="checkbox" name="is_featured" value="1" {{$category->is_featured==1 ? 'checked' : ''}} data-toggle="switchbutton"  data-size="sm">--}}
{{--                                            <input id="is_featured" type="checkbox" name="is_featured" value="1" {{$category->is_featured==1 ? 'checked' : ''}}> Yes--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Is parent : </label>
                                            <input type="checkbox" id="is_parent" name="is_parent" value="1" {{$category->is_parent==1 ? 'checked' : ''}} data-toggle="switchbutton"  data-size="sm">

{{--                                            <input id="is_parent" type="checkbox" name="is_parent" value="1" {{$category->is_parent==1 ? 'checked' : ''}}> Yes--}}
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="onMenu">On Menu : </label>
                                            <input type="checkbox" id="onMenu" name="on_menu" value="1" data-toggle="switchbutton" data-size="sm" {{$category->on_menu==1 ? 'checked' : ''}}>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12 {{$category->is_parent==1 ? 'd-none' : ''}}" id="parent_cat_div">
                                        <label for="parent_id">Parent Category</label>
                                        <select name="parent_id" id="parent_cat" class="form-control show-tick">
                                            <option value="">-- Parent Category --</option>
                                            @foreach($parent_cats as $pcats)
                                                <option value="{{$pcats->id}}" {{$pcats->id==$category->parent_id ? 'selected' : ''}}>{{ucfirst($pcats->title)}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Photo</label>
                                            <input type="file" name="photo" class="dropify" data-height="150" value="{{asset($category->image_path)}}" data-default-file="{{asset($category->image_path)}}">
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>

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
        // $('#lfm').filemanager('image');
    </script>

    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
        $("#categoryTitle").focusout(function(e){
            var categoryTitle = $("#categoryTitle").val();
            var createdSlug = convertToSlug(categoryTitle.trim());
            var blogSlug = $("#categorySlug").val(createdSlug);
        });

        function convertToSlug(Text){
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g,'')
                .replace(/ +/g,'-')
                ;
        }
    </script>
    <script>
        $('#is_parent').change(function(e){
            e.preventDefault();
            var is_checked=$('#is_parent').prop('checked');
            // alert(is_checked);
            if(is_checked){
                $('#parent_cat_div').addClass('d-none');
                $('#parent_cat').val('');
            }
            else{
                $('#parent_cat_div').removeClass('d-none');
            }
        });
    </script>
@endsection
