jQuery(document).ready(function($){
    "use strict";
		//TESTIMONIAL
         if ($(".ts-list-testimonial").length > 0) {        
            var slide_speed  = parseInt($(".ts-list-testimonial").attr("data-speed")) * 1000;   
            if ( isNaN(slide_speed) ) {
                slide_speed = 4000;
            }
            console.log(slide_speed); 
            $(".ts-list-testimonial").owlCarousel({
                autoPlay: slide_speed,
                slideSpeed: 1000,
                navigation: false,
                pagination: true,
                singleItem: true,
            });
        }
});    