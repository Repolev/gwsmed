"use strict";

(function ($) {
    /*------------------
		Mobile Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        appendTo: "#headerMenu",
        allowParentLinks: true,
    });

    /*------------------
        Background Set
    --------------------*/
    $(".set-bg").each(function () {
        var bg = $(this).data("setbg");
        $(this).css("background-image", "url(" + bg + ")");
    });

    /*================================
    Sticky Navbar
    ==================================*/
    window.onscroll = function () {
        stickyNavbar();
    };

    var header = document.getElementById("headerMenu");
    var sticky = header.offsetTop;

    function stickyNavbar() {
        if (window.pageYOffset >= sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }

    // Login Form-Password Show

    $("#showPassword").on("click", function () {
        var passwordInput = $("#password");
        var eyeIcon = $("#icon");
        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
            eyeIcon.addClass("ri-eye-fill");
            eyeIcon.removeClass("ri-eye-off-line");
            passwordInput.className = "";
        } else {
            passwordInput.attr("type", "password");
            icon.className = "ri-eye-off-line";
            passwordInput.className = "active";
        }
    });

    // Owl Carousel Initialization

    $(document).ready(function () {
        $(".owl-carousel").owlCarousel();
    });

    // hero Slider Carousel
    $(".hero-slider").owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 500,
        nav: true,
        animateIn: "fadeIn",
        animateOut: "fadeOut",
        navText: [
            "<i class='fa fa-chevron-left text-white'></i>",
            "<i class='fa fa-chevron-right text-white'></i>",
        ],
        margin: 0,
        mouseDrag: true,

        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });

    // Deals of the Day Carousel
    $(".deals-carousel").owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 500,
        dots: false,
        nav: true,
        margin: 10,
        mouseDrag: true,
        responsive: {
            0: {
                items: 1,
            },
            391: {
                items: 2,
            },
            767: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1000: {
                items: 2,
            },
            1920: {
                items: 3,
            },
        },
    });

    // New Arrivals Carousel
    $(".new-arrival-slider").owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 500,
        margin: 10,
        dots: false,
        nav: true,
        mouseDrag: true,
        responsive: {
            0: {
                items: 1,
            },
            391: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1000: {
                items: 2,
            },
            1920: {
                items: 3,
            },
        },
    });

    /*-----------------------
        Products Slider
    ------------------------*/
    $(".product-slider").owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 500,
        dots: false,
        nav: true,
        margin: 10,
        mouseDrag: true,
        responsive: {
            0: {
                items: 1,
            },
            391: {
                items: 2,
            },
            768: {
                items: 3,
            },
            992: {
                items: 4,
            },
            1000: {
                items: 5,
            },
            1920: {
                items: 6,
            },
        },
    });

    // Categories Slider
    $(".categories-slider").owlCarousel({
        loop: false,
        autoplay: true,
        smartSpeed: 500,
        dots: false,
        nav: true,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>",
        ],
        margin: 0,
        mouseDrag: true,
        responsive: {
            0: {
                items: 1,
            },
            391: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1000: {
                items: 4,
            },
            1920: {
                items: 5,
            },
        },
    });

    /*-----------------------------
        Brands Slider
    -------------------------------*/
    $(".brand-carousel").owlCarousel({
        loop: false,
        margin: 20,
        items: 3,
        dots: true,
        nav: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
        responsive: {
            320: {
                items: 2,
            },

            391: {
                items: 3,
            },

            768: {
                items: 4,
            },

            992: {
                items: 6,
            },
            1920: {
                items: 7,
            },
        },
    });

    /*-----------------------------
        Product Grid- Brands Slider
    -------------------------------*/
    $(".product-brand-carousel").owlCarousel({
        loop: true,
        margin: 0,
        items: 7,
        dots: false,
        nav: false,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
        responsive: {
            320: {
                items: 3,
            },

            391: {
                items: 3,
            },

            768: {
                items: 6,
            },

            992: {
                items: 9,
            },
        },
    });

    /*-----------------------
		Price Range Slider
	------------------------ */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data("min"),
        maxPrice = rangeSlider.data("max");
    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        slide: function (event, ui) {
            minamount.val("Rs. " + ui.values[0]);
            maxamount.val("Rs. " + ui.values[1]);
        },
    });
    minamount.val("Rs. " + rangeSlider.slider("values", 0));
    maxamount.val("Rs. " + rangeSlider.slider("values", 1));

    /*--------------------------
        Nice Select
    ----------------------------*/
    $("select").niceSelect();

    /*-------------------
		Quantity change
	--------------------- */
    // var proQty = $(".pro-qty");
    // proQty.prepend('<span class="dec qtybtn">-</span>');
    // proQty.append('<span class="inc qtybtn">+</span>');
    // proQty.on("click", ".qtybtn", function () {
    //     var $button = $(this);
    //     var oldValue = $button.parent().find("input").val();
    //     if ($button.hasClass("inc")) {
    //         var newVal = parseFloat(oldValue) + 1;
    //     } else {
    //         // Don't allow decrementing below zero
    //         if (oldValue > 0) {
    //             var newVal = parseFloat(oldValue) - 1;
    //         } else {
    //             newVal = 0;
    //         }
    //     }
    //     $button.parent().find("input").val(newVal);
    // });

    // Set the date we're counting down to
    var countDownDate = new Date("March 30, 2021 11:34").getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        // document.getElementById("days").innerHTML = days;
        // document.getElementById("hours").innerHTML = hours;
        // document.getElementById("minutes").innerHTML = minutes;

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
})(jQuery);
