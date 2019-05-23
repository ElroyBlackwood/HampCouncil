<?php

function outputPostFilter() {
	?>
	<div id="post-filter">
		<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
			<?php
				$tags = get_tags(array('get'=>'all'));
				if( $tags ) : 
					foreach ( $tags as $tag ) :
			 			echo "<input class='fitler_tag' type='checkbox' value='$tag->term_id' name='$tag->name' id='filter_tag_$tag->term_id'>";
			 			echo "<label for='filter_tag_$tag->term_id'>$tag->name</label>";
					endforeach;
				endif;
			?>
		
			<button>Apply filter</button>
			<input type="hidden" name="action" value="myfilter">
		</form>
	</div>
	<div id="response">
	<?php 
		$args = array(
		'posts_per_page' => '8',
		'category_name'=> 'News'
		);
		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
		        $feat_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		        $wdg_content = wp_trim_words(the_content(), 25); 
				?>
					<a href="<?php the_permalink(); ?>">
						<div class="wdg-container square dimmed" style="background-image: url(<?php echo esc_url($feat_img) ?>);">
							<div class="color-overlay"></div>
							<div class="wdg-overlay">
								<h2><?php echo get_the_title(); ?></h2>
								<?php echo $wdg_content; ?>
								<div class="read-more">
					    			<div class="blue-arrow" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/blue-arrow.png);"></div>
					    			<span>Read More</span>
					    		</div>
							</div>
						</div>
					</a>
				<?php
			}
			wp_reset_postdata();
		} else {
		}
	?>
	</div>
	    
	<?php
}