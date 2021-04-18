@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Catalog</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Catalogs</li>
                            <li class="breadcrumb-item active">Add Catalog</li>
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
                                            <label for="">Catalog <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Catalog Name" name="name" value="{{ old('name') }}" id="productTitle">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                        <label for="">Catalog URL<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="catalog-slug" name="slug" value="{{ old('slug') }}" id="productSlug">
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="">Category</label>
                                        <select id="categoryId" name="category_id[]" class="form-control select2  show-tick" multiple>
                                            @foreach($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Photo</label>
                                            <input type="file" name="photo" class="dropify" data-height="150" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Catalog PDF</small><span class="text-danger">*</span></label>
                                            <input type="file" accept="application/pdf" name="pdf_file">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control show-tick">
                                            <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
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
