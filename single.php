<?php get_header(); ?>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<?php
			$cats = get_the_category();
			$list_of_cats = array();
			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );

			foreach ($cats as $cat) {
				array_push($list_of_cats, $cat->term_id);
			}
			if (in_array("4", $list_of_cats)) {
						$is_subpage = is_subpage();
						$is_single_page = is_single();
					?>
					<!-- <div class="news-header">
						<div class="container-fluid <?php if($is_single_page == 1){ ?>letterbox<?php }else{} ?>" id="banner">
							<div id="static-banner-image" class="dimmed <?php if($is_subpage == true){ echo "subpage"; } ?>" style="background-image: url(<?php echo $url; ?>);">
						        <div class="orange-curve bottom-curve"></div>
								<div id="static-banner-overlay">
									
								</div>
								<div class="scroll-dwn"></div>
							</div>
						</div>
						<div id="banner-anch"></div>
					</div> -->
					<?php
				ouputNewsArticle();
			} elseif (in_array('42', $list_of_cats)) {
				
				ouputProperty();
			}
		?>
	<?php endwhile; ?>

	<?php else: ?>

	<?php endif; ?>

<?php get_footer(); ?>
