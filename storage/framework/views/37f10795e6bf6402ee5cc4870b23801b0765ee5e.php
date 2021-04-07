

<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Product</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin')); ?>"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Products</li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <?php if($errors->any()): ?>
                       <div class="alert alert-danger">
                           <ul>
                               <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <li><?php echo e($error); ?></li>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                       </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form action="<?php echo e(route('product.store')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Product name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Product name" name="title" value="<?php echo e(old('title')); ?>" id="productTitle">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                        <label for="">Product URL<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="blog-slug" name="slug" value="<?php echo e(old('slug')); ?>" id="productSlug">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Model no. <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Model number" name="model_no" value="<?php echo e(old('model_no')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Summary <span class="text-danger">*</span></label>
                                            <textarea id="summary" class="form-control" placeholder="Some text..." name="summary" ><?php echo e(old('summary')); ?></textarea>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea id="description" class="form-control description" placeholder="Write some text..." name="description"><?php echo e(old('description')); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Quantity <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="eg. 10" name="stock" value="<?php echo e(old('stock')); ?>">
                                        </div>
                                    </div>















                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Photo <small>multiple image support</small><span class="text-danger">*</span></label>
                                            <input type="file" class="dropify" name="photo[]" data-height="150" multiple>
                                        </div>
                                    </div>

















                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="">Category</label>
                                        <select id="categoryId" name="category_id[]" class="form-control show-tick" multiple>
                                            <option value="">-- Category --</option>
                                            <?php $__currentLoopData = \App\Models\Category::orderBy('title','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($cat->id); ?>" <?php echo e(old('cat_id')==$cat->id? 'selected ' : ''); ?>><?php echo e(ucfirst($cat->title)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 d-none" id="child_cat_div">
                                        <label for="">Child Category</label>
                                        <select id="chil_cat_id" name="child_cat_id" class="form-control show-tick">
                                        </select>
                                    </div>









                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="">Tags</label>
                                        <select name="tags" class="form-control show-tick">
                                            <option value="">-- Tags --</option>
                                            <option value="">Default</option>
                                            <option value="new" <?php echo e(old('tags')=='new' ? 'selected' : ''); ?>>New</option>
                                            <option value="hot" <?php echo e(old('tags') == 'hot' ? 'selected' : ''); ?> >Hot</option>
                                            <option value="sale" <?php echo e(old('tags') == 'sale' ? 'selected' : ''); ?> >Sale</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Is Featured : </label>
                                            <input type="checkbox" name="is_featured" value="1" data-toggle="switchbutton"  data-size="sm">

                                        </div>
                                    </div>








                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Meta Tags : </label>
                                            <input type="text" name="meta_tag" class="form-control" placeholder="Meta tags" value="<?php echo e(old('meta_tag')); ?>">
                                            
                                        </div>
                                    </div>



                                    <div class="col-lg-12 col-sm-12">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control show-tick">
                                            <option value="">-- Status --</option>
                                            <option value="active" <?php echo e(old('status')=='active' ? 'selected' : ''); ?>>Active</option>
                                            <option value="inactive" <?php echo e(old('status') == 'inactive' ? 'selected' : ''); ?> >Inactive</option>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
                      _token:"<?php echo e(csrf_token()); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/backend/product/create.blade.php ENDPATH**/ ?>