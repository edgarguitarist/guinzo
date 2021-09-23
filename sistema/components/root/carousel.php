<!-- Start Carousel -->
<div id="carousel" class="carousel no-overflow">
    <div class="item-1">
        <!-- Slide Content 
        <img src="http://lorempixel.com/720/480/cats/" alt="cats">-->
        <img class="is-modern vh-90" src="sistema/images/slides/slide1.jpg" alt="slide">
    </div>
    <div class="item-2">
        <!-- Slide Content 
        <img src="http://lorempixel.com/720/480/food/" alt="food">-->
        <img class="is-modern vh-90" src="sistema/images/slides/slide2.jpg" alt="slide">
    </div>
    <div class="item-3">
        <!-- Slide Content 
        <img src="http://lorempixel.com/720/480/people/" alt="people">-->
        <img class="is-modern vh-90" src="sistema/images/slides/slide3.jpg" alt="slide">
    </div>
    <div class="item-4">
        <!-- Slide Content 
        <img src="http://lorempixel.com/720/480/people/" alt="people">-->
        <img class="is-modern vh-90" src="sistema/images/slides/slide4.jpg" alt="slide">
    </div>
    <div class="item-5">
        <!-- Slide Content 
        <img src="http://lorempixel.com/720/480/people/" alt="people">-->
        <img class="is-modern vh-90" src="sistema/images/slides/slide5.jpg" alt="slide">
    </div>
</div>
<!-- End Carousel -->
<script src="sistema/vendors/bulma-carousel/dist/js/bulma-carousel.min.js"></script>
<script>

    bulmaCarousel.attach('#carousel', {
        slidesToScroll: 1,
        slidesToShow: 1,
        breakpoints: 
            [{ changePoint: 480, slidesToShow: 1, slidesToScroll: 1 },
             { changePoint: 640, slidesToShow: 1, slidesToScroll: 1 },
             { changePoint: 768, slidesToShow: 1, slidesToScroll: 1 } ],
        loop: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000
    });

</script>