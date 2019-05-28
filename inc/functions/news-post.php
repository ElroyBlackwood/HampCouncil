<?php 
	function ouputNewsArticle() {
		?>
		<div class="container-fluid" id="news-article">
			<div id="article-content">
				<?php
					$cats = get_categories();
					$list_of_cats = array();
					$sub_cat = "";
					$feat_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
					$post_thumbnail_id = get_post_thumbnail_id();
					$caption = wp_get_attachment_caption($post_thumbnail_id);
					// echo "post thumb id " . $post_thumbnail_id;
					foreach ($cats as $cat) {
						array_push($list_of_cats, $cat->name);
					}
					foreach ($list_of_cats as $cat) {
						if ($cat == "News") {
							
						} else {
							$sub_cat = $cat;
						}
					}
				?>
				<div id="article-header">
					<h3><?php echo $sub_cat; ?></h3>
					<h1><?php echo get_the_title(); ?></h1>
				</div>
				<div class="news-article-feat-img-container">
					<div class="news-article-feat-img dimmed" style="background-image: url(<?php echo $feat_img; ?>);"></div>
					<div class="news-article-feat-img-caption">
						<?php echo $caption; ?>
					</div>
				</div>
				<?php the_content(); ?>
				<div id="article-bottom-bar">
					<?php previous_post_link('%link','<div class="read-more"><div class="blue-arrow"></div><span><strong>Next News Article</strong></span></div>', TRUE); ?>
				</div>
			</div>
		</div>
		<?php
	}	
?>