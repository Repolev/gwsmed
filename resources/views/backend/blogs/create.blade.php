@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Blog</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Blogs</li>
                            <li class="breadcrumb-item active">Add Blog</li>
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
                            <form action="{{route('blogs.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Blog Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title" placeholder="Blog title" value="{{old('title')}}" id="blogTitle">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Blog Url<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="blog-title" name="slug" value="{{old('slug')}}" id="blogSlug">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="imge">Image <span class="text-danger">*</span></label>
                                            <input type="file" name="blog_image" class="dropify" data-height="150" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Content <span class="text-danger">*</span></label>
                                            <textarea id="description" class="form-control" placeholder="Write some text..." name="content">{{ old('content') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="imageAlt">Image Alt : </label>
                                            <input type="text" name="image_alt" class="form-control" placeholder="Image Alt" value="{{old('image_alt')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Meta title</label>
                                            <input type="text" class="form-control" placeholder="Meta title" name="meta_title" value="{{old('meta_title')}}" id="">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Meta description</label>
                                            <textarea id="description" class="form-control" placeholder="Meta description" name="meta_description">{{old('meta_description')}}</textarea>
                                        </div>
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
        // $('#lfm').filemanager('image');
    </script>

    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
        $("#blogTitle").focusout(function(e){
            var blogTitle = $("#blogTitle").val();
            var createdSlug = convertToSlug(blogTitle.trim());
            var blogSlug = $("#blogSlug").val(createdSlug);
        });

        function convertToSlug(Text){
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g,'')
                .replace(/ +/g,'-')
                ;
        }
    </script>
@endsection
