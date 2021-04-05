<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Banners
                            <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('banner.create')); ?>"><i class="icon-plus"></i> Add Banner</a></h2>
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin')); ?>"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Banner</li>
                        </ul>
                        <p class="float-right">Total Banners :<?php echo e(\App\Models\Banner::count()); ?></p>
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
                            <h2><strong>Banner</strong> List</h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e(ucfirst($item->title)); ?></td>
                                            <td><?php echo html_entity_decode($item->description); ?></td>
                                            <td><img src="<?php echo e(asset($item->image_path)); ?>" alt="banner image" style="max-height: 190px; max-width: 120px"></td>
                                          
                                            <td>
                                                <input type="checkbox" name="toogle" value="<?php echo e($item->id); ?>" data-toggle="switchbutton" <?php echo e($item->status=='active' ? 'checked' : ''); ?> data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('banner.edit',$item->id)); ?>" data-toggle="tooltip" title="edit" class="float-left btn btn-sm btn-outline-warning" data-placement="bottom"><i class="fas fa-edit"></i> </a>
                                                <form class="float-left ml-1" action="<?php echo e(route('banner.destroy',$item->id)); ?>"  method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <a href="" data-toggle="tooltip" title="delete" data-id="<?php echo e($item->id); ?>" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fas fa-trash-alt"></i> </a>
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
                url:"<?php echo e(route('banner.status')); ?>",
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

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/backend/banners/index.blade.php ENDPATH**/ ?>