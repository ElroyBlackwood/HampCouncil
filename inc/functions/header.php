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
				<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
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
		<?php } else { ?>
			<?php ouputSlider(); ?>
		<?php }
		?>
</header>
<?php }

function ouputFeatBanner() {
	
	$args = array(
		'posts_per_page' => -1,
		'category_name' => 'News',
	);
	// echo "is single page = " . $is_single_page;
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) { ?>
	<div class="container-fluid" id="featpost">
	<?php
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$isfeatured = get_field('featured_post');
			if ($isfeatured) {
				$feat_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
				$cats = get_categories();
				$cat_name = "";
				$content = wp_trim_words(get_the_content(), 25);
				foreach ($cats as $cat) {
					if($cat->name == "News") {

					} else {
						$cat_name = $cat->name . " news:";
					}
				}
				?>
				<div class="static-banner-image dimmed" style="background-image: url(<?php echo $feat_img; ?>);">
					<div id="static-banner-overlay">
						<div class="static_banner_overlay_content">
							<h3><?php echo $cat_name; ?></h3>
							<h2><strong><?php echo get_the_title(); ?></strong></h2>
							<p><?php echo $content; ?></p>
		        			<div class="read-more">
			        			<div class="blue-arrow" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/blue-arrow.png);"></div>
			        			<span>Read More</span>
			        		</div>
			        	</div>
					</div>
				</div>
				<?php
			}
			?>
			<?php
		}
	?>
	</div>
	<?php
		wp_reset_postdata();
	} else {

	}	
}

function ouputSlider() {
	?>
		<div id="carouselHeader" class="carousel slide carousel-fade" data-ride="carousel">
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
			<?php
			$count_ban = 0;
			if( have_rows('banner_images') ):

			    while ( have_rows('banner_images') ) : the_row();

			        $banner_img = get_sub_field('banner_image');
			        $banner_overlay = get_sub_field('banner_overlay');
			        
			        if ($count_ban == 0) { ?>
			        	<div class="carousel-item active dimmed" style="background-image: url(<?php echo $banner_img['url']; ?>);">
			        		<div class="slide-overlay">
			        			<?php echo $banner_overlay; ?>
			        		</div>
			        	</div>
			        <?php
			        } else { ?>
				        <div class="carousel-item dimmed" style="background-image: url(<?php echo $banner_img['url']; ?>);">
				        	<div class="slide-overlay">
				        		<?php echo $banner_overlay; ?>
				        	</div>
				        </div>
			        <?php
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
		</div>
	</div>
	<?php
}

function outputSingleBanner() {

		$static_banner_image = get_field('static_banner_image');
		$static_banner_overlay = get_field('static_banner_overlay');
	?>
	<div id="static-banner-image" class="dimmed" style="background-image: url(<?php echo $static_banner_image['url']; ?>);">
		<div id="static-banner-overlay">
			<?php echo $static_banner_overlay; ?>
		</div>
		<div class="scroll-dwn">
			<h5>Scroll Down</h5>
		</div>
	</div>
	<?php
}