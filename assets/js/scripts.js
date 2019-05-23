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
	        	squareElement();
	        } else if (windowsize > 1200 && windowsize < 1601) {
	        	squareElement();
	        } else if (windowsize > 1600 && windowsize < 1921) {
	        	squareElement();
	        } else if (windowsize > 1920) {
	        	squareElement();
	        }
	    }
	    // Execute on load
	    checkWidth();
	    // Bind event listener
	    $(window).resize(checkWidth);
	    
	});

	// max width helper
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

	// square divs
	function squareElement() {
		$('.square').each(function() {
			$(this).height($(this).width());
		});
	}
// ==========================================
	// hover functions for 2 wide widgets
// ==========================================
	$('.wdg-container').hover(function() {
		
		var wdgContainer = $(this);
		var hidden = wdgContainer.find('p');
		var content_height = hidden.height();
		var change = content_height / 2;

		$(this).find('.color-overlay').animate({opacity: 0.6}, 250);
		moveElmWdg(wdgContainer, content_height);
		setTimeout(showElemWdg(hidden), 260);

	}, function() {

		var wdgContainer = $(this);
		var hidden = wdgContainer.find('p');
		var content_height = hidden.height();
		var change = content_height / 2;

		hideElemWdg(hidden);

		setTimeout(resetElmWdg(wdgContainer), 260);
		$(this).find('.color-overlay').animate({opacity: 0}, 250);
	});

	// fucntions for the wdg animations
	function showElemWdg(elm) {
		elm.animate({opacity: 1}, 250);
	}

	function hideElemWdg(elm) {
		elm.animate({opacity: 0}, 250);
	}

	function moveElmWdg(elm, change) {
		var half = change / 2;
		elm.find('h2').animate({top: "-" + change}, 250);
		elm.find('.read-more').animate({top: half}, 250);
	}

	function resetElmWdg(elm) {
		elm.find('h2').animate({top: "0"}, 250);
		elm.find('.read-more').animate({top: "0"}, 250);
	}
// ==========================================
	// hover functions for 2 wide widgets end
// ==========================================

// ==========================================
	// filter functions
// ==========================================

$('#filter').submit(function(){
		var filter = $('#filter');
		$.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Processing...'); // changing the button label
			},
			success:function(data){
				filter.find('button').text('Apply filter'); // changing the button label back
				$('#response').html(data); // insert data

			}
		});
		return false;
	});

$('.fitler_tag').click(function() {
	var filter = $('#filter');
	$.ajax({
		url:filter.attr('action'),
		data:filter.serialize(), // form data
		type:filter.attr('method'), // POST
		beforeSend:function(xhr){
			filter.find('button').text('Processing...'); // changing the button label
		},
		success:function(data){
			filter.find('button').text('Apply filter'); // changing the button label back
			$('#response').html(data); // insert data
			squareElement();
		}
	});
	return false;
})

// ==========================================
	// Fileter end
// ==========================================

})( jQuery );



