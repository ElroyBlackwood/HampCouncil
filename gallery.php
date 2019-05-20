<?php 
	/* Template Name: Gallery */ 
?>

<?php get_header(); ?>

<?php outputContentBlocks(); ?>
<div class="instagram-feed-fw">
	<?php echo do_shortcode('[instagram-feed cols=5 num=20 imagepadding=0 showheader=false hoverdisplay="date, instagram, likes, caption" captionlength="250"]'); ?>
</div>
<?php get_footer(); ?>