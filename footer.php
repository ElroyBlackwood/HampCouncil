		<?php wp_footer(); ?>

<section id="main-footer">
	
<!--- FOOT SECTION 01 - NEWS START -->
<?php 
	$page_tempate = get_page_template();

	if (strpos($page_tempate, 'news.php') !== false) {
		
	} else { ?>
		<div class="container-fluid desaturate" style="background-image: url(<?php the_field('footer_news_bg_image', 'option'); ?>);" id="news-carousel">
		    <div class="orange-curve top-curve"></div>
			<div class="flex-container overcontent">
				<div class="container">
					<h1>You may also be interested in</h1>
				</div>
				<div class="container-fluid container-width">
					<?php outputNewsCarousel(); ?>
				</div>
			</div>
		</div>
	<?php
	}
?>

<!--- FOOT SECTION 01 - NEWS END -->

<!--- FOOT SECTION 02 - SITEMAP START -->
	<div class="container-fluid hmp_blue_bg py-5" id="footer_menus">
		<div class="blue-curve top-curve">
		</div>
	<div class="container-width">
		<h2><?php the_field('sitemap_title', 'option'); ?></h2>
	</div>
	<div class="container-width" id="top-footer">
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
 			<img id="business-hamp-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/footerlogo.png" width="190px" height="60px" />
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
							<a href="mailto:<?php echo $socialurl; ?>"><i class="fa<? echo $socialchannel; ?>" aria-hidden="true"></i></a>
						<?php } else { ?>
							<a href="<?php echo $socialurl; ?>" target="_blank"><i class="fa<? echo $socialchannel; ?>" aria-hidden="true"></i></a>
						<?php } ?>

						<?php
					endwhile;
				endif;
			?>
			</div>
			<a href="https://www.hants.gov.uk/" target="_blank">
				<img id="hamp-cc-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/HCC-logo.png" width="190px" height="52px" />
			</a>
		</div>
	</div>
<!--- FOOT SECTION 03 - SOCIAL END -->

<!--- FOOT SECTION 04 - LEGALS START -->
	<div class="container-fluid hmp_orange_bg" id="bottom-footer">
		<div class="legal">
			<p><?php the_field('legals_text', 'option'); ?></p>
		</div>
		<div class="privacy">
			<?php if(is_active_sidebar('footer-lgl-1')):
			dynamic_sidebar('footer-lgl-1');
			endif; ?>
		</div>
		<div class="copywrite">
			<p>© Hampshire County Council <?php echo date("Y"); ?></p></div>
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
		ga('create', 'UA-144023246-1', 'https://businesshampshire.co.uk');
		ga('send', 'pageview');
		</script>

	</body>
</html>

