<?php

	function load_posts_by_ajax_callback() {
	    check_ajax_referer('load_more_posts', 'security');
	    ?>
	    <?php
	    $paged = $_POST['page'];
		$ids = $_POST['ids'];

	    $filter_tag_id = $_POST['fitler_tag_id'];
	    $args = array(
	        'posts_per_page' => 10,
	        'post__not_in' => $ids,
	        'category_name'=> 'News',
	        'paged' => $paged,
	        'post_status' => 'publish',
	    );

	    if ($filter_tag_id == '10') {
	    	
	    } else {
	    	$args['tag_id'] = $filter_tag_id;
	    }
	    

	    $my_posts = new WP_Query( $args );
	    if ( $my_posts->have_posts() ) : ?>
	    <?php
			$post_count = $my_posts->post_count;
			// var_dump($ids);
		?>
	        <?php while ( $my_posts->have_posts() ) : 
	        		$my_posts->the_post();
			        $feat_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			        $content = get_the_content();
			        $content = strip_shortcodes($content);
			        $wdg_content = wp_trim_words($content, 25);
			        $ids[] = get_the_ID();
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
							<div class="wdg-container square-posts dimmed faded loadedmore" style="background-image: url(<?php echo esc_url($feat_img) ?>);">
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
				        			<p><?php echo $wdg_content; ?></p>
								</div>
							</div>
						</a>	        	
	        <?php endwhile;

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
	        ?>
	        <?php else: ?>

	        <?php endif;
	    wp_die();
	}

	add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
	add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');	
?>