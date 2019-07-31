<?php get_header(); ?>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<?php
			$cats = get_the_category();
			$list_of_cats = array();
			foreach ($cats as $cat) {
				array_push($list_of_cats, $cat->term_id);
			}
			if (in_array("4", $list_of_cats)) {
						$is_subpage = is_subpage();
						$is_single_page = is_single();
					?>
					<div class="news-header">
						<div class="container-fluid <?php if($is_single_page == 1){ ?>letterbox<?php }else{} ?>" id="banner">
							<div id="static-banner-image" class="dimmed <?php if($is_subpage == true){ echo "subpage"; } ?>" style="background-image: url(https://businesshampshire.co.uk/wp-content/uploads/2019/07/Fawley-Waterside-Site-Aerial-1920x1080.jpg);">
						        <div class="orange-curve bottom-curve"></div>
								<div id="static-banner-overlay">
									
								</div>
								<div class="scroll-dwn"></div>
							</div>
						</div>
						<div id="banner-anch"></div>
					</div>
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
