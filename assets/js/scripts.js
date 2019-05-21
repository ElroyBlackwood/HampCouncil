// Custom scripts
(function($) {
	
	// $ Works! You can test it with next line if you like
	// console.log($);
	// run all functions that happen on resize or load
	$(document).ready(function() {

	    function checkWidth() {
	        var windowsize = $(window).width();
	        if (windowsize > 255 && windowsize < 601) {

	        } else if (windowsize > 600 && windowsize < 1201) {

	        } else if (windowsize > 1200 && windowsize < 1601) {

	        } else if (windowsize > 1600 && windowsize < 1921) {

	        } else if (windowsize > 1920) {

	        }
	    }
	    // Execute on load
	    checkWidth();
	    // Bind event listener
	    $(window).resize(checkWidth);
	    
	});

	function getMaxChildWidth(sel) {
	    var max = 0;
	    $(sel).children().each(function(){
	        c_width = parseInt($(this).width());
	        if (c_width > max) {
	            max = c_width;
	        }
	    });
	    return max;
	}

})( jQuery );



