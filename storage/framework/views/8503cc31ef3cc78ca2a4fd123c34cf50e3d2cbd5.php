
<?php if(session('success')): ?>
<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
    <?php echo e(session('success')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php elseif(session('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
        <?php echo e(session('error')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php /**PATH /home/gwsmedco/gws.gwsmed.com/resources/views/backend/layouts/notification.blade.php ENDPATH**/ ?>