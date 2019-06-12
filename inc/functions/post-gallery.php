<?php 
	function ouputPostGallery() {
		$gallery_images = get_field('gallery');

		if($gallery_images) { ?>
		<div id="post-gallery">
			<div class="main-image-gallery">
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
	?>

	<?php
	}
?>