    <script src="<?php echo e(asset('frontend/assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/isotope.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/ui_range_slider.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/SmoothScroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/swiper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/custom.js')); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php echo $__env->yieldContent('scripts'); ?>

    <script>
    jQuery(document).ready(function($){
        $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
            items:1
            },
            600:{
            items:1
            },
            1000:{
            items:1
            }
        }
        })
    });

    //Get the button
    var mybutton = document.getElementById("goToTopBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function goToTopFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }

    // ========================

    // We select the element we want to target
    var target = document.querySelector("footer");

    var scrollToTopBtn = document.querySelector(".scrollToTopBtn")
    var rootElement = document.documentElement

    // Next we want to create a function that will be called when that element is intersected
    function callback(entries, observer) {
    // The callback will return an array of entries, even if you are only observing a single item
    entries.forEach(entry => {
        if (entry.isIntersecting) {
        // Show button
        scrollToTopBtn.classList.add("showBtn")
        } else {
        // Hide button
        scrollToTopBtn.classList.remove("showBtn")
        }
    });
    }

    function scrollToTop() {
    rootElement.scrollTo({
        top: 0,
        behavior: "smooth"
    })
    }
    scrollToTopBtn.addEventListener("click", scrollToTop);

    // Next we instantiate the observer with the function we created above. This takes an optional configuration
    // object that we will use in the other examples.
    let observer = new IntersectionObserver(callback);
    // Finally start observing the target element
    observer.observe(target);
</script>
<?php /**PATH /home/gwsmedco/gws.gwsmed.com/resources/views/frontend/layouts/script.blade.php ENDPATH**/ ?>