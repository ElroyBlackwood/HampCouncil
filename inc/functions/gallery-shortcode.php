<?php 
	function inlineGallery($params = array()) {

		// default parameters
		extract(shortcode_atts(array(
			'title' => 'gallery',
		), $params));

		$shorcode_title = $params['title'];

		// create gallery
		if( have_rows('galleries', 'option') ): ?>

		    <?php while( have_rows('galleries', 'option') ): the_row(); ?>

		    <?php
		        $gallery_images = get_sub_field('images');
		        $gallery_title = get_sub_field('gallery_title');

		        if ($shorcode_title == $gallery_title) {

		        		if($gallery_images) { ?>
		        		<div id="post-gallery">
		        			<div class="main-image-gallery">
		        				<?php
		        				foreach ($gallery_images as $image) { ?>
		        					<div class="slide">
		        						<a href="<?php echo $image['url']; ?>" data-rel="lightbox">
		        							<div class="slide-img" style="background-image: url('<?php echo $image['url']; ?>');">
		        							</div>
		        						</a>
		        					</div>
		        				<?php
		        				}
		        				?>
		        			</div>

		        			<div class="nav-main-image-gallery">
		        				<?php
		        				foreach ($gallery_images as $image) { ?>
		        					<div class="slide">
		        						<div class="slide-img" style="background-image: url('<?php echo $image['url']; ?>');">
		        						</div>
		        					</div>
		        				<?php
		        				}
		        				?>
		        			</div>
		        		</div>
		        	<?php
		        		}
		        } else {
		        	echo "Cant find gallery, either you have not put the correct title in the shortcode or you havent created the gallery.";
		        }
		    ?>


		    <?php endwhile; ?>

		<?php endif;
		
	}
	add_shortcode('inlinegallery', 'inlineGallery');
?>