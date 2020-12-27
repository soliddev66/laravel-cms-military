/* -------------------------------------------------------------------
 * Template Name         : Bollin - Portfolio Template
 * Theme Author Name     : Yucel Yilmaz
 * Author URI            : https://www.aipthemes.com/
 * Created Date          : 10 March 2020
 * Version               : 1.0
------------------------------------------------------------------- */
/* -------------------------------------------------------------------
 [Table of contents]
 * 01.Preloader
 * 02.Wow Js
 * 03.Navbar
 * 04.Counter Up
 * 05.Owl Carousel
 * 06.ScrollSpy
 * 07.ScrollIt
 * 08.Magnific Popup
 * 09.Isotopğe Gallery
 * 10.Copyright
 * 11.Skills Bar
 * 12.Ripples Effect
 * 13.Glitch Effect
 * 14.Resume Tab Toggle
 * 15.Pricing Tab Toggle
 * 16.Review Rating
 * 17.Background Image Path
*/

$(function() {
    "use strict";

    // Call all ready functions
    bollin_preloader();
    bollin_wowJs();
    bollin_navbar();
    bollin_counterUp();
    bollin_owlCarousel();
    bollin_navScrollSpy();
    bollin_scrollIt();
    bollin_magnificPopup();
    bollin_isotopeGallery();
    bollin_copyrightDynamicYear();
    bollin_skillsBar();
    bollin_ripplesEffect();
    bollin_glitchEffect();
    bollin_resumeTabToggle();
    bollin_pricingTabToggle();
    bollin_reviewRating();
    bollin_bgImgPath();
});
/* ------------------------------------------------------------------- */
/* 01.Preloader
/* ------------------------------------------------------------------- */
function bollin_preloader() {
    "use-strict";

    // Variables
    var preloaderWrap           = $('.preloader-wrap'),
        loaderInner             = $('.preloader-wrap .preloader-inner');

    $( window ).ready(function(){
        loaderInner.delay(300).fadeOut(); 
        preloaderWrap.delay(300).fadeOut( 'slow' );
    }); 
}
/* ------------------------------------------------------------------- */
/* 02.Wow Js
/* ------------------------------------------------------------------- */
function bollin_wowJs(){
    "use-strict";
    
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: true,
        live: true,
        scrollContainer: null
    });
    wow.init();
}
/* ------------------------------------------------------------------- */
/* 03.Navbar
/* ------------------------------------------------------------------- */
function bollin_navbar() {
    "use-strict";

    // Variables
    let header              = $('.header');
    let menuLink            = $('.menu-link');
    let logoTransparent     = $(".logo-transparent");
    let scrollTopBtn        = $(".scroll-top-btn");
    let facebookLinkBtn     = $(".facebook-link-btn");
    let whatsappLinkBtn     = $(".whatsapp-link-btn");
    let logoNormal          = $(".logo-normal");
    let windowWidth         = $(window).innerWidth();
    let scrollTop           = $(window).scrollTop();
    let $dropdown           = $(".dropdown");
    let $dropdownToggle     = $(".dropdown-toggle");
    let $dropdownMenu       = $(".dropdown-menu");
    let showClass           = "show";

    // When Window On Scroll
    $(window).on('scroll',function(){
        let scrollTop       = $(this).scrollTop();

        if(scrollTop > 100 ) {
            header.addClass('header-shrink');
            scrollTopBtn.addClass('active');
            facebookLinkBtn.addClass('active');
            whatsappLinkBtn.addClass('active');
            logoTransparent.hide();
            logoNormal.show();
        }else {
            header.removeClass('header-shrink');
            scrollTopBtn.removeClass('active');
            facebookLinkBtn.removeClass('active');
            whatsappLinkBtn.removeClass('active');
            logoTransparent.show();
            logoNormal.hide();
        }
    });

    // The same process is done without page scroll to prevent errors.
    if(scrollTop > 100 ) {
        header.addClass('header-shrink');
        scrollTopBtn.addClass('active');
        logoTransparent.hide();
        logoNormal.show();
    }else {
        header.removeClass('header-shrink');
        scrollTopBtn.removeClass('active');
        logoTransparent.show();
        logoNormal.hide();
    }

    // Window On Resize Hover Dropdown
    $(window).on("resize", function() {
        let windowWidth  = $(this).innerWidth();

        if ( windowWidth > 991 ) {
            $dropdown.hover(
                function() {
                    let hasShowClass  =  $(this).hasClass(showClass);
                    if( hasShowClass!==true ){
                        $(this).addClass(showClass);
                        $(this).find($dropdownToggle).attr("aria-expanded", "true");
                        $(this).find($dropdownMenu).addClass(showClass);
                    }
                },
                function() {
                    $(this).removeClass(showClass);
                    $(this).find($dropdownToggle).attr("aria-expanded", "false");
                    $(this).find($dropdownMenu).removeClass(showClass);
                }
            );
        }else {
            $dropdown.off("mouseenter mouseleave");
            header.find('.main-menu').collapse('hide');
        }
    });
    // The same process is done without page scroll to prevent errors.
    if (windowWidth > 991 ) {
        $dropdown.hover(
            function() {
                const $this = $(this);

                var hasShowClass  = $this.hasClass(showClass);

                if(hasShowClass!==true){
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                }
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
        );
    }else {
        $dropdown.off("mouseenter mouseleave");
    }

    menuLink.on('click',function(){
        $('#fixedNavbar').collapse('hide');
    });
}
/* ------------------------------------------------------------------- */
/* 04.Counter Up
/* ------------------------------------------------------------------- */
function bollin_counterUp(){
    "use-strict";

    // Variables
    var counterItem         = $('.counter');

    counterItem.counterUp({
        delay: 10,
        time: 1000
    });
}
/* ------------------------------------------------------------------- */
/* 05.Owl Carousel
/* ------------------------------------------------------------------- */
function bollin_owlCarousel() {
    "use-strict";

    // Variables
    let testimonialsCarousel   = $('.testimonials-carousel');
    let portfolioCarousel      = $('.portfolio-carousel');
    let blogSlider             = $('.latest-blog-slider');
    let projectsCarousel       = $( '.my-projects-carousel' );

    // Testimonial Carousel
    testimonialsCarousel.owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        dots:false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        stagePadding:0,
        smartSpeed:1000,
        navText: ["<span class='fa fa-arrow-left'></span>","<span class='fa fa-arrow-right'></span>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            768: {
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    // Testimonial Carousel
    portfolioCarousel.owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        stagePadding:0,
        smartSpeed:1000,
        navText: ["<span class='fa fa-arrow-left'></span>","<span class='fa fa-arrow-right'></span>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            768: {
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    blogSlider.owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        dots:false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        stagePadding:0,
        smartSpeed:1000,
        navText: ["<span class='fa fa-arrow-left'></span>","<span class='fa fa-arrow-right'></span>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            768: {
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    projectsCarousel.owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        dots:false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        stagePadding:0,
        smartSpeed:1000,
        navText: ["<span class='fa fa-arrow-left'></span>","<span class='fa fa-arrow-right'></span>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            768: {
                items:2
            },
            1000:{
                items:4
            }
        }
    });
}
/* ------------------------------------------------------------------- */
/* 06.ScrollSpy
/* ------------------------------------------------------------------- */
function bollin_navScrollSpy() {
    "use-strict";

    // Scroll Spy
    $('body').scrollspy({
        target: '#fixedNavbar',
        offset: 95
    });
}
/* ------------------------------------------------------------------- */
/* 07.ScrollIt
/* ------------------------------------------------------------------- */
function bollin_scrollIt() {
    "use-strict";
     
    $.scrollIt({
        upKey: 38,
        downKey: 40,
        easing: "swing",
        scrollTime: 600,
        activeClass: "active",
        onPageChange: null,
        topOffset: -15
    });
}
/* ------------------------------------------------------------------- */
/* 08.Magnific Popup
/* ------------------------------------------------------------------- */
function bollin_magnificPopup() {

    "use-strict";

    // Variables
    let portfolioGrid          = $('.portfolio-grid');
    let galleryGrid            = $('#galleryGrid');
    let videoPopup             = $('.popup-youtube');

    // Magnific Popup Video Iframe
    videoPopup.magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
        removalDelay: 300
    });

    //  Portfolio Gallery Popup */
    portfolioGrid.magnificPopup({
        delegate: '.portfolio-zoom-link',
        type: 'image',
		gallery: {
			enabled: true
        }
    });

    //  Portfolio Gallery Popup */
    galleryGrid.magnificPopup({
        delegate: '.portfolio-zoom-link',
        type: 'image',
		gallery: {
			enabled: true
        }
    });
}
/* ------------------------------------------------------------------- */
/* 09.Isotopğe Gallery
/* ------------------------------------------------------------------- */
function bollin_isotopeGallery() {
    "use-strict";

    // Variables 
    var portfolioFilterBtn     = $('.portfolio-filter > a'),
        portfolioGalleryWrap   = $('.portfolio-gallery');

    // Porfolio Filtering Click Events
    portfolioFilterBtn.on("click", function() {
        portfolioFilterBtn.removeClass('current');
        $(this).addClass('current');
    });

    // Portfolio Masonary Gallery
    portfolioGalleryWrap.imagesLoaded(function() {
        var grid = $('.portfolio-gallery').isotope({
            itemSelector: '.glry-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.glry-item',
            }
        });

        // filter items on button click
        portfolioFilterBtn.on('click', function() {
            var filterValue = $(this).attr('data-gallery-filter');
            grid.isotope({
                filter: filterValue
            });
        });
    });
}
/* ------------------------------------------------------------------- */
/* 10.Copyright
/* ------------------------------------------------------------------- */
function bollin_copyrightDynamicYear() {
    "use-strict";

    // Variables
    var fullYearCopyright       = $('#fullYearCopyright'),
        getFullYearDate         = new Date().getFullYear();

    fullYearCopyright.text(getFullYearDate);

    $('[data-toggle="tooltip"]').tooltip();
}   
/* ------------------------------------------------------------------- */
/* 11.Skills Bar
/* ------------------------------------------------------------------- */ 
function bollin_skillsBar(){
    "use-strict";

    // Variables
    var skillsItem              = $('.skills-item');

    skillsItem.each(function(){
        // Variables
        var skillPercent        = $(this).find(".skills-progress-value").attr("data-percent");

        $(this).find(".skills-progress-value").css("width",skillPercent +"%");
        $(this).find(".skills-item-text .skill-percent").html(skillPercent+"%");
    });
}
/* ------------------------------------------------------------------- */
/* 12.Ripples Effect
/* ------------------------------------------------------------------- */ 
function bollin_ripplesEffect() {
    "use-strict";
    
    $('.hero-ripless-banner').ripples({
        resolution: 500,
        dropRadius: 20,
        perturbance: 0.04
    });
}
/* ------------------------------------------------------------------- */
/* 13.Glitch Effect
/* ------------------------------------------------------------------- */ 
function bollin_glitchEffect() {
    "use-strict";

    $(".glitch-img").mgGlitch();
}
/* ------------------------------------------------------------------- */
/* 14.Resume Tab Toggle
/* ------------------------------------------------------------------- */
function bollin_resumeTabToggle(){
    "use-scrict";

    // Variables
    var resumeTabLink       = $('.resume-toggle-wrap > a'),
        resumeTabContent    = $('.resume-tab-content');

    resumeTabLink.on("click",function(){
        resumeTabLink.removeClass('active');
        $(this).addClass('active');
        resumeTabContent.removeClass('active');
        resumeTabContent.eq($(this).index()).addClass("active animated fadeInUp");
    });
}
/* ------------------------------------------------------------------- */
/* 15.Pricing Tab Toggle
/* ------------------------------------------------------------------- */
function bollin_pricingTabToggle(){
    "use-scrict";

    // Variables
    var priceTabLink       = $('.price-toggle-wrap > a'),
        priceTabContent    = $('.pricing-tab-content');

    priceTabLink.on("click",function(){
        priceTabLink.removeClass('active');
        $(this).addClass('active');
        priceTabContent.removeClass('active');
        priceTabContent.eq($(this).index()).addClass("active animated fadeInUp");
    });
}

/* ------------------------------------------------------------------- */
/* 16.Review Rating
/* ------------------------------------------------------------------- */
function bollin_reviewRating(){
    "use-strict";

    // Variables
    let reviewRatingList      = $('.review-rating-list'),
        reviewRatingListItem  = reviewRatingList.find('li');

    reviewRatingListItem.on("click",function(event){
        let itemIndex      = $(this).index()+1; 

        reviewRatingListItem.removeClass('active');
        $('.review-rating-list li:lt('+itemIndex+')').addClass('active clickrate');
        event.preventDefault(); 
    });
}
/* ------------------------------------------------------------------- */
/* 17.Background Image Path
/* ------------------------------------------------------------------- */
function bollin_bgImgPath(){
    "use-strict";
    
    // Variables
    let dataBgItem         = $( '*[data-bg-image-path]' );

    dataBgItem.each( function() {
        let imgPath        = $( this ).attr( 'data-bg-image-path' );
        $( this).css( 'background-image', 'url(' + imgPath + ')' );
    });
}