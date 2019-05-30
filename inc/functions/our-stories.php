<?php
	function outputStories() {
		?>
		<script>
		(function($) {
		    $(function () {
		        $('.stories-carousel').slick({
				  infinite: false,
				  speed: 300,
				  slidesToShow: 4,
				  slidesToScroll: 4,
				  arrows: true,
				  responsive: [
					{
					  breakpoint: 1024,
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
		    });
		})( jQuery );
		</script>
		<?php
		$tags = get_the_tags(get_the_ID());
		$tag_id = $tags[0]->term_id;
		// echo "tag id = " . $tag_id;
		// var_dump($tags);
		$args = array(
			'posts_per_page' => -1,
			'tag_id' => $tag_id,
		);

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) { ?>
		<div class="slick-wrapper">
			<div class="news-carousel">
		<?php while ( $the_query->have_posts() ) {
				$the_query->the_post(); ?>
				<?php $feat_img = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
				<div class="slide-content">
			        <a href="<?php the_permalink(); ?>">
			        	<div class="wdg-container square dimmed" style="background-image: url(<?php echo $feat_img; ?>);">
			        		<div class="color-overlay"></div>
			        		<div class="wdg-overlay">
			        			<h2><?php echo get_the_title(); ?></h2>
			        			<div class="read-more">
				        			<div class="blue-arrow" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/blue-arrow.png);"></div>
				        			<span>Read More</span>
				        		</div>
			        		</div>
			        	</div>
			        </a>
				</div>
		<?php }
			wp_reset_postdata();
		} else {
		}
	?>
			</div>
		</div>
<?php
	}
?>