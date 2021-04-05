<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Banners</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin')); ?>"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Banners</li>
                            <li class="breadcrumb-item active">Edit Banners</li>
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
                            <form action="<?php echo e(route('banner.update',$banner->id)); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Banner Heading <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Banner heading" name="title" value="<?php echo e($banner->title); ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Photo <span class="text-danger">*</span></label>
                                            <input type="file" name="photo" class="dropify" id="input-file-now" data-height="100" data-default-file="<?php echo e(asset($banner->image_path)); ?>" value="<?php echo e(asset($banner->image_path)); ?>">
                                        </div>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/backend/banners/edit.blade.php ENDPATH**/ ?>