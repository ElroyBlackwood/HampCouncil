<?php get_header(); ?>
			
	<script type="text/javascript">
	var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
	var page = 2;
	jQuery(function($) {
	    $('body').on('click', '.loadmore', function() {
	        var data = {
	            'action': 'load_posts_by_ajax',
	            'page': page,
	            'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
	        };
	 
	        $.post(ajaxurl, data, function(response) {
	            $('.other-posts').append(response);
	            page++;
	            $('.masonary_row_1').each(function() {
	            	console.log("tried to add to masonary")
	            	$grid.append( $(this) ).masonry( 'appended', $(this) );
	            	$(this).removeClass('masonary_row_1');
	            	last_grid_item = $(this).attr('id');
	            	last_grid_item = last_grid_item.split("_");
	            	// console.log(last_grid_item_id);
	            	last_grid_item_id = last_grid_item[2];
	            	last_grid_item_id++;
	            	console.log("current - " + last_grid_item_id);
	            });
	        });
	        
	    });
	});
	</script>
	<div class="content-block" id="content-block-post-archive">
    	<div class="content-block-post-archive">
    		<?php $intro_text = get_sub_field('pamg_introduction_text'); ?>
    		<div class="content-block-intro-text">
        		<?php echo $intro_text; ?>
    		</div>
        	<?php  
        	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

        	$category = get_the_category();
        	$current_category = $category[0]->term_id;
        	$post_cat = $current_category;

			$args= array(
						'posts_per_page' => 10,
						'order_by' => 'date',
						'order' => 'ASC',
						'cat' => $post_cat,
						'paged' => $paged,
        				);
			// the query
			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>
				<?php $count = 1; ?>
				<?php $loop_count = 0; ?>
				<?php $grid_item_count = 1; ?>
				<!-- pagination here -->
				<div class="grid">
				<div class="grid-sizer"></div>
				</div>
				<div class="other-posts">
				<!-- the loop -->
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<?php 
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
					$subcontent = wp_trim_words(get_the_content(), 20);
					$subcontent_lg = wp_trim_words(get_the_content(), 50);
					// echo $grid_item_count; //output new value
				?>
				
				<?php 
					if ($count == 1 || $count == 8) { ?>
						<div class="grid-item <?php if($loop_count == 0) { if($count == 8) { echo 'grid-item-inv'; } else {echo 'masonary_row_1'; } } else { echo 'grid-item-inv'; } ?>" id="grid_item_<?php echo $grid_item_count; ?>">
							<a href="<?php the_permalink(); ?>">
    							<div class="post-image portait" style="background-image: url(<?php echo $featured_img_url; ?>);">	
    							</div>
    							<div class="post-item-content">
    								<div class="post-item-content-container">
	        							<h4><?php the_title(); ?></h4>
	        							<p><?php echo $subcontent; ?></p>
	        						</div>
    							</div>
    						</a>
						</div>
					<?php } elseif ($count == 2 || $count == 3 || $count == 5 || $count == 6 || $count == 7) { ?>
						<div class="grid-item <?php if($loop_count == 0) { if($count == 2 || $count == 3) { echo 'masonary_row_1'; } else { echo 'grid-item-inv'; } } else { echo 'grid-item-inv'; }?>" id="grid_item_<?php echo $grid_item_count; ?>">
    						<a href="<?php the_permalink(); ?>">
    							<div class="post-image landscape" style="background-image: url(<?php echo $featured_img_url; ?>);">	
    							</div>
    							<div class="post-item-content">
    								<div class="post-item-content-container">
	        							<h4><?php the_title(); ?></h4>
	        							<p><?php echo $subcontent; ?></p>
	        						</div>
    							</div>
    						</a>
						</div>
					<?php }  elseif ($count == 4 || $count == 9) { ?>
						<div class="grid-item grid-item-inv grid-item--width2" id="grid_item_<?php echo $grid_item_count; ?>">
							<a href="<?php the_permalink(); ?>">
    							<div class="post-image landscape-double" style="background-image: url(<?php echo $featured_img_url; ?>);">	
    							</div>
    							<div class="post-item-content">
    								<div class="post-item-content-container">
	        							<h4><?php the_title(); ?></h4>
	        							<p><?php echo $subcontent_lg; ?></p>
	        						</div>
    							</div>
    						</a>
						</div>
					<?php } elseif ($count == 10) { ?>
    						<div class="grid-item grid-item-inv" id="grid_item_<?php echo $grid_item_count; ?>">
        						<a href="<?php the_permalink(); ?>">
        							<div class="post-image landscape" style="background-image: url(<?php echo $featured_img_url; ?>);">	
        							</div>
        							<div class="post-item-content">
        								<div class="post-item-content-container">
		        							<h4><?php the_title(); ?></h4>
		        							<p><?php echo $subcontent; ?></p>
		        						</div>
        							</div>
        						</a>
    						</div>
					
					<?php $count = 0; ?>
					<?php $loop_count++; ?>
					<?php 
				}
					$grid_item_count++;
					// echo $grid_item_count;
					$count++;
				?>

				<?php endwhile; ?>

				<?php 
				if(!session_id()) session_start();
				$_SESSION['grid_item_count'] = $grid_item_count;
				$_SESSION['post_cat'] = $post_cat;
				?>
				
				</div>
				</div>
				<!-- pagination here -->
				

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
			<div class="loadmore">Load More...</div>
    	</div>
	</div>
		

<?php get_footer(); ?>