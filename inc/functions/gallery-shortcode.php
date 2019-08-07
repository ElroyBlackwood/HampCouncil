<?php
	function inlineGallery($params = array()) {
		// default parameters
		extract(shortcode_atts(array(
			'title' => 'gallery',
		), $params));
		$shorcode_title = $params['title'];
		$output = "";
		if( have_rows('galleries', 'option') ): ?>
		    <?php while( have_rows('galleries', 'option') ): the_row(); ?>
		    <?php
		        $gallery_images = get_sub_field('images');
		        $gallery_title = get_sub_field('gallery_title');
		        if ($shorcode_title == $gallery_title) {
	        		if($gallery_images) { 
	        		$output .= '<div id="post-gallery">';
	        			$output .= '<div class="main-image-gallery">';
	        				foreach ($gallery_images as $image) {
	        					$output .= '<div class="slide">';
	        						$output .= '<a href="' . $image['url'] . 'data-rel="lightbox">';
	        							$output .= '<div class="slide-img" style="background-image: url(' . $image['url'] . ');">';
	        							$output .= '</div>';
	        						$output .= '</a>';
	        					$output .= '</div>';
	        				}
	        			$output .= '</div>';
	        			$output .= '<div class="nav-main-image-gallery">';
	        				foreach ($gallery_images as $image) { 
	        					$output .= '<div class="slide">';
	        						$output .= '<div class="slide-img" style="background-image: url(' . $image['url'] . ');">';
	        						$output .= '</div>';
	        					$output .= '</div>';
	        				}
	        			$output .= '</div>';
	        		$output .= '</div>';
	        		}
		        } else {
		        	$output = "Cant find gallery, either you have not put the correct title in the shortcode or you havent created the gallery.";
		        }
		    ?>
		    <?php endwhile; ?>
		<?php endif;

		return $output;
	}
	add_shortcode('inlinegallery', 'inlineGallery');
?>