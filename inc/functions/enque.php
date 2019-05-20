<?php
    // Load HTML5 Blank scripts (header.php)

    function load_page_styles() {
        wp_register_style('bootstrap-css', get_template_directory_uri() . '/gulp/node_modules/bootstrap/dist/css/bootstrap.min.css', array(), '1.0', 'all');
        wp_enqueue_style('bootstrap-css'); 

        wp_register_style('lgo-styles', get_template_directory_uri() . '/assets/css/styles.min.css', array(), '1.0', 'all');
        wp_enqueue_style('lgo-styles'); 

        wp_register_style('lightbox-css', get_template_directory_uri() . '/assets/plugins/lightbox/css/lightbox.min.css', array(), '1.0', 'all');
        wp_enqueue_style('lightbox-css'); 

        wp_register_style('slick-css', get_template_directory_uri() . '/assets/plugins/slick/slick.css', array(), '1.0', 'all');
        wp_enqueue_style('slick-css'); 

        wp_register_style('slick-theme-css', get_template_directory_uri() . '/assets/plugins/slick/slick-theme.css', array(), '1.0', 'all');
        wp_enqueue_style('slick-theme-css'); 
    }

    function load_admin_styles() {
            wp_register_style( 'backend-styles', get_template_directory_uri() . '/media/css/be-styles.min.css', array(), '1.0.0', 'all');
            wp_enqueue_style( 'backend-styles' );
    }

    function load_page_scripts() {
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array('jquery'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('jquery'); 
        wp_register_script('jquery-mobile', get_template_directory_uri() . '/assets/scripts/jquery.mobile.custom.min.js', array('jquery'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('jquery-mobile'); 

        // wp_register_script('vue', get_template_directory_uri() . '/gulp/node_modules/vue/dist/vue.js', array('jquery'), '1.0.0'); // Custom scripts
        // wp_enqueue_script('vue');

        // wp_register_script('SimpleScripts-lib', get_template_directory_uri() . '/media/js/scripts-lib.min.js', array('jquery'), '1.0.0'); // Custom scripts
        // wp_enqueue_script('SimpleScripts-lib');

        // wp_register_script('SimpleScripts-plugins', get_template_directory_uri() . '/media/js/scripts-plugins.min.js', array('jquery'), '1.0.0'); // Custom scripts
        // wp_enqueue_script('SimpleScripts-plugins');

        wp_register_script('bootstrap-script', get_template_directory_uri() . "/gulp/node_modules/bootstrap/dist/js/bootstrap.min.js", array('jquery'), '1.0.0', true); // Bootstrap scripts
        wp_enqueue_script('bootstrap-script');

        wp_register_script('lightbox-scripts', get_template_directory_uri() . "/assets/plugins/lightbox/js/lightbox.min.js", array('jquery'), '1.0.0', true); 
        wp_enqueue_script('lightbox-scripts');

        wp_register_script('sticky-scripts', get_template_directory_uri() . "/assets/plugins/jquery.sticky.js", array('jquery'), '1.0.0', true); 
        wp_enqueue_script('sticky-scripts');

        wp_register_script('masonary-scripts', get_template_directory_uri() . "/gulp/node_modules/masonry-layout/dist/masonry.pkgd.min.js", array('jquery'), '1.0.0', true); 
        wp_enqueue_script('masonary-scripts');

        wp_register_script('visible-scripts', get_template_directory_uri() . '/assets/plugins/jquery.visible.min.js', array('jquery'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('visible-scripts');

        wp_register_script('validate-js', get_template_directory_uri() . "/gulp/node_modules/jquery-validation/dist/jquery.validate.min.js", array('jquery'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('validate-js');

        wp_register_script('slick-js', get_template_directory_uri() . '/assets/plugins/slick/slick.min.js', array('jquery'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('slick-js');
        
        wp_register_script('lgo-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('lgo-scripts');

        wp_enqueue_script( 'ajax-pagination',  get_stylesheet_directory_uri() . '/assets/plugins/ajax-pagination.js', array( 'jquery' ), '1.0', true );

    }



    // Load HTML5 Blank styles
    add_action('wp_enqueue_scripts', 'load_page_styles'); // Add Theme Stylesheet
    add_action('wp_enqueue_scripts', 'load_page_scripts'); // Add Custom Scripts to wp_head
    // add_action( 'admin_enqueue_scripts', 'simple_admin_styles' ); // Add styles for admin area
    
?>
