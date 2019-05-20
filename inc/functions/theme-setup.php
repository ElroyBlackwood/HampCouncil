<?php


	// add_action('admin_init', 'hide_editor');

	// function hide_editor() {    
	// $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

	//     if (!isset($post_id))

	//         return;
	    
	//     // Hide the editor on the page titled 'Press and services' pages
	//     $hide_page = get_the_title($post_id);

	//     if ($hide_page == 'press') {
	//         remove_post_type_support('page', 'editor');
	//     }

	//     if ($hide_page == 'Services') {
	//         remove_post_type_support('page', 'editor');
	//     }

	//     // Hide the editor on a page with a specific page template
	//     // Get the name of the Page Template file.
	//     $template_file = get_post_meta($post_id, '_wp_page_template', true);

	//     //---
	//     if ($template_file == 'page-template.php') { // the filename of the page template
	//         remove_post_type_support('page', 'editor');
	//     }

	// }

	// register nav
	function register_my_menus() {
	  register_nav_menus(
	    array(
	      'header-menu' => __( 'Header Menu' ),
	      'footer-menu-col1' => __( 'Footer Menu 1' ),
	      'footer-menu-col2' => __( 'Footer Menu 2' ),
	      'footer-menu-col3' => __( 'Footer Menu 3' ),
	      'footer-menu-col4' => __( 'Footer Menu 4' ),
	      'mobile-menu' => __( 'Mobile Menu')
	    )
	  );
	}
	add_action( 'init', 'register_my_menus' );


?>
