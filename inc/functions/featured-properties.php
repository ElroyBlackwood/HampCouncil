<?php
function outputFeatProperties() {
	$args = array(
		'posts_per_page' => -1,
		'category_name' => 'Property',
	);

	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) { ?>
		<div class="container-fluid" id="featured-properties">
			<div class="in-page-title orange-text">
				<h1>Featured Properties</h1>
			</div>
	<?php
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
		    $feat_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
	    ?>
	        <a href="<?php the_permalink(); ?>">
	        	<div class="wdg-container square-sectors dimmed" style="background-image: url(<?php echo $feat_img; ?>);">
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
       <?php
		}
		wp_reset_postdata();
	} else {
	}
	?>
		</div>
<?php
}