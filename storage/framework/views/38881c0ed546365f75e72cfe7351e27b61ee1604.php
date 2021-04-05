<?php $__env->startSection('content'); ?>
    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>About Us</h1>
                        <ul>
                            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- about start -->
    <div class="cv-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="cv-about-img spacer-top">
                        <img src="https://via.placeholder.com/360x520" alt="image" class="img-fluid"/>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="cv-about-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <h2>Our Expertise</h2>
                        <ul>
                            <li>Heart Surgery</li>
                            <li>Eye Surgery</li>
                            <li>Brain Hemorrhage</li>
                            <li>Respiratory problems</li>
                            <li>Internal Injury</li>
                            <li>Cancer disease</li>
                            <li>Neurologist</li>
                            <li>Heart Surgery</li>
                            <li>Eye Surgery</li>
                            <li>Brain Hemorrhage</li>
                            <li>Dental Problem</li>
                            <li>Respiratory problems</li>
                            <li>Internal Injury</li>
                            <li>Cancer disease</li>
                            <li>Neurologist</li>
                            <li>Dental Problem</li>
                        </ul>
                        <div class="cv-dr-box">
                            <div class="cv-dr-name">
                                <h3>Dr. Martin Guptil</h3>
                                <p>Heart Surgeon</p>
                            </div>
                            <div class="cv-dr-signature">
                                <img src="assets/images/signature.png" alt="image" class="img-fluid"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about end -->
   <!-- feature start -->
   <div class="cv-feature-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="cv-feature-box">
                    <div class="cv-feature-img">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="cv-feature-text">
                        <h3>WORLDWIDE SHIPPING</h3>
                        <p>Fastest growing medical equipments company, exporting to more than 50 countries.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cv-feature-box">
                    <div class="cv-feature-img">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="cv-feature-text">
                        <h3>BEST QUALITY</h3>
                        <p>Customer service excellence has always been one of the prime aspect of our organization.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cv-feature-box">
                    <div class="cv-feature-img">
                    <i class="fas fa-check"></i>
                    </div>
                    <div class="cv-feature-text">
                        <h3>BEST OFFERS</h3>
                        <p>Premium quality products at highly affordable prices and internationally certified.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cv-feature-box">
                    <div class="cv-feature-img">
                    <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="cv-feature-text">
                        <h3>SECURE PAYMENTS</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, debitis?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- feature end -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gwsmedco/gws.gwsmed.com/resources/views/frontend/pages/about.blade.php ENDPATH**/ ?>