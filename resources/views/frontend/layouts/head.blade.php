<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('meta_title', 'GWS SURGICALS | Medical Equipment &amp; Supplies Company | International Shipping')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="@yield('meta_description', 'GWS SURGICALS LLP is India&#039;s most reputed manufacturer and suppliers of Medical Equipment, Hospital Furniture, Orthopedic Implants and Instruments')">
<link rel="canonical" href="{{ url()->current() }}" />
<meta name="keywords" content="@yield('keywords')">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
<link rel="shortcut icon" href="{{ asset('frontend/assets/images/fav.png') }}" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

{{-- OWL Carousel --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>

@yield('styles')
<style>
    html, body {
    height: 100%;
    margin: 0;
    }

    .owl-wrapper-outer {
        height: 100% !important;
    }

    .owl-wrapper {
        height: 100%;
    }

    .owl-item {
        height: 100%;
    }

    .b-Amarelo {
        height: 100%;
    }

    .owl-item h1 {
        margin: 0;
    }

    .accept-cookies{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
    }
</style>

<!-- preloader start -->
<div class="cv-ellipsis">
    <div class="cv-preloader">
        <div></div>
    </div>
</div>

<!-- main wrapper start -->
<div class="cv-main-wrapper">
