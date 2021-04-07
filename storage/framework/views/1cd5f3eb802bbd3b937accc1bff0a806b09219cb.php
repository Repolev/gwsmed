<!-- Shop Pagination Area -->
<?php if($paginator->hasPages()): ?>
    <div class="shop_pagination_area mt-30">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm justify-content-center">
                <?php if($paginator->onFirstPage()): ?>
                    <li class="disabled page-item" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                        <a class="page-link" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"
                           aria-label="<?php echo app('translator')->get('pagination.previous'); ?>"><span aria-hidden="true"><i
                                    class="fa fa-chevron-left text-muted"></i> </span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                <?php endif; ?>



                
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php if(is_string($element)): ?>
                        <li class="disabled" aria-disabled="true"><span><?php echo e($element); ?></span></li>
                    <?php endif; ?>

                    
                    <?php if(is_array($element)): ?>
                        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $paginator->currentPage()): ?>
                                <li class="page-item " aria-current="page">
                                    <a class="page-link active" href="#"><?php echo e($page); ?></a>
                                </li>
                            <?php else: ?>
                                <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($paginator->hasMorePages()): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"
                           aria-label="<?php echo app('translator')->get('pagination.next'); ?>">&rsaquo;</a>
                    </li>
                <?php else: ?>
                    <li class="disabled page-item" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true"><i class="fa fa-chevron-right text-muted"></i></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
<?php endif; ?>
<?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/vendor/pagination/custom.blade.php ENDPATH**/ ?>