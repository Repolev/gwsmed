<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Enquiry</h2>
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin')); ?>"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Enquiry</li>
                        </ul>
                        <p class="float-right">Total Enquiry :<?php echo e(\App\Models\Enquiry::count()); ?></p>
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
                            <h2><strong>Enquiry</strong> Lists</h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($item->full_name); ?></td>
                                            <td><?php echo e($item->email); ?></td>
                                            <td><?php echo e($item->phone); ?></td>
                                            <td><?php echo e($item->country); ?></td>
                                            <td>
                                                <a href="javascript:void(0);"  data-toggle="modal" data-target="#enquiryID<?php echo e($item->id); ?>" title="view"
                                                       data-id="<?php echo e($item->id); ?>"
                                                       class="btn btn-sm btn-outline-success"
                                                       data-placement="bottom"><i class="fas fa-eye"></i> </a>
                                                <form class="float-left ml-1"
                                                      action="<?php echo e(route('enquiry.destroy',$item->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <a href="" data-toggle="tooltip" title="delete"
                                                       data-id="<?php echo e($item->id); ?>"
                                                       class="dltBtn btn btn-sm btn-outline-danger"
                                                       data-placement="bottom"><i class="fas fa-trash-alt"></i> </a>
                                                </form>

                                                  <!-- Modal -->
                                            <div class="modal fade" id="enquiryID<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog   modal-lg" role="document">
                                                    <?php
                                                    $enquiry=\App\Models\Enquiry::where('id',$item->id)->first();
                                                    ?>
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Enquiry</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Full name:</strong>
                                                                    <p><?php echo e(ucfirst($enquiry->full_name)); ?></p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Email:</strong>
                                                                    <p ><?php echo e($enquiry->email); ?></p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Phone:</strong>
                                                                    <p ><?php echo e($enquiry->phone); ?></p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Country:</strong>
                                                                    <p ><?php echo e($enquiry->country); ?></p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Categories:</strong>
                                                                    <p>
                                                                        <ul>

                                                                            <?php if(count($enquiry->categories)>0): ?>
                                                                                <?php $__currentLoopData = $enquiry->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <li><?php echo e(Str::ucfirst($cat->title)); ?></li>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php endif; ?>
                                                                        </ul>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Address:</strong>
                                                                    <p>
                                                                        <?php echo e($enquiry->address); ?>

                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Subject:</strong>
                                                                    <p><?php echo e($enquiry->subject); ?></p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Message:</strong>
                                                                    <p><?php echo e($enquiry->message); ?></p>
                                                                </div>
                                                            </div>



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


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
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
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
            var mode = $(this).prop('checked');
            var id = $(this).val();
            // alert(id);
            $.ajax({
                url: "<?php echo e(route('shipping.status')); ?>",
                type: "POST",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    mode: mode,
                    id: id,
                },
                success: function (response) {
                    if (response.status) {
                        alert(response.msg);
                    } else {
                        alert('Please try again!');
                    }
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/backend/enquiry/index.blade.php ENDPATH**/ ?>