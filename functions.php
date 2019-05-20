<?php
	if(!session_id()) session_start();
	$grid_item_count = 1;
	if(!isset($_SESSION['grid_item_count'])) {
	    $_SESSION['grid_item_count'] = $grid_item_count;
	}

	include_once(ABSPATH . 'wp-content/themes/HampCouncil/inc/functions/enque.php');

	include_once(ABSPATH . 'wp-content/themes/HampCouncil/inc/functions/theme-options.php');

	include_once(ABSPATH . 'wp-content/themes/HampCouncil/inc/functions/theme-setup.php');

	// Register custom navigation walker
	require_once(get_template_directory() . '/wp-bootstrap-navwalker.php');
	
	// Add theme support for Featured Images
	add_theme_support('post-thumbnails', array(
	'post',
	'page',
	'custom-post-type-name',
	));

	add_theme_support( 'yoast-seo-breadcrumbs' );
	
	function alert($msg) {
	    echo "<script type='text/javascript'>alert('$msg');</script>";
	}

	// generate header logo and menu
	function lgo_header() { ?>

<?php 
	}

	function outputBanner() {

		}
