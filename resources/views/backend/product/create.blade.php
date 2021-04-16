@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Product</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Products</li>
                            <li class="breadcrumb-item active">Add Product</li>
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
                            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Product name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Product name" name="title" value="{{old('title')}}" id="productTitle">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                        <label for="">Product URL<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="product-slug" name="slug" value="{{ old('slug') }}" id="productSlug">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Model no. <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Model number" name="model_no" value="{{old('model_no')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Summary <span class="text-danger">*</span></label>
                                            <textarea id="summary" class="form-control" placeholder="Some text..." name="summary" >{{old('summary')}}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea id="description" class="form-control description" placeholder="Write some text..." name="description">{{old('description')}}</textarea>
                                        </div>
                                    </div>

                                    {{-- <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Quantity <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="eg. 10" name="stock" value="{{old('stock')}}">
                                        </div>
                                    </div> --}}

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="">Price <span class="text-danger">*</span></label>--}}
{{--                                            <input type="number" step="any" class="form-control" placeholder="eg. 1,000" name="price" value="{{old('price')}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="">Discount (%)</label>--}}
{{--                                            <input type="number" min="0" max="100" step="any" class="form-control" placeholder="eg. 10.5" name="discount" value="{{old('discount')}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Photo <small>multiple image support</small><span class="text-danger">*</span></label>
                                            <input type="file" class="dropify" name="photo[]" data-height="150" multiple>
                                        </div>
                                    </div>

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="">Variant Images <small>multiple image support</small></label>--}}
{{--                                            <input type="file" class="dropify" name="variants[]" data-height="100" multiple>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-12 col-md-12 col-sm-12">--}}
{{--                                        <label for="">Brands</label>--}}
{{--                                        <select name="brand_id" class="form-control show-tick">--}}
{{--                                            <option value="">-- Brands --</option>--}}
{{--                                            @foreach(\App\Models\Brand::get() as $brand)--}}
{{--                                                <option value="{{$brand->id}}" {{old('brand_id')==$brand->id? 'selected ' : ''}}>{{ucfirst($brand->title)}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="">Category</label>
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
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 d-none" id="child_cat_div">
                                        <label for="">Child Category</label>
                                        <select id="chil_cat_id" name="child_cat_id" class="form-control show-tick">
                                        </select>
                                    </div>
{{--                                    <div class="col-lg-12 col-md-12 col-sm-12">--}}
{{--                                        <label for="">Home Page Menu (optional)</label>--}}
{{--                                        <select name="display_id" class="form-control show-tick">--}}
{{--                                            <option value="">-- Home page menu --</option>--}}
{{--                                            @foreach($home_page_menus as $menu)--}}
{{--                                                <option value="{{$menu->id}}" {{old('display_id')==$menu->id? 'selected ' : ''}}>{{ucfirst($menu->title)}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                   {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="">Tags</label>
                                        <select name="tags" class="form-control show-tick">
                                            <option value="">-- Tags --</option>
                                            <option value="">Default</option>
                                            <option value="new" {{old('tags')=='new' ? 'selected' : ''}}>New</option>
                                            <option value="hot" {{old('tags') == 'hot' ? 'selected' : ''}} >Hot</option>
                                            <option value="sale" {{old('tags') == 'sale' ? 'selected' : ''}} >Sale</option>
                                        </select>
                                    </div> --}}

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Is Featured : </label>
                                            <input type="checkbox" name="is_featured" value="1" data-toggle="switchbutton"  data-size="sm">
{{--                                            <input id="is_featured" type="checkbox" name="is_featured" value="1" checked> Yes--}}
                                        </div>
                                    </div>

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="">Specification</label>--}}
{{--                                            <textarea id="description" class="form-control description" placeholder="Write some text..." name="specification">{{old('specification')}}</textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="imageAlt">Image Alt : </label>
                                            <input type="text" name="image_alt" class="form-control" placeholder="Image Alt" value="{{old('image_alt')}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Meta Title : </label>
                                            <input type="text" name="meta_tag" class="form-control" placeholder="Meta tags" value="{{old('meta_tag')}}">
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Meta Description : </label>
                                            <textarea  name="meta_description" class="form-control" placeholder="Meta Description" >{{old('meta_description')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control show-tick">
                                            <option value="active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                            <option value="inactive" {{old('status') == 'inactive' ? 'selected' : ''}} >Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
@section('styles')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder:"Choose category subcategory.."
            });
        });
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
            var productTitle = $("#productTitle").val();
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
                              html_option +="<option value='"+id+"'>"+title+"</option>"
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
    </script>
@endsection
