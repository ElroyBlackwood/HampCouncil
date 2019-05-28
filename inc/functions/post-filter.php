<?php

function outputPostFilter() {
	?>
	<div id="news-filter">
		<h1>News</h1>
		<div id="post-filter">
			<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
				<label><strong>Show me news on:</strong></label>
				<?php
					$tags = get_tags(array('get'=>'all'));
					if( $tags ) : 
						foreach ( $tags as $tag ) :
							if ($tag->term_id == '10') {
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
							
						endforeach;
					endif;
				?>
			
				<input type="hidden" name="action" value="myfilter">
				<input type="hidden" name="fitler_tag_id" value="" id="fitler_tag_id">
			</form>
		</div>
		
		<div class="grey-gradient">
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

			function squareElement() {
				jQuery('.square').each(function() {
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
				        $('.filtered').ready(squareElement());
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
			        $wdg_content = wp_trim_words(get_the_content(), 25); 
					?>
						<a href="<?php the_permalink(); ?>">
							<div class="wdg-container square dimmed" style="background-image: url(<?php echo esc_url($feat_img) ?>);">
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