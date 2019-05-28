<?php 
// elroy functions

	// Widgets
		include_once('widget-block-wide-story.php');
		include_once('widget-block-news_slider.php');

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

        // Widgets Legal
	register_sidebar( array(
			'name'          => __( 'Footer Legal 1' ),
			'id'            => 'footer-lgl-1',
			'description'   => __( 'Add widgets here to appear in your Footer Legals Nav.' ),
			'before_widget' => '<div id="%1$s" class="col-6">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
    // Widgets END

        
     // SHOW HIDE
     //   Plugin Name: WP-ShowHide
     //   Plugin URI: http://lesterchan.net/portfolio/programming/php/
        ### Function: Enqueue JavaScripts
        add_action( 'wp_enqueue_scripts', 'showhide_scripts' );
        function showhide_scripts() {
            wp_enqueue_script( 'jquery' );
        }
        ### Function: Short Code For Inserting Press Release Into Post
        add_shortcode( 'showhide', 'showhide_shortcode' );
        function showhide_shortcode( $atts, $content = null ) {
            // Variables
            $post_id = get_the_id();
            // Extract ShortCode Attributes
            $attributes = shortcode_atts( array(
                                                'type' => 'pressrelease',
                                                'more_text' => __( '> See more', 'wp-showhide' ),
                                                'less_text' => __( '> Hide more', 'wp-showhide' ),
                                                'hidden' => 'yes'
                                                ), $atts );
            // More/Less Text
            $more_text = sprintf( $attributes['more_text'], $word_count );
            $less_text = sprintf( $attributes['less_text'], $word_count );
            // Determine Whether To Show Or Hide Press Release
            $hidden_class = 'sh-hide';
            $hidden_css = 'display: none;';
            $hidden_aria_expanded = 'false';
            if( $attributes['hidden'] === 'no' ) {
                $hidden_class = 'sh-show';
                $hidden_css = 'display: block;';
                $hidden_aria_expanded = 'true';
                $tmp_text = $more_text;
                $more_text = $less_text;
                $less_text = $tmp_text;
            }
            // Format HTML Output
            $output  = '<div id="' . $attributes['type'] . '-link-' . $post_id . '" class="sh-link ' . $attributes['type'] . '-link ' . $hidden_class .'"><a href="#" onclick="showhide_toggle(\'' . esc_js( $attributes['type'] ) . '\', ' . $post_id . ', \'' . esc_js( $more_text ) . '\', \'' . esc_js( $less_text ) . '\'); return false;" aria-expanded="' . $hidden_aria_expanded .'"><span id="' . $attributes['type'] . '-toggle-' . $post_id . '">' . $more_text . '</span></a></div>';
            $output .= '<div id="' . $attributes['type'] . '-content-' . $post_id . '" class="sh-content ' . $attributes['type'] . '-content ' . $hidden_class . '" style="' . $hidden_css . '">' . do_shortcode( $content ) . '</div>';
            return $output;
        }
        ### Function: Add JavaScript To Footer
        add_action( 'wp_footer', 'showhide_footer' );
        function showhide_footer() {
        ?>
<?php if( WP_DEBUG ): ?>
<script type="text/javascript">
function showhide_toggle(type, post_id, more_text, less_text) {
    var   $link = jQuery("#"+ type + "-link-" + post_id)
    , $link_a = jQuery('a', $link)
    , $content = jQuery("#"+ type + "-content-" + post_id)
    , $toggle = jQuery("#"+ type + "-toggle-" + post_id)
    , show_hide_class = 'sh-show sh-hide';
    $link.toggleClass(show_hide_class);
    $content.toggleClass(show_hide_class).toggle();
    if($link_a.attr('aria-expanded') === 'true') {
        $link_a.attr('aria-expanded', 'false');
    } else {
        $link_a.attr('aria-expanded', 'true');
    }
    if($toggle.text() === more_text) {
        $toggle.text(less_text);
        $link.trigger( "sh-link:more" );
    } else {
        $toggle.text(more_text);
        $link.trigger( "sh-link:less" );
    }
    $link.trigger( "sh-link:toggle" );
}
</script>
<?php else : ?>
<script type="text/javascript">function showhide_toggle(e,t,r,g){var a=jQuery("#"+e+"-link-"+t),s=jQuery("a",a),i=jQuery("#"+e+"-content-"+t),l=jQuery("#"+e+"-toggle-"+t);a.toggleClass("sh-show sh-hide"),i.toggleClass("sh-show sh-hide").toggle(),"true"===s.attr("aria-expanded")?s.attr("aria-expanded","false"):s.attr("aria-expanded","true"),l.text()===r?(l.text(g),a.trigger("sh-link:more")):(l.text(r),a.trigger("sh-link:less")),a.trigger("sh-link:toggle")}</script>
<?php endif; ?>
<?php
    }
?>

