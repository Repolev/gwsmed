













































































































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
        </div>
    </div>
</div>
<!-- top header end -->

<div class="cv-top-header" style="height:90px">
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
                    <input type="text" name="query" class="form-control" style="border-radius: 2px 0 0 2px;" name="query" id="search_text"
                           placeholder="Search products...">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i>
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
                        <li><a href="<?php echo e(route('home')); ?>">Home</a>
                        </li>
                        <li><a href="<?php echo e(route('about.us')); ?>">About</a></li>

                        <li class="cv-children-menu cv-mega-li"><a href="javascript:;">Products</a>
                            <div class="cv-mega-menu">
                                <?php

                                    $categories=\App\Models\Category::with('subcategories')->where(['status'=>'active'])->where('on_menu', 1)->latest()->limit(4)->get();

                                ?>

                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="cm-menu-list">
                                        <ul>
                                            <li>
                                                <a href="<?php echo e(route('product.category',$category->slug)); ?>"><h3><?php echo e(ucfirst($category->title)); ?></h3></a>
                                            </li>

                                            <?php if(count($category->subcategories)>0): ?>
                                                <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(route('product.subcategory',[$category->slug,$subCat->slug])); ?>"><?php echo e(ucfirst($subCat->title)); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </li>
                        <li><a href="<?php echo e(route('blog')); ?>">Blog</a></li>
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