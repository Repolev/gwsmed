@extends('frontend.layouts.master')

@section('content')
    <!-- breadcrumb start -->
    <div class="cv-breadcrumb blog-details-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>About Us</h1>
                        <ul>
                            <li><a href="{{ route('home') }}">Home | </a></li>
                            <li class="text-white">About Us</li>
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
                <div class="col-lg-12">
                    <div class="cv-heading mt-5 mb-0" style="max-width: 100%">
                        <h1>About <span>Us</span></h1>
                        <hr class="border-bottom-line" style="width: 5%;">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="cv-about-img">
                        <img src="{{ asset('frontend/images/about-us.jpg') }}" alt="image" class="img-fluid" />
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
                            <p>To provide high-quality standard products ensuring safety and serving mankind with innovative
                                technologies and expertise.</p>
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
                            <p>All GWS products are designed and manufactured to consistently meet high quality and
                                performance standards.</p>
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
                            <p>Each and every customers at GWS is served with the same spirit without any discrimination and
                                is assured of high quality products and service.</p>
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
