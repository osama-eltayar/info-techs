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
    });  

}(jQuery));




