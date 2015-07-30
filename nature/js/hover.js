jQuery(function() {
	jQuery(document).ready(function(){
	    if (Modernizr.touch) {
	        // show the close overlay button
	        jQuery(".close-overlay").removeClass("hidden");
	        // handle the adding of hover class when clicked
	        jQuery(".img").click(function(e){
	            if (!jQuery(this).hasClass("hover")) {
	                jQuery(this).addClass("hover");
	            }
	        });
	        // handle the closing of the overlay
	        jQuery(".close-overlay").click(function(e){
	            e.preventDefault();
	            e.stopPropagation();
	            if (jQuery(this).closest(".img").hasClass("hover")) {
	                jQuery(this).closest(".img").removeClass("hover");
	            }
	        });
	    } else {
	        // handle the mouseenter functionality
	        jQuery(".img").mouseenter(function(){
	            jQuery(this).addClass("hover");
	        })
	        // handle the mouseleave functionality
	        .mouseleave(function(){
	            jQuery(this).removeClass("hover");
	        });
	    }
	});
});
