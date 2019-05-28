		<?php wp_footer(); ?>

<section class="main-footer">
	
<!--- FOOT SECTION 01 - NEWS START --->
<style>

	</style>
	
<script>
(function($) {
    $(function () {
        $('.slider-8').slick({
		  infinite: false,
		  speed: 300,
		  slidesToShow: 4,
		  slidesToScroll: 4,
		  responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
				dots: true
			  }
			},
			{
			  breakpoint: 600,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		  ]
		});
    });
})( jQuery );
</script>

	
<div class="container-fluid desaturate" style="background: linear-gradient( rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9) ), url(<?php the_field('footer_news_bg_image', 'option'); ?>); background-repeat: no-repeat; background-position: center; background-size: cover; ">
	<div class="flex-container overcontent" style="">
	<div class="container py-5">
	<h2 style="text-align: center"><?php the_field('news_title', 'option'); ?></h2>
	</div>
		<div class="container">
			<?php $catquery = new WP_Query( 'cat=6&posts_per_page=5' ); ?>
			<div class="slick-wrapper">
				<div class="slider-8">
					<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
						<div class="slide-content">
							<a href="<?php the_permalink() ?>" rel="bookmark">
							 <h3><?php the_title(); ?></h3>
									<?php if ( has_post_thumbnail() ) : ?>
										<img title="<?php the_title_attribute(); ?>" src="<?php the_post_thumbnail_url( 'medium' ); ?>"/>
									<?php endif; ?>
							 <?php the_excerpt(); ?>
							</a>
						</div>
					<?php endwhile;
						wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<!--- FOOT SECTION 01 - NEWS END --->

<!--- FOOT SECTION 02 - SITEMAP START --->
	<div class="container-fluid hmp_blue_bg py-5 overcontent addcurveminus" style="">
	<div class="container">
		<h2 style="text-align: center"><?php the_field('sitemap_title', 'option'); ?></h2>
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
			<div class="flex-item">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/HCC-logo.png" width="190px" height="52px" />
			</div>
		</div>
	</div>
<!--- FOOT SECTION 03 - SOCIAL END --->

<!--- FOOT SECTION 04 - LEGALS START --->
	<div class="container-fluid hmp_orange_bg py-4 addcurveminus curveshadow" style="">
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
