		<?php wp_footer(); ?>

<section id="main-footer">
	
<!--- FOOT SECTION 01 - NEWS START -->

<div class="container-fluid desaturate" style="background-image: url(<?php the_field('footer_news_bg_image', 'option'); ?>);" id="news-carousel">
	<div class="flex-container overcontent" style="">
	<div class="container py-5">
	<h1>You may also be interested in</h1>
	</div>
		<div class="container">
			<?php outputNewsCarousel(); ?>
		</div>
	</div>
</div>

<!--- FOOT SECTION 01 - NEWS END -->

<!--- FOOT SECTION 02 - SITEMAP START -->
	<div class="container-fluid hmp_blue_bg py-5 overcontent addcurveminus" style="">
	<div class="container">
		<h2 style="text-align: center"><?php the_field('sitemap_title', 'option'); ?></h2>
	</div>
	<div class="container" id="top-footer">
		<div class="flex-container sitemap">
 			<?php if(is_active_sidebar('footer-smp-1')):
			dynamic_sidebar('footer-smp-1');
			endif; ?>
 			<?php if(is_active_sidebar('footer-smp-2')):
			dynamic_sidebar('footer-smp-2');
			endif; ?>
 			<?php if(is_active_sidebar('footer-smp-3')):
			dynamic_sidebar('footer-smp-3');
			endif; ?>
 			<?php if(is_active_sidebar('footer-smp-4')):
			dynamic_sidebar('footer-smp-4');
			endif; ?>
 			<?php if(is_active_sidebar('footer-smp-5')):
			dynamic_sidebar('footer-smp-5');
			endif; ?>
 			<?php if(is_active_sidebar('footer-smp-6')):
			dynamic_sidebar('footer-smp-6');
			endif; ?>
		  </div>
		</div>
	</div>
<!--- FOOT SECTION 02 - SITEMAP END -->

<!--- FOOT SECTION 03 - SOCIAL START -->
	<div id="middle-footer">
		<div class="flex-container py-4">
 			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/footerlogo.png" width="190px" height="60px" />
			<div class="social-links">
				<p>Connect with us</p>
			<?php
				if( have_rows('social_media', 'option') ):
					while ( have_rows('social_media', 'option') ) : the_row();
						$socialchannel = get_sub_field('social_channel', 'option');
						$socialurl = get_sub_field('social_url', 'option');
						?>
						<?php
						if ($socialchannel == "r fa-envelope") { ?>
							<a href="mailto:<?php echo $socialurl; ?>" rel="nofollow noopener noreferrer"><i class="fa<? echo $socialchannel; ?>" aria-hidden="true"></i></a>
						<?php } else { ?>
							<a href="<?php echo $socialurl; ?>" rel="nofollow noopener noreferrer" target="_blank"><i class="fa<? echo $socialchannel; ?>" aria-hidden="true"></i></a>
						<?php } ?>

						<?php
					endwhile;
				endif;
			?>
			</div>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/HCC-logo.png" width="190px" height="52px" />
		</div>
	</div>
<!--- FOOT SECTION 03 - SOCIAL END -->

<!--- FOOT SECTION 04 - LEGALS START -->
	<div class="container-fluid hmp_orange_bg py-4 addcurveminus curveshadow" id="bottom-footer">
		<div class="container">
			<div class="flex-container legals">
				<div class="col-3">
					<p><?php the_field('legals_text', 'option'); ?></p>
				</div>
				<?php if(is_active_sidebar('footer-lgl-1')):
				dynamic_sidebar('footer-lgl-1');
				endif; ?>
			<div class="col-3"><p>© Hampshire County Council <?php echo date("Y"); ?></p></div>
			</div>
		</div>
	</div> 
<!--- FOOT SECTION 04 - LEGALS END -->

</section>

	
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

	</body>
</html>
