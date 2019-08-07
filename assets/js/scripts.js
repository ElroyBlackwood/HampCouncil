// Custom scripts
(function($) {
	
	// $ Works! You can test it with next line if you like
	// run all functions that happen on resize or load
	$(document).ready(function() {

		var resizeTimer;

	    function checkWidth() {
	        var windowsize = $(window).width();
	        if (windowsize > 255 && windowsize < 601) {
	        	initSquare();
	        	alignHeaderCurve();
	        	alignNewsCurve();
	        	alignBlueFooterCurve();
	        	alignHeaderCurveNewsSingle();

	        } else if (windowsize > 600 && windowsize < 1201) {
	        	initSquare();
	        	alignHeaderCurve();
	        	alignNewsCurve();
	        	alignBlueFooterCurve();
	        	alignHeaderCurveNewsSingle();

	        } else if (windowsize > 1200 && windowsize < 1601) {
	        	initSquare();
	        	alignHeaderCurve();
	        	alignNewsCurve();
	        	alignBlueFooterCurve();
	        	alignHeaderCurveNewsSingle();

	        } else if (windowsize > 1600 && windowsize < 1921) {
	        	initSquare();
	        	alignHeaderCurve();
	        	alignNewsCurve();
	        	alignBlueFooterCurve();
	        	alignHeaderCurveNewsSingle();

	        } else if (windowsize > 1920) {
	        	initSquare();
	        	alignHeaderCurve();
	        	alignNewsCurve();
	        	alignBlueFooterCurve();
	        	alignHeaderCurveNewsSingle();
	        }
	    }
	    // Execute on load
	    checkWidth();
	    shiftNavhack();
	    triggerSticky();
	    alignHeaderCurve();
	    // Bind event listener
	    $(window).on("resize", function(e){
	    	clearTimeout(resizeTimer);
	    	resizeTimer = setTimeout(function(){
	    		checkWidth();
	    	}, 250); 
	    });	    
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
		var width = $(elm).outerWidth();
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
			if ($('.news-carousel .slide-thumbnail').length) {
				setTimeout(function(){
					$('.news-carousel .slide-thumbnail').each(function() {
						var width = $('.news-carousel .slide-content').width();
						$(this).height(width);
					});
				}, 100);
			}
		},100);
	}
// ==========================================
	// hover functions for 2 wide widgets
// ==========================================
	$(function() {
	      $(document).on('mouseover','.wdg-container', function() {
	      	if ($(this).hasClass('hover-active')) {

	      	} else {
	      		$(this).addClass('hover-active');
	      		var wdgContainer = $(this);
	      		var hidden = wdgContainer.find('p');
	      		var content_height = hidden.height();
	      		// var change = content_height / 2;

	      		$(this).find('.color-overlay').animate({opacity: 0.6}, 250);
	      		moveElmWdg(wdgContainer, content_height);
	      		setTimeout(showElemWdg(hidden), 260);		
	      	}
	      
	      });
	      $(document).on('mouseleave','.wdg-container', function() {
	      	var wdgContainer = $(this);
	      	var hidden = wdgContainer.find('p');
	      	var content_height = hidden.height();
	      	var change = content_height / 2;

	      	if ($(this).hasClass('hover-active')) {
	      		hideElemWdg(hidden);
	      		setTimeout(resetElmWdg(wdgContainer), 260);
	      		$(this).find('.color-overlay').animate({opacity: 0}, 250);
	      		$(this).removeClass('hover-active');
	      	} else {

	      	}

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
		var hidden_top = elm.find('p').position().top;
		var title_top = elm.find('h2').position().top;
		var read_more_top = elm.find('.read-more').position().top;
		var title_height = elm.find('h2').height();
		var hidden_height = elm.find('p').height();
		var title_change = hidden_top - title_top - title_height - 10;
		var readmore_change = hidden_top - read_more_top + hidden_height + 10;

		elm.find('h2').animate({top: title_change}, 250);
		elm.find('.read-more').animate({top: readmore_change}, 250);
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
			$('.filtered').ready(squarePosts());
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
	var hamburger_bg = $('.hamburger-bg');

	if (hamburger.hasClass('active')) {
		hamburger.find('.filter-dropdown').animate({opacity : 0}, 250, function() {
			hamburger.find('.filter-dropdown').css('display', 'none');
			hamburger.removeClass('active');
			hamburger_bg.toggle();
		});
	} else {
		hamburger.addClass('active');
		hamburger.find('.filter-dropdown').css('display', 'flex');
		hamburger.find('.filter-dropdown').animate({opacity : 1}, 250);
		hamburger_bg.toggle();
	}
	
});

$('.hamburger-bg').on('touch click', function(e) {
	var hamburger = $('.hamburger-container');
	var hamburger_bg = $(this);

	if (hamburger.hasClass('active')) {
		hamburger.find('.filter-dropdown').animate({opacity : 0}, 250, function() {
			hamburger.find('.filter-dropdown').css('display', 'none');
			hamburger.removeClass('active');
			hamburger_bg.toggle();
		});
	} else {

	}
	
});
// ==========================================
	// Filter mobile End
// ==========================================

// ==========================================
	// carousel function
// ==========================================

// $(document).ready(function() {
// 	sizeCarouselTitle();
// });

$(window).load(function() {
	sizeCarouselTitle();
});

function sizeCarouselTitle() {
	getMaxHeight('.slick-slide .news-carousel-title');
}

// ==========================================
	// carousel function end
// ==========================================

// ==========================================
	// shiftnav
// ==========================================

function shiftNavhack() {
	var html_logo = '<a href="http://hampshire.ounodemo.co.uk" id="logo_lnk"><div class="logo" style="background-image: url(/wp-content/themes/HampCouncil/assets/images/logo.png);"></div></a>';
	$('.shiftnav-site-title').html(html_logo);
}

// ==========================================
	// shiftnav end
// ==========================================

// ==========================================
	// sticky menu
// ==========================================

$(document).scroll(function() {
	var windowsize = $(window).width();
	if (windowsize > 255 && windowsize < 601) {
	} else if (windowsize > 600 && windowsize < 1201) {
	} else if (windowsize > 1200 && windowsize < 1601) {
		triggerSticky();
	} else if (windowsize > 1600 && windowsize < 1921) {
		triggerSticky();
	} else if (windowsize > 1920) {
		triggerSticky();
	}

});

function triggerSticky() {
	var height = $('#banner').height();
	if ( $(document).scrollTop() >= height ) {
		$('#header-menu').addClass("sticky");
	} else {
		$('#header-menu').removeClass("sticky");
	}
}

// ==========================================
	// sticky menu end
// ==========================================

// ==========================================
	// nav menu hover
// ==========================================

$(document).on('mouseenter', '.dropdown', function() {
	if($('.active-dd').length) {
		$('.active-dd').each(function() {
			$(this).removeClass('active-dd');
		});
	} else {

	}
	var menuItem = $(this);
	var dropdown = menuItem.find('.dropdown-menu-custom');
	dropdown.addClass('active-dd');
});

$(document).on('mouseenter', '#header-menu', function(event) {
	if($('.active-dd').length) {
		event.stopImmediatePropagation();
	} else {

	}
});

$(document).on('mouseleave', '#header-menu', function(event) {
	$('.active-dd').each(function() {
		$(this).removeClass('active-dd');
	});
});

$(document).on('mouseenter', '#top-bar', function(event) {
	$('.active-dd').each(function() {
		$(this).removeClass('active-dd');
	});
});

// ==========================================
	// nav menu hover end
// ==========================================

// ==========================================
	// elm in viewport detect 
// ==========================================
$(document).ready(function(){
	$('.dropdown-menu-custom').each(function() {
		$(this).addClass('left-menu');
	});
});

var isOutOfViewport = function (elem) {

	// Get element's bounding
	var bounding = elem[0].getBoundingClientRect();

	// Check if it's out of the viewport on each side
	var out = {};
	out.top = bounding.top < 0;
	out.left = bounding.left < 0;
	out.bottom = bounding.bottom > (window.innerHeight || document.documentElement.clientHeight);
	out.right = bounding.right > (window.innerWidth || document.documentElement.clientWidth);
	out.any = out.top || out.left || out.bottom || out.right;
	out.all = out.top && out.left && out.bottom && out.right;

	return out;

};

$(document).on('mouseenter', '.dropdown', function() {
	var elm = $(this).find('.active-dd');
	var isOut = isOutOfViewport(elm);
	var outofVP = false;
	if (isOut.top) {
		outofVP = true;
	}

	if (isOut.left) {
		outofVP = true;
	}

	if (isOut.bottom) {
		outofVP = true;
	}

	if (isOut.right) {
		outofVP = true;
	}
	if (isOut.any) {
		outofVP = true;
	}
	if (isOut.all) {
		outofVP = true;
	}

	if (outofVP) {
		elm.removeClass('left-menu');
		elm.addClass('right-menu');
	}
});


// ==========================================
	// elm in viewport end
// ==========================================


// ==========================================
	// scroll down on banner
// ==========================================

$(document).on('touch click', '.scroll-dwn', function() {
	scrollToAnchor('#banner-anch');
	// alert("hello");
});

function scrollToAnchor(aid){
    var aTag = $(aid);
    $('html, body').animate({scrollTop: aTag.offset().top}, 800);
}
// ==========================================
	// scroll down on banner end
// ==========================================

// ==========================================
	// checkbox stuff
// ==========================================

$('#checkboxG4').change(function() {
	var checkbox = $('#checkmark-checkboxG4');
	
	if (checkbox.hasClass('checkbox-active')) {
		checkbox.removeClass('checkbox-active');
	} else {
		checkbox.addClass('checkbox-active');
	}

});

$('#checkmark-checkboxG4').click(function() {
	$('#checkboxG4').click();
});

// ==========================================
	// checkbox stuff end
// ==========================================

// ==========================================
	// curve alignment
// ==========================================

function alignHeaderCurve() {
	var banner = $('#banner');
	var banner_height = banner.height();
	console.log(banner.height());
	var orange_curve = banner.find('.orange-curve');
	var orange_curve_height = orange_curve.outerHeight();
	var top = banner_height - orange_curve_height + 2;
	orange_curve.css('top', top);
}

function alignHeaderCurveNewsSingle() {
	var banner = $('.news-header #banner');
	var banner_height = banner.height();
	console.log(banner.height());
	var orange_curve = banner.find('.orange-curve');
	var orange_curve_height = orange_curve.outerHeight();
	var top = banner_height - orange_curve_height + 2;
	orange_curve.css('top', top);
}

function alignNewsCurve() {
	var newsBlock = $('#news-carousel');
	var newsBlockHeight = newsBlock.height();
	var orange_curve = newsBlock.find('.orange-curve');
	var orange_curve_height = orange_curve.outerHeight() - 2;
	var top = -Math.abs(orange_curve_height);
	orange_curve.css('top', top);
}

function alignBlueFooterCurve() {
	var footerBlock = $('#footer_menus');
	var blueCurve = footerBlock.find('.blue-curve');
	var blueCurveHeight = blueCurve.outerHeight();
	var top = -Math.abs(blueCurveHeight);
	blueCurve.css('top', top);
}


// ==========================================
	// curve alignment end
// ==========================================

// ==========================================
	// preloader
// ==========================================

$(document).ready(function() {
	$('#preLoader').animate({opacity: 0}, 500, function() {
		$('html, body').css('overflow-y', 'auto');
		$(this).css('display', 'none');
	});
});

// ==========================================
	// preloader end
// ==========================================

// ==========================================
	// nav
// ==========================================

$(document).ready(function() {
	var navitem = $('#menu-main-menu li');
	var link;

	navitem.click(function() {
		link = $(this).find('a').attr('href');
		window.location.href = link;
	});
});

// ==========================================
	// nav end
// ==========================================


// ==========================================
	// post gallery
// ==========================================

	 $('.main-image-gallery').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.nav-main-image-gallery'
	});
	$('.nav-main-image-gallery').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.main-image-gallery',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true,
	  responsive: [
	     {
	       breakpoint: 1200,
	       settings: {
	         slidesToShow: 3,
	         slidesToScroll: 1,
	         infinite: true,
	         dots: true
	       }
	     },
	     {
	       breakpoint: 600,
	       settings: {
	         slidesToShow: 1,
	         slidesToScroll: 1
	       }
	     }
	   ]
	});

// ==========================================
	// post gallery end
// ==========================================

// ==========================================
	// external link hack
// ==========================================
$('a').each(function() {
	var currentLink = $(this);
	var href = currentLink.attr('href');
	var url = window.location.origin;
 	
	if (href === undefined) {
		
	} else {
		if (href.indexOf(url) >= 0) {
			
		} else if (href.indexOf('mailto') >= 0) { 

		} else if (href.indexOf('tel') >= 0) {

		} else {
			currentLink.attr('target', '_blank');
		}
	}
});

// ==========================================
	// external link end
// ==========================================

})( jQuery );