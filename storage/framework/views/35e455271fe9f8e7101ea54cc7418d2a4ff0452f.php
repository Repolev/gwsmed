

<?php $__env->startSection('content'); ?>
    <!-- banner start -->
    <div class="cv-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item"><img src="<?php echo e(asset($banner->image_path)); ?>" alt="Home Banner"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    

    <div class="cv-feature">
        <div class="container">
            <div class="cv-heading">
                <h1>About Us</h1>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-md-10 text-center">
                    <p>GWS Surgicals one of the Leading Indian exporter manufacturing company Known in the Field of Medical Devices covering varied range of Ophthalmic Instruments, Orthopaedic Implants & General Medical Devices. Dedicating four decades in manufacturing & distributing of high-quality products in the sphere of health care, GWS has established its global presence and is accepted in more than 50 countries worldwide.</p>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>


    <div class="cv-feature  ">
        <div class="container">
            <div class="cv-heading">
                <h1>Features</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="cv-feature-box">
                        <div class="cv-feature-img">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="cv-feature-text">
                            <h3>Global Presence</h3>
                            <p>Fastest growing medical equipments company, exporting to more than 50 countries.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cv-feature-box">
                        <div class="cv-feature-img">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="cv-feature-text">
                            <h3>Customer Service</h3>
                            <p>Customer service excellence has always been one of the prime aspect of our organization.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cv-feature-box">
                        <div class="cv-feature-img">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="cv-feature-text">
                            <h3>Quality & Certification</h3>
                            <p>Premium quality products at highly affordable prices and internationally certified.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured products start -->
    <?php if(count($featured_products)>0): ?>
        <div class="cv-arrival cv-product-three cv-product-slider">
            <div class="container">
                <div class="cv-heading">
                    <h1>Featured Products</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="swiper-slide">
                                    <div class="cv-product-box">
                                        <div class="cv-product-img">
                                            <?php
                                            $photos=explode(',',$item->image_path);

                                            ?>
                                            <img src="<?php echo e(asset($photos[0])); ?>" alt="<?php echo e($item->title); ?>" class="img-fluid"/>
                                            <div class="cv-product-button">
                                                <a href="<?php echo e(route('product.detail',$item->slug)); ?>" class="cv-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 461.312 461.312">
                                                        <g>
                                                            <path d="M230.656,156.416c-40.96,0-74.24,33.28-74.24,74.24s33.28,74.24,74.24,74.24s74.24-33.28,74.24-74.24
                                                        S271.616,156.416,230.656,156.416z M225.024,208.64c-9.216,0-16.896,7.68-16.896,16.896h-24.576
                                                        c0.512-23.04,18.944-41.472,41.472-41.472V208.64z"></path>
                                                        </g>
                                                        <g>
                                                            <path d="M455.936,215.296c-25.088-31.232-114.688-133.12-225.28-133.12S30.464,184.064,5.376,215.296
                                                        c-7.168,8.704-7.168,21.504,0,30.72c25.088,31.232,114.688,133.12,225.28,133.12s200.192-101.888,225.28-133.12
                                                        C463.104,237.312,463.104,224.512,455.936,215.296z M230.656,338.176c-59.392,0-107.52-48.128-107.52-107.52
                                                        s48.128-107.52,107.52-107.52s107.52,48.128,107.52,107.52S290.048,338.176,230.656,338.176z"></path>
                                                        </g>
                                                    </svg> View detail</a>
                                                <a href="javascript:;" data-id="<?php echo e($item->id); ?>" id="add_to_cart<?php echo e($item->id); ?>" class="cv-btn add_to_cart" data-quantity="1">
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
                                                    add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="cv-product-data">
                                            <a href="<?php echo e(route('product.detail',$item->slug)); ?>" class="cv-price-title"><?php echo e(ucfirst($item->title)); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- featured products end -->

    <div class="cv-feature  ">
        <div class="container">
            <div class="cv-heading">
                <h6 style="font-weight: bold;color:#AB3238;font-size: 18px">The Brand to Trust Upon</h6>
                <h1>Why buy from GWS?</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>GWS Surgicals LLP is an accredited medical supplier and manufacturer in India. Apart from national delivery, we also accomplish international shipping of essential medical supplies and products. Our never-ending stock has an assorted range of important medical supplies, hospital products, surgical instruments, tools, advanced medical devices and machines. Apart from being the best in quality, our products are considerably affordable and their efficiency is powered by the latest industry innovations.</p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="cv-feature-box">
                        <div class="cv-feature-img">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="cv-feature-text">
                            <h3>Certificate</h3>
                            <p>
                                All GWS products are CE marked as per the latest standard of international medical devices.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="cv-feature-box">
                        <div class="cv-feature-img">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="cv-feature-text">
                            <h3>Infrastructure</h3>
                            <p>We are globally presents and constantly upgrading our production process with new innovations.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="cv-feature-box">
                        <div class="cv-feature-img">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="cv-feature-text">
                            <h3>Product Catalog</h3>
                            <p>We believe in providing high quality products with innovative technologies expertise ensuring safety of service providers and users.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="cv-feature-box">
                        <div class="cv-feature-img">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <div class="cv-feature-text">
                            <h3>Quality</h3>
                            <p>Our elementary principle is to provide high quality products, with consistently meet expectation of our customers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(count($categories)>0): ?>
    <div class="cv-deal spacer-top spacer-bottom">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 category-block">
                    <div class="cv-deal-box" style="background-image: url(<?php echo e(url($cat->image_path)); ?>);background-size: cover">
                        <div class="overlay">
                            <h3><?php echo e(ucfirst($cat->title)); ?></h3>
                            <p><?php echo html_entity_decode($cat->description); ?></p>
                            <a href="<?php echo e(route('product.category',$cat->slug)); ?>" class="cv-btn">readmore</a>
                        </div>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>


    <!-- product gallery start -->
    <div class="cv-product-gallery cv-product-three spacer-top-less">
        <div class="container">
            <div class="cv-heading">
                <h1>Product gallery</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cv-product-nav cv-product-tab">
                        <ul>
                            <?php if($cat_gallery_first): ?>
                            <li><a data-filter=".cv-first" class="cv-product-active"><?php echo e($cat_gallery_first->title); ?></a></li>
                            <?php endif; ?>
                            <?php if($cat_gallery_second): ?>
                            <li><a data-filter=".cv-second" ><?php echo e($cat_gallery_second->title); ?></a></li>
                            <?php endif; ?>
                            <?php if($cat_gallery_third): ?>
                            <li><a data-filter=".cv-third" ><?php echo e($cat_gallery_third->title); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="cv-product-all wow fadeIn" data-wow-delay="0.5s">
                        <div class="cv-gallery-grid">
                            <div class="cv-product-box cv-product-item cv-first">
                                <?php if($cat_gallery_first): ?>
                                    <?php $__currentLoopData = $cat_gallery_first->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="cv-product-img">
                                        <img src="<?php echo e($subcategories->image_path); ?>" alt="image" class="img-fluid"/>
                                        <div class="cv-product-button">
                                            <a href="product-single.html" class="cv-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 461.312 461.312">
                                                <g>
                                                    <path d="M230.656,156.416c-40.96,0-74.24,33.28-74.24,74.24s33.28,74.24,74.24,74.24s74.24-33.28,74.24-74.24
                                                        S271.616,156.416,230.656,156.416z M225.024,208.64c-9.216,0-16.896,7.68-16.896,16.896h-24.576
                                                        c0.512-23.04,18.944-41.472,41.472-41.472V208.64z"></path>
                                                </g>
                                                <g>
                                                    <path d="M455.936,215.296c-25.088-31.232-114.688-133.12-225.28-133.12S30.464,184.064,5.376,215.296
                                                        c-7.168,8.704-7.168,21.504,0,30.72c25.088,31.232,114.688,133.12,225.28,133.12s200.192-101.888,225.28-133.12
                                                        C463.104,237.312,463.104,224.512,455.936,215.296z M230.656,338.176c-59.392,0-107.52-48.128-107.52-107.52
                                                        s48.128-107.52,107.52-107.52s107.52,48.128,107.52,107.52S290.048,338.176,230.656,338.176z"></path>
                                                </g>
                                            </svg> View detail</a>
                                            <a href="<?php echo e(route('product.category', $subcategories->slug)); ?>" class="cv-btn">
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
                                            add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="cv-product-data">
                                        <a href="javascript:;" class="cv-price-title"><?php echo e($subcategories->title); ?></a>
                                        <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></p>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="cv-product-box cv-product-item cv-second">
                                <?php if($cat_gallery_second): ?>
                                    <?php $__currentLoopData = $cat_gallery_second->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="cv-product-img">
                                        <img src="<?php echo e($subcategories->image_path); ?>" alt="image" class="img-fluid"/>
                                        <div class="cv-product-button">
                                            <a href="product-single.html" class="cv-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 461.312 461.312">
                                                <g>
                                                    <path d="M230.656,156.416c-40.96,0-74.24,33.28-74.24,74.24s33.28,74.24,74.24,74.24s74.24-33.28,74.24-74.24
                                                        S271.616,156.416,230.656,156.416z M225.024,208.64c-9.216,0-16.896,7.68-16.896,16.896h-24.576
                                                        c0.512-23.04,18.944-41.472,41.472-41.472V208.64z"></path>
                                                </g>
                                                <g>
                                                    <path d="M455.936,215.296c-25.088-31.232-114.688-133.12-225.28-133.12S30.464,184.064,5.376,215.296
                                                        c-7.168,8.704-7.168,21.504,0,30.72c25.088,31.232,114.688,133.12,225.28,133.12s200.192-101.888,225.28-133.12
                                                        C463.104,237.312,463.104,224.512,455.936,215.296z M230.656,338.176c-59.392,0-107.52-48.128-107.52-107.52
                                                        s48.128-107.52,107.52-107.52s107.52,48.128,107.52,107.52S290.048,338.176,230.656,338.176z"></path>
                                                </g>
                                            </svg> View detail</a>
                                            <a href="<?php echo e(route('product.category', $subcategories->slug)); ?>" class="cv-btn">
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
                                            add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="cv-product-data">
                                        <a href="javascript:;" class="cv-price-title"><?php echo e($subcategories->title); ?></a>
                                        <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></p>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="cv-product-box cv-product-item cv-third">
                                <?php if($cat_gallery_third): ?>
                                    <?php $__currentLoopData = $cat_gallery_third->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="cv-product-img">
                                        <img src="<?php echo e($subcategories->image_path); ?>" alt="image" class="img-fluid"/>
                                        <div class="cv-product-button">
                                            <a href="product-single.html" class="cv-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 461.312 461.312">
                                                <g>
                                                    <path d="M230.656,156.416c-40.96,0-74.24,33.28-74.24,74.24s33.28,74.24,74.24,74.24s74.24-33.28,74.24-74.24
                                                        S271.616,156.416,230.656,156.416z M225.024,208.64c-9.216,0-16.896,7.68-16.896,16.896h-24.576
                                                        c0.512-23.04,18.944-41.472,41.472-41.472V208.64z"></path>
                                                </g>
                                                <g>
                                                    <path d="M455.936,215.296c-25.088-31.232-114.688-133.12-225.28-133.12S30.464,184.064,5.376,215.296
                                                        c-7.168,8.704-7.168,21.504,0,30.72c25.088,31.232,114.688,133.12,225.28,133.12s200.192-101.888,225.28-133.12
                                                        C463.104,237.312,463.104,224.512,455.936,215.296z M230.656,338.176c-59.392,0-107.52-48.128-107.52-107.52
                                                        s48.128-107.52,107.52-107.52s107.52,48.128,107.52,107.52S290.048,338.176,230.656,338.176z"></path>
                                                </g>
                                            </svg> View detail</a>
                                            <a href="<?php echo e(route('product.category', $subcategories->slug)); ?>" class="cv-btn">
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
                                            add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="cv-product-data">
                                        <a href="javascript:;" class="cv-price-title"><?php echo e($subcategories->title); ?></a>
                                        <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></p>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product gallery end -->
    <!-- testimonial start -->
    <!-- product gallery end -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

    
    <script>
        $(document).on('click', '.add_to_cart', function (e) {
            e.preventDefault();
            var product_id = $(this).data('id');
            var product_qty = $(this).data('quantity');
            var token = "<?php echo e(csrf_token()); ?>";
            var path = "<?php echo e(route('cart.store')); ?>";

            $.ajax({
                url: path,
                type: "POST",
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    product_qty: product_qty,
                    _token: token,
                },
                beforeSend: function () {
                    $('#add_to_cart' + product_id).html(
                        '<i class="fa fa-spinner fa-spin widget-icon"></i> Loading...');
                },
                complete: function () {
                    $('#add_to_cart' + product_id).html(
                        '<i class="fas fa-cart-plus"></i> add to Cart');
                },
                success: function (data) {
                    console.log(data);

                    if (data['status']) {
                        $('body #header').html(data['header']);
                        $('body #cart_counter').html(data['cart_count']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });

                    } else {
                        $('body #header-ajax').html(data['header']);
                        $('body #cart_counter').html(data['cart_count']);
                        swal({
                            title: "Sorry!",
                            text: data['message'],
                            icon: "error",
                            button: "OK!",
                        });
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\All_projects\indian_friend\gwsmed\resources\views/frontend/index.blade.php ENDPATH**/ ?>