<?php
	function outputNewsCarousel() {
		?>
		<script>
		(function($) {
		    $(function () {
		        $('.news-carousel').slick({
				  infinite: false,
				  speed: 300,
				  slidesToShow: 4,
				  slidesToScroll: 4,
				  arrows: true,
				  responsive: [
					{
					  breakpoint: 1200,
					  settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: true,
						dots: true
					  }
					},
					{
					  breakpoint: 700,
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

				$('.news-carousel').on('afterChange', function(slick, currentSlide){
				});
				$('.news-carousel').on('beforeChange', function(slick, currentSlide){
				});
				$('.news-carousel').on('swipe', function(slick, direction){
				});
				$('.news-carousel').on('reInit', function(slick){
				});
		    });

		    function sizeCarouselTitle() {
		    	console.log("resizxe");
		    	getMaxHeight('.news-carousel-title');
		    }

		    function getMaxHeight(sel) {
		    	var maxHeight = 0;
		    	$(sel).each(function(){
		    	   if ($(this).find('h3').outerHeight() > maxHeight) { 
		    		   maxHeight = $(this).find('h3').outerHeight(); 
		    	   }
		    	});
		    	$(sel).each(function() {
		    		$(this).height(maxHeight);
		    	});
		    }

		    $(document).ready(function() {
		        function checkWidth() {
		            var windowsize = $(window).width();
		            if (windowsize > 255 && windowsize < 601) {
		            	sizeCarouselTitle();
		            } else if (windowsize > 600 && windowsize < 1201) {
		            	sizeCarouselTitle();
		            } else if (windowsize > 1200 && windowsize < 1601) {
		            	sizeCarouselTitle();
		            } else if (windowsize > 1600 && windowsize < 1921) {	
		            	sizeCarouselTitle();
		            } else if (windowsize > 1920) {
		            	sizeCarouselTitle();
		            }
		        }
		        
		        // Execute on load
		        checkWidth();
		        
		        // Bind event listener
		        $(window).resize(checkWidth);
		        
		    
		    function refreshNews() {
		    	$('.news-carousel').slick('setPosition');
		    }

		    });

		})( jQuery );
		</script>
		<?php
		$tags = get_the_tags(get_the_ID());
		if(!empty($tags)) {
			$tag_id = $tags[0]->term_id;
			$args = array(
				'cat' => 4,
				'posts_per_page' => -1,
				'tag__not_in' => $tag_id,
			);
		} else {
			$args = array(
				'cat' => 4,
				'posts_per_page' => -1,
			);
		}
		
		$catquery = new WP_Query( $args ); ?>
		<div class="slick-wrapper">
			<div class="news-carousel">
				<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
					<?php 
						$external_post = get_field('external_blog_link');
						$is_external = false;
						$external_link = "";

						if ($external_post == 'yes') {
							$is_external = true;
							$external_link = get_field('link_to_story');
							$external_link = strip_tags($external_link);
						}
					 ?>
					<div class="slide-content">
						<a href="<?php if($is_external == true){ echo $external_link; } else { the_permalink(); } ?>" <?php if($is_external == true){ echo "target='_blank'"; } ?> >
							<div  class="news-carousel-title">
							 <h3><?php the_title(); ?></h3>
							</div>
							<?php if ( has_post_thumbnail() ) : ?>
							<?php $thumburl = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
							<div class="slide-thumbnail" style="background-image: url(<?php echo $thumburl; ?>);">
								<div class="colour-overlay">
								</div>
							</div>
							<?php endif; ?>
							<?php $excert = wp_trim_words(get_the_content(), 15) ?>
							<?php 
								$excert = str_replace("&nbsp;", "", $excert);
								$excert = strip_shortcodes($excert);
							?>
							<?php $excert = ltrim($excert); ?>
							<p><?php echo $excert; ?></p>
							<div class="read-more">
								<div class="blue-arrow"></div><span><strong>Read More</strong></span>
							</div>
						</a>
					</div>
				<?php endwhile;
					wp_reset_postdata();
				?>
			</div>
		</div>
<?php } ?>