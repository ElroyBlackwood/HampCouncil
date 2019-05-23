<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php
	// Start the Loop.
	while ( have_posts() ) :
		the_post();
		?>

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

    			$args= array(
    						'posts_per_page' => 10,
    						'order_by' => 'date',
    						'order' => 'ASC',
    						'paged' => $paged,
            				);
    			// the query
    			$the_query = new WP_Query( $args ); ?>

    			<?php if ( $the_query->have_posts() ) : ?>
    				<?php $count = 1; ?>
    				<?php $loop_count = 0; ?>
    				<?php $grid_item_count = 1; ?>
    				<!-- pagination here -->
    				<!-- the loop -->
    				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    				
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

	<?php	// End the loop.
	endwhile;


	// If no content, include the "No posts found" template.
else :

endif;
?>

<?php get_footer(); ?>