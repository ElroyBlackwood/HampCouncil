// Custom scripts
(function($) {
	
	// $ Works! You can test it with next line if you like
	// console.log($);
	// run all functions that happen on resize or load
	$(document).ready(function() {

	    function checkWidth() {
	        var windowsize = $(window).width();
	        if (windowsize > 255 && windowsize < 601) {
	        	initSquare();
	        } else if (windowsize > 600 && windowsize < 1201) {
	        	initSquare();
	        } else if (windowsize > 1200 && windowsize < 1601) {
	        	initSquare();
	        } else if (windowsize > 1600 && windowsize < 1921) {
	        	initSquare();
	        } else if (windowsize > 1920) {
	        	initSquare();
	        }
	    }
	    // Execute on load
	    checkWidth();
	    shiftNavhack();
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

	function getMaxHeight(sel) {
		var maxHeight = 0;
		$(sel).each(function(){
		   if ($(this).height() > maxHeight) { 
			   maxHeight = $(this).height(); 
		   }
		});
		$(sel).each(function() {
			$(this).height(maxHeight);
		});
	}

	// square divs
	function squareElement(elm) {
		// console.log('square contnet');
		var width = $(elm).outerWidth();
		console.log(width);
		$(elm).each(function() {
			$(this).height(width);
		});
	}

	function initSquare() {
		setTimeout(function(){
			if ($('.square-sectors').length) {
		    	squareElement('.square-sectors');
			}
			if ($('.square-posts').length) {
		    	squareElement('.square-posts');
			}
			if ($('.square-story').length) {
				squareElement('.square-story');
			}
		},100);
	}
// ==========================================
	// hover functions for 2 wide widgets
// ==========================================
	$(function() {
	      $(document).on('mouseover','.wdg-container', function() {
	      	// console.log("new function");
	      	var wdgContainer = $(this);
	      	var hidden = wdgContainer.find('p');
	      	var content_height = hidden.height();
	      	var change = content_height / 2;

	      	$(this).find('.color-overlay').animate({opacity: 0.6}, 250);
	      	moveElmWdg(wdgContainer, content_height);
	      	setTimeout(showElemWdg(hidden), 260);
	      });
	      $(document).on('mouseout','.wdg-container', function() {
	      	// console.log("new functionout");
	      	var wdgContainer = $(this);
	      	var hidden = wdgContainer.find('p');
	      	var content_height = hidden.height();
	      	var change = content_height / 2;

	      	hideElemWdg(hidden);

	      	setTimeout(resetElmWdg(wdgContainer), 260);
	      	$(this).find('.color-overlay').animate({opacity: 0}, 250);
	      });
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
// ajax xall for the filter
$('.fitler_tag').click(function() {
	
	var filter = $('#filter');
	var filter_tag = $(this).attr('value');
	$('#fitler_tag_id').attr('value', filter_tag);

	$('.active').each(function() {
		$(this).removeClass('active');
		console.log('removeClass');
	});
	$(this).addClass('active');
	
	var label_id = $(this).attr('id');
	$('.' + label_id).addClass('active');
	
	$.ajax({
		url:filter.attr('action'),
		data:filter.serialize(), // form data
		type:filter.attr('method'), // POST
		beforeSend:function(xhr){
			// filter.find('button').text('Processing...'); // changing the button label
		},
		success:function(data){
			$('#response').html(data);
			$('.filtered').ready(squareElement());
			$('.filtered').each(function(i) {
				var elm = $(this);
				setTimeout(function() {
					elm.css('transform', 'scale(1)');
				}, i*300); 
				i++;
			});
		}
	});
	return false;
})
// ==========================================
	// Fileter end
// ==========================================

// ==========================================
	// Filter mobile
// ==========================================
$('.hamburger-container').on('touch click', function(e) {
	var hamburger = $(this);

	if (hamburger.hasClass('active')) {
		hamburger.find('.filter-dropdown').animate({opacity : 0}, 250, function() {
			hamburger.find('.filter-dropdown').css('display', 'none');
			hamburger.removeClass('active');
		});
	} else {
		hamburger.addClass('active');
		hamburger.find('.filter-dropdown').css('display', 'flex');
		hamburger.find('.filter-dropdown').animate({opacity : 1}, 250);
	}
	
});
// ==========================================
	// Filter mobile End
// ==========================================

// ==========================================
	// carousel function
// ==========================================

// $(document).ready(function() {
// 	console.log("size titles");
// 	sizeCarouselTitle();
// });

$(window).load(function() {
	sizeCarouselTitle();
});

function sizeCarouselTitle() {
	getMaxHeight('.slick-active .news-carousel-title');
}

// ==========================================
	// carousel function end
// ==========================================

// ==========================================
	// shiftnav
// ==========================================

function shiftNavhack() {
	var html_logo = '<a href="http://localhost/hampcouncil" id="logo_lnk"><div class="logo" style="background-image: url(http://localhost/hampcouncil/wp-content/themes/HampCouncil/assets/images/logo.png);"></div></a>';
	$('.shiftnav-site-title').html(html_logo);
}

// ==========================================
	// shiftnav end
// ==========================================

// ==========================================
	// sticky menu
// ==========================================

$(document).scroll(function() {
	// var scroll_pos = $('header').outerHeight();
	// scroll_pos = scroll_pos / 2;
	console.log('scroll');
	if ( $(document).scrollTop() >= 2 ) {
		$('#header-menu').addClass("sticky");
	} else {
		$('#header-menu').removeClass("sticky");
	}
});

// ==========================================
	// sticky menu end
// ==========================================

})( jQuery );



