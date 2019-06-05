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
				<a href="<?php the_permalink(); ?>">
					<div class="wdg-container square-posts dimmed filtered" style="background-image: url(<?php echo esc_url($feat_img) ?>);">
						<div class="color-overlay"></div>
						<div class="wdg-overlay">
							<h2><?php echo get_the_title(); ?></h2>
							<p><?php echo $wdg_content; ?></p>
							<div class="read-more">
				    			<div class="blue-arrow" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/blue-arrow.png);"></div>
				    			<span>Read More</span>
				    		</div>
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