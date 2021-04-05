<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
        </div>

        <div class="navbar-brand p-1" style="margin:auto">
            <a href="<?php echo e(route('admin')); ?>">
                <?php if(\App\Models\Setting::value('logo')): ?>
                    <img src="<?php echo e(asset('storage/frontend/images/settings/'.\App\Models\Setting::value('logo'))); ?>" alt="Gwsmed Logo" class="img-responsive logo"></a>
                <?php else: ?>
                    <img src="<?php echo e(asset(Helper::defaultLogo())); ?>" alt="Gwsmed Logo" class="img-responsive logo"></a>
                <?php endif; ?>

        </div>

        <div class="navbar-right">
            <form id="navbar-search" class="navbar-form search-form">
                <input value="" class="form-control" placeholder="Search here..." type="text">
                <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
            </form>

            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo e(route('home')); ?>" target="_blank" class="icon-menu d-none d-sm-block d-md-none d-lg-block" data-toggle="tooltip" data-title="Home" data-placement="bottom"><i class="icon-home"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="<?php echo e(route('settings')); ?>" class=" icon-menu" ><i class="icon-settings"></i></a>
                    </li>
                    <li>
                        <a class="dropdown-item icon-menu" href="<?php echo e(route('admin.logout')); ?>"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="icon-login"></i>
                        </a>

                        <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/backend/layouts/nav.blade.php ENDPATH**/ ?>