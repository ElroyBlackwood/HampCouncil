<?php 
	/* Template Name: Location Map */ 
?>

<?php get_header(); ?>

<div class="container-fluid" id="location-map-wrapper">
	<?php 
		$displayTitle = get_field('display_page_title');

		if ($displayTitle == 'yes') {
			outputTitle();
		}
	?>
	<?php outputTextContentBlock('location_map_top_content'); ?>
	<?php outputLocationMap(); ?>
	<?php outputTextContentBlock('location_map_bottom_content'); ?>
	<?php outputStories(); ?>
	<?php outputContactDetailsTextBlock(); ?>
</div>

<?php get_footer(); ?>