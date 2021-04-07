@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Product</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Products</li>
                            <li class="breadcrumb-item active">Edit Product</li>
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
                            <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{ucfirst($product->title)}}" id="productTitle">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                        <label for="">Product URL<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="product-slug" name="slug" value="{{ $product->slug }}" id="productSlug">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Model no. <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Model number" name="model_no" value="{{$product->model_no}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Summary <span class="text-danger">*</span></label>
                                            <textarea id="summary" class="form-control" placeholder="Some text..." name="summary" >{{$product->summary}}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea id="description" class="form-control description" placeholder="Write some text..." name="description">{{$product->description}}</textarea>
                                        </div>
                                    </div>

                                    {{-- <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Stock <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="Stock" name="stock" value="{{$product->stock}}">
                                        </div>
                                    </div> --}}

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="">Price <span class="text-danger">*</span></label>--}}
{{--                                            <input type="number" step="any" class="form-control" placeholder="Price" name="price" value="{{$product->price}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="">Discount</label>--}}
{{--                                            <input type="number" min="0" max="100" step="any" class="form-control" placeholder="Discount" name="discount" value="{{$product->discount}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    @php
                                        $photo=explode(',',$product->image_path);
                                    @endphp

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Photo</label>
                                            <input type="file" name="photo[]" multiple class="dropify" data-height="150" data-default-file="{{asset($photo[0])}}" value="{{asset($photo[0])}}">
                                        </div>
                                    </div>

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="">Variants</label>--}}
{{--                                            <input type="file" name="variants[]" multiple class="dropify" data-height="100" data-default-file="{{asset($variant[0])}}" value="{{asset($variant[0])}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-12 col-md-12 col-sm-12">--}}
{{--                                        <label for="">Brands</label>--}}
{{--                                        <select name="brand_id" class="form-control show-tick">--}}
{{--                                            <option value="">-- Brands --</option>--}}
{{--                                            @foreach(\App\Models\Brand::get() as $brand)--}}
{{--                                                <option value="{{$brand->id}}" {{$brand->id==$product->brand_id? 'selected' : ''}}>{{$brand->title}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="">Category</label>
                                        <select id="categoryId" name="category_id[]" class="form-control show-tick" multiple>
                                            <option value="">-- Category --</option>
                                            @foreach(\App\Models\Category::orderBy('title','ASC')->get() as $cat)
                                                <option value="{{$cat->id}}" {{$cat->id == $product->cat_id? 'selected' : ''}}>{{$cat->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
{{--                                    <div class="col-lg-12 col-md-12 col-sm-12">--}}
{{--                                        <label for="">Home Page Menu (optional)</label>--}}
{{--                                        <select name="display_id" class="form-control show-tick">--}}
{{--                                            <option value="">-- Home page menu --</option>--}}
{{--                                            @foreach($home_page_menus as $menu)--}}
{{--                                                <option value="{{$menu->id}}" {{$product->display_id==$menu->id? 'selected ' : ''}}>{{ucfirst($menu->title)}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                    {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="">Tags</label>
                                        <select name="tags" class="form-control show-tick">
                                            <option value="">-- Tags --</option>
                                            <option value="new" {{$product->tags=='new' ? 'selected' : ''}}>New</option>
                                            <option value="sale" {{$product->tags == 'sale' ? 'selected' : ''}} >Sale</option>
                                            <option value="hot" {{$product->tags == 'hot' ? 'selected' : ''}} >Hot</option>
                                        </select>
                                    </div> --}}

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="">Specification</label>--}}
{{--                                            <textarea id="description" class="form-control description" placeholder="Write some text..." name="specification">{{$product->specification}}</textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="">Is featured : </label>
                                                    <input type="checkbox" name="is_featured" value="1" {{$product->is_featured==1 ? 'checked' : ''}} data-toggle="switchbutton"  data-size="sm">
        {{--                                            <input id="is_featured" type="checkbox" name="is_featured" value="1" {{$category->is_featured==1 ? 'checked' : ''}}> Yes--}}
                                                </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Meta Tags : </label>
                                            <input type="text" name="meta_tag" class="form-control" placeholder="Meta tags" value="{{$product->meta_tag}}">
                                            {{--                                            <input id="is_featured" type="checkbox" name="is_featured" value="1" checked> Yes--}}
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Meta Description : </label>
                                            <textarea  name="meta_description" class="form-control" placeholder="Meta Description" >{{$product->meta_description}}</textarea>
                                            {{--                                            <input id="is_featured" type="checkbox" name="is_featured" value="1" checked> Yes--}}
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control show-tick">
                                            <option value="active" {{$product->status=='active' ? 'selected' : ''}}>Active</option>
                                            <option value="inactive" {{$product->status == 'inactive' ? 'selected' : ''}} >Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
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
        $('#lfm,#lfm1').filemanager('image');
    </script>

    <script>
        $(document).ready(function() {
            $('.description').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#summary').summernote();
        });
        $("#productTitle").focusout(function(e){
            var productsTitle = $("#productTitle").val();
            var createdSlug = convertToSlug(productTitle.trim());
            var blogSlug = $("#productSlug").val(createdSlug);
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

        var child_cat_id={{$product->child_cat_id}};
        $('#cat_id').change(function(){
            var cat_id=$(this).val();

            if(cat_id !=null){
                $.ajax({
                    url:"/admin/category/"+cat_id+"/child",
                    type:"POST",
                    data:{
                        _token:"{{csrf_token()}}",
                        cat_id:cat_id,
                    } ,
                    success:function(response){
                        var html_option="<option value=''>--- Child Category---</option>";
                        if(response.status){
                            $('#child_cat_div').removeClass('d-none');
                            $.each(response.data,function(id,title){
                                html_option +="<option value='"+id+"' "+(child_cat_id==id ? 'selected' : '')+">"+title+"</option>"
                            });
                        }
                        else{
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#chil_cat_id').html(html_option);
                    }
                });
            }
        });

        if(child_cat_id !=null){
            $('#cat_id').change();
        }
    </script>
@endsection
