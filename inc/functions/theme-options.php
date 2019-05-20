<?php

	if( function_exists('acf_add_options_page') ) {
	    
	    $parent = acf_add_options_page(array(
	        'page_title'    => 'Theme General Settings',
	        'menu_title'    => 'Theme Settings',
	        'menu_slug'     => 'theme-general-settings',
	        'capability'    => 'edit_posts',
	        'redirect'      => false
	    ));

	    // acf_add_options_sub_page(array(
	    //     'page_title'    => 'Theme Footer Settings',
	    //     'menu_title'    => 'Footer',
	    //     'parent_slug'   => $parent['menu_slug'],
	    // ));
	    
	}

?>
