<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Banners</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin')); ?>"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Banners</li>
                            <li class="breadcrumb-item active">Add Banners</li>
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
                            <form action="<?php echo e(route('banner.store')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Banner Heading</label>
                                            <input type="text" class="form-control" placeholder="Heading" name="title" value="<?php echo e(old('title')); ?>">
                                        </div>


                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">URL</label>
                                            <input type="text" class="form-control" placeholder="URL" name="slug" value="<?php echo e(old('slug')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Photo <span class="text-danger">*</span></label>
                                            <input type="file" name="photo" class="dropify" id="input-file-now" data-height="100" data-default-file="<?php echo e(old('photo')); ?>">
                                        </div>
                                    </div>

























                                    <div class="col-lg-12 col-sm-12" >
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control show-tick">
                                            <option value="active" <?php echo e(old('status')=='active' ? 'selected' : ''); ?>>Active</option>
                                            <option value="inactive" <?php echo e(old('status') == 'inactive' ? 'selected' : ''); ?> >Inactive</option>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/backend/banners/create.blade.php ENDPATH**/ ?>