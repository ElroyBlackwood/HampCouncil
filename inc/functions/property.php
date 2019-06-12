<?php 
	function ouputProperty() {
		?>
		<div class="container-fluid" id="single-property">
			<div id="article-content">
				<?php
					$feat_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
					$post_thumbnail_id = get_post_thumbnail_id();
					$caption = wp_get_attachment_caption($post_thumbnail_id);
					$agent_logo = get_field('agent_logo');
					$agents_name = get_field('agents_name');
					$agent_website = get_field('agent_website');
					$agent_address = get_field('agent_address');
					$agent_email = get_field('agent_email');
					$agent_phone_number = get_field('agent_phone_number');
					$do_you_want_a_static_image_or_gallery = get_field('do_you_want_a_static_image_or_gallery');

				?>
				<div id="article-header">
					<div class="agent-logo" style="background-image: url(<?php echo $agent_logo['url']; ?>);">
						
					</div>
					<div class="agent-title">
						<h3 class="orange-text"><?php echo $agents_name; ?></h3>
						<h1><?php echo get_the_title(); ?></h1>
					</div>
				</div>
				<?php
					if ($do_you_want_a_static_image_or_gallery == 'static') { ?>
						<div id="news-article-feat-img-container">
							<div class="news-article-feat-img" style="background-image: url(<?php echo $feat_img; ?>);"></div>
							<div class="news-article-feat-img-caption">
								<?php echo $caption; ?>
							</div>
						</div>
				<?php } else {
					ouputPostGallery();
				}
				?>
				<div id="article-text">
					<?php the_content(); ?>
				</div>
				<div id="article-bottom-bar">
					<div class="article-bottom-bar-left">
						<a href="<?php echo $agent_website; ?>" target="_blank">
							<div class="read-more">
								<div class="blue-arrow"></div><span><strong>Go to agent's website</strong></span>
							</div>
						</a>
					</div>
					<div class="article-bottom-bar-center">
						<div class="social-links">
						<?php
							if( have_rows('social_media', 'option') ):
								while ( have_rows('social_media', 'option') ) : the_row();
									$socialchannel = get_sub_field('social_channel', 'option');
									$socialurl = get_sub_field('social_url', 'option');

									if ($socialchannel == "r fa-envelope") { ?>
										<a href="mailto:<?php echo $socialurl; ?>"><i class="fa<? echo $socialchannel; ?>" aria-hidden="true"></i></a>
									<?php } else { ?>
										<a href="<?php echo $socialurl; ?>"><i class="fa<? echo $socialchannel; ?>" aria-hidden="true"></i></a>
									<?php } ?>

									<?php
								endwhile;
							endif;
						?>
						</div>
					</div>
					<div class="article-bottom-bar-right">
						<?php
							$commercial_or_development_property = get_field('commercial_or_development_property');
							$back_to_link = "";

							if ($commercial_or_development_property == 'commercial') {
								$back_to_link = get_bloginfo('url') . '/property/commercial-property-search';
							} elseif ($commercial_or_development_property == 'development') {
								$back_to_link = get_bloginfo('url') . '/property/development-site-search';
							} else {

							}
						?>
						<a href="<?php echo $back_to_link; ?>">
							<div class="read-more">
								<div class="blue-arrow"></div><span><strong>Back to Properties</strong></span>
							</div>
						</a>
					</div>
				</div>
				<div class="agent-contact">
					<div class="agent-contact-header">
						<div class="icon" style="background-image: url(<?php echo get_bloginfo('url') . '/wp-content/uploads/2019/06/icon-256px-red-envelope.png'; ?>);"></div>
						<h3>Contact Agent</h3>
					</div>
					<div class="agent-contact-details">
						<?php echo $agent_address; ?>
						<div class="icon-text" id="email_address">
							<div class="icon"></div>
							<a href="mailto:<?php echo $agent_email; ?>"><?php echo $agent_email; ?></a>
						</div>
						<div class="icon-text" id="phone_number">
							<div class="icon"></div>
							<a href="tel:<?php echo $agent_phone_number; ?>"><?php echo $agent_phone_number; ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
	}	
?>