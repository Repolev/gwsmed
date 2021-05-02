<!DOCTYPE html>
<html lang="en">

<head>
   @include('frontend.layouts.head')
    @toastr_css
</head>

<style>
    .cv-heading {
        text-align: center;
        max-width: 650px;
        margin: 0 auto 43px;
    }

    .cv-heading h1 {
        font-size: 28px;
        font-weight: 600;
        color: #AB292B;
        margin-bottom: 5px;
        text-transform: capitalize;
    }

    .border-bottom-line {
        width: 12%;
        height: 3px;
        background-color: #AB292B;
        border-radius: 4px;
    }

    ul.catalog-list {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-auto-rows: 24rem;
        column-gap: 2rem;
        list-style: none;
    }

    ul.catalog-list li a h1 {
        font-size: 16px;
        margin-top: 2rem;
        font-weight: 500;
        color: #000;
    }

    ul.catalog-list li a h1:hover {
        color: #AB292B;
        cursor: pointer;
    }



    ul.catalog-list li a img {
        transition: all 0.3s linear;
    }

    ul.catalog-list li a img:hover {
        transform: scale(1.1);
        cursor: pointer;
    }
</style>

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
