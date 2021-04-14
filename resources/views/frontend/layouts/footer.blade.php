    <!-- footer start -->
    <div class="cv-footer spacer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="cv-foot-box cv-foot-logo">
                        @if(\App\Models\Setting::value('logo'))
                            <img src="{{ asset('storage/frontend/images/settings/'.\App\Models\Setting::value('logo')) }}" style="max-width: 200px" alt="image" class="img-fluid"/>
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
                            @php
                                $category_url['slug'] = $category->slug;
                                if($category->level > 0){
                                    $category_url['parent1'] = $category->parentCategory->slug;
                                    if($category->level > 1){
                                        $category_url['parent2'] = $category->parentCategory->parentCategory->slug;
                                        if($category->level > 2){
                                            $category_url['parent3'] = $category->parentCategory->parentCategory->parentCategory->slug;
                                            if($category->level > 2){
                                                $category_url['parent4'] = $category->parentCategory->parentCategory->parentCategory->parentCategory->slug;
                                            }
                                        }
                                    }
                                }
                            @endphp
                                <li><a href="{{ route('product.category.' . $category->level, $category_url) }}">{{ $category->title }}</a></li>
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
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/></svg>
                                </a></li>
                            <li><a href="https://twitter.com/{{\App\Models\Setting::value('twitter')}}">
                                    <svg viewBox="-21 -81 681.33464 681" xmlns="http://www.w3.org/2000/svg"><path d="m200.964844 515.292969c241.050781 0 372.871094-199.703125 372.871094-372.871094 0-5.671875-.117188-11.320313-.371094-16.9375 25.585937-18.5 47.824218-41.585937 65.371094-67.863281-23.480469 10.441406-48.753907 17.460937-75.257813 20.636718 27.054687-16.230468 47.828125-41.894531 57.625-72.488281-25.320313 15.011719-53.363281 25.917969-83.214844 31.808594-23.914062-25.472656-57.964843-41.402344-95.664062-41.402344-72.367188 0-131.058594 58.6875-131.058594 131.03125 0 10.289063 1.152344 20.289063 3.398437 29.882813-108.917968-5.480469-205.503906-57.625-270.132812-136.921875-11.25 19.363281-17.742188 41.863281-17.742188 65.871093 0 45.460938 23.136719 85.605469 58.316407 109.082032-21.5-.660156-41.695313-6.5625-59.351563-16.386719-.019531.550781-.019531 1.085937-.019531 1.671875 0 63.46875 45.171875 116.460938 105.144531 128.46875-11.015625 2.996094-22.605468 4.609375-34.558594 4.609375-8.429687 0-16.648437-.828125-24.632812-2.363281 16.683594 52.070312 65.066406 89.960937 122.425781 91.023437-44.855469 35.15625-101.359375 56.097657-162.769531 56.097657-10.5625 0-21.003906-.605469-31.2617188-1.816407 57.9999998 37.175781 126.8710938 58.871094 200.8867188 58.871094"/></svg>
                                </a></li>
                            <li><a href="https://instagram.com/{{\App\Models\Setting::value('instagram')}}">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12.004 5.838c-3.403 0-6.158 2.758-6.158 6.158 0 3.403 2.758 6.158 6.158 6.158 3.403 0 6.158-2.758 6.158-6.158 0-3.403-2.758-6.158-6.158-6.158zm0 10.155c-2.209 0-3.997-1.789-3.997-3.997s1.789-3.997 3.997-3.997 3.997 1.789 3.997 3.997c.001 2.208-1.788 3.997-3.997 3.997z"/><path d="m16.948.076c-2.208-.103-7.677-.098-9.887 0-1.942.091-3.655.56-5.036 1.941-2.308 2.308-2.013 5.418-2.013 9.979 0 4.668-.26 7.706 2.013 9.979 2.317 2.316 5.472 2.013 9.979 2.013 4.624 0 6.22.003 7.855-.63 2.223-.863 3.901-2.85 4.065-6.419.104-2.209.098-7.677 0-9.887-.198-4.213-2.459-6.768-6.976-6.976zm3.495 20.372c-1.513 1.513-3.612 1.378-8.468 1.378-5 0-7.005.074-8.468-1.393-1.685-1.677-1.38-4.37-1.38-8.453 0-5.525-.567-9.504 4.978-9.788 1.274-.045 1.649-.06 4.856-.06l.045.03c5.329 0 9.51-.558 9.761 4.986.057 1.265.07 1.645.07 4.847-.001 4.942.093 6.959-1.394 8.453z"/><circle cx="18.406" cy="5.595" r="1.439"/></svg>
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
                <div class="col-md-12">
                    <p>&copy; {{\App\Models\Setting::value('footer')}}</p>
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
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6068b8549ab58bb0"></script>
<!-- Share this end -->
