<?php 
	/* Template Name: Property */ 
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

<?php outputPropertyLinks(); ?>

<?php outputFeatProperties(); ?>

<?php outputStories(); ?>

<?php get_footer(); ?>