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


        <!-- footer start -->
        @include('frontend.layouts.footer')
        <!-- footer end -->

    </div>

    @include('frontend.layouts.script')
    @toastr_js
    @toastr_render
</body>

</html>
