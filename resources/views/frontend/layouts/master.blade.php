<!DOCTYPE html>
<html lang="en">

<head>
   @include('frontend.layouts.head')
    @toastr_css
</head>

<body>

    @php
        use App\Models\Setting;$settings=Setting::first();
    @endphp

    <!-- preloader start -->
    <div class="cv-ellipsis">
        <div class="cv-preloader">
            <div></div>
        </div>
    </div>
    <!-- preloader end -->
    <!-- main wrapper start -->
    <div class="cv-main-wrapper">

        <div id="header">
            @include('frontend.layouts.header')
        </div>

        @yield('content')

        <!-- testimonial start -->
        @php
            $reviews=\App\Models\Review::where(['status'=>'active'])->orderBy('id','DESC')->limit('5')->get();
        @endphp
        @if(count($reviews)>0)
            <div class="cv-testimonial spacer-top-less">
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
        <!-- footer start -->
        @include('frontend.layouts.footer')
        <!-- footer end -->

    </div>

    @include('frontend.layouts.script')
    @toastr_js
    @toastr_render
</body>

</html>
