<?php
	function outputStories() {
		?>
		<script>
		(function($) {
		    $(function () {
		        $('.stories-carousel').slick({
				  infinite: false,
				  speed: 300,
				  slidesToShow: 2,
				  slidesToScroll: 2,
				  arrows: true,
				  dots: true,
				  responsive: [
					{
					  breakpoint: 1024,
					  settings: {
						slidesToShow: 2,
						slidesToScroll: 2,
						infinite: true,
						dots: true
					  }
					},
					{
					  breakpoint: 600,
					  settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						dots: false
					  }
					},
				  ]
				});
		    });
		})( jQuery );
		</script>
		<?php
		$tags = get_the_tags(get_the_ID());
		$tag_name = "";
		if (!empty($tags)) {
			$tag_id = $tags[0]->term_id;
			$tag_name = $tags[0]->name;
			
			// echo "tag id = " . $tag_id;
			// var_dump($tags);
			$args = array(
				'posts_per_page' => -1,
				'tag_id' => $tag_id,
			);
		} else {
			$args = array(
				'posts_per_page' => -1,
				'category_name' => 'News',
			);
		}

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) { ?>
		<div class="container-fluid" id="our-stories">
			<div class="in-page-title orange-text">
				<h1><?php echo $tag_name; ?> Stories</h1>
			</div>
			<div class="slick-wrapper">
				<div class="stories-carousel container-width">
			<?php while ( $the_query->have_posts() ) {
					$the_query->the_post(); ?>
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
					<?php $feat_img = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
					<div class="slide-content">
				        <a href="<?php if($is_external == true){ echo $external_link; } else { the_permalink(); } ?>" <?php if($is_external == true){ echo "target='_blank'"; } ?> >
				        	<div class="wdg-container square-story dimmed" style="background-image: url(<?php echo $feat_img; ?>);">
				        		<div class="color-overlay"></div>
				        		<div class="wdg-overlay">
				        			<h2><?php echo get_the_title(); ?></h2>
				        			<?php $excert = wp_trim_words(get_the_content(), 15) ?>
				        			<p><?php echo $excert; ?></p>
				        			<div class="read-more">
					        			<div class="blue-arrow" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/blue-arrow.png);"></div>
					        			<span><strong>Read More</strong></span>
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
		</div>
<?php
	}
?>