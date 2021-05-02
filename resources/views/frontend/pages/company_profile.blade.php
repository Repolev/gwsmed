@extends('frontend.layouts.master')

@section('content')
    <!-- breadcrumb start -->
    <div class="cv-breadcrumb blog-details-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>Company Profile</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Home | </a></li>
                            <li class="text-white">Company Profile</li>
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
    <!-- testimonial start -->
    <div class="cv-testimonial cv-testi-about spacer-top-less">
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
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
                                </div>
                                <div class="cv-testi-footer">
                                    <div class="cv-testi-img">
                                        <img src="https://via.placeholder.com/100x100" alt="image" class="img-fluid"/>
                                    </div>
                                    <div class="cv-testi-name">
                                        <h1>John Michel</h1>
                                        <p>Manager</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="cv-testi-box">
                                <div class="cv-testi-data">
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
                                </div>
                                <div class="cv-testi-footer">
                                    <div class="cv-testi-img">
                                        <img src="https://via.placeholder.com/100x100" alt="image" class="img-fluid"/>
                                    </div>
                                    <div class="cv-testi-name">
                                        <h1>John Michel</h1>
                                        <p>Manager</p>
                                    </div>
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

@endsection
