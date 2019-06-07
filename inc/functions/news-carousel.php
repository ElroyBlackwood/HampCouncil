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

				function sizeCarouselTitle() {
					getMaxHeight('.slick-active .news-carousel-title');
				}

				$('.news-carousel').on('afterChange', function(slick, currentSlide){
					// sizeCarouselTitle();
				});
				$('.news-carousel').on('beforeChange', function(slick, currentSlide){
					sizeCarouselTitle();
				});
				$('.news-carousel').on('swipe', function(slick, direction){
					// sizeCarouselTitle();
				});
				$('.news-carousel').on('reInit', function(slick){
					// sizeCarouselTitle();
				});
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
					<div class="slide-content">
						<a href="<?php the_permalink() ?>" rel="bookmark">
							 <h3 class="news-carousel-title"><?php the_title(); ?></h3>
							<?php if ( has_post_thumbnail() ) : ?>
							<?php $thumburl = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
							<div class="slide-thumbnail dimmed" style="background-image: url(<?php echo $thumburl; ?>);">
							</div>
							<?php endif; ?>
							<?php $excert = wp_trim_words(get_the_content(), 15) ?>
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