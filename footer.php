		<?php wp_footer(); ?>
		<?php wp_footer(); ?>

<section class="main-footer">
<!--- FOOT SECTION 01 - NEWS START --->

<div class="container" style="min-height: 250px"></div>
<div class="curve hmp_orange_bg" style=""></div>
<div class="container-fluid news" style="background: url(<?php the_field('footer_news_bg_image', 'option'); ?>)">
	<div class="flex-container ">
		<h2>News</h2>
		  <div>1</div>
		  <div>2</div>
		  <div>3</div>  
		  <div>4</div>
		</div>
	<div class="curve_btm hmp_blue_bg" style=""></div>
</div>
<!--- FOOT SECTION 01 - NEWS END --->

<!--- FOOT SECTION 02 - SITEMAP START --->
	
	<div class="container-fluid hmp_blue_bg py-5">
	<div class="container">
		<h2 style="text-align: center">Welcome to Hampshire, let’s work together.</h2>
	</div>
	<div class="container">
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
<!--- FOOT SECTION 02 - SITEMAP END --->

<!--- FOOT SECTION 03 - SOCIAL START --->
	<div class="container">
		<div class="flex-container py-4">
			<div class="flex-item">
 				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/footerlogo.png" width="190px" height="60px" />
			</div>
			<?php
			if( have_rows('social_media', 'option') ):
				echo '<div class="flex-item social">';
				echo '<p>Connect with us</p>';
				echo '<ul class="align-middle">';
				while ( have_rows('social_media', 'option') ) : the_row();
					$socialchannel = get_sub_field('social_channel', 'option');
					$socialurl = get_sub_field('social_url', 'option');
					echo '<li class="nav-item">';
					echo '<a class="nav-link" rel="nofollow noopener noreferrer" href="' . $socialurl . '" target="_blank">';
					echo '<i class="fa' . $socialchannel . '" aria-hidden="true"></i>';
					echo '<span class="sr-only hidden">' . ucfirst($socialchannel) . '</span>';
					echo '</a></li>';
				endwhile;
				echo '</ul>';
				echo '</div>';
			endif;
			?>
 			<?php if(is_active_sidebar('footer-sm-3')):
			dynamic_sidebar('footer-sm-3');
			endif; ?>
		</div>
	</div>
<!--- FOOT SECTION 03 - SOCIAL END --->

<!--- FOOT SECTION 04 - LEGALS START --->
	<div class="container-fluid hmp_orange_bg py-2">
		<div class="container">
			<div class="flex-container legals">
				<div class="col-3">
					<p><?php the_field('legals_text', 'option'); ?></p>
				</div>
				<?php if(is_active_sidebar('footer-lgl-2')):
				dynamic_sidebar('footer-lgl-2');
				endif; ?>
			<div class="col-3"><p>© Hampshire County Council <?php echo date("Y"); ?></p></div>
			</div>
		</div>
	</div> 
<!--- FOOT SECTION 04 - LEGALS END --->

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
