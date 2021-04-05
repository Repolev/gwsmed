

<?php $__env->startSection('content'); ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Dashboard</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin')); ?>"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">eCommerce</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3><?php echo e(\App\Models\Product::where('status','active')->count()); ?> <i class="icon-basket-loaded float-right"></i></h3>
                            <span>Total Products</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3><?php echo e(\App\Models\Category::where('status','active')->where('is_parent',1)->count()); ?> <i class="icon-organization float-right"></i></h3>
                            <span>Total Category</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-yellow m-b-0">
                            <div class="progress-bar" data-transitiongoal="89"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3><?php echo e(number_format(\App\Models\User::where('status','active')->count())); ?> <i class="icon-user-follow float-right"></i></h3>
                            <span>New Customers</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-purple m-b-0">
                            <div class="progress-bar" data-transitiongoal="67"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3><?php echo e(\App\Models\Order::where('condition','delivered')->count()); ?> <i class=" icon-check text-success float-right"></i></h3>
                            <span>Order Delivered</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                            <div class="progress-bar" data-transitiongoal="68"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Recent Order</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Order no.</th>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Condition</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($item->order_number); ?></td>
                                            <td><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?></td>
                                            <td><?php echo e($item->email); ?></td>
                                            <td><?php echo e($item->phone); ?></td>
                                            <td>
                                                <?php if($item->condition=='pending'): ?>
                                                    <span class="badge badge-primary">
                                                            <?php echo e(ucfirst($item->condition)); ?>

                                                        </span>
                                                <?php elseif($item->condition=='process'): ?>
                                                    <span class="badge badge-info">
                                                            <?php echo e(ucfirst($item->condition)); ?>

                                                        </span>
                                                <?php elseif($item->condition=='delivered'): ?>
                                                    <span class="badge badge-success">
                                                            <?php echo e(ucfirst($item->condition)); ?>

                                                        </span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">
                                                            <?php echo e(ucfirst($item->condition)); ?>

                                                        </span>
                                                <?php endif; ?>

                                            </td>


                                            <td>
                                                <a href="<?php echo e(route('orders.show',$item->id)); ?>" data-toggle="tooltip"
                                                   title="view" class="float-left btn btn-sm btn-outline-primary"
                                                   data-placement="bottom"><i class="fas fa-eye"></i> </a>
                                                <form class="float-left ml-1"
                                                      action="<?php echo e(route('orders.destroy',$item->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <a href="" data-toggle="tooltip" title="delete"
                                                       data-id="<?php echo e($item->id); ?>"
                                                       class="dltBtn btn btn-sm btn-outline-danger"
                                                       data-placement="bottom"><i class="fas fa-trash-alt"></i> </a>
                                                </form>

                                            </td>

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

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/backend/index.blade.php ENDPATH**/ ?>