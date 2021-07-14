    <!-- footer start -->
    <div class="cv-footer spacer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="cv-foot-box cv-foot-logo">
                        @if(\App\Models\Setting::value('footer_logo'))
                            <img src="{{ asset('storage/frontend/images/settings/'.\App\Models\Setting::value('footer_logo')) }}" style="max-width: 200px" alt="image" class="img-fluid"/>
                        @else
                            <img src="{{ Helper::defaultLogo() }}" alt="image" class="img-fluid" style="max-width: 200px" />
                        @endif
                        <p>{{\Illuminate\Support\Str::limit(\App\Models\Setting::value('short_intro'),150)}}</p>

                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="cv-foot-box cv-foot-links">
                        <h2>Categories</h2>
                        @php
                            $categories=\App\Models\Category::with('subcategories')->where(['status'=>'active'])->where('on_menu', 1)->latest()->limit(4)->get();
                        @endphp
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="{{ route('product.category.0', $category->slug) }}">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="cv-foot-box cv-foot-links">
                        <h2>Useful links</h2>
                        <ul>
                            <li><a href="{{ route('about.us') }}">About</a></li>
                            <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                            <li><a href="{{ route('certification') }}">Certification</a></li>
                            <li><a href="{{ route('infrastructure') }}">Infrastructure</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cv-foot-box cv-foot-contact">
                        <h2>Contact</h2>
                        <p><span>Contact : </span>{{\App\Models\Setting::value('phone')}}</p>
                        <p><span>Email : </span>{{\App\Models\Setting::value('email')}}</p>
                        <p><span>Address : </span>{{\App\Models\Setting::value('address')}}</p>
                        <ul class="cv-foot-social">
                            <li><a href="https://facebook.com/{{\App\Models\Setting::value('facebook')}}">
                                   <img src="{{asset('frontend/assets/images/facebook.svg')}}">
                                </a></li>
                            <li><a href="https://twitter.com/{{\App\Models\Setting::value('twitter')}}">
                                    <img src="{{asset('frontend/assets/images/twitter.svg')}}">
                                </a></li>
                            <li><a href="https://instagram.com/{{\App\Models\Setting::value('instagram')}}">
                                  <img src="{{asset('frontend/assets/images/instagram.svg')}}">
                                </a></li>
                                
                                <li><a style="background:transparent;" href="https://www.linkedin.com/{{\App\Models\Setting::value('linkedin')}}">
                                  <img src="{{asset('frontend/assets/images/linkedin.png')}}">
                                </a></li>
                                
                                 <li><a href="https://www.youtube.com/{{\App\Models\Setting::value('youtube')}}">
                                  <img src="{{asset('frontend/assets/images/youtube.png')}}">
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer end -->
    <!-- copyright start -->
    <div class="cv-copyright" style="background: #AB292B">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex align-items-center justify-content-center text-white">
                    <p>&copy; {{\App\Models\Setting::value('footer')}}</p> | 
                    <p><a href="{{route ('privacy.disclaimer')}}">Privacy Policy</a></p> |
                    <p><a href="#">Disclaimer</a></p> 
                </div>
            </div>
        </div>
    </div>
    <!-- copyright end -->


    <!-- Go To Top Button -->
    <button class="scrollToTopBtn"><i class="fas fa-angle-double-up"></i></button>
    <footer></footer>
    <!-- Go To Top end -->

    <!-- Cookies -->
    <div class="accept-cookies">
        @include('cookieConsent::index')
    </div>

</div>
<!-- main wrapper end -->

<!-- Share this end -->
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5df0f9489d176625"></script>


<!-- Share this end -->
<style>
    .atss-top{
        display: none;
    }
</style>