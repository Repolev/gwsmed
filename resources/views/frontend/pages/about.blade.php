@extends('frontend.layouts.master')

@section('content')
    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>About Us</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
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
                    <div class="cv-about-img">
                        <img src="{{asset('frontend/images/about-us.jpg')}}" alt="image" class="img-fluid"/>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="cv-about-content">
                        {!! html_entity_decode(\App\Models\Setting::value('about')) !!}
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
                        <h3>OUR MISSION</h3>
                        <p>To provide high-quality standard products ensuring safety and serving mankind with innovative technologies and expertise.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cv-feature-box">
                    <div class="cv-feature-img">
                        <i class="fas fa-hand-point-up"></i>
                    </div>
                    <div class="cv-feature-text">
                        <h3>OUR VISION</h3>
                        <p>To identify and associate with all possible customers and service providers globally.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cv-feature-box">
                    <div class="cv-feature-img">
                    <i class="fas fa-check"></i>
                    </div>
                    <div class="cv-feature-text">
                        <h3>OUR QUALITY POLICY</h3>
                        <p>All GWS products are designed and manufactured to consistently meet high quality and performance standards.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cv-feature-box">
                    <div class="cv-feature-img">
                    <i class="fas fa-user-secret"></i>
                    </div>
                    <div class="cv-feature-text">
                        <h3>OUR CUSTOMER POLICY</h3>
                        <p>Each and every customers at GWS is served with the same spirit without any discrimination and is assured of high quality products and service.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- feature end -->

@endsection
