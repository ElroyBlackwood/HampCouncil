var $grid = jQuery('.grid').masonry({
	itemSelector: '.grid-item',
	columnWidth: '.grid-sizer',
	gutter: '.gutter-sizer',
	percentPosition: true
});

var last_grid_item_id;
var counted = false;

// Custom scripts
(function($) {
	
	// $ Works! You can test it with next line if you like
	// console.log($);
	// run all functions that happen on resize or load
	$(document).ready(function() {

	    function checkWidth() {
	    	var is_touch = is_touch_device();
	        var windowsize = $(window).width();
	        if (windowsize > 255 && windowsize < 601) {
	           sizeBannerMb();
	           sizeBanner();
	           square();
				if(is_touch == true) {

				} else {
					sizeSocialWdg();
				}

	        } else if (windowsize > 600 && windowsize < 1201) {
	           sizeBanner();
	           square();
	           if(is_touch == true) {

	           } else {
	           	sizeSocialWdg();
	           }

	        } else if (windowsize > 1200 && windowsize < 1601) {
	           sizeBanner();
	           square();
	           alignBreadcrumbs();
	           sizeSocialWdg();

	        } else if (windowsize > 1600 && windowsize < 1921) {
	           sizeBanner();
	           square();
	           alignBreadcrumbs();
	           sizeSocialWdg();

	        } else if (windowsize > 1920) {
	           sizeBanner();
	           square();
	           alignBreadcrumbs();
	           sizeSocialWdg();

	        }
	    }
	    // Execute on load
	    checkWidth();
	    // Bind event listener
	    $(window).resize(checkWidth);
	    
	    setTimeout(function () {
			sizeSocialWdg();
	    }, 3000);
	    loadMobileNavLogo();
	});

	// size nav li for hover effect
	function sizeNav() {
		var navHeight = $('header').outerHeight();
		$('header .header-wrapper nav ul li').height(navHeight);		
	}

	function alignDropDown() {
		var navHeight = $('header').outerHeight();
		$('.dropdown-menu').each(function() {
			$(this).css("top", navHeight);
		});
	}

	function sizeBanner() {
		var navHeight = $('header').outerHeight();
		var slider_height = $(window).height() - navHeight;
		$('#silder_carousel .slide').each(function(){
			$(this).css('height', slider_height);
		});
		$('.hero-image').height(slider_height);
	}

	function sizeBannerMb() {
		var navHeight = $('header').outerHeight();
		$('.hero-image').height("50vh");
	}

	function statsCounter() {
		$('.count').each(function () {
		    $(this).prop('Counter',0).animate({
		        Counter: $(this).text()
		    }, {
		        duration: 4000,
		        easing: 'swing',
		        step: function (now) {
		            $(this).text(Math.ceil(now));
		        }
		    });
		});
	}

	function square() {
		$('.square').each(function(){
			var width = $(this).width();
			$(this).height(width);
		});
	}

	function alignBreadcrumbs() {
		var $header = $('.header-wrapper').position();
		var vw = $(window).width() / 100 * 1;
		$('#breadcrumbs').css("left", $header.left - vw);
	}

	function loadMobileNavLogo(){
		var home_url = window.location.origin;
		$('.mobile-nav-logo').html('<a href="' + home_url + '"><img src="' + home_url + '/wp-content/themes/lgo-theme/assets/images/dwt-logo-new-md.png"></a>');
		$('.shiftnav-menu-title').html('<a href="' + home_url + '"><img src="' + home_url + '/wp-content/themes/lgo-theme/assets/images/dwt-logo-new-md.png"></a>');
	}

	// hover functions
	$('.scale-transport').hover(function() {
		$('.transport-grid-item', this).addClass('scale');
		$('h3', this).css("top", "-20.5%");
		$('.left-arrow', this).css('left', "50%");
	}, function() {
		$('.transport-grid-item', this).removeClass('scale');
		$('h3', this).css("top", "0");
		$('.left-arrow', this).css('left', "-40%");
	});

	// transport links content block link highlighter
	$(document).ready(function() {
		var links_list = $('.content-block-transport-links ol li a');
		var url = window.location.href;
		links_list.each(function() {
			link_url = $(this).attr('href');
			if (link_url == url) {
				$(this).addClass("active-link");
			}
		});
	});

	// add to masonary grid fn
	function addToMasonry(elem) {
		$grid.append( $(this) ).masonry( 'appended', $(this) );
		$(this).removeClass('masonary_row_1');
	}

	// initial sweep on page load to add correct ones 
	$(document).ready(function() {
		$('.masonary_row_1').each(function() {
			$grid.append( $(this) ).masonry( 'appended', $(this) );
			$(this).removeClass('masonary_row_1');
			last_grid_item = $(this).attr('id');
			last_grid_item = last_grid_item.split("_");
			// console.log(last_grid_item_id);
			last_grid_item_id = last_grid_item[2];
			last_grid_item_id++;
			// console.log("current - " + last_grid_item_id);
		});
	});

	// load more click fucntion to append newly scolled items to masonary grid
	 $('body').on('click', '.loadmore', function() {
	 	$('.masonary_row_1').each(function() {
	 		$grid.append( $(this) ).masonry( 'appended', $(this) );
	 		$(this).removeClass('masonary_row_1');
	 		last_grid_item = $(this).attr('id');
	 		last_grid_item = last_grid_item.split("_");
	 		// console.log(last_grid_item_id);
	 		last_grid_item_id = last_grid_item[2];
	 		last_grid_item_id++;
	 		// console.log("current - " + last_grid_item_id);
	 	}, 2000);
	 });

	// detect same as above but scroll  
	$(document).scroll(function() {
		// console.log("doc scoll");
		$('.grid-item-inv').each(function() {
			if ( $(this).visible() ) {
				var next_grid_item = $(this).attr('id');
				next_grid_item = next_grid_item.split("_");
				var next_grid_item_id = next_grid_item[2];
				// console.log("next - " + next_grid_item_id);
				if (next_grid_item_id == last_grid_item_id) {
					$(this).animate({
						opacity: 1
					}, 100, function() {
						 
					});
					$grid.append( $(this) ).masonry( 'appended', $(this) );
					$(this).removeClass('grid-item-inv');
					last_grid_item_id++;
					// console.log("current " + last_grid_item_id);
				}
			}
		});
	});

	function scroll_to_anchor(anchor_id){
	    var tag = $("#"+anchor_id+"");
	    $('html,body').animate({scrollTop: tag.offset().top},'slow');
	}



	$('.top-anch').click(function(){
	    $('html, body').animate({
	        scrollTop: $( $(this).attr('href') ).offset().top
	    }, 1000);
	    return false;
	});

	$('#apply_now').click(function(){
	  scroll_to_anchor('apply_now');
	});

	var original_width = $('.search-container').width();

	$('.search-icon img').click(function() {
		var search_icon = $(this);
		var	search_container = $('.search-container');
		var search_field = $('.search-field');
		var width = $('.phone-header').width();
		var width_inc = width + (width / 100 * 40);
		// console.log(original_width);

		if ( search_icon.hasClass('open') ) {
			// do this last
			search_field.animate({opacity: '0'}, 500, function() {
				
				search_field.css('display', "none");
				search_field.animate({width: "0"}, 500, function() {});
			});
			search_icon.removeClass('open');
		} else {
			search_icon.addClass('open')
			
			search_field.animate({width: "10vw"}, 500, function() {
				search_field.css('display', "block");
				search_field.animate({opacity: '1'}, 500, function() {});
			});

		}
	});

	function is_touch_device() {
	  var prefixes = ' -webkit- -moz- -o- -ms- '.split(' ');
	  var mq = function(query) {
	    return window.matchMedia(query).matches;
	  }

	  if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
	    return true;
	  }

	  // include the 'heartz' as a way to have a non matching MQ to help terminate the join
	  // https://git.io/vznFH
	  var query = ['(', prefixes.join('touch-enabled),('), 'heartz', ')'].join('');
	  return mq(query);
	}

	$(document).ready(function() {
		var is_touch = is_touch_device();

		if(is_touch == true) {
			//post grid 
			$(document).on("click", ".hover_lnk", function(e) {
				
				if( $(this).hasClass('hovered') ) {

				} else {
					$('.hover_lnk').each(function() {
						$(this).removeClass('hovered');
					});
					e.preventDefault();
					$(this).addClass('hovered');
				}
				
			});

			// latest post wdg
			$(".wdg-post-container").click(function(e) {
					$(this).children('img').css('left', '50%');
				}, function(e) {
					$(this).children('img').css('left', '-100%');
			});

			// footerlogos
			$(document).on("click", ".footer-logo", function(e) {
				
				if( $(this).hasClass('hovered') ) {

				} else {
					$('.footer-logo').each(function() {
						$(this).removeClass('hovered');
					});
					e.preventDefault();
					$(this).addClass('hovered');
				}
				
			});
		} else {
			//post grid 
			$(document).on("hover", ".hover_lnk", function(e) {
				
				if( $(this).hasClass('hovered') ) {

				} else {
					$('.hover_lnk').each(function() {
						$(this).removeClass('hovered');
					});
					e.preventDefault();
					$(this).addClass('hovered');
				}
				
			});
			// latest post wdg
			$(".wdg-post-container").hover(function(e) {
					$(this).children('img').css('left', '50%');
				}, function(e) {
					$(this).children('img').css('left', '-100%');
			});

			// footer logos
			$(document).on("mouseenter", ".footer-logo", function(e) {
				
				if( $(this).hasClass('hovered') ) {

				} else {
					$('.footer-logo').each(function() {
						$(this).removeClass('hovered');
					});
					e.preventDefault();
					$(this).addClass('hovered');
				}
				
			});

			$(document).on("mouseleave", ".footer-logo", function(e) {
				$(this).removeClass('hovered');		
			});

			// change direction icons on hover
			var template_dir = document.location.origin + '/wp-content/themes/lgo-theme/';
			$('.car-link').hover(function(e) {
				$('.car-icon').css('background-image', 'url(' + template_dir + 'assets/images/icons/car-icon-hover.png)');
			}, function(e) {
				$('.car-icon').css('background-image', 'url(' + template_dir + 'assets/images/icons/car-icon.png)');
			});

			$('.trans-link').hover(function(e) {
				$('.transport-icon').css('background-image', 'url(' + template_dir + 'assets/images/icons/transport-icon-hover.png)');
			}, function(e) {
				$('.transport-icon').css('background-image', 'url(' + template_dir + 'assets/images/icons/transport-icon.png)');
			});

			$('.cycle-link').hover(function(e) {
				$('.cycle-icon').css('background-image', 'url(' + template_dir + 'assets/images/icons/cycle-icon-hover.png)');
			}, function(e) {
				$('.cycle-icon').css('background-image', 'url(' + template_dir + 'assets/images/icons/cycle-icon.png)');
			});

			$('.walking-link').hover(function(e) {
				$('.walking-icon').css('background-image', 'url(' + template_dir + 'assets/images/icons/walking-icon-hover.png)');
			}, function(e) {
				$('.walking-icon').css('background-image', 'url(' + template_dir + 'assets/images/icons/walking-icon.png)');
			});
		}
	});

	$(document).scroll(function() {
		// var scroll_pos = $('header').outerHeight();
		// scroll_pos = scroll_pos / 2;
		if ( $(document).scrollTop() >= 2 ) {
			$('header').addClass("sticky");
		} else {
			$('header').removeClass("sticky");
		}
	});

	$('.dropdown-toggle').click(function() {
	    var location = jQuery(this).attr('href');
	    window.location.href = location;
	    return false;
	});

	$(document).ready(function() {
		var breadcrumb_cont = $('.breadcrumb-container');
		var home_url = document.location.origin;
		// console.log("child - " + breadcrumb_cont);
		$('a', breadcrumb_cont).each(function() {
			var url = $(this).attr('href');
			if (url) {
				if (url.indexOf('vacancies') >= 0) {
					$(this).attr('href', home_url + '/current-vacancies/');
				} else if(url.indexOf('/case-studies/') >= 0) {
					// $(this).attr('href', home_url + '/case-studies/');
					if ($(this).html() != "Case Studies") {
						$(this).html('');
						 var span_to_remove = $(this).parent();
						 var span_to_move = $(span_to_remove).children();
						 $(span_to_move).parent().before(span_to_move);
						 $(span_to_remove).remove();
						 $(this).remove();
					}
					if ($(this).html() == "Case Studies") {
						$(this).attr('href', home_url + '/case-studies/')
					}

				}
			} else {

			}
			
		});

	});

	$(document).ready(function() {
		var url = document.location.href;
		if (url.indexOf('gallery') >= 0) {
			$('.breadcrumb-container').css('border-bottom', '1px solid #fff');
			console.log("galler url");
		} else {
			console.log("not galler");
		}
	})

	String.prototype.replaceAt=function(index, replacement) {
	    return this.substr(0, index) + replacement+ this.substr(index + replacement.length);
	}

	function sizeSocialWdg() {
		var insta_wdg = $('.instagram-wdg');
		var height = insta_wdg.height();
		var width = insta_wdg.width();
		var fb_container = $('.facebook-wdg-container');

		var o_html = '<div class="fb-page" data-href="https://www.facebook.com/DavidWatsonTransport/" data-width="500" data-height="500" data-tabs="timeline" data-small-header="true" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/DavidWatsonTransport/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/DavidWatsonTransport/">David Watson Transport Ltd</a></blockquote></div>';
		var n_html = '<div class="fb-page" data-href="https://www.facebook.com/DavidWatsonTransport/" data-width="' + width + '" data-height="' + height + '" data-tabs="timeline" data-small-header="true" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/DavidWatsonTransport/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/DavidWatsonTransport/">David Watson Transport Ltd</a></blockquote></div>';
		
		fb_container.html("Loading Facebook");
		fb_container.html(n_html);
		setTimeout(function() {
			FB.XFBML.parse();
		}, 1000);
	}

	$(document).ready(function() {
		$('.dropdown').each(function() {
			var is_active = false;
			var dd_menu = $(this).find('.dropdown-menu');
			dd_menu.children().each(function() {
				if ($(this).hasClass('active')) {
					is_active = true;
				} else {

				}
			});
			if (is_active) {
				$(this).addClass('active');
			} else {

			}
		});
	});

	$('.frm-nav-btn').click(function(){
		var section_to_enable = $(this).attr('href');
		var anchor_id = $(this).attr('id');
		scroll_to_anchor(anchor_id);
		$(section_to_enable).css('display', "block");
		$(section_to_enable).animate({opacity: 1}, 500);

	});

	$('.popup-link').click(function() {
		var popup_to_enable = $(this).attr('href');
		$(popup_to_enable).css('display', 'block');
		if ($('.hidden').length) {
			console.log("visible");
			$iframe = $('.hidden').html();
			$('.content-block-video').html($iframe);
		}
		$(popup_to_enable).animate({opacity: 1}, 500, function() {
		});
	})

	$('.popup-bg').click(function() {
		$('.popup-container').each(function() {
			
			$(this).animate({opacity: 0}, 500, function() {
				$(this).css('display', 'none');		
			});
		})
	});

	// check if in viewport
	$.fn.isInViewport = function() {
			var elementTop = $(this).offset().top;
			var elementBottom = elementTop + $(this).outerHeight();

			var viewportTop = $(window).scrollTop();
			var viewportBottom = viewportTop + $(window).height();

			return elementBottom > viewportTop && elementTop < viewportBottom;
	};

	$(window).on('resize scroll', function() {
		if ($('#company-stats').length) {
			// console.log("inside if");
			if ($('#company-stats').isInViewport()) {
				if (counted) {

				} else {
					statsCounter();
					counted = true;
				}

			} else {

			}
		} else {

		}
	});

	$(document).ready(function() {  
		$("#silder_carousel").swiperight(function() {
			  // alert("Swipe detected");  
		  $("#silder_carousel").carousel('prev');  
		});  
		$("#silder_carousel").swipeleft(function() { 
		   // alert("Swipe detected");   
		  $("#silder_carousel").carousel('next');  
		});

		$("#testimonial_carousel").swiperight(function() {
			  // alert("Swipe detected");  
		 $("#testimonial_carousel").carousel('prev');  
		});  
		$("#testimonial_carousel").swipeleft(function() { 
		   // alert("Swipe detected");   
		 $("#testimonial_carousel").carousel('next');  
		});

		$("[id^=content_block_slider]").swiperight(function() {
		 $(this).carousel('prev');  
		});  
		$("[id^=content_block_slider]").swipeleft(function() { 
		 $(this).carousel('next');  
		});

		$("#inpage-silder_carousel").swiperight(function() {
			  // alert("Swipe detected");  
		 $("#inpage-silder_carousel").carousel('prev');  
		});  
		$("#inpage-silder_carousel").swipeleft(function() { 
		   // alert("Swipe detected");   
		 $("#inpage-silder_carousel").carousel('next');  
		});
		
		$('.logo-carousel').slick({
		  dots: false,
		  infinite: true,
		  speed: 300,
		  slidesToShow: 7,
		  slidesToScroll: 7,
		  responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 4,
		        slidesToScroll: 4,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
		});

	}); 
})( jQuery );



