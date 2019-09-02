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
					$static_or_gallery = get_field('do_you_want_a_static_image_or_gallery');
					$post_date = get_the_date( 'l F jS, Y' );
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
					<h3>News</h3>
					<h1><?php echo get_the_title(); ?></h1>
					<p><?php echo $post_date; ?></p>
				</div>
				<?php
					if ($static_or_gallery == 'no') { ?>
				<?php } else {
					ouputPostGallery();
				}
				?>
				<div id="article-text">
					<?php the_content(); ?>
				</div>
				<div id="article-bottom-bar">
					<div class="article-bottom-bar-left">
						<?php
						$external_link_tf = get_field('external_blog_link');
						if ($external_link_tf == "yes") { ?>
							<?php $link_to_story = get_field('link_to_story'); ?>
							<a href="<?php echo $link_to_story; ?>">
								<div class="read-more">
									<div class="blue-arrow"></div><span><strong>Read More</strong></span>
								</div>
							</a>
				  <?php } else { ?>
							<?php previous_post_link('%link','<div class="read-more"><div class="blue-arrow"></div><span><strong>Next News Article</strong></span></div>', TRUE); ?>
						<?php
						}
						?>
					</div>
					<div class="article-bottom-bar-center">
						<div class="social-links">
						<?php
							if( have_rows('social_media', 'option') ):
								while ( have_rows('social_media', 'option') ) : the_row();
									$socialchannel = get_sub_field('social_channel', 'option');
									$socialurl = get_sub_field('social_url', 'option');
									// echo "social chan - " . $socialchannel . "<br />";
									if ($socialchannel == "r fa-envelope") { ?>
										<a href="mailto:<?php echo $socialurl; ?>"><i class="fa<? echo $socialchannel; ?>" aria-hidden="true"></i></a>
								<?php } elseif ($socialchannel == 'b fa-twitter') { ?>
										<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank"><i class="fa<? echo $socialchannel; ?>" aria-hidden="true"></i></a>
								<?php } elseif ($socialchannel == 'b fa-linkedin') { ?>
										<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank"><i class="fa<? echo $socialchannel; ?>" aria-hidden="true"></i></a>
								<?php }
								endwhile;
							endif;
						?>
						</div>
					</div>
					<div class="article-bottom-bar-right">
						<a href="<?php echo bloginfo('url'); ?>/news">
							<div class="read-more">
								<div class="blue-arrow"></div><span><strong>Back to News</strong></span>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<?php
	}	
?>