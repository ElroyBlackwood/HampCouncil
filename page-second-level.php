<?php 
	/* Template Name: Second Level Page */ 
?>

<?php get_header(); ?>

<?php outputWidgetBlock(); ?>
<div class="container-fluid" id="page_content">
<?php 
	$page_post = get_post(get_the_ID());
	$content = $page_post->post_content;
	$content = apply_filters('the_content', $content);
	echo $content;
?>
</div>

<?php 
$page_id = get_the_ID();

if ($page_id == '999999999999') {
	?>
	<div class="property-iframe">
		<?php outputIframe(); ?>
	</div>
	<?php
}
?>

<?php outputLogoCarousel(); ?>
<?php outputStories(); ?>

<?php get_footer(); ?>