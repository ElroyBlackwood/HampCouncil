<?php

function outputHeader() { ?>
<header>
	<div class="container-fluid" id="header-menu">
		<div id="top-bar">
			<div id="top-bar-menu">
				    <?php /* Primary navigation */
						wp_nav_menu( array(
						  'theme_location' => 'top-bar',
						  'depth' => 2,
						  'container' => false,
						  'menu_class' => 'nav',
						  //Process nav menu using our custom nav walker
						  'walker' => new wp_bootstrap_navwalker())
						);
					?>
			</div>
			<div id="ajax-search">
				<?php echo do_shortcode('[wd_asp id=1]'); ?>
			</div>
		</div>
		<div class="header-nav">
			<a href="<?php echo bloginfo('url'); ?>" id="logo_lnk">
				<div class="logo" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/logo.png);">
				</div>
			</a>
			<div class="header-nav-menu" role="navigation">
				    <?php /* Primary navigation */
						wp_nav_menu( array(
						  'theme_location' => 'header-menu',
						  'depth' => 2,
						  'container' => false,
						  'menu_class' => 'nav',
						  //Process nav menu using our custom nav walker
						  'walker' => new wp_bootstrap_navwalker())
						);
					?>
			</div>
		</div>
	</div>
	<?php 
		$is_single_page = is_single();
	?>
	<div class="container-fluid <?php if($is_single_page == 1){ ?>letterbox<?php }else{} ?>" id="banner">
		<?php $banner_slider = get_field('static_banner_of_slider'); ?>
		<?php if ($banner_slider == "banner") { ?>
			<?php outputSingleBanner(); ?>
		<?php } elseif ($banner_slider == "featpost") { ?>
			<?php ouputFeatBanner(); ?>
		<?php } elseif ($banner_slider == "slider") { ?>
			<?php ouputSlider(); ?>
		<?php } else {
			
		}
		?>
</header>
<?php }

function ouputFeatBanner() {
	$is_subpage = is_subpage();
	// alert($is_subpage);
	$args = array(
		'posts_per_page' => -1,
		'category_name' => 'News',
		'meta_key' => 'featured_post',
		'meta_value' => 'yes',
		'compare' => 'LIKE'
	);
	// echo "is single page = " . $is_single_page;
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) { ?>
	<div class="container-fluid <?php if($is_subpage == true){ echo "subpage"; } ?>" id="featpost">

	<?php
		$post_count = $the_query->found_posts;
		$count_ban = 0;
		$count_ind = 0;

		//  query for inicators
		$the_query_indicators = new WP_Query( $args );
		if ( $the_query_indicators->have_posts() ) { 
			if ($post_count > 1) { ?>
				<div id="carouselHeader" class="carousel slide carousel-fade <?php if($is_subpage == true){ echo "subpage"; } ?>" data-ride="carousel" data-interval="4000">
					<ol class="carousel-indicators">
		<?php }
			while ( $the_query_indicators->have_posts() ) {
				$the_query_indicators->the_post();
				if ($post_count > 1) { 
			    	if ($count_ind == 0) { ?>
			    		<li data-target="#carouselHeader" data-slide-to="<?php echo $count_ind; ?>" class="active"></li>
			    	<?php 
			    	} else { ?>
			    		<li data-target="#carouselHeader" data-slide-to="<?php echo $count_ind; ?>"></li>
					<?php
			    	}
		    		$count_ind++;		
				}
			}
			wp_reset_postdata();
		} else {
			// no posts
		}
	?>
				</ol>
		<!-- End indicator query -->

	<?php
		if ($post_count > 1) { ?>
		  	<div class="carousel-inner">
	            <div class="orange-curve bottom-curve"></div>
        <?php
		}

		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$feat_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$tags = get_the_tags();
			$tag_name = "";
			$content = wp_trim_words(get_the_content(), 25);
			foreach ($tags as $tag) {
				if($tag->name == "News") {

				} else {
					$tag_name = $tag->name . " news:";
				}
			}
			?>
			<?php
			if ($post_count < 1) {
				echo "PLEASE ENABLE A FEATURED POST";
			} elseif ($post_count == 1) { ?>
					<div class="static-banner-image dimmed" style="background-image: url(<?php echo $feat_img; ?>);">
			            <div class="orange-curve bottom-curve"></div>
						<div id="static-banner-overlay">
							<div class="static_banner_overlay_content">
								<h3><?php echo $tag_name; ?></h3>
								<h2><strong><?php echo get_the_title(); ?></strong></h2>
								<p><?php echo $content; ?></p>
								<a href="<?php the_permalink(); ?>">
				        			<div class="read-more">
					        			<div class="blue-arrow"></div>
					        			<span><strong>Read More</strong></span>
					        		</div>
								</a>
				        	</div>
						</div>
					</div>	
			<?php
			} elseif ($post_count > 1) { ?>
			<?php
						        
			        if ($count_ban == 0) { ?>
			        	<div class="carousel-item active dimmed" style="background-image: url(<?php echo $feat_img; ?>);">
			        		<div class="slide-overlay">
    							<h3><?php echo $tag_name; ?></h3>
    							<h2><strong><?php echo get_the_title(); ?></strong></h2>
    							<p><?php echo $content; ?></p>
    							<a href="<?php the_permalink(); ?>">
    			        			<div class="read-more">
    				        			<div class="blue-arrow"></div>
    				        			<span><strong>Read More</strong></span>
    				        		</div>
    							</a>
			        		</div>
			        	</div>
			        <?php
			        } else { ?>
			        	<div class="carousel-item dimmed" style="background-image: url(<?php echo $feat_img; ?>);">
			        		<div class="slide-overlay">
    							<h3><?php echo $tag_name; ?></h3>
    							<h2><strong><?php echo get_the_title(); ?></strong></h2>
    							<p><?php echo $content; ?></p>
    							<a href="<?php the_permalink(); ?>">
    			        			<div class="read-more">
    				        			<div class="blue-arrow"></div>
    				        			<span><strong>Read More</strong></span>
    				        		</div>
    							</a>
			        		</div>
			        	</div>
			        <?php
			    	}

					$count_ban++; ?>

					<a class="carousel-control-prev" href="#carouselHeader" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselHeader" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					<div class="scroll-dwn"></div>
				
			<?php
			}
			?>
		<?php
	}
	?>
		</div>
	</div>
	<div id="banner-anch"></div>	
	<?php
		wp_reset_postdata();
	} else {
		echo "no posts";
	}	
}

function ouputSlider() {
	$is_subpage = is_subpage();
	// alert($is_subpage);
	?>
		<div id="carouselHeader" class="carousel slide carousel-fade <?php if($is_subpage == true){ echo "subpage"; } ?>" data-ride="carousel" data-interval="4000">
			<ol class="carousel-indicators">
				<?php
					$count_ind = 0;
					if( have_rows('banner_images') ):

					    while ( have_rows('banner_images') ) : the_row(); ?>
					    <?php 
					    	if ($count_ind == 0) { ?>
					    		<li data-target="#carouselHeader" data-slide-to="<?php echo $count_ind; ?>" class="active"></li>
					    	<?php 
					    	} else { ?>
					    		<li data-target="#carouselHeader" data-slide-to="<?php echo $count_ind; ?>"></li>
							<?php
					    	}
				    	?>
					    <?php
					    	$count_ind++;
					    endwhile;

					else :

					endif;
				?>
			</ol>
		  	<div class="carousel-inner">
	            <div class="orange-curve bottom-curve"></div>
			<?php
			$count_ban = 0;
			if( have_rows('banner_images') ):

			    while ( have_rows('banner_images') ) : the_row();

			        $banner_img = get_sub_field('banner_image');
			        $banner_overlay = get_sub_field('banner_overlay');
			        $do_you_want_a_banner_link = get_sub_field('do_you_want_a_banner_link');
			        $image_alignment_slider = get_sub_field('image_alignment_slider');
			        if ($count_ban == 0) { 
			        	
			        	?>
			        	<div class="carousel-item active dimmed" style="background-image: url(<?php echo $banner_img['url']; ?>); background-position: <?php echo $image_alignment_slider; ?>">
			        		<?php
			        			if ($do_you_want_a_banner_link == 'yes') { 
			        				$banner_link = get_sub_field('banner_link');
			        				?>
			        				<a href="<?php echo $banner_link['url']; ?>">
			        			<?php
			        			}
			        			?>
						        		<div class="slide-overlay">
						        			<?php echo $banner_overlay; ?>
						        		</div>
				        		<?php
						        if ($do_you_want_a_banner_link == 'yes') { ?>
						        	</a>
						        <?php
						        }
						        ?>
			        	</div>
			        	<?php
			        	
			        	?>
			        <?php
			        } else { 
			        
			        	?>
			        <div class="carousel-item dimmed" style="background-image: url(<?php echo $banner_img['url']; ?>);">
			        	<?php
			        	if ($do_you_want_a_banner_link == 'yes') { 
			        		?>
			        		<a href="<?php echo $banner_link['url']; ?>">
			        	<?php
			        	}
			        	?>
			        	<div class="slide-overlay">
			        		<?php echo $banner_overlay; ?>
			        	</div>
			        </div>
			        <?php
				        if ($do_you_want_a_banner_link == 'yes') { ?>
				        	</a>
				        <?php
				        }
			        }
			        ?>
			        	
			        <?php
			        $count_ban++;
			    endwhile;

			else :

			endif; ?>
			<a class="carousel-control-prev" href="#carouselHeader" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselHeader" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			<?php
			?>
			<div class="scroll-dwn"></div>
		</div>
	</div>
	<div id="banner-anch"></div>
	<?php
}

function outputSingleBanner() {
		$is_subpage = is_subpage();
		$static_banner_image = get_field('static_banner_image');
		$static_banner_overlay = get_field('static_banner_overlay');
		$banner_image_alignment = get_field('banner_image_alignment');
	?>
	<div id="static-banner-image" class="dimmed <?php if($is_subpage == true){ echo "subpage"; } ?>" style="background-image: url(<?php echo $static_banner_image['url']; ?>); background-position: <?php echo $banner_image_alignment; ?> ">
        <div class="orange-curve bottom-curve"></div>
		<div id="static-banner-overlay">
			<?php echo $static_banner_overlay; ?>
		</div>
		<div class="scroll-dwn"></div>
	</div>
	<div id="banner-anch"></div>
	<?php
}