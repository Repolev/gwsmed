<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{asset('backend/assets/images/user.png')}}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="user-name" ><strong>{{Auth('admin')->user()->name}}</strong></a>

            </div>
        </div>

        <nav class="sidebar-nav">
            <ul class="main-menu metismenu">
                <li class="{{(\Illuminate\Support\Facades\Request::is('admin')==1) ? 'active' : ''}}"><a href="{{route('admin')}}"><i class="icon-grid"></i><span>Dashboard</span></a></li>
                <li class="{{(\Illuminate\Support\Facades\Request::is('admin/banner*')==1) ? 'active' : ''}}"><a href="javascript:void(0);" class="has-arrow"><i class="icon-picture"></i><span>Banner Management</span> </a>
                    <ul>
                        <li><a href="{{route('banner.index')}}">All Banners</a></li>
                        <li><a href="{{route('banner.create')}}">Add Banner</a></li>
                    </ul>
                </li>
                <li class="{{(\Illuminate\Support\Facades\Request::is('admin/category*')==1) ? 'active' : ''}}"><a href="javascript:void(0);" class="has-arrow"><i class="icon-organization"></i><span>Category Management</span> </a>
                    <ul>
                        <li><a href="{{route('category.index')}}">All Category</a></li>
                        <li><a href="{{route('category.create')}}">Add Category</a></li>
                    </ul>
                </li>
{{--                <li class="{{(\Illuminate\Support\Facades\Request::is('admin/brand*')==1) ? 'active' : ''}}"><a href="javascript:void(0);" class="has-arrow"><i class="icon-handbag"></i><span>Brand Management</span> </a>--}}
{{--                    <ul>--}}
{{--                        <li><a href="{{route('brand.index')}}">All Brand</a></li>--}}
{{--                        <li><a href="{{route('brand.create')}}">Add Brand</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="{{(\Illuminate\Support\Facades\Request::is('admin/display*')==1) ? 'active' : ''}}"><a href="javascript:void(0);" class="has-arrow"><i class="icon-list"></i><span>Home Page Menu</span> </a>--}}
{{--                    <ul>--}}
{{--                        <li><a href="{{route('display.index')}}">All Home Page Menu</a></li>--}}
{{--                        <li><a href="{{route('display.create')}}">Add Home Page Menu</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <li class="{{(\Illuminate\Support\Facades\Request::is('admin/product*')==1) ? 'active' : ''}}"><a href="javascript:void(0);" class="has-arrow"><i class="icon-briefcase"></i><span>Products Management</span> </a>
                    <ul>
                        <li><a href="{{route('product.index')}}">All Products</a></li>
                        <li><a href="{{route('product.create')}}">Add Product</a></li>
                    </ul>
                </li>

                {{-- <li class="{{(\Illuminate\Support\Facades\Request::is('admin/shipping*')==1) ? 'active' : ''}}"><a href="javascript:void(0);" class="has-arrow"><i class="fas fa-truck"></i><span>Shipping Management</span> </a>
                    <ul>
                        <li><a href="{{route('shipping.index')}}">All Shippings</a></li>
                        <li><a href="{{route('shipping.create')}}">Add Shipping</a></li>
                    </ul>
                </li> --}}
                <li class="{{(\Illuminate\Support\Facades\Request::is('admin/orders*')==1) ? 'active' : ''}}"><a href="{{route('orders.index')}}"><i class="icon-layers"></i>Bulk Enquiry Cart</a></li>
                <li class="{{(\Illuminate\Support\Facades\Request::is('admin/blogs*')==1) ? 'active' : ''}}"><a href="javascript:void(0);" class="has-arrow"><i class="icon-picture"></i><span>Blog Management</span> </a>
                    <ul>
                        <li><a href="{{route('blogs.index')}}">All Blogs</a></li>
                        <li><a href="{{route('blogs.create')}}">Add Blogs</a></li>
                    </ul>
                </li>

                <li class="{{(\Illuminate\Support\Facades\Request::is('reviews*')==1) ? 'active' : ''}}"><a href="{{route('reviews.index')}}"><i class="icon-star"></i>Review Management</a></li>

                <li class="{{(\Illuminate\Support\Facades\Request::is('comments*')==1) ? 'active' : ''}}"><a href="{{route('comments.index')}}"><i class="fas fa-comment-alt"></i>Comment Management</a></li>
                <!--<li class="{{(\Illuminate\Support\Facades\Request::is('enquiry*')==1) ? 'active' : ''}}"><a href="{{route('enquiry.index')}}"><i class="fas fa-question-circle"></i>Enquiry Management</a></li>-->

{{--                <li class="{{(\Illuminate\Support\Facades\Request::is('admin/coupon*')==1) ? 'active' : ''}}"><a href="javascript:void(0);" class="has-arrow"><i class="fas fa-comment-alt"></i><span>Comment Management</span> </a>--}}
{{--                    <ul>--}}
{{--                        <li><a href="{{route('coupon.index')}}">All Comment</a></li>--}}
{{--                        <li><a href="{{route('coupon.create')}}">Add Coupon</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <!--<li><a href="javascript:void(0);" class="has-arrow"><i class="icon-people"></i><span>User Management</span> </a>-->
                <!--    <ul>-->
                <!--        <li><a href="{{route('user.index')}}">All Users</a></li>-->
                <!--        <li><a href="{{route('user.create')}}">Add Users</a></li>-->
                <!--    </ul>-->
                <!--</li>-->
                <li><a href="{{route('settings')}}"><i class="icon-settings"></i>Settings</a></li>
            </ul>
        </nav>
    </div>
</div>
