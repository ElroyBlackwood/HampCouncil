<?php 
	/* Template Name: Location Map */ 
?>

<?php get_header(); ?>

<div class="container-fluid" id="location-map-wrapper">
	<?php outputTitle(); ?>
	<?php outputTextContentBlock('location_map_top_content'); ?>
	<?php outputLocationMap(); ?>
	<?php outputTextContentBlock('location_map_bottom_content'); ?>
	<?php outputContactDetailsTextBlock(); ?>
</div>

<?php get_footer(); ?>