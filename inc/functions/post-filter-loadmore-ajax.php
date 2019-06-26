<?php

	function load_posts_by_ajax_callback() {
	    check_ajax_referer('load_more_posts', 'security');
	    ?>
	    <?php
	    $paged = $_POST['page'];
	    $filter_tag_id = $_POST['fitler_tag_id'];
	    $args = array(
	        'posts_per_page' => 8,
	        'category_name'=> 'News',
	        'paged' => $paged,
	    );

	    if ($filter_tag_id == '10') {
	    	
	    } else {
	    	$args['tag_id'] = $filter_tag_id;
	    }
	    

	    $my_posts = new WP_Query( $args );
	    if ( $my_posts->have_posts() ) : ?>
	    <?php
			$post_count = $my_posts->post_count;
		?>
	        <?php while ( $my_posts->have_posts() ) : 
	        		$my_posts->the_post();
			        $feat_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			        $wdg_content = wp_trim_words(get_the_content(), 25);
					?>
						<a href="<?php the_permalink(); ?>">
							<div class="wdg-container square-posts dimmed loadedmore" style="background-image: url(<?php echo esc_url($feat_img) ?>);">
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