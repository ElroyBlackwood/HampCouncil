<?php 
// elroy functions


	// Widgets
		// Widgets Sitmap
	register_sidebar( array(
			'name'          => __( 'Footer Sitemap 1' ),
			'id'            => 'footer-smp-1',
			'description'   => __( 'Add widgets here to appear in your Footer Sitemap Column 1.' ),
			'before_widget' => '<div id="%1$s" class="flex-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	register_sidebar( array(
			'name'          => __( 'Footer Sitemap 2' ),
			'id'            => 'footer-smp-2',
			'description'   => __( 'Add widgets here to appear in your Footer Sitemap Column 2.' ),
			'before_widget' => '<div id="%1$s" class="flex-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	register_sidebar( array(
			'name'          => __( 'Footer Sitemap 3' ),
			'id'            => 'footer-smp-3',
			'description'   => __( 'Add widgets here to appear in your Footer Sitemap Column 3.' ),
			'before_widget' => '<div id="%1$s" class="flex-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	register_sidebar( array(
			'name'          => __( 'Footer Sitemap 4' ),
			'id'            => 'footer-smp-4',
			'description'   => __( 'Add widgets here to appear in your Footer Sitemap Column 4.' ),
			'before_widget' => '<div id="%1$s" class="flex-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	register_sidebar( array(
			'name'          => __( 'Footer Sitemap 5' ),
			'id'            => 'footer-smp-5',
			'description'   => __( 'Add widgets here to appear in your Footer Sitemap Column 5.' ),
			'before_widget' => '<div id="%1$s" class="flex-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	register_sidebar( array(
			'name'          => __( 'Footer Sitemap 6' ),
			'id'            => 'footer-smp-6',
			'description'   => __( 'Add widgets here to appear in your Footer Sitemap Column 6.' ),
			'before_widget' => '<div id="%1$s" class="flex-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		// Widgets Social
//	register_sidebar( array(
//			'name'          => __( 'Footer Social Media 1' ),
//			'id'            => 'footer-sm-1',
//			'description'   => __( 'Add widgets here to appear in your Footer Social Column 1.' ),
//			'before_widget' => '<div id="%1$s" class="flex-item">',
//			'after_widget'  => '</div>',
//			'before_title'  => '<h3 class="widget-title">',
//			'after_title'   => '</h3>',
//		) );
//	register_sidebar( array(
//			'name'          => __( 'Footer Social Media 2' ),
//			'id'            => 'footer-sm-2',
//			'description'   => __( 'Add widgets here to appear in your Footer Social Column 2.' ),
//			'before_widget' => '<div id="%1$s" class="flex-item">',
//			'after_widget'  => '</div>',
//			'before_title'  => '<h3 class="widget-title">',
//			'after_title'   => '</h3>',
//		) );
	register_sidebar( array(
			'name'          => __( 'Footer Social Media 3' ),
			'id'            => 'footer-sm-3',
			'description'   => __( 'Add widgets here to appear in your Footer Social Column 3.' ),
			'before_widget' => '<div id="%1$s" class="flex-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		// Widgets Legal
//	register_sidebar( array(
//			'name'          => __( 'Footer Legal 1' ),
//			'id'            => 'footer-lgl-1',
//			'description'   => __( 'Add widgets here to appear in your Footer Legal Column 1.' ),
//			'before_widget' => '<div id="%1$s" class="flex-item">',
//			'after_widget'  => '</div>',
//			'before_title'  => '<h3 class="widget-title">',
//			'after_title'   => '</h3>',
//		) );
	register_sidebar( array(
			'name'          => __( 'Footer Legal 2' ),
			'id'            => 'footer-lgl-2',
			'description'   => __( 'Add widgets here to appear in your Footer Legal Column 2.' ),
			'before_widget' => '<div id="%1$s" class="col-6">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

?>