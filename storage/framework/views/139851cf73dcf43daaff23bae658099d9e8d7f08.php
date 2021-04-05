<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>General Settings</h2>
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin')); ?>"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">General Settings</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <?php echo $__env->make('backend.layouts.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>General</strong> Settings</h2>

                        </div>
                        <div class="body">
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
                                            <form action="<?php echo e(route('settings.update',$setting->id)); ?>" method="post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('patch'); ?>
                                                <div class="row clearfix">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Title <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo e($setting->title); ?>">
                                                        </div>


                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">URL</label>
                                                            <input type="text" class="form-control" placeholder="URL" name="url" value="<?php echo e($setting->url); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Logo</label>
                                                            <input type="file" name="logo" class="dropify" id="input-file-now" data-height="80" data-default-file="<?php echo e(asset('storage/frontend/images/settings/'.$setting->logo)); ?>" value="<?php echo e(asset('storage/frontend/images/settings/'.$setting->logo)); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Favicon</label>
                                                            <input type="file" name="favicon" class="dropify" id="input-file-now" data-height="80" data-default-file="<?php echo e(asset('storage/frontend/images/settings/'.$setting->favicon)); ?>" value="<?php echo e(asset('storage/frontend/images/settings/'.$setting->favicon)); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">About</label>
                                                            <textarea  id="description" class="description form-control" placeholder="Write some text..." name="about"><?php echo e($setting->about); ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" class="form-control" placeholder="Email address" name="email" value="<?php echo e($setting->email); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Phone</label>
                                                            <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="<?php echo e($setting->phone); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Address</label>
                                                            <input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo e($setting->address); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Footer</label>
                                                            <input type="text" class="form-control" placeholder="Footer text" name="footer" value="<?php echo e($setting->footer); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Open Time</label>
                                                            <input type="text" class="form-control" placeholder="eg. 9am - 10am" name="office_time" value="<?php echo e($setting->office_time); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Short Introduction</label>
                                                            <textarea  class="form-control" placeholder="Short introduction about company" name="short_intro" ><?php echo e($setting->short_intro); ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="googleTagManager">Google Tag Manager</label>
                                                            <textarea  class="form-control" placeholder="Google Tag Manager" name="google_tag_manager" ><?php echo e($setting->google_tag_manager); ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="googleAnalytics">Google Analytics</label>
                                                            <textarea  class="form-control" placeholder="Google Analytics" name="google_analytics" ><?php echo e($setting->google_analytics); ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label >Facebook</label>
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">https://facebook.com/</div>
                                                                </div>
                                                                <input type="text" name="facebook" value="<?php echo e($setting->facebook); ?>" class="form-control" id="inlineFormInputGroup" placeholder="page name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label >Instagram</label>
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">https://instagram.com/</div>
                                                                </div>
                                                                <input type="text" name="instagram" value="<?php echo e($setting->instagram); ?>" class="form-control" id="inlineFormInputGroup" placeholder="page name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label >Twitter</label>
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">https://twitter.com/</div>
                                                                </div>
                                                                <input type="text" name="twitter" value="<?php echo e($setting->twitter); ?>" class="form-control" id="inlineFormInputGroup" placeholder="page name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label >Google</label>
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">https://google.com/</div>
                                                                </div>
                                                                <input type="text" name="google" value="<?php echo e($setting->google); ?>" class="form-control" id="inlineFormInputGroup" placeholder="page name">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <button type="submit" class="btn btn-success">Update Changes</button>
                                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gwsmedco/gws.gwsmed.com/resources/views/backend/setting/index.blade.php ENDPATH**/ ?>