<?php 
	/* Template Name: Landign Page */ 
?>

<?php get_header(); ?>

<style type="text/css">
	.landing-page {
		width: 100vw;
		height: 100vh;
		position: fixed;
		overflow: hidden;
		background-color: #122121;
		top: 0;
		left: 0;
		z-index: 1000000000000;
	}
	.landing-content {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		text-align: center;
		color: #fff;
	}
</style>

<div class="landing-page">
	<div class="landing-content">
		<img src="http://businesshampshire.co.uk/wp-content/uploads/2019/06/HAM001-logo-RGB3.png">
		<h3>Website coming soon.<br />Thanks for your patience</h3>
	</div>
</div>

<?php get_footer(); ?>