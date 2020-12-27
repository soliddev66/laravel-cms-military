/* -------------------------------------------------------------------
 * Template Name         : Cofo - App & Product Landing Page
 * Created Date          : 10 February 2020
 * Last Update           : 27 March 2020
 * Version               : 1.0.2
 * File Name             : main.js
------------------------------------------------------------------- */

/* -------------------------------------------------------------------
 [Table of contents]
 * 01.Preloader
 * 02.Navbar
 * 03.Wow Js
 * 04.ScrollIt
 * 05.ScrollSpy
 * 06.Owl Carousel
 * 07.Counter Up
 * 08.Magnific Popup
 * 09.Contact Form
 * 10.Copyright Dynamic Year
 * 11.Ripples Effect
 * 12.Glitch Effect
*/

$(function() {
    "use strict";

    // Call all ready functions
    cofo_preloader();
    cofo_navbar();
    cofo_wowJs();
    cofo_scrollIt();
    cofo_navScrollSpy();
    cofo_owlCarousel();
    cofo_counterUp();
    cofo_magnificPopup();
    cofo_copyrightDynamicYear();
    cofo_ripplesEffect();
    cofo_glitchEffect();
});

/* ------------------------------------------------------------------- */
/* 01.Preloader
/* ------------------------------------------------------------------- */
function cofo_preloader() {
    "use-strict";

    // Variables
    var preloaderWrap           = $('.preloader-wrap'),
        loaderInner             = $('.preloader-wrap .preloader-inner');

    $( window ).ready( function(){
        loaderInner.fadeOut(); 
        preloaderWrap.delay(350).fadeOut('slow');
    });   
}

/* ------------------------------------------------------------------- */
/* 02.Navbar
/* ------------------------------------------------------------------- */
function cofo_navbar(){
    "use-strict";

     // Variables
     let header          = $( '.header' );
     let logoTransparent = $( '.logo-transparent' );
     let scrollTopBtn    = $( '.scroll-top-btn' );
     let logoNormal      = $( '.logo-normal' );
     let windowWidth     = $( window ).innerWidth();
     let scrollTop       = $( window ).scrollTop();
     let $dropdown       = $( '.dropdown' );
     let $dropdownToggle = $( '.dropdown-toggle' );
     let $dropdownMenu   = $( '.dropdown-menu' );
     let showClass       = 'show';
     let whatsAppBtn     = $( '.whatsapp-btn' );
     let facebookBtn     = $( '.facebook-btn' );
 
     // When Window On Scroll
     $( window ).on( 'scroll', function(){
         let scrollTop = $( this ).scrollTop();
 
         if( scrollTop > 85 ) {
             logoTransparent.hide();
             logoNormal.show();
             header.addClass( 'header-shrink' );
             scrollTopBtn.addClass( 'active' );
             whatsAppBtn.addClass( 'active' );
             facebookBtn.addClass( 'active' );
         }else {
             logoTransparent.show();
             logoNormal.hide();
             header.removeClass( 'header-shrink' );
             whatsAppBtn.removeClass( 'active' );
             facebookBtn.removeClass( 'active' );
             scrollTopBtn.removeClass( 'active' );
         }
     });
 
     // The same process is done without page scroll to prevent errors.
     if( scrollTop > 85 ) {
         logoTransparent.hide();
         logoNormal.show();
         whatsAppBtn.addClass( 'active' );
         facebookBtn.addClass( 'active' );
         header.addClass( 'header-shrink' );
         scrollTopBtn.addClass( 'active' );
     }else {
         logoTransparent.show();
         logoNormal.hide();
         header.removeClass( 'header-shrink' );
         whatsAppBtn.removeClass( 'active' );
         facebookBtn.removeClass( 'active' );
         scrollTopBtn.removeClass( 'active' );
     }
 
    // Window On Resize Hover Dropdown
    $( window ).on( 'resize', function() {
         let windowWidth  = $( this ).innerWidth();
 
         if ( windowWidth > 991 ) {
             $dropdown.hover(
                 function() {
                     let hasShowClass  =  $( this ).hasClass(showClass);
                     if( hasShowClass!==true ){
                         $( this ).addClass(showClass);
                         $( this ).find($dropdownToggle).attr( 'aria-expanded', 'true' );
                         $( this ).find($dropdownMenu).addClass(showClass);
                     }
                 },
                 function() {
                     $( this ).removeClass(showClass);
                     $( this ).find($dropdownToggle).attr("aria-expanded", "false");
                     $( this ).find($dropdownMenu).removeClass(showClass);
                 }
             );
         }else {
             $dropdown.off( 'mouseenter mouseleave' );
             header.find( '.main-menu' ).collapse( 'hide' );
         }
     });
     // The same process is done without page scroll to prevent errors.
     if ( windowWidth > 991 ) {
         $dropdown.hover(
             function() {
                 const $this = $( this );
 
                 var hasShowClass  = $this.hasClass(showClass);
 
                 if( hasShowClass!==true ){
                     $this.addClass(showClass);
                     $this.find($dropdownToggle).attr( 'aria-expanded', 'true');
                     $this.find($dropdownMenu).addClass(showClass);
                 }
             },
             function() {
                 const $this = $( this );
                 $this.removeClass(showClass);
                 $this.find($dropdownToggle).attr("aria-expanded", 'false');
                 $this.find($dropdownMenu).removeClass(showClass);
             }
         );
     }else {
         $dropdown.off( 'mouseenter mouseleave' );
     }

    /*
        Hide Menu when you click on the navigation links.
        It is valid only for data-nav-scroll.
    */
    $('.navbar-nav li a[data-scroll-nav]').on('click', function(){
        $('.navbar-collapse').collapse('hide');
    }); 
}

/* ------------------------------------------------------------------- */
/* 03.Wow Js
/* ------------------------------------------------------------------- */
function cofo_wowJs(){
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
/* 04.ScrollIt
/* ------------------------------------------------------------------- */
function cofo_scrollIt() {
    "use-strict";
     
    $.scrollIt({
        upKey: 38,
        downKey: 40,
        easing: "swing",
        scrollTime: 1000,
        activeClass: "active",
        onPageChange: null,
        topOffset: -15
    });
}
/* ------------------------------------------------------------------- */
/* 05.ScrollSpy
/* ------------------------------------------------------------------- */
function cofo_navScrollSpy() {
    "use-strict";

    // Scroll Spy
    $('body').scrollspy({
        target: '#fixedNavbar',
        offset: 70
    });
}

/* ------------------------------------------------------------------- */
/* 06.Owl Carousel
/* ------------------------------------------------------------------- */
function cofo_owlCarousel(){

    "use-strict";

    // Variables
    let clientsSlider       = $(".testimonials-carousel");
    let screenshotCarousel  = $('.screenshot-carousel');
    let teamSlider          = $('.team-carousel');
    let pricingSlider       = $('.pricing-carousel');

    // Team Carousel
    teamSlider.owlCarousel({
        loop:true,
        margin:20,
        nav:false,
        dots:true,
        smartSpeed:1000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            768:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    // Pricing Carousel
    pricingSlider.owlCarousel({
        loop:true,
        margin:20,
        nav:false,
        dots:true,
        smartSpeed:1000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            768:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    // Screenshot Carousel
    screenshotCarousel.owlCarousel({
        loop:true,
        margin:20,
        nav:false,
        dots:true,
        smartSpeed:1000,
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
                items:3
            }
        }
    });

    
    // Testimonial Carousel
    clientsSlider.owlCarousel({
        loop:true,
        margin:20,
        nav:false,
        dots:true,
        smartSpeed:1000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            768:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    
    // Variables
    let reviewRatingList      = $('.review-rating-list');
    let reviewRatingListItem  = reviewRatingList.find('li');

    reviewRatingListItem.on("click",function(event){
        let itemIndex      = $(this).index() + 1; 

        reviewRatingListItem.removeClass('active');
        $('.review-rating-list li:lt('+itemIndex+')').addClass('active clickrate');
        event.preventDefault(); 
    });
}

/* ------------------------------------------------------------------- */
/* 07.Counter Up
/* ------------------------------------------------------------------- */
function cofo_counterUp(){
    "use-strict";

    // Variables
    var counterItem         = $('.counter');

    counterItem.counterUp({
        delay: 10,
        time: 1000
    });
}

/* ------------------------------------------------------------------- */
/* 08.Magnific Popup
/* ------------------------------------------------------------------- */
function cofo_magnificPopup(){
    "use-strict";

    // Variables
    var youtubePopup        = $(".popup-youtube");

    youtubePopup.magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});
}

/* ------------------------------------------------------------------- */
/* 10.Copyright Dynamic Year
/* ------------------------------------------------------------------- */
function cofo_copyrightDynamicYear() {
    "use-strict";

    // Variables
    var fullYearCopyright       = $('#fullYearCopyright'),
        getFullYearDate         = new Date().getFullYear();

    fullYearCopyright.text(getFullYearDate);
}  
/* ------------------------------------------------------------------- */
/* 11.Ripples Effect
/* ------------------------------------------------------------------- */ 
function cofo_ripplesEffect() {
    "use-strict";
    
    $('.hero-ripless-banner').ripples({
        resolution: 500,
        dropRadius: 20,
        perturbance: 0.04
    });
}
/* ------------------------------------------------------------------- */
/* 12.Glitch Effect
/* ------------------------------------------------------------------- */ 
function cofo_glitchEffect() {
    "use-strict";

    $(".glitch-img").mgGlitch();
}