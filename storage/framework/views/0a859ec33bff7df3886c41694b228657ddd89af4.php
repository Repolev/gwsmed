<?php $__env->startSection('content'); ?>

    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>Blog</h1>
                        <ul>
                            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- blog start -->
    <div class="cv-blog-page spacer-top spacer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cv-blog-page-box">
                        <div class="row">
                            <?php if(count($blogs)>0): ?>
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4">
                                        <div class="cv-blog-box">
                                            <div class="cv-blog-img">
                                                <img src="<?php echo e(asset($blog->image_path)); ?>" alt="<?php echo e($blog->title); ?>" class="img-fluid"/>
                                            </div>
                                            <div class="cv-blog-data">
                                                <a href="javascript:;" class="cv-blog-date"><?php echo e(\Carbon\Carbon::parse($blog->created_at)->format('d M Y')); ?></a>
                                                <a href="<?php echo e(route('blog.detail',$blog->slug)); ?>" class="cv-blog-title"><?php echo e(ucfirst($blog->title)); ?></a>

















                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <p class="text-center">No blog found</p>
                            <?php endif; ?>

                            <div class="col-md-12">
                                <?php echo e($blogs->links('vendor.pagination.custom')); ?>











                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog end -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gwsmedco/gws.gwsmed.com/resources/views/frontend/pages/blog.blade.php ENDPATH**/ ?>