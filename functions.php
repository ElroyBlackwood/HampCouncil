<?php
	if(!session_id()) session_start();
	$grid_item_count = 1;
	if(!isset($_SESSION['grid_item_count'])) {
	    $_SESSION['grid_item_count'] = $grid_item_count;
	}

	include_once(ABSPATH . 'wp-content/themes/lgo-theme/inc/functions/enque.php');

	include_once(ABSPATH . 'wp-content/themes/lgo-theme/inc/functions/theme-options.php');

	include_once(ABSPATH . 'wp-content/themes/lgo-theme/inc/functions/theme-setup.php');

	include_once(ABSPATH . "wp-content/themes/lgo-theme/content-blocks.php");

	// Register custom navigation walker
	require_once(get_template_directory() . '/wp-bootstrap-navwalker.php');
	
	// Add theme support for Featured Images
	add_theme_support('post-thumbnails', array(
	'post',
	'page',
	'custom-post-type-name',
	));

	add_theme_support( 'yoast-seo-breadcrumbs' );
	
	function alert($msg) {
	    echo "<script type='text/javascript'>alert('$msg');</script>";
	}

	// generate header logo and menu
	function lgo_header() {
		$logo =  get_template_directory_uri() . "/assets/images/dwt-logo-new-md.png";
		$search_icon = get_template_directory_uri() . "/assets/images/search-icon.svg";
		// $logo_src = wp_get_attachment_image_url($logo_id, 'small');
		// $logo_src_set = wp_get_attachment_image_srcset($logo_id, 'medium');
		?>
		<!-- header -->
		<div class="header-sticky">
			<header>
				<div class="header-wrapper">
					<!-- logo -->
					<div class="logo-wrap">
						<a href="<?php echo home_url(); ?>">
							<!-- <img src="<?php echo $logo; ?>" alt="Logo" class="logo-img"> -->
							<div class="logo" style="background-image: url(<?php echo $logo; ?>);"></div>
						</a>
					</div>
					<!-- /logo -->

					<!-- nav -->
					<nav class="nav-wrap" role="navigation">
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
					</nav>
					<!-- /nav -->
					<div class="verticle-div"></div>
					<div class="search-container">
						<div class="search-icon">
							<img src="<?php echo $search_icon; ?>" alt="Search">
							<div class="search-field">
								<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
							</div>
						</div>
					</div>
					<p class="phone-header">0845 850 86 87</p>
					<a class="shiftnav-toggle shiftnav-toggle-button" data-shiftnav-target="shiftnav-main"><i class="fa fa-bars"></i></a>
				</div>
			</header>
		</div>
		<!-- /header -->

<?php 
	}

	function outputBanner() {

		$banner = get_field('banner_or_slider');
		$enabled = get_field('enable_banner');

		if ($enabled == "yes") {
			if($banner) {
				if ($banner == "banner") { 
						$banner = get_field('banner');
						$banner_img = $banner['banner_image'];

					?>
					<div class="hero-image" style="background-image: url(<?php echo $banner_img['url']; ?>);">
						<div class="hero-overlay">
						<?php
							echo $banner['banner_overlay'];
						?>
						</div>
					</div>	
			<?php } else {
					
					$slider = get_field('slider');
					$count = 0;
					$dot_count = 0;

					if( $slider ): ?>
						<div id="silder_carousel" class="carousel slide carousel-fade" data-ride="carousel">
							<?php $slides = $slider['slide']; ?>
							<ol class="carousel-indicators">
							<?php foreach ($slides as $slide) {
								if ($dot_count == 0) { ?>
									<li data-target="#silder_carousel" data-slide-to="<?php echo $dot_count; ?>" class="active"></li>
								<?php } else { ?>
									<li data-target="#silder_carousel" data-slide-to="<?php echo $dot_count; ?>"></li>
								<?php }
								$dot_count++;
							} ?>
							</ol>
							<div class="carousel-inner">
							
						    <?php foreach( $slides as $slide ): 
								    $slide_img = $slide["slide_image"]["url"];
								    $slide_overlay = $slide["slide_overlay"];
						    ?>
						    	<?php if ($count == 0) { ?>
						    		<div class="carousel-item slide active" style="background-image: url(<?php echo $slide_img; ?>);">
						    			<div class="slide-overlay">
						    				<?php echo $slide_overlay; ?>
						    			</div>
						    		</div>
						    	<?php } else { ?>
						    		<div class="carousel-item slide" style="background-image: url(<?php echo $slide_img; ?>);">
						    			<div class="slide-overlay">
						    				<?php echo $slide_overlay; ?>
						    			</div>
						    		</div>
						    	<?php } ?>
						    	<?php $count++; ?>
						    <?php endforeach; ?>
						    </div>
						    <a class="carousel-control-prev" href="#silder_carousel" role="button" data-slide="prev">
						       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						       <span class="sr-only">Previous</span>
						     </a>
						     <a class="carousel-control-next" href="#silder_carousel" role="button" data-slide="next">
						       <span class="carousel-control-next-icon" aria-hidden="true"></span>
						       <span class="sr-only">Next</span>
						     </a>
					    </div>
					<?php endif;
					
					}
				}
				echo "<div id='banner-anch'></div>";
		}
		
		}

	function outputCompanyStats() {
		$stats = get_field('company_statistics', 'option');
		$vehicles = $stats['number_of_vehicles'];
		$staff = $stats['number_of_staff'];
		$depots = $stats['number_of_depots'];

		?>
		<script type="text/javascript">
			
		</script>
		<div id="company-stats">
			<div class="widget">
				<h1 class="count"><?php echo $vehicles; ?></h1>
				<h2>Vehicles<br />in our fleet</h2>
			</div>
			<div class="verticle-div"></div>
			<div class="widget">
				<h1 class="count"><?php echo $staff; ?></h1>
				<h2>Steadfast<br />Employees</h2>
			</div>
			<div class="verticle-div"></div>
			<div class="widget">
				<h1 class="count"><?php echo $depots; ?></h1>
				<h2>Depots across<br />the country</h2>
			</div>
		</div>
		<?php
	} 

	function load_posts_by_ajax_callback() {
	    check_ajax_referer('load_more_posts', 'security');
    	$post_cat = $_SESSION['post_cat'];
	    $paged = $_POST['page'];
	    $args = array(
	        'post_type' => 'post',
	        'post_status' => 'publish',
	        'cat' => $post_cat,
	        'order_by' => 'date',
	        'order' => 'ASC',
	        'posts_per_page' => '10',
	        'paged' => $paged,
	    );
	    $my_posts = new WP_Query( $args );
	    if ( $my_posts->have_posts() ) :
	        ?>
		    <?php $count = 1; ?>
		    <?php 
		    	$grid_item_count = $_SESSION['grid_item_count'];
		    	$popups = $_SESSION['popups'];
		    ?>
	        <?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>
	        	<?php 
	        		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
	        		$subcontent = wp_trim_words(get_the_content(), 20);
	        		$subcontent_lg = wp_trim_words(get_the_content(), 50);
	        	?>
	        <script type="text/javascript">
	        	jQuery('.popup-link').click(function() {
	        		// console.log("inside function");
	        		var popup_to_enable = jQuery(this).attr('href');
	        		jQuery(popup_to_enable).css('display', 'block');
	        		jQuery(popup_to_enable).animate({opacity: 1}, 500, function() {
	        			console.log("Inside aniumation");
	        		});
	        	})

	        	jQuery('.popup-bg').click(function() {
	        		jQuery('.popup-container').each(function() {
	        			jQuery(this).animate({opacity: 0}, 500, function() {
	        				jQuery(this).css('display', 'none');				
	        			});
	        		})
	        	});
	        </script>
    		<?php if ($popups == "yes") { ?>
    				<?php 
    					if ($count == 1 || $count == 8) { ?>
    						<div class="grid-item <?php if($loop_count == 0) { if($count == 8) { echo 'grid-item-inv'; } else {echo 'masonary_row_1'; } } else { echo 'grid-item-inv'; } ?>" id="grid_item_<?php echo $grid_item_count; ?>">
    							<a href="#popup-<?php echo $grid_item_count; ?>" class="popup-link">
    								<div class="post-image-wrapper">
	        							<div class="post-image portait" style="background-image: url(<?php echo $featured_img_url; ?>);">	
	        							</div>
	        						</div>
        							<div class="post-item-content">
        								<div class="post-item-content-container">
		        							<h5><?php the_title(); ?></h5>
		        							<p><?php echo $subcontent; ?></p>
		        							<br>
		        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
		        						</div>
        							</div>
        						</a>
    						</div>
    					<?php } elseif ($count == 2 || $count == 3 || $count == 5 || $count == 6 || $count == 7) { ?>
    						<div class="grid-item <?php if($loop_count == 0) { if($count == 2 || $count == 3) { echo 'masonary_row_1'; } else { echo 'grid-item-inv'; } } else { echo 'grid-item-inv'; }?>" id="grid_item_<?php echo $grid_item_count; ?>">
        						<a href="#popup-<?php echo $grid_item_count; ?>" class="popup-link">
	        						<div class="post-image-wrapper">
	        							<div class="post-image landscape" style="background-image: url(<?php echo $featured_img_url; ?>);">	
	        							</div>
	        						</div>
        							<div class="post-item-content">
        								<div class="post-item-content-container">
		        							<h5><?php the_title(); ?></h5>
		        							<p><?php echo $subcontent; ?></p>
		        							<br>
		        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
		        						</div>
        							</div>
        						</a>
    						</div>
    					<?php }  elseif ($count == 4 || $count == 9) { ?>
    						<div class="grid-item grid-item-inv grid-item--width2" id="grid_item_<?php echo $grid_item_count; ?>">
    							<a href="#popup-<?php echo $grid_item_count; ?>" class="popup-link">
        							<div class="post-image-wrapper">
	        							<div class="post-image landscape-double" style="background-image: url(<?php echo $featured_img_url; ?>);">	
	        							</div>
	        						</div>
        							<div class="post-item-content">
        								<div class="post-item-content-container">
		        							<h5><?php the_title(); ?></h5>
		        							<p><?php echo $subcontent_lg; ?></p>
		        							<br>
		        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
		        						</div>
        							</div>
        						</a>
    						</div>
    					<?php } elseif ($count == 10) { ?>
        						<div class="grid-item grid-item-inv" id="grid_item_<?php echo $grid_item_count; ?>">
	        						<a href="#popup-<?php echo $grid_item_count; ?>" class="popup-link">
		        						<div class="post-image-wrapper">
		        							<div class="post-image landscape" style="background-image: url(<?php echo $featured_img_url; ?>);">	
		        							</div>
		        						</div>
	        							<div class="post-item-content">
	        								<div class="post-item-content-container">
			        							<h5><?php the_title(); ?></h5>
			        							<p><?php echo $subcontent; ?></p>
			        							<br>
			        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
			        						</div>
	        							</div>
	        						</a>
        						</div>
   						
						<?php $count = 0; ?>
						<?php $loop_count++; ?>
    					<?php 
    				}
				?>
			
				<div class="popup-container" id="popup-<?php echo $grid_item_count; ?>">
					<div class="popup-bg"><h1>X</h1></div>
					<div class="popup-content">
						<div class="popup-header">
							<?php if( have_rows('popup_header') ): 

								while( have_rows('popup_header') ): the_row(); 
						
									$content_type = get_sub_field('do_you_want_image_or_video');
									if ($content_type == "video") { ?>
										<div class="content-block-video">
									<?php
										$embed_code = get_sub_field('youtube_embed_code');
										echo $embed_code;
									?>
										</div>
									<?php 
									} elseif ($content_type == "image") { ?>
										<?php $image = get_sub_field('popup_image'); ?>
										<div class="popup-header-img" style="background-image: url('<?php echo $image['url']; ?>')">
										</div>
								<?php }
								endwhile; ?>
								
							<?php endif; ?>
						</div>
						<div class="popup-sub-content">
							<div class="popup-sidebar">
								<hr>
								<?php the_date('F, j, Y'); ?>
								<hr class="thin">
							</div>
							<div class="popup-main-content">
								<hr>
							 	<?php outputContentBlocks(); ?>
							</div>
						</div>
					</div>
				</div>
    		<?php } else { ?>
    				<?php 
    					if ($count == 1 || $count == 8) { ?>
    						<div class="grid-item <?php if($loop_count == 0) { if($count == 8) { echo 'grid-item-inv'; } else {echo 'masonary_row_1'; } } else { echo 'grid-item-inv'; } ?>" id="grid_item_<?php echo $grid_item_count; ?>">
    							<a href="<?php the_permalink(); ?>">
    								<div class="post-image-wrapper">
	        							<div class="post-image portait" style="background-image: url(<?php echo $featured_img_url; ?>);">	
	        							</div>
	        						</div>
        							<div class="post-item-content">
        								<div class="post-item-content-container">
		        							<h5><?php the_title(); ?></h5>
		        							<p><?php echo $subcontent; ?></p>
		        							<br>
		        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
		        						</div>
        							</div>
        						</a>
    						</div>
    					<?php } elseif ($count == 2 || $count == 3 || $count == 5 || $count == 6 || $count == 7) { ?>
    						<div class="grid-item <?php if($loop_count == 0) { if($count == 2 || $count == 3) { echo 'masonary_row_1'; } else { echo 'grid-item-inv'; } } else { echo 'grid-item-inv'; }?>" id="grid_item_<?php echo $grid_item_count; ?>">
        						<a href="<?php the_permalink(); ?>">
	        						<div class="post-image-wrapper">
	        							<div class="post-image landscape" style="background-image: url(<?php echo $featured_img_url; ?>);">	
	        							</div>
	        						</div>
        							<div class="post-item-content">
        								<div class="post-item-content-container">
		        							<h5><?php the_title(); ?></h5>
		        							<p><?php echo $subcontent; ?></p>
		        							<br>
		        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
		        						</div>
        							</div>
        						</a>
    						</div>
    					<?php }  elseif ($count == 4 || $count == 9) { ?>
    						<div class="grid-item grid-item-inv grid-item--width2" id="grid_item_<?php echo $grid_item_count; ?>">
    							<a href="<?php the_permalink(); ?>">
        							<div class="post-image-wrapper">
	        							<div class="post-image landscape-double" style="background-image: url(<?php echo $featured_img_url; ?>);">	
	        							</div>
	        						</div>
        							<div class="post-item-content">
        								<div class="post-item-content-container">
		        							<h5><?php the_title(); ?></h5>
		        							<p><?php echo $subcontent_lg; ?></p>
		        							<br>
		        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
		        						</div>
        							</div>
        						</a>
    						</div>
    					<?php } elseif ($count == 10) { ?>
        						<div class="grid-item grid-item-inv" id="grid_item_<?php echo $grid_item_count; ?>">
	        						<a href="<?php the_permalink(); ?>">
		        						<div class="post-image-wrapper">
		        							<div class="post-image landscape" style="background-image: url(<?php echo $featured_img_url; ?>);">	
		        							</div>
		        						</div>
	        							<div class="post-item-content">
	        								<div class="post-item-content-container">
			        							<h5><?php the_title(); ?></h5>
			        							<p><?php echo $subcontent; ?></p>
			        							<br>
			        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
			        						</div>
	        							</div>
	        						</a>
        						</div>
				<?php $count = 0; ?>
				<?php $loop_count++; ?>
				<?php }
			}
				$count++;
				$grid_item_count++;
			?>
	        <?php endwhile ?>
	        <?php else: ?>
	        	<script type="text/javascript">
	        		jQuery('.loadmore').html('No more posts');
	        	</script>
	        <?php endif;
	 
	    wp_die();
	}

	add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
	add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');	