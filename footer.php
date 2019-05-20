			<?php
			$footer_testimonial = get_field('testimonial_section');
			if ( $footer_testimonial ):
        	$display_section = $footer_testimonial['display_testimonial_section'];
        	$background_img = $footer_testimonial['test_background_image']['url'];
			$logo = get_template_directory_uri() . "/assets/images/dwt-logo-new-md.png";
        	if( $display_section == "yes"):
        	?>
        	<div class="content-block footer-cb" id="testimonial-content-block" style="background-image: url(<?php echo $background_img; ?>);">
        		<div class="gradiant-overlay" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/bg-red-gradiant.png');"></div>
		        	<div class="testimonial-content-block">
		        		<div class="logo">
							<img src="<?php echo $logo; ?>" alt="Logo" class="logo-img">
		        		</div>
			        	<?php 
			        		$count = 0;
			        		$dot_count = 0;

		        			if( have_rows('testimonials', 'option') ): ?>
		        			<div id="testimonial_carousel" class="carousel slide carousel-fade" data-ride="carousel">
					        	<div class="horizontal-div"></div>
		        				<ol class="carousel-indicators">
		        				<?php
		        				    while ( have_rows('testimonials', 'option') ) : the_row(); ?>
	        				    <?php
	        				    		if ($dot_count == 0) { ?>
	        				    			<li data-target="#testimonial_carousel" data-slide-to="<?php echo $dot_count; ?>" class="active"></li>
	        				    <?php 
	        							} else { ?>
											<li data-target="#testimonial_carousel" data-slide-to="<?php echo $dot_count; ?>"></li>
	        					<?php	}
	        				    ?>
		        				<?php 
		        					$dot_count++;
		        					endwhile; ?>
		        				</ol>
		        				<div class="carousel-inner">
			        			<?php
			        			    while ( have_rows('testimonials', 'option') ) : the_row(); ?>
			        			    	
			        		    <?php
			        		    		$testimonial = get_sub_field('testimonial', 'option');
			        		    		$author = get_sub_field('author', 'option');

			        		    		if ($count == 0) { ?>
			        		    			<div class="carousel-item slide active">
			        		    				<?php echo $testimonial; ?>
			        		    				<p><?php echo $author; ?></p>
			        		    			</div>
								<?php 
			        		    		} else { ?>
			        		    			<div class="carousel-item slide">
			        		    				<?php echo $testimonial; ?>
			        		    				<p><?php echo $author; ?></p>
			        		    			</div>
								<?php					        		    			
			        		    		}
			        			?>					        						
			        			<?php
			        				$count++;
			        			    endwhile;
			        		    ?>
			        			    </div>
			        			    </div>
			        		    <?php
			        			else :

			        			    // no rows found

			        			endif;			
			        	?>
		        </div>
        	</div>

        	<?php 
        	endif;
        	endif;
        		$footer_fw = get_field('full_width_footer_content');
            	$display_section = $footer_fw['display_full_width_footer_content'];
            	if ($display_section == "yes"):
            	?>
            	<div class="content-block footer-cb" id="content-block-col-1">
            		<div class="content-block-col-1" style="color: <?php echo $font_col; ?>">
            	<?php
            		$text = get_field('full_width_footer_content','option');
            		echo $text;
            		?>	<div class="bttop-wrapper">
		            		<a href="#top-anch" class="top-anch">
			            		<div class="bttop-container">
			            			<p class="bttop" >BACK TO TOP</p>
			            			<div class="up-arr" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/arrow-up.png);"></div>
			            		</div>
			            	</a>
		            	</div>
		        	</div>
	        	</div>
			      <?php
			     endif;
			     ?> 

			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<div class="footer-banner">
					<h2>SETTING THE STANDARD FOR OTHERS TO FOLLOW</h2>
				</div>
				<div class="footer-main">
					<div class="footer-social">
						<a href="" target="_blank">
							<img src="<?php echo get_template_directory_uri() . '/assets/images/social-icons/facebook-icon.jpg'; ?>">
						</a>
						<a href="" target="_blank">
							<img src="<?php echo get_template_directory_uri() . '/assets/images/social-icons/youtube-icon.jpg'; ?>">
						</a>
						<a href="" target="_blank">
							<img src="<?php echo get_template_directory_uri() . '/assets/images/social-icons/twitter-icon.jpg'; ?>">
						</a>
						<a href="" target="_blank">
							<img src="<?php echo get_template_directory_uri() . '/assets/images/social-icons/linkedin-icon.jpg'; ?>">
						</a>
						<a href="" target="_blank">
							<img src="<?php echo get_template_directory_uri() . '/assets/images/social-icons/instagram-icon.jpg'; ?>">
						</a>
					</div>
					<div class="footer-download">
						<div class="dwn-broucher">
							<?php 
								$brochure = get_field('brochure', 'option');

								if ($brochure) {
									$link_upload = $brochure['enter_link_or_upload'];
									if ($link_upload == 'link') {
										$bro_link = $brochure['brochure_link'];
										?>
										<a id="red_bg" href="<?php echo $bro_link; ?>">DOWNLOAD BROCHURE</a>
										<?php
									} else {
										$bro_link = $brochure['upload_brochure'];
										?>
										<a id="red_bg" href="<?php echo $bro_link; ?>">DOWNLOAD BROCHURE</a>
										<?php
									}
								}
							?>
						</div>
					</div>
					<div class="footer-nav">
						<div class="footer-nav-col1">
						    <?php /* Primary navigation */
								wp_nav_menu( array(
								  'theme_location' => 'footer-menu-col1',
								  'depth' => 2,
								  'container' => false,
								  'menu_class' => 'nav',
								  //Process nav menu using our custom nav walker
								  'walker' => new wp_bootstrap_navwalker())
								);
							?>
						</div>
						<div class="footer-nav-col2">
						    <?php /* Primary navigation */
								wp_nav_menu( array(
								  'theme_location' => 'footer-menu-col2',
								  'depth' => 2,
								  'container' => false,
								  'menu_class' => 'nav',
								  //Process nav menu using our custom nav walker
								  'walker' => new wp_bootstrap_navwalker())
								);
							?>
						</div>
						<div class="footer-nav-col3">
						    <?php /* Primary navigation */
								wp_nav_menu( array(
								  'theme_location' => 'footer-menu-col3',
								  'depth' => 2,
								  'container' => false,
								  'menu_class' => 'nav',
								  //Process nav menu using our custom nav walker
								  'walker' => new wp_bootstrap_navwalker())
								);
							?>
						</div>
						<div class="footer-nav-col4">
						    <?php /* Primary navigation */
								wp_nav_menu( array(
								  'theme_location' => 'footer-menu-col4',
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
				<div class="footer-logos">
				<?php if( have_rows('footer_logos', 'option') ): ?>

					<div class="logo-carousel">

					<?php while( have_rows('footer_logos', 'option') ): the_row(); 

						// vars
						$logo_bw = get_sub_field('logo_grey');
						$logo_col = get_sub_field('logo_colour');
						?>
						<div class="logo-carousel-slide">
							<div class="footer-logo" style="background-image: url(<?php echo $logo_bw['url']; ?>);">
							</div>
							<div class="footer-logo hover" style="background-image: url(<?php echo $logo_col['url']; ?>);">
							</div>
						</div>
					<?php endwhile; ?>

					</div>

				<?php endif; ?>
				</div>
				<!-- copyright -->
				<div class="copyright">
					<p>Head Office: David Watson Transport Ltd. Mundford Road, Weeting, Norfolk, IP27 0PL<br />Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> Ltd</p>
					<hr>
					<p>Site by <a href="#" target="_blank">Design79</a></p>
				</div>
				<!-- /copyright -->

			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

		<script async defer
		    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2naPwVfA54GAnMCuatv8kvgrhDj8TO5o&callback=initMap">
		    </script>

	</body>
</html>
