<table>
    <thead>
    <tr>
        <th>Product image</th>
        <th>Product name</th>
        <th>Product Model</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php if(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()>0): ?>
        <?php $__currentLoopData = \Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
        <td>
            <div class="cv-cart-img">
                <?php
                    $photo=explode(',',$item->model->image_path);
                ?>
                <img src="<?php echo e(asset($photo[0])); ?>" alt="<?php echo e($item->name); ?>" class="img-fluid">
            </div>
        </td>
        <td>
            <?php echo e(ucfirst($item->name)); ?>

        </td><td>
            <?php echo e($item->model->model_no); ?>

        </td>
        <td>
            <div class="cv-cart-quantity quantity">
                <button data-id="<?php echo e($item->rowId); ?>" class="cv-sub"></button>
                <input type="number" data-id="<?php echo e($item->rowId); ?>" class="qty-text" id="qty-input-<?php echo e($item->rowId); ?>"  value="<?php echo e($item->qty); ?>" min="1">
                <button data-id="<?php echo e($item->rowId); ?>" class="cv-add"></button>
                <input type="hidden" data-id="<?php echo e($item->rowId); ?>" data-product-quantity="<?php echo e($item->model->stock); ?>" id="update-cart-<?php echo e($item->rowId); ?>">

            </div>
        </td>
                <td><a href="javascript:void(0);" class="cart_delete" data-id="<?php echo e($item->rowId); ?>"><i class="fas fa-trash-alt text-danger"  title="delete"></i> </a></td>
    </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <tr>
            <td colspan="5" class="text-center">No cart found</td>
        </tr>
    <?php endif; ?>

    </tbody>
</table>
<?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/frontend/layouts/_cart-lists.blade.php ENDPATH**/ ?>