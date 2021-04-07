
<?php $__env->startSection('meta_description', $blog->content); ?>
<?php $__env->startSection('meta_title', $blog->title); ?>

<?php $__env->startSection('content'); ?>

    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1><?php echo e(ucfirst($blog->title)); ?></h1>
                        <ul>
                            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li><a href="<?php echo e(route('blog')); ?>">Blogs</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- blog start -->
    <div class="cv-blog-single spacer-top spacer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cv-blog-single-box">
                        <div class="cv-blog-img">
                            <img src="<?php echo e(asset($blog->image_path)); ?>" alt="<?php echo e($blog->title); ?>" class="img-fluid"/>
                        </div>
                        <div class="cv-blog-data">
                            <a href="javascript:;" class="cv-blog-date"><?php echo e(\Carbon\Carbon::parse($blog->created_at)->format('d M Y')); ?></a>
                            <h2 class="cv-blog-title"><?php echo e(ucfirst($blog->title)); ?></h2>
                           <?php echo html_entity_decode($blog->content); ?>

                        </div>
                    </div>

                    <div class="cv-blog-comment">
                        <h2 class="cv-sidebar-title">Comment (<?php echo e(count($blog->comments)); ?>)</h2>
                        <?php if(count($blog->comments) > 0): ?>
                        <ul>
                        <?php $__currentLoopData = $blog->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="cv-comment-box">
                                    <div class="cv-comment-text">
                                        <h3><?php echo e($comment->name); ?></h3>
                                        <a href="javascript:;" class="cv-cmnt-date"><?php echo e(\Carbon\Carbon::parse($comment->created_at)->format('d, M Y')); ?></a>
                                        <p><?php echo e($comment->comment); ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        <?php else: ?>
                            <p>No Comments Yet. Be the first one.</p>
                        <?php endif; ?>
                    </div>
                    <div class="cv-blog-cmnt-reply">
                        <h2 class="cv-sidebar-title">Leave a Comment</h2>
                        <form action="<?php echo e(route('commentBlog', $blog->id)); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="name" placeholder="Enter Your Name"/>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="email" placeholder="Enter Your Email"/>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="website" placeholder="Enter Your Website"/>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="contact" placeholder="Enter Your Contact"/>
                                </div>
                                <div class="col-md-12">
                                    <textarea placeholder="Comment Here" name="comment"></textarea>
                                </div>
                            </div>
                            <button class="cv-btn" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cv-blog-sidebar">
                        <div class="cv-widget cv-product-category">
                            <h2 class="cv-sidebar-title">Recent Post</h2>
                            <?php if(count($blogs)>0): ?>
                            <ul>
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($blog->id!=$item->id): ?>
                                        <li><a href="<?php echo e(route('blog.detail',$item->slug)); ?>"><?php echo e(ucfirst($item->title)); ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog end -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/frontend/pages/blog-single.blade.php ENDPATH**/ ?>