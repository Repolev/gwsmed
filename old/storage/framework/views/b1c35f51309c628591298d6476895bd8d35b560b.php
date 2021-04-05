<!-- Meta Tag -->
<?php echo $__env->yieldContent('meta'); ?>
<!-- Title Tag  -->
<title><?php echo $__env->yieldContent('title'); ?></title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/font.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/swiper.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
	
    <link rel="shortcut icon" href="<?php echo e(asset('frontend/images/fav.png')); ?>" type="image/x-icon">


<?php echo $__env->yieldPushContent('styles'); ?>
<?php /**PATH /home/gwsmedco/email.gwsmed.com.gwsmed.com/resources/views/frontend/layouts/head.blade.php ENDPATH**/ ?>