<?php

add_action('wp_ajax_myfilter', 'filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'filter_function');
 
function filter_function(){
	$args = array(
		'orderby' => 'date', // we will sort posts by date
		'posts_per_page' => 8,
	);
	
	if ( !empty($_POST) ) {
		$id = array_shift($_POST);
		if ($id == "10") {
			$args['category_name'] = "News";
		} else {
			$args['tag_id'] = $id;
		}
	}

	// var_dump($args);
	?>
	<script type="text/javascript">
		page = 2;
	</script>
	<?php
 
	$query = new WP_Query( $args );
 
	if( $query->have_posts() ) :
		$post_count = $query->post_count;
		while( $query->have_posts() ): $query->the_post();
			$feat_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			$wdg_content = wp_trim_words(get_the_content(), 25);
			?>
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
				<a href="<?php if($is_external == true){ echo $external_link; } else { the_permalink(); } ?>" <?php if($is_external == true){ echo "target='_blank'"; } ?> >
					<div class="wdg-container square-posts dimmed filtered" style="background-image: url(<?php echo esc_url($feat_img) ?>);">
						<div class="color-overlay"></div>
						<div class="wdg-overlay">
		        			<div class="wdg-overlay-title">
			        			<h2><?php echo get_the_title(); ?></h2>
			        			<div class="read-more">
				        			<div class="blue-arrow"></div>
				        			<span><strong>Read More</strong></span>
				        		</div>
				        	</div>
		        			<?php $excert = wp_trim_words(get_the_content(), 15) ?>
		        			<p><?php echo $excert; ?></p>
						</div>
					</div>
				</a>
			<?php

		endwhile;

		if ($post_count < 8) {
			?>
			<script type="text/javascript">
        		jQuery('.loadmore').html('<div class="down-arrow"></div>No more news articles');
        	</script>
			<?php
		} else {
			?>
			<script type="text/javascript">
        		jQuery('.loadmore').html('<div class="down-arrow"></div>See more news articles');
        	</script>
			<?php
		}

		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;
 
	die();
}