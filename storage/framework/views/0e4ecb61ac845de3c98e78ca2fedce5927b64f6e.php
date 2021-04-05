<title><?php echo e(ucfirst(\App\Models\Setting::value('title'))); ?> || Dashboard</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<?php
    $settings=\App\Models\Setting::first();
?>
<?php if($settings->google_tag_manager): ?>
<?php echo $settings->google_tag_manager; ?>

<?php endif; ?>
<?php if($settings->google_analytics): ?>
<?php echo $settings->google_analytics; ?>

<?php endif; ?>
<?php if($settings->favicon): ?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('storage/frontend/images/settings/'.$settings->favicon)); ?>">
<?php else: ?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset(Helper::defaultFavicon())); ?>">
<?php endif; ?>
<!-- VENDOR CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
<link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendor/fontawesome-free/css/fontawesome-all.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendor/morrisjs/morris.min.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendor/switch-button-bootstrap/css/bootstrap-switch-button.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('backend/assets/summernote/summernote.css')); ?>">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" /><!-- MAIN CSS -->
<link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/main.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/color_skins.css')); ?>">
<style>
    .icon-menu:before{display:none !important}
</style>

<?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/backend/layouts/head.blade.php ENDPATH**/ ?>