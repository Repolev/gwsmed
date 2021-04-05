
<?php $__env->startSection('title','E-SHOP || HOME PAGE'); ?>
<?php $__env->startSection('main-content'); ?>

<style>


.cv-blog-two .cv-blog-box
{
	float:left;
}
</style>

<!-- Slider Area -->
<section class="hero-slider">
    <!-- Single Slider -->

    
    <!--/ End Single Slider -->
</section>
<?php if(count($banners)>0): ?>
    <section id="Gslider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li data-target="#Gslider" data-slide-to="<?php echo e($key); ?>" class="<?php echo e((($key==0)? 'active' : '')); ?>"></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ol>
        <div class="carousel-inner" role="listbox">
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e((($key==0)? 'active' : '')); ?>">
                    <img class="first-slide" src="<?php echo e($banner->photo); ?>" alt="First slide">
                    <div class="carousel-caption d-none d-md-block text-left">
                        <h1 class="wow fadeInDown"><?php echo e($banner->title); ?></h1>
                        <p><?php echo html_entity_decode($banner->description); ?></p>
                        <a class="btn btn-lg ws-btn wow fadeInUpBig" href="<?php echo e(route('product-grids')); ?>" role="button">Shop Now<i class="far fa-arrow-alt-circle-right"></i></i></a>
                    </div>
                </div>  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
        </div>
        <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </section>
<?php endif; ?>












	
    <!-- feature start -->
    <div class="cv-feature-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="cv-feature-box">
                        <div class="cv-feature-img">
                            <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><path d="m59 54.141v-9.141h-5v-6h-12v-11h-7l-10.506-6.304c.237-3.338-1.585-6.518-4.583-8.012 2.376-.799 4.089-3.039 4.089-5.684 0-.369-.038-.728-.102-1.078l2.357-.506c1.08-.232 1.767-1.295 1.535-2.375l-4.584.985c-1.095-1.913-3.208-3.168-5.604-3.013-2.913.188-5.341 2.568-5.581 5.477-.245 2.97 1.676 5.528 4.353 6.281-2.503 1.56-3.942 4.468-3.538 7.498l1.164 8.731-1 12-6 19v1h7l-1-3h-.333l2.685-8.054.648 11.054h7l-1-3h-1.871l1.871-29 1.485-4.419 11.515 5.419h5v24.38c-.615.703-1 1.613-1 2.62 0 2.209 1.791 4 4 4s4-1.791 4-4c0-.732-.211-1.41-.555-2h8.109c-.343.59-.554 1.268-.554 2 0 2.209 1.791 4 4 4s4-1.791 4-4c0-1.862-1.278-3.413-3-3.859zm-16 4.859c-.552 0-1-.448-1-1s.448-1 1-1 1 .448 1 1-.448 1-1 1zm5-16h-4v-2h4zm10 16c-.552 0-1-.448-1-1s.448-1 1-1 1 .448 1 1-.448 1-1 1z"/></svg>
                        </div>
                        <div class="cv-feature-text">
                            <h3>Free Shipping</h3>
                            <p>When order is over $199</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="cv-feature-box">
                        <div class="cv-feature-img">
                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><path d="m0 141.356h422v30h-422z"/><path d="m422 102.356c0-24.813-20.187-45-45-45h-332c-24.813 0-45 20.187-45 45v9h422z"/><path d="m421 242.643c.334 0 .666.01 1 .013v-41.299h-422v123c0 24.813 20.187 45 45 45h255.138c-.089-1.894-.139-3.798-.139-5.713.001-66.721 54.281-121.001 121.001-121.001zm-346-11.286h37.5c8.284 0 15 6.716 15 15s-6.716 15-15 15h-37.5c-8.284 0-15-6.716-15-15s6.716-15 15-15zm85 77.999h-85c-8.284 0-15-6.716-15-15s6.716-15 15-15h85c8.284 0 15 6.716 15 15s-6.716 15-15 15z"/><path d="m421 272.643c-50.178 0-91 40.823-91 91 0 50.178 40.823 91 91 91s91-40.823 91-91-40.823-91-91-91zm43.607 83.277-36 36c-2.929 2.929-6.768 4.394-10.606 4.394s-7.678-1.464-10.606-4.394l-18.5-18.5c-5.858-5.858-5.858-15.355 0-21.213 5.857-5.858 15.355-5.858 21.213 0l7.894 7.894 25.394-25.394c5.857-5.858 15.355-5.858 21.213 0 5.855 5.858 5.855 15.355-.002 21.213z"/></g></svg>
                        </div>
                        <div class="cv-feature-text">
                            <h3>Payment method</h3>
                            <p>100% safe and secure</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="cv-feature-box">
                        <div class="cv-feature-img">
                            <svg viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg"><path d="m96 16a80.2 80.2 0 0 1 64 32h-8v16h24a8 8 0 0 0 7.59-5.47l8-24-15.18-5.06-3.175 9.53a95.994 95.994 0 0 0 -173.235 57h16a80.091 80.091 0 0 1 80-80z"/><path d="m176 96a80 80 0 0 1 -144 48h8v-16h-24a8 8 0 0 0 -7.59 5.47l-8 24 15.18 5.06 3.175-9.53a95.994 95.994 0 0 0 173.235-57z"/><path d="m40 96a56 56 0 1 0 56-56 56.063 56.063 0 0 0 -56 56zm80-32v16h-28a4 4 0 0 0 0 8h8a20 20 0 0 1 4 39.6v8.4h-16v-8h-16v-16h28a4 4 0 0 0 0-8h-8a20 20 0 0 1 -4-39.6v-8.4h16v8z"/></svg>
                        </div>
                        <div class="cv-feature-text">
                            <h3>15 days return</h3>
                            <p>Lorem ipsum dolar sit</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="cv-feature-box">
                        <div class="cv-feature-img">
                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m512 346.5c0-63.535156-36.449219-120.238281-91.039062-147.820312-1.695313 121.820312-100.460938 220.585937-222.28125 222.28125 27.582031 54.589843 84.285156 91.039062 147.820312 91.039062 29.789062 0 58.757812-7.933594 84.210938-23.007812l80.566406 22.285156-22.285156-80.566406c15.074218-25.453126 23.007812-54.421876 23.007812-84.210938zm0 0"/><path d="m391 195.5c0-107.800781-87.699219-195.5-195.5-195.5s-195.5 87.699219-195.5 195.5c0 35.132812 9.351562 69.339844 27.109375 99.371094l-26.390625 95.40625 95.410156-26.386719c30.03125 17.757813 64.238282 27.109375 99.371094 27.109375 107.800781 0 195.5-87.699219 195.5-195.5zm-225.5-45.5h-30c0-33.085938 26.914062-60 60-60s60 26.914062 60 60c0 16.792969-7.109375 32.933594-19.511719 44.277344l-25.488281 23.328125v23.394531h-30v-36.605469l35.234375-32.25c6.296875-5.761719 9.765625-13.625 9.765625-22.144531 0-16.542969-13.457031-30-30-30s-30 13.457031-30 30zm15 121h30v30h-30zm0 0"/></svg>
                        </div>
                        <div class="cv-feature-text">
                            <h3>24x7 support</h3>
                            <p>By qualified team</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature end -->
    <!-- self protection kit start -->
    <div class="cv-protection-kit cv-product-three">
        <div class="container">
            <div class="cv-heading">
                <h1>Latest Products</h1>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="row">
			
			<?php if(count($new_products)): ?>
			<?php $__currentLoopData = $new_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			 
			

                <div class="col-lg-3 col-sm-6">
                    <div class="cv-product-box">
                        <div class="cv-product-img">
                            
										<?php 
																$photo=explode(',',$product->photo);
										?>
										
										<img class="img-fluid" src="<?php echo e($photo[0]); ?>" alt="<?php echo e($photo[0]); ?>">
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
                                <a href="javascript:;" class="cv-btn">
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
						
                               <a href="<?php echo e(route('product-detail',$product->slug)); ?>" class="cv-price-title"><?php echo e($product->title); ?></a>
                         
                        </div>
                    </div>
                </div>
              
	

	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
			<?php endif; ?>  
	
	
	
		   </div>
        </div>
    </div>
    <!-- self protection kit end -->
    <!-- hot deals start -->
    <div class="cv-deal spacer-top spacer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="cv-deal-box">
                        <h2>Flat 50% Off</h2>
                        <h3>Hurry up! limited time offer</h3>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                        <button class="cv-btn">buy now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hot deals end -->
    <!-- new arrivals start -->
    <div class="cv-arrival cv-product-three cv-product-slider spacer-top-less">
        <div class="container">
            <div class="cv-heading">
                <h1>New arrivals</h1>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
						
							<?php if(count($featured)): ?>
									<?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									 	
                            <div class="swiper-slide">
                                <div class="cv-product-box">
                                    <div class="cv-product-img">
									
                                      <?php 
																$photo=explode(',',$product->photo);
										?>
										
										<img class="img-fluid" src="<?php echo e($photo[0]); ?>" alt="<?php echo e($photo[0]); ?>">
										
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
                                            <a href="javascript:;" class="cv-btn">
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
                                        <a href="<?php echo e(route('product-detail',$product->slug)); ?>" class="cv-price-title"><?php echo e($product->title); ?></a>
                                    
                                    </div>
                                </div>
                            </div>
                          
					    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
								<?php endif; ?>   
					</div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- new arrivals end -->
    <!-- testimonial start -->
    <div class="cv-testimonial cv-testimonial-two spacer-top-less">
        <div class="container">
            <div class="cv-heading">
                <h1>Customer review</h1>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="row">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="cv-testi-box">
                                <div class="cv-testi-data">
                                    <div class="cv-testi-footer">
                                        <div class="cv-testi-img">
                                            <img src="https://via.placeholder.com/100x100" alt="image" class="img-fluid"/>
                                        </div>
                                        <div class="cv-testi-name">
                                            <h1>John Michel</h1>
                                            <p>Manager</p>
                                        </div>
                                    </div>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="cv-testi-box">
                                <div class="cv-testi-data">
                                    <div class="cv-testi-footer">
                                        <div class="cv-testi-img">
                                            <img src="https://via.placeholder.com/100x100" alt="image" class="img-fluid"/>
                                        </div>
                                        <div class="cv-testi-name">
                                            <h1>John Michel</h1>
                                            <p>Manager</p>
                                        </div>
                                    </div>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="cv-arrow">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial end -->
    <!-- product gallery start -->
    <div class="cv-product-gallery cv-product-three spacer-top-less">
        <div class="container">
            <div class="cv-heading">
                <h1>Product gallery</h1>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cv-product-nav cv-product-tab">
                        <ul>
                            <li><a data-filter="*" class="cv-product-active" >all Category</a></li>
							
							<?php if($category_lists): ?>
								<?php $__currentLoopData = $category_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a data-filter=".<?php echo e($cat->id); ?>" ><?php echo e($cat->title); ?></a></li>
                            
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
							
							
                        </ul>
                    </div>
					
					
                    <div class="cv-product-all wow fadeIn" data-wow-delay="0.5s">
                        <div class="cv-gallery-grid">
                          
						  <?php 
                                    $categories=DB::table('categories')->where('status','active')->where('is_parent',0)->get();
                                    // dd($categories);
                                ?>
                                <?php if($categories): ?>
								<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						  <div class="col-3 cv-product-box cv-product-item <?php echo e($cat->parent_id); ?>">
                                <div class="cv-product-img">
                                    <img src="<?php echo e($cat->photo); ?>" alt="image" class="img-fluid"/>
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
                                        <a href="javascript:;" class="cv-btn">
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
                                    <a href="javascript:;" class="cv-price-title"><?php echo e($cat->title); ?></a>
                                    
                                </div>
                            </div>
                          
						  
						  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
							
					
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product gallery end -->
  <!-- blog start -->
    <div class="cv-blog-two cv-blog-three spacer-top-less">
        <div class="container">
            <div class="cv-heading">
                <h1>BLOGS</h1>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="row">
                
				
				<?php if($posts): ?>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="cv-blog-box col-lg-6">
                        <div class="cv-blog-img">
                            <img src="<?php echo e($post->photo); ?>" alt="<?php echo e($post->photo); ?> class="img-fluid"/>
                        </div>
                        <div class="cv-blog-data">
                            <a href="javascript:;" class="cv-blog-date"><?php echo e($post->created_at->format('d M , Y. D')); ?></a>
                            <a href="" class="cv-blog-title"><?php echo e($post->title); ?></a>
                            <p><?php echo e($post->title); ?></p>
                            <div class="cv-blog-share">
                                <p class="cv-share-hover">
                                    <svg viewBox="-21 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m453.332031 85.332031c0 38.292969-31.039062 69.335938-69.332031 69.335938s-69.332031-31.042969-69.332031-69.335938c0-38.289062 31.039062-69.332031 69.332031-69.332031s69.332031 31.042969 69.332031 69.332031zm0 0"/><path d="m384 170.667969c-47.0625 0-85.332031-38.273438-85.332031-85.335938 0-47.058593 38.269531-85.332031 85.332031-85.332031s85.332031 38.273438 85.332031 85.332031c0 47.0625-38.269531 85.335938-85.332031 85.335938zm0-138.667969c-29.417969 0-53.332031 23.9375-53.332031 53.332031 0 29.398438 23.914062 53.335938 53.332031 53.335938s53.332031-23.9375 53.332031-53.335938c0-29.394531-23.914062-53.332031-53.332031-53.332031zm0 0"/><path d="m453.332031 426.667969c0 38.289062-31.039062 69.332031-69.332031 69.332031s-69.332031-31.042969-69.332031-69.332031c0-38.292969 31.039062-69.335938 69.332031-69.335938s69.332031 31.042969 69.332031 69.335938zm0 0"/><path d="m384 512c-47.0625 0-85.332031-38.273438-85.332031-85.332031 0-47.0625 38.269531-85.335938 85.332031-85.335938s85.332031 38.273438 85.332031 85.335938c0 47.058593-38.269531 85.332031-85.332031 85.332031zm0-138.667969c-29.417969 0-53.332031 23.9375-53.332031 53.335938 0 29.394531 23.914062 53.332031 53.332031 53.332031s53.332031-23.9375 53.332031-53.332031c0-29.398438-23.914062-53.335938-53.332031-53.335938zm0 0"/><path d="m154.667969 256c0 38.292969-31.042969 69.332031-69.335938 69.332031-38.289062 0-69.332031-31.039062-69.332031-69.332031s31.042969-69.332031 69.332031-69.332031c38.292969 0 69.335938 31.039062 69.335938 69.332031zm0 0"/><path d="m85.332031 341.332031c-47.058593 0-85.332031-38.269531-85.332031-85.332031s38.273438-85.332031 85.332031-85.332031c47.0625 0 85.335938 38.269531 85.335938 85.332031s-38.273438 85.332031-85.335938 85.332031zm0-138.664062c-29.417969 0-53.332031 23.933593-53.332031 53.332031s23.914062 53.332031 53.332031 53.332031c29.421875 0 53.335938-23.933593 53.335938-53.332031s-23.914063-53.332031-53.335938-53.332031zm0 0"/><path d="m135.703125 245.761719c-7.425781 0-14.636719-3.863281-18.5625-10.773438-5.824219-10.21875-2.238281-23.253906 7.980469-29.101562l197.949218-112.851563c10.21875-5.867187 23.253907-2.28125 29.101563 7.976563 5.824219 10.21875 2.238281 23.253906-7.980469 29.101562l-197.953125 112.851563c-3.328125 1.898437-6.953125 2.796875-10.535156 2.796875zm0 0"/><path d="m333.632812 421.761719c-3.585937 0-7.210937-.898438-10.539062-2.796875l-197.953125-112.851563c-10.21875-5.824219-13.800781-18.859375-7.976563-29.101562 5.800782-10.238281 18.855469-13.84375 29.097657-7.976563l197.953125 112.851563c10.21875 5.824219 13.800781 18.859375 7.976562 29.101562-3.945312 6.910157-11.15625 10.773438-18.558594 10.773438zm0 0"/></svg>
                                    share
                                </p>
                                <ul>
                                    <li><a href="javascript:;">
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/></svg>
                                    </a></li>
                                    <li><a href="javascript:;">
                                        <svg viewBox="-21 -81 681.33464 681" xmlns="http://www.w3.org/2000/svg"><path d="m200.964844 515.292969c241.050781 0 372.871094-199.703125 372.871094-372.871094 0-5.671875-.117188-11.320313-.371094-16.9375 25.585937-18.5 47.824218-41.585937 65.371094-67.863281-23.480469 10.441406-48.753907 17.460937-75.257813 20.636718 27.054687-16.230468 47.828125-41.894531 57.625-72.488281-25.320313 15.011719-53.363281 25.917969-83.214844 31.808594-23.914062-25.472656-57.964843-41.402344-95.664062-41.402344-72.367188 0-131.058594 58.6875-131.058594 131.03125 0 10.289063 1.152344 20.289063 3.398437 29.882813-108.917968-5.480469-205.503906-57.625-270.132812-136.921875-11.25 19.363281-17.742188 41.863281-17.742188 65.871093 0 45.460938 23.136719 85.605469 58.316407 109.082032-21.5-.660156-41.695313-6.5625-59.351563-16.386719-.019531.550781-.019531 1.085937-.019531 1.671875 0 63.46875 45.171875 116.460938 105.144531 128.46875-11.015625 2.996094-22.605468 4.609375-34.558594 4.609375-8.429687 0-16.648437-.828125-24.632812-2.363281 16.683594 52.070312 65.066406 89.960937 122.425781 91.023437-44.855469 35.15625-101.359375 56.097657-162.769531 56.097657-10.5625 0-21.003906-.605469-31.2617188-1.816407 57.9999998 37.175781 126.8710938 58.871094 200.8867188 58.871094"/></svg>
                                    </a></li>
                                    <li><a href="javascript:;">
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12.004 5.838c-3.403 0-6.158 2.758-6.158 6.158 0 3.403 2.758 6.158 6.158 6.158 3.403 0 6.158-2.758 6.158-6.158 0-3.403-2.758-6.158-6.158-6.158zm0 10.155c-2.209 0-3.997-1.789-3.997-3.997s1.789-3.997 3.997-3.997 3.997 1.789 3.997 3.997c.001 2.208-1.788 3.997-3.997 3.997z"/><path d="m16.948.076c-2.208-.103-7.677-.098-9.887 0-1.942.091-3.655.56-5.036 1.941-2.308 2.308-2.013 5.418-2.013 9.979 0 4.668-.26 7.706 2.013 9.979 2.317 2.316 5.472 2.013 9.979 2.013 4.624 0 6.22.003 7.855-.63 2.223-.863 3.901-2.85 4.065-6.419.104-2.209.098-7.677 0-9.887-.198-4.213-2.459-6.768-6.976-6.976zm3.495 20.372c-1.513 1.513-3.612 1.378-8.468 1.378-5 0-7.005.074-8.468-1.393-1.685-1.677-1.38-4.37-1.38-8.453 0-5.525-.567-9.504 4.978-9.788 1.274-.045 1.649-.06 4.856-.06l.045.03c5.329 0 9.51-.558 9.761 4.986.057 1.265.07 1.645.07 4.847-.001 4.942.093 6.959-1.394 8.453z"/><circle cx="18.406" cy="5.595" r="1.439"/></svg>
                                    </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                 

			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

		</div>
        </div>
    </div>
    <!-- blog end -->
    <!-- Instagram start -->
	

 <!-- partner start -->
    <div class="cv-partners spacer-top spacer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="javascript:;"><img src="https://via.placeholder.com/156x78" alt="image" class="img-fluid"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;"><img src="https://via.placeholder.com/156x78" alt="image" class="img-fluid"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;"><img src="https://via.placeholder.com/156x78" alt="image" class="img-fluid"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;"><img src="https://via.placeholder.com/156x78" alt="image" class="img-fluid"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;"><img src="https://via.placeholder.com/156x78" alt="image" class="img-fluid"/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partner end -->
    <!-- footer start -->
    
	
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
        background: #000000;
        color:black;
        }

        #Gslider .carousel-inner{
        height: 550px;
        }
        #Gslider .carousel-inner img{
            width: 100% !important;
            opacity: .8;
        }

        #Gslider .carousel-inner .carousel-caption {
        bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        color: #F7941D;
        }

        #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
        bottom: 70px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    
    
    <script>
        
        /*==================================================================
        [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function () {
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({filter: filterValue});
            });
            
        });

        // init Isotope
        $(window).on('load', function () {
            var $grid = $topeContainer.each(function () {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine : 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function(){
            $(this).on('click', function(){
                for(var i=0; i<isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
         function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gwsmedco/email.gwsmed.com.gwsmed.com/resources/views/frontend/index.blade.php ENDPATH**/ ?>