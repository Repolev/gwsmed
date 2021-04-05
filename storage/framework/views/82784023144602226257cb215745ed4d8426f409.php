<!-- Javascript -->
<script src="<?php echo e(asset('backend/assets/bundles/libscripts.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/bundles/vendorscripts.bundle.js')); ?>"></script>

<script src="<?php echo e(asset('backend/assets/bundles/jvectormap.bundle.js')); ?>"></script> <!-- JVectorMap Plugin Js -->
<script src="<?php echo e(asset('backend/assets/bundles/morrisscripts.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/bundles/knob.bundle.js')); ?>"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('backend/assets/summernote/summernote.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/bundles/mainscripts.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/pages/ui/sortable-nestable.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/bundles/datatablescripts.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/pages/tables/jquery-datatable.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/vendor/switch-button-bootstrap/src/bootstrap-switch-button.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/index.js')); ?>"></script>


<?php echo $__env->yieldContent('scripts'); ?>

<script>
    setTimeout(function () {
        $('#alert').slideUp();
    },4000);

    $('.dropify').dropify();
</script>
<?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/backend/layouts/footer.blade.php ENDPATH**/ ?>