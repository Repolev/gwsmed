
<!doctype html>
<html lang="en">

<head>
    <?php echo $__env->make('backend.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="theme-blue">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="<?php echo e(asset('backend/assets/images/loader.gif')); ?>" width="48" height="48" alt="Lucid"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper">

    <?php echo $__env->make('backend.layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('backend.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <?php echo $__env->yieldContent('content'); ?>



</div>

    <?php echo $__env->make('backend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/backend/layouts/master.blade.php ENDPATH**/ ?>