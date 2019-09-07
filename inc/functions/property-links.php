<?php
function outputPropertyLinks() {

	if( have_rows('squares') ):
		?>
		<div class="container-fluid" id="property-search-links">
			<div class="in-page-title orange-text">
				<h1><?php the_field('title'); ?></h1>
			</div>
		<?php
	    while ( have_rows('squares') ) : the_row();
	    	$wdg_content = get_sub_field('sq_text_content');
	        $feat_img = get_sub_field('sq_background_image');
	        $link = get_sub_field('square_link');
	        $title = get_sub_field('sq_title');
	        ?>
	        <a href="<?php echo $link['url']; ?>">
	        	<div class="wdg-container square-sectors dimmed faded" style="background-image: url(<?php echo $feat_img['url']; ?>);">
	        		<div class="color-overlay"></div>
	        		<div class="wdg-overlay">
	        			<div class="wdg-overlay-title">
	        				<h2><?php echo $title; ?></h2>
		        			<div class="read-more">
			        			<div class="blue-arrow"></div>
			        			<span><strong>Read More</strong></span>
			        		</div>
			        	</div>
	        			<?php echo $wdg_content; ?>
	        		</div>
	        	</div>
	        </a>
	        <?php
	    endwhile;
	    ?>
	</div>
	<?php
	else :

	endif;
}