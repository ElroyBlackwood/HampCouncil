<?php
// lee functions file 

include_once('header.php');

include_once('widget-block.php');

include_once('widget-block-two-wide.php');

include_once('post-filter.php');


add_action('wp_ajax_myfilter', 'filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'filter_function');
 
function filter_function(){
	$args = array(
		'orderby' => 'date', // we will sort posts by date
	);
	
	if ( !empty($_POST) ) {
		$id = array_shift($_POST);
		if ($id == "10") {
			
		} else {
			$args['tag_id'] = $id;
		}
	}
	// if you want to use multiple checkboxed, just duplicate the above 5 lines for each checkbox
 
	$query = new WP_Query( $args );
 
	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
			$feat_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			$wdg_content = wp_trim_words(the_content(), 25); 
			?>
				<a href="<?php the_permalink(); ?>">
					<div class="wdg-container square dimmed" style="background-image: url(<?php echo esc_url($feat_img) ?>);">
						<div class="color-overlay"></div>
						<div class="wdg-overlay">
							<h2><?php echo get_the_title(); ?></h2>
							<?php echo $wdg_content; ?>
							<div class="read-more">
				    			<div class="blue-arrow" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/blue-arrow.png);"></div>
				    			<span>Read More</span>
				    		</div>
						</div>
					</div>
				</a>
				<script type="text/javascript">
					squareElement();
				</script>
			<?php
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;
 
	die();
}


// add_action( 'admin_bar_menu', 'show_template' );
// function show_template() {
// global $template;
// print_r( $template );
// }
?>