<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="<?php echo e(asset('backend/assets/images/user.png')); ?>" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="user-name" ><strong><?php echo e(Auth('admin')->user()->name); ?></strong></a>

            </div>
        </div>

        <nav class="sidebar-nav">
            <ul class="main-menu metismenu">
                <li class="<?php echo e((\Illuminate\Support\Facades\Request::is('admin')==1) ? 'active' : ''); ?>"><a href="<?php echo e(route('admin')); ?>"><i class="icon-grid"></i><span>Dashboard</span></a></li>
                <li class="<?php echo e((\Illuminate\Support\Facades\Request::is('admin/banner*')==1) ? 'active' : ''); ?>"><a href="javascript:void(0);" class="has-arrow"><i class="icon-picture"></i><span>Banner Management</span> </a>
                    <ul>
                        <li><a href="<?php echo e(route('banner.index')); ?>">All Banners</a></li>
                        <li><a href="<?php echo e(route('banner.create')); ?>">Add Banner</a></li>
                    </ul>
                </li>
                <li class="<?php echo e((\Illuminate\Support\Facades\Request::is('admin/category*')==1) ? 'active' : ''); ?>"><a href="javascript:void(0);" class="has-arrow"><i class="icon-organization"></i><span>Category Management</span> </a>
                    <ul>
                        <li><a href="<?php echo e(route('category.index')); ?>">All Category</a></li>
                        <li><a href="<?php echo e(route('category.create')); ?>">Add Category</a></li>
                    </ul>
                </li>












                <li class="<?php echo e((\Illuminate\Support\Facades\Request::is('admin/product*')==1) ? 'active' : ''); ?>"><a href="javascript:void(0);" class="has-arrow"><i class="icon-briefcase"></i><span>Products Management</span> </a>
                    <ul>
                        <li><a href="<?php echo e(route('product.index')); ?>">All Products</a></li>
                        <li><a href="<?php echo e(route('product.create')); ?>">Add Product</a></li>
                    </ul>
                </li>

                
                <li class="<?php echo e((\Illuminate\Support\Facades\Request::is('admin/orders*')==1) ? 'active' : ''); ?>"><a href="<?php echo e(route('orders.index')); ?>"><i class="icon-layers"></i>Order Management</a></li>
                <li class="<?php echo e((\Illuminate\Support\Facades\Request::is('admin/blogs*')==1) ? 'active' : ''); ?>"><a href="javascript:void(0);" class="has-arrow"><i class="icon-picture"></i><span>Blog Management</span> </a>
                    <ul>
                        <li><a href="<?php echo e(route('blogs.index')); ?>">All Blogs</a></li>
                        <li><a href="<?php echo e(route('blogs.create')); ?>">Add Blogs</a></li>
                    </ul>
                </li>

                <li class="<?php echo e((\Illuminate\Support\Facades\Request::is('reviews*')==1) ? 'active' : ''); ?>"><a href="<?php echo e(route('reviews.index')); ?>"><i class="icon-star"></i>Review Management</a></li>

                <li class="<?php echo e((\Illuminate\Support\Facades\Request::is('comments*')==1) ? 'active' : ''); ?>"><a href="<?php echo e(route('comments.index')); ?>"><i class="fas fa-comment-alt"></i>Comment Management</a></li>
                <li class="<?php echo e((\Illuminate\Support\Facades\Request::is('enquiry*')==1) ? 'active' : ''); ?>"><a href="<?php echo e(route('enquiry.index')); ?>"><i class="fas fa-question-circle"></i>Enquiry Management</a></li>







                <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-people"></i><span>User Management</span> </a>
                    <ul>
                        <li><a href="<?php echo e(route('user.index')); ?>">All Users</a></li>
                        <li><a href="<?php echo e(route('user.create')); ?>">Add Users</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo e(route('settings')); ?>"><i class="icon-settings"></i>Settings</a></li>
            </ul>
        </nav>
    </div>
</div>
<?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/backend/layouts/sidebar.blade.php ENDPATH**/ ?>