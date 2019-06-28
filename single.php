<?php get_header(); ?>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<?php
			$cats = get_the_category();
			$list_of_cats = array();
			foreach ($cats as $cat) {
				array_push($list_of_cats, $cat->name);
			}
			if (in_array("News", $list_of_cats)) {
				
				ouputNewsArticle();
			} elseif (in_array('Featured - Property', $list_of_cats)) {
				
				ouputProperty();
			}
		?>
	<?php endwhile; ?>

	<?php else: ?>

	<?php endif; ?>

<?php get_footer(); ?>
