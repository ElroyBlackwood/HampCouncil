<?php 
	/* Template Name: Third Level Page */ 
?>

<?php get_header(); ?>

<?php
$page_url = get_the_permalink(); 
$page_url_split = explode("/", $page_url);
array_splice($page_url_split, -2);
$array_len = sizeof($page_url_split) - 1;
$back_to_text = $page_url_split[$array_len];
$back_to_link = "";
$count = 0;

foreach ($page_url_split as $url_part) {
	if ($count == 0) {
		$back_to_link = $url_part;
	} else {
		$back_to_link = $back_to_link . "/" . $url_part;		
	}
	$count++;
}

?>

<div class="container-fluid" id="page_content">
<?php 
	$page_post = get_post(get_the_ID());
	$content = $page_post->post_content;
	$content = apply_filters('the_content', $content);
	echo $content;
?>
<a href="<?php echo $back_to_link; ?>">
	<div class="read-more">
		<div class="blue-arrow"></div><span><strong>Back to <?php echo $back_to_text; ?></strong></span>
	</div>
</a>
</div>
<?php outputStories(); ?>

<?php get_footer(); ?>