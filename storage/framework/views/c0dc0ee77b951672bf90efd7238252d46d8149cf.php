













































































































<!-- top header start -->
<div class="cv-top-header" style="background:#ccebfb ">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="cv-head-contact">
                    <h3><i class="fas fa-phone-alt"></i> <?php echo e(\App\Models\Setting::value('phone')); ?>  <i class="pl-4 fas fa-envelope"></i> <?php echo e(\App\Models\Setting::value('email')); ?></h3>
                </div>
            </div>
            <div class="col-md-6">

            </div>
            <div class="col-md-2">
                <div class="cv-head-icon">

                    <ul>
                        <li>
                            <a href="<?php echo e(route('cart')); ?>" class="cv-head-cart">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <g>
                                        <path d="M507.519,116.384C503.721,111.712,498.021,109,492,109H129.736l-1.484-13.632l-0.053-0.438C121.099,40.812,74.583,0,20,0
                                            C8.954,0,0,8.954,0,20s8.954,20,20,20c34.506,0,63.923,25.749,68.512,59.928l23.773,218.401C91.495,327.765,77,348.722,77,373
                                            c0,0.167,0.002,0.334,0.006,0.5C77.002,373.666,77,373.833,77,374c0,33.084,26.916,60,60,60h8.138
                                            c-2.034,5.964-3.138,12.355-3.138,19c0,32.532,26.467,59,59,59s59-26.468,59-59c0-6.645-1.104-13.036-3.138-19h86.277
                                            c-2.034,5.964-3.138,12.355-3.138,19c0,32.532,26.467,59,59,59c32.533,0,59-26.468,59-59c0-32.532-26.467-59-59-59H137
                                            c-11.028,0-20-8.972-20-20c0-0.167-0.002-0.334-0.006-0.5c0.004-0.166,0.006-0.333,0.006-0.5c0-11.028,8.972-20,20-20h255.331
                                            c35.503,0,68.084-21.966,83.006-55.962c4.439-10.114-0.161-21.912-10.275-26.352c-10.114-4.439-21.912,0.161-26.352,10.275
                                            C430.299,300.125,411.661,313,392.331,313h-240.39L134.09,149h333.308l-9.786,46.916c-2.255,10.813,4.682,21.407,15.495,23.662
                                            c1.377,0.288,2.75,0.426,4.104,0.426c9.272,0,17.59-6.484,19.558-15.92l14.809-71C512.808,127.19,511.317,121.056,507.519,116.384
                                            z M399,434c10.477,0,19,8.523,19,19s-8.523,19-19,19s-19-8.523-19-19S388.523,434,399,434z M201,434c10.477,0,19,8.524,19,19
                                            c0,10.477-8.523,19-19,19s-19-8.523-19-19S190.523,434,201,434z"></path>
                                    </g>
                                </svg>
                                <span id="cart_counter"><?php echo e(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()); ?></span>
                            </a>
                        </li>












                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- top header end -->

<div class="cv-top-header" style="height:104px">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="cv-head-contact">
                    <div class="cv-logo">
                        <?php if(\App\Models\Setting::value('logo')): ?>
                            <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('frontend/assets/images/logo.svg')); ?>" alt="image" class="img-fluid"/></a>
                        <?php else: ?>
                            <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(Helper::defaultLogo()); ?>" alt="image" class="img-fluid"/>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col"></div>
            <div class="col-md-6 ">
                <form action="<?php echo e(route('search')); ?>" method="get" class="d-flex">
                    <input type="text" name="query" class="form-control" style="padding-left:30px;border-radius: 30px 0 0 30px;height: 46px;" name="query" id="search_text"
                           placeholder="Search products...">
                    <div class="input-group-append">
                        <button type="submit" style="border-radius:0 30px 30px 0;" class="input-group-text"><i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- main header start -->
<div class="cv-main-header" id="header-sticky">
    <div class="container">
        <div class="row">












            <div class="col-lg-12 col-12">
                <div class="cv-nav-bar text-left">
                    <div class="cv-menu">
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>"><i class="fas fa-home"></i></a>
                        </li>
                        <li><a href="<?php echo e(route('about.us')); ?>">About</a></li>
                        <?php

                            $categories=\App\Models\Category::with('subcategories')->where(['status'=>'active'])->where('on_menu', 1)->latest()->limit(4)->get();

                        ?>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($category->subcategories)>0): ?>
                                <li class="cv-children-menu cv-mega-li"><a href="<?php echo e(route('product.category',$category->slug)); ?>"><?php echo e(ucfirst($category->title)); ?></a>
                                    <div class="cv-mega-menu">
                                        <div class="cm-menu-list">
                                            <ul>

                                                    <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a href="<?php echo e(route('product.subcategory',$subCat->slug)); ?>"><?php echo e(ucfirst($subCat->title)); ?></a></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>

                                    </div>
                                </li>
                            <?php else: ?>
                                <li><a href="<?php echo e(route('product.category',$category->slug)); ?>"><?php echo e(ucfirst($category->title)); ?></a></li>

                            <?php endif; ?>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('blog')); ?>">Blog</a></li>
                        <li><a href="<?php echo e(route('enquiry')); ?>">Enquiry</a></li>
                        <li><a href="<?php echo e(route('contact.us')); ?>">Contact</a></li>
                    </ul>
                    </div>
                    <div class="cv-toggle-nav">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main header end -->
<?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>