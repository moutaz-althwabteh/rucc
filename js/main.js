$(document).ready(function() {
    // Header Scroll
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 50) {
            $('#header').addClass('fixed');
        } else {
            $('#header').removeClass('fixed');
        }
    });

    // Waypoints
    $('.work').waypoint(function() {
        $('.work').addClass('animated fadeIn');
    }, {
        offset: '75%'
    });
    $('.download').waypoint(function() {
        $('.download .btn').addClass('animated tada');
    }, {
        offset: '75%'
    });

    // Fancybox
    $('.work-box').fancybox();

    // Flexslider
    $('.flexslider').flexslider({
        animation: "fade",
        directionNav: false,
    });

    // Page Scroll
    var sections = $('section')
    nav = $('nav[role="navigation"]');

    $(window).on('scroll', function() {
        var cur_pos = $(this).scrollTop();
        sections.each(function() {
            var top = $(this).offset().top - 76
            bottom = top + $(this).outerHeight();
            if (cur_pos >= top && cur_pos <= bottom) {
                nav.find('a').removeClass('active');
                nav.find('a[href="#' + $(this).attr('id') + '"]').addClass('active');
            }
        });
    });
    nav.find('a').on('click', function() {
        var $el = $(this)
        id = $el.attr('href');
        $('html, body').animate({
            scrollTop: $(id).offset().top - 75
        }, 500);
        return false;
    });

    // Mobile Navigation
    $('.nav-toggle').on('click', function() {
        $(this).toggleClass('close-nav');
        nav.toggleClass('open');
        return false;
    });
    nav.find('a').on('click', function() {
        $('.nav-toggle').toggleClass('close-nav');
        nav.toggleClass('open');
    });



    $('.consultations-carousel').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        rtl: true,
        arrows: true,
        prevArrow: '<a type="button" class="slick-prev btn btn-primary"><i class="fa fa-angle-right"></i></a>',
        nextArrow: '<a type="button" class="slick-next btn  btn-primary"><i class="fa fa-angle-left"></i></a>',

    });


    $('.books-carousel').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        rtl: true,
        arrows: true,
        prevArrow: '<a type="button" class="slick-prev btn btn-primary"><i class="fa fa-angle-right"></i></a>',
        nextArrow: '<a type="button" class="slick-next btn  btn-primary"><i class="fa fa-angle-left"></i></a>',

    });

    $('.guides-carousel').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        rtl: true,
        autoplay: true,
        arrows: true,
        prevArrow: '<a type="button" class="slick-prev btn btn-primary"><i class="fa fa-angle-right"></i></a>',
        nextArrow: '<a type="button" class="slick-next btn  btn-primary"><i class="fa fa-angle-left"></i></a>',

    });

    $(".guide-image").height($(".guide-content").height());

    $('.pagination-inner a').on('click', function() {
        $(this).siblings().removeClass('pagination-active');
        $(this).addClass('pagination-active');
    })




});