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
                        <p>
                            We are a major exporter of a wide variety of medical devices, including ophthalmic, orthopaedic, and general medical devices. GWS has built a global footprint and is recognised in more than 50 countries worldwide after dedicating four decades to producing and delivering high-quality products in the field of health care.
                            <br> GWS is critical to the success of our global partners, physicians, and patients. Every medical device, implant, and instrument we produce is made to the highest quality standards. <br>
                            We are particularly proud of our dedicated team of experts who ensure that we adhere to industry working standards.
                        </p>
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
                        <br>
                       
                        The International Medical Devices Standards have accredited our facilities and products. GWS manufactures its goods in India with ingenuity. <br>
                        We're revolutionising the medical device industry by merging industry-leading technology with unrivalled customer support.

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
      @php
      $reviews=\App\Models\Review::where(['status'=>'active'])->orderBy('id','DESC')->limit('5')->get();
  @endphp
  @if(count($reviews)>0)
      <div class="cv-testimonial">
          <div class="container">
              <div class="cv-heading">
                  <h1>Customer review</h1>
              </div>
              <div class="row">
                  <div class="swiper-container">
                      <div class="swiper-wrapper">
                          @foreach($reviews as $review)
                              <div class="swiper-slide">
                                  <div class="cv-testi-box">
                                      <div class="cv-testi-data">
                                          <p>{!! html_entity_decode($review->review) !!}</p>
                                          <div class="cv-testi-footer">
                                              <div class="cv-testi-name text-center">
                                                  @php
                                                      $rate = ceil($review->rate);
                                                  @endphp
                                                  @for ($i = 0; $i < 5; $i++)
                                                      @if ($i < $rate)
                                                          <i class="fas fa-star text-warning"></i>
                                                      @else
                                                          <i class="far fa-star text-warning"></i>
                                                      @endif
                                                  @endfor
                                                  <h1>{{ucfirst($review->name)}}</h1>
                                                  <p>{{ucfirst($review->address)}}</p>
                                              </div>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          @endforeach
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
  @endif
  <!-- testimonial end -->

@endsection
