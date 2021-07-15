// Scroll menu
(function ($) {
    'use strict';

    var $window = $(window);



    // :: Sticky Active Code
    $window.on('scroll', function () {
        if ($window.scrollTop() > 20) {
            $('.page-header').addClass('sticky');
        } else {
            $('.page-header').removeClass('sticky');
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