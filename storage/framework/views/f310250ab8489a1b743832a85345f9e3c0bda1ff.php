<!DOCTYPE html>
<html lang="en">

<head>
   <?php echo $__env->make('frontend.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo toastr_css(); ?>
</head>

<body>

    <?php
        use App\Models\Setting;$settings=Setting::first();
    ?>

    <!-- preloader start -->
    <div class="cv-ellipsis">
        <div class="cv-preloader">
            <div></div>
        </div>
    </div>
    <!-- preloader end -->
    <!-- main wrapper start -->
    <div class="cv-main-wrapper">

        <div id="header">
            <?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <?php echo $__env->yieldContent('content'); ?>

        <!-- testimonial start -->
        <?php
            $reviews=\App\Models\Review::where(['status'=>'active'])->orderBy('id','DESC')->limit('5')->get();
        ?>
        <?php if(count($reviews)>0): ?>
            <div class="cv-testimonial spacer-top-less">
                <div class="container">
                    <div class="cv-heading">
                        <h1>Customer review</h1>
                    </div>
                    <div class="row">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <div class="cv-testi-box">
                                            <div class="cv-testi-data">
                                                <p><?php echo html_entity_decode($review->review); ?></p>
                                            </div>
                                            <div class="cv-testi-footer">
                                                <div class="cv-testi-img">
                                                    <img src="https://via.placeholder.com/100x100" alt="image" class="img-fluid"/>
                                                </div>
                                                <div class="cv-testi-name">
                                                    <?php
                                                        $rate = ceil($review->rate);
                                                    ?>
                                                    <?php for($i = 0; $i < 5; $i++): ?>
                                                        <?php if($i < $rate): ?>
                                                            <i class="fas fa-star text-warning"></i>
                                                        <?php else: ?>
                                                            <i class="far fa-star text-warning"></i>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                    <h1><?php echo e(ucfirst($review->name)); ?></h1>
                                                    <p><?php echo e(ucfirst($review->address)); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="cv-arrow">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- testimonial end -->
        <!-- footer start -->
        <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- footer end -->

    </div>

    <?php echo $__env->make('frontend.layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo toastr_js(); ?>
    <?php echo app('toastr')->render(); ?>
</body>

</html>
<?php /**PATH /home/gwsmedco/gws.gwsmed.com/resources/views/frontend/layouts/master.blade.php ENDPATH**/ ?>