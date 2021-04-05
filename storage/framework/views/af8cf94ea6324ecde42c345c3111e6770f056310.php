<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Products
                            <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('product.create')); ?>"><i class="icon-plus"></i> Add Product</a></h2>
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin')); ?>"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ul>
                        <p class="float-right">Total Products :<?php echo e(\App\Models\Product::count()); ?></p>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <?php echo $__env->make('backend.layouts.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Product</strong> List</h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title</th>
                                        <th>Photo</th>
                                        <th>Quantity</th>
                                        <th>Categories</th>
                                        <th>Tags</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $photo=explode(',',$item->image_path);
                                        ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e(ucfirst($item->title)); ?></td>
                                            <td><img src="<?php echo e(asset($photo[0])); ?>" alt="Product image" style="max-height: 90px; max-width: 120px"></td>
                                            <td><?php echo e($item->stock); ?></td>
                                            <td><?php $__currentLoopData = $item->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($category->title); ?> | <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                            <td>
                                                <?php if($item->tags=='new'): ?>
                                                    <span class="badge badge-success"><?php echo e($item->tags); ?></span>
                                                <?php elseif($item->tags=='sell'): ?>
                                                    <span class="badge badge-warning"><?php echo e($item->tags); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-primary"><?php echo e($item->tags); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="toogle" value="<?php echo e($item->id); ?>" data-toggle="switchbutton" <?php echo e($item->status=='active' ? 'checked' : ''); ?> data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>

                                                <a href="javascript:void(0);"  data-toggle="modal" data-target="#productID<?php echo e($item->id); ?>" data-toggle="tooltip" title="view" class="mr-1 float-left btn btn-sm btn-outline-info" data-placement="bottom"><i class="fas fa-eye"></i> </a>
                                                <a href="<?php echo e(route('product.edit',$item->id)); ?>" data-toggle="tooltip" title="edit" class="float-left btn btn-sm btn-outline-warning" data-placement="bottom"><i class="fas fa-edit"></i> </a>
                                                <form class="float-left ml-1" action="<?php echo e(route('product.destroy',$item->id)); ?>"  method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <a href="" data-toggle="tooltip" title="delete" data-id="<?php echo e($item->id); ?>" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fas fa-trash-alt"></i> </a>
                                                </form>

                                            </td>


                                        <!-- Modal -->
                                            <div class="modal fade" id="productID<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                                                    <?php
                                                    $product=\App\Models\Product::where('id',$item->id)->first();
                                                    ?>
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(\Illuminate\Support\Str::upper($product->title)); ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <strong>Main Images :</strong>
                                                                    <?php $__currentLoopData = $photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <img src="<?php echo e(asset($photos)); ?>" class="img-fluid">
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Price:</strong>
                                                                    <p>$<?php echo e(number_format($product->price,2)); ?></p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Offer Price:</strong>
                                                                    <p>$<?php echo e(number_format($product->offer_price,2)); ?></p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Stock:</strong>
                                                                    <p><?php echo e($product->stock); ?></p>
                                                                </div>
                                                            </div>
                                                            <?php if($product->variants): ?>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <strong>Variant Images :</strong>
                                                                    <?php
                                                                        $variants=explode(',',$product->variants_path);
                                                                    ?>
                                                                    <?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <img src="<?php echo e(asset($photo)); ?>" class="img-fluid">
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            </div>
                                                            <?php endif; ?>

                                                            

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Brand:</strong>
                                                                    <p><?php echo e(ucfirst(\App\Models\Brand::where('id',$product->brand_id)->value('title'))); ?></p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Size:</strong>
                                                                    <p class="badge badge-success"><?php echo e($product->size); ?></p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Vendor:</strong>
                                                                    <p ><?php echo e(\App\Models\User::where('id',$product->vendor_id)->value('full_name')); ?></p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Today's Deal:</strong>
                                                                    <p>
                                                                        <input type="checkbox" name="deal" value="<?php echo e($item->id); ?>"  data-toggle="switchbutton" <?php echo e($product->todays_deal==1 ? 'checked' : ''); ?> data-size="sm">
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Tag:</strong>
                                                                    <div class="badge badge-success"><?php echo e($product->tags); ?></div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Status:</strong>
                                                                    <div class="badge badge-warning"><?php echo e($product->status); ?></div>
                                                                </div>
                                                            </div>

                                                            <strong>Summary:</strong>
                                                            <p><?php echo html_entity_decode($product->summary); ?></p>
                                                            <strong>Description:</strong>
                                                            <p><?php echo html_entity_decode($product->description); ?></p>
                                                            <strong>Specification:</strong>
                                                            <p><?php echo html_entity_decode($product->specification); ?></p>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function (e) {
            var form=$(this).closest('form');
            var dataID=$(this).data('id');
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });

        });
    </script>
    
    <script>
        $('input[name=toogle]').change(function () {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            // alert(id);
            $.ajax({
                url:"<?php echo e(route('product.status')); ?>",
                type:"POST",
                data:{
                    _token:'<?php echo e(csrf_token()); ?>',
                    mode:mode,
                    id:id,
                },
                success:function (response) {
                    if(response.status){
                        alert(response.msg);
                    }
                    else{
                        alert('Please try again!');
                    }
                }
            })
        });
    </script>

    
    <script>
        $('input[name=deal]').change(function () {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            $.ajax({
                url:"<?php echo e(route('todays.deal')); ?>",
                type:"POST",
                data:{
                    _token:'<?php echo e(csrf_token()); ?>',
                    mode:mode,
                    id:id,
                },
                success:function (response) {
                    if(response.status){
                        alert(response.msg);
                    }
                    else{
                        alert('Please try again!');
                    }
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gwsmedco/gws.gwsmed.com/resources/views/backend/product/index.blade.php ENDPATH**/ ?>