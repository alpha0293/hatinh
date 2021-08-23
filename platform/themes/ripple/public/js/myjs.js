// Scroll menu
(function ($) {
    'use strict';

    var $window = $(window);



    // :: Sticky Active Code
    $window.on('scroll', function () {
        if ($window.scrollTop() > 70) {
            $('.page-header').addClass('sticky');
            $('.header-top').addClass('an');
            $('.banner').addClass('an');
        } else {
            $('.page-header').removeClass('sticky');
            $('.header-top').removeClass('an');
            $('.banner').removeClass('an');
        }
    });
})(jQuery);
// hết scroll menu
// menu hover
(function($) {
    var defaults={
        sm : 540,
        md : 720,
        lg : 960,
        xl : 1140,
        navbar_expand: 'lg',
        animation: false,
        animateIn: 'fadeIn',
    };
    $.fn.bootnavbar = function(options) {

        var screen_width = $(document).width();
        settings = $.extend(defaults, options);

        if(screen_width >= settings.lg){
            $(this).find('.dropdown').hover(function() {
                $(this).addClass('show');
                $(this).find('.dropdown-menu').first().addClass('show');
                if(settings.animation){
                    $(this).find('.dropdown-menu').first().addClass('animated ' + settings.animateIn);
                }
            }, function() {
                $(this).removeClass('show');
                $(this).find('.dropdown-menu').first().removeClass('show');
            });
        }

        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');

            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show').removeClass("show");
            });

            return false;
        });
    };
})(jQuery);
$(function () {
    $('#main_navbar').bootnavbar();
})
// hết menu hover
// social area 
$(document).ready(function() {
 
        // BEGIN SHOW/HIDE SHARE BUTTONS
$('.ttw-share-activate-button').on('click', function(e) {
e.preventDefault();
    /* touchstart events */
    if($('.mxh-content').hasClass('show-mxh'))
    {
        /* show share buttons */

        $(".mxh-content").removeClass("show-mxh");
        $(".ttw-share-activate-button").addClass("glyphicon-chevron-right");
        $(".ttw-share-activate-button").removeClass("glyphicon-chevron-left");
        $(".social-share-wrapper").removeClass("mxh-margin");
    } else {
        /* hide share buttons */
        $(".mxh-content").addClass("show-mxh");
        $(".ttw-share-activate-button").removeClass("glyphicon-chevron-right");
        $(".ttw-share-activate-button").addClass("glyphicon-chevron-left");
        setTimeout(function(){
           $(".social-share-wrapper").addClass("mxh-margin");
        },1000);
    } 
 
});
 
// END SHOW/HIDE SHARE BUTTONS
});
// het social area
        $( '#example5' ).sliderPro({
            width: 670,
            height: 350,
            orientation: 'vertical',
            loop: false,
            arrows: true,
            buttons: false,
            thumbnailsPosition: 'right',
            thumbnailPointer: true,
            thumbnailWidth: 290,
            breakpoints: {
                800: {
                    thumbnailsPosition: 'bottom',
                    thumbnailWidth: 270,
                    thumbnailHeight: 100
                },
                500: {
                    thumbnailsPosition: 'bottom',
                    thumbnailWidth: 120,
                    thumbnailHeight: 50
                }
            }
        });
