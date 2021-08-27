// Scroll menu
(function ($) {
    'use strict';

    var $window = $(window);



    // :: Sticky Active Code
    $window.on('scroll', function () {
        if ($window.scrollTop() > 10) {
            $('.headers').addClass('sticky');
        } else {
            $('.headers').removeClass('sticky');
          
        }
    });
})(jQuery);
// hết scroll menu
// menu hover

$(function () {
    $('#main_navbar').bootnavbar();
})
// hết menu hover

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
/// data table
$(document).ready(function() {
    $('#contact-detail').dataTable({
        "responsive": true,
        "columnDefs": [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: 4 }
                ],
        "pageLength": 50,
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
    } );
} );