<?php

function outputPostFilter() {
	?>
	<div class="hamburger-bg"></div>
	<div id="news-filter">
		<h1>News</h1>
		<div id="post-filter">
			<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
				<div class="filter-links">
				<label><strong>Show me news on:</strong></label>
				<?php
				// output form filter tags for desktop. 
					$tags = get_tags(array('get'=>'all'));
					if( $tags ) : 
						foreach ( $tags as $tag ) :
							$display_in_filter = get_field('display_in_news_filter', $tag);
							if ($display_in_filter == 'yes') {
								if ($tag->term_id == '10') {
									// all news tag
									echo "<label class='chk-wrapper'>";
						 			echo "<input class='fitler_tag' type='checkbox' value='$tag->term_id' name='$tag->name' id='filter_tag_$tag->term_id'>";
						 			echo "<label class='filter_tag_$tag->term_id active' for='filter_tag_$tag->term_id'>$tag->name</label>";
						 			echo "</label>";
								} else {
									echo "<label class='chk-wrapper'>";
						 			echo "<input class='fitler_tag' type='checkbox' value='$tag->term_id' name='$tag->name' id='filter_tag_$tag->term_id'>";
						 			echo "<label class='filter_tag_$tag->term_id' for='filter_tag_$tag->term_id'>$tag->name</label>";
						 			echo "</label>";
								}	
							}
							
						endforeach;
					endif;
				?>
				</div>
				<div class="hamburger-container">
					<div class="hamburger">
						<div class="hamburger-bar"></div>
						<div class="hamburger-bar"></div>
						<div class="hamburger-bar"></div>
					</div>

					<div class="filter-dropdown">
						<?php
						// output form filter tags for mobile. 
							$tags = get_tags(array('get'=>'all'));
							if( $tags ) : 
								foreach ( $tags as $tag ) :
									$display_in_filter = get_field('display_in_news_filter', $tag);
									if ($display_in_filter == 'yes') {
										if ($tag->term_id == '10') {
											// all news tag
											echo "<label class='chk-wrapper-mobile'>";
								 			echo "<input class='fitler_tag' type='checkbox' value='$tag->term_id' name='$tag->name' id='filter_tag_$tag->term_id'>";
								 			echo "<label class='filter_tag_$tag->term_id active' for='filter_tag_$tag->term_id'>$tag->name</label>";
								 			echo "</label>";
										} else {
											echo "<label class='chk-wrapper-mobile'>";
								 			echo "<input class='fitler_tag' type='checkbox' value='$tag->term_id' name='$tag->name' id='filter_tag_$tag->term_id'>";
								 			echo "<label class='filter_tag_$tag->term_id' for='filter_tag_$tag->term_id'>$tag->name</label>";
								 			echo "</label>";
										}
									}
									
								endforeach;
							endif;
						?>
					</div>
				</div>

				<input type="hidden" name="action" value="myfilter">
				<input type="hidden" name="fitler_tag_id" value="" id="fitler_tag_id">
			</form>
		</div>
		
		<div class="grey-curve">
		</div>

		<div id="response">
		
		<script type="text/javascript">
			function animateFilterBlock() {
				jQuery('.wdg-container').each(function(i) {
					console.log(i);
					var elm = jQuery(this);
					setTimeout(function() {
						elm.css('transform', 'scale(1)');
					}, i*300); 
					i++;
				});
			}

			function animateFilterBlockLoadMore() {
				jQuery('.loadedmore').each(function(i) {
					console.log(i);
					var elm = jQuery(this);
					setTimeout(function() {
						elm.css('transform', 'scale(1)');
					}, i*300); 
					i++;
					jQuery(this).removeClass('loadedmore');
				});
			}

			function squarePosts() {
				console.log("square posts");
				jQuery('.square-posts').each(function() {
					jQuery(this).height(jQuery(this).width());
				});
			}
        	var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
			var page = 2;
			console.log("page nmum - " + page);
			jQuery(function($) {
				$('body').on('click', '.loadmore', function() {
					var filter_tag_id = jQuery('#fitler_tag_id').attr('value');
					// console.log("filter tag id = " + filter_tag_id);
					console.log("page nmum - " + page);
				    var data = {
				        'action': 'load_posts_by_ajax',
				        'fitler_tag_id': filter_tag_id,
				        'page': page,
				        'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
				    };

				    $.post(ajaxurl, data, function(response) {
				        $('#response').append(response);
				        $('.filtered').ready(squarePosts());
				        animateFilterBlockLoadMore();
				        page++;
				    });
				    
				});
			});
		</script>

		<?php 
			$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

			$args = array(
				'posts_per_page' => 8,
				'category_name'=> 'News',
				'paged' => $paged,
			);
			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) {
				$post_count = $the_query->post_count;
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
			        $feat_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			        $content = get_the_content();
			        $content = strip_shortcodes($content);
			        // echo "$content = " . $content; 
			        $wdg_content = wp_trim_words($content, 25);
			        // echo $wdg_content; 
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
							<div class="wdg-container filtered square-posts dimmed" style="background-image: url(<?php echo esc_url($feat_img) ?>);">
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
					<?php
				}
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
				?>
				<script type="text/javascript">
					animateFilterBlock();
				</script>
				<?php
				wp_reset_postdata();
			} else {
			}
		?>
		</div>
		<div class="loadmore"><div class="down-arrow"></div>See more news articles</div>
	</div>
	    
	<?php
}