//masonry with imagesLoaded
var $container = jQuery('#content');
	// initialize Masonry
	jQuery(window).load(function() {
		jQuery('#content').masonry({
			columnWidth: 277,
			itemSelector: '.item',
			isFitWidth: true,
			isAnimated: !Modernizr.csstransitions
		});
	});
	$container.imagesLoaded( function() {
	$container.masonry();
});
//ends masonry
// Carousel Auto-Cycle
jQuery(function() {
	jQuery(document).ready(function() {
		jQuery('.carousel').carousel({
	  	  interval: 6000
	    })
	});
});
//////////////////////////////////
//Contact validation
jQuery(document).ready(function () {
    //hide a div after 4 seconds
    setTimeout( "jQuery('.error').hide('slow');",3000 );
});
//Script for search overlay
jQuery(function() {
	var triggerBttn = document.querySelector( 'a.trigger-overlay' ),
		triggerBttnSm = document.querySelector( 'a.trigger-small' ),
		overlay = document.querySelector( 'div.overlay' ),
		closeBttn = overlay.querySelector( 'button.overlay-close' );
		transEndEventNames = {
			'WebkitTransition': 'webkitTransitionEnd',
			'MozTransition': 'transitionend',
			'OTransition': 'oTransitionEnd',
			'msTransition': 'MSTransitionEnd',
			'transition': 'transitionend'
		},
		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		support = { transitions : Modernizr.csstransitions };

	function toggleOverlay() {
		if( classie.has( overlay, 'open' ) ) {
			classie.remove( overlay, 'open' );
			classie.add( overlay, 'close' );
			var onEndTransitionFn = function( ev ) {
				if( support.transitions ) {
					if( ev.propertyName !== 'visibility' ) return;
					this.removeEventListener( transEndEventName, onEndTransitionFn );
				}
				classie.remove( overlay, 'close' );
			};
			if( support.transitions ) {
				overlay.addEventListener( transEndEventName, onEndTransitionFn );
			}
			else {
				onEndTransitionFn();
			}
		}
		else if( !classie.has( overlay, 'close' ) ) {
			classie.add( overlay, 'open' );
		}
	}
	triggerBttnSm.addEventListener( 'click', toggleOverlay);
	triggerBttn.addEventListener( 'click', toggleOverlay );
	closeBttn.addEventListener( 'click', toggleOverlay );
});
///////////////////////////////////////////
// Script for magnific popup
jQuery(function() {
	jQuery(document).ready(function() {
		jQuery('.gallery-item').each(function() { // the containers for all your galleries
	 		jQuery(this).magnificPopup({
		 		delegate: 'a', // the selector for gallery item
		 		type: 'image',
		 		gallery: {
			 		enabled:true
			 	}
			 });
		});
	});
});
////////////////////////
//Countdown
jQuery(function() {
	window.jQuery(function ($) {
		"use strict";

		jQuery('time').countDown({
	    with_separators: false
		});
	});
});
///////////////////////////
//Wow Inint
var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       false       // trigger animations on mobile devices (true is default)
  }
);
wow.init();
//////////////////////////
//Test if scroll more than 80px and if is not a small device to add a class .shrink for the menu
jQuery(document).ready(function() {
	jQuery(window).scroll(function() {
		if (jQuery(document).scrollTop() > 80 & jQuery(window).width() > 769) {
	    	jQuery('nav').addClass('shrink');
		}else {
	    	jQuery('nav').removeClass('shrink');
		}
	});
});
//Scroll page
jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.scroll').fadeIn(duration);
        } else {
            jQuery('.scroll').fadeOut(duration);
        }
    });

    jQuery('.scroll').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});
//Parallax
jQuery(document).ready(function() {
	jQuery(window).bind('load', function () {
		parallaxInit();
	});
	function parallaxInit() {
		jQuery(".home-banner-1").parallax("40%", 0.5);
		jQuery(".home-banner-2").parallax("40%", 0.3);
	}
	parallaxInit();
});