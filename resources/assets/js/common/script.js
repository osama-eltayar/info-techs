(function($) {
    'use strict';
    jQuery(document).ready(function($){
        // aside dropdown

        function asideDropdown() {

            var dropdown = $('.aside-dropdown');

            if (!dropdown.length) return;

            var trigger = $('.dropdown-trigger');
            var	close = $('.aside-dropdown__close');

            trigger.on('click', function(){
                dropdown.toggleClass('aside-dropdown--active');
            });

            close.on('click', function(){
                dropdown.removeClass('aside-dropdown--active');
            });

            $(document).on('click', function(event) {
                if ( $(event.target).closest('.dropdown-trigger, .aside-dropdown__inner').length) return;
                dropdown.removeClass('aside-dropdown--active');
                event.stopPropagation();
            });

        }

        asideDropdown();


        $('.banner-slide .owl-carousel').owlCarousel({
            // loop:true,
            // autoplay:true,
            autoplayTimeout:3000,
            autoplaySpeed: 1000,
            smartSpeed:1500,
            lazyLoad: true,
            items:1,
            nav:true,
            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        });

        $('.slide .owl-carousel').owlCarousel({
            // loop:true,
            // autoplay:true,
            autoplayTimeout:3000,
            autoplaySpeed: 1000,
            smartSpeed:1500,
            lazyLoad: true,
            items:1,
            nav:false,
            dots:true
        });

        $(".info").on("click", function() {
            $(this).parent().parent().toggleClass('show-info')
        });
        $(".close-card").on("click", function() {
            $(this).parent().parent().toggleClass('show-info')
        })

        // video trigger

        function videoTrigger() {
            var trigger = $('.video-trigger');
            if (!trigger.length) return;
            trigger.fancybox();
        }

        videoTrigger();

        // tooltip
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });

}(jQuery));




