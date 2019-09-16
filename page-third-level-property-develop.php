<?php 
	/* Template Name: Third Level Property Development Page */ 
?>

<?php get_header(); ?>
<?php outputWidgetBlock(); ?>

<div class="container-fluid" id="single-property">
	<div id="article-content">
		<?php
			$feat_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$post_thumbnail_id = get_post_thumbnail_id();
			$caption = wp_get_attachment_caption($post_thumbnail_id);
			$static_or_gallery = get_field('do_you_want_a_static_image_or_gallery');
			$display_contact_logos = get_field('display_contact_logos');
		?>
		<div id="article-header">
			<?php
					$do_you_want_the_logo_to_appear_in_the_title = get_field('do_you_want_the_logo_to_appear_in_the_title');
					?>
					<div class="agent-logos<?php if($do_you_want_the_logo_to_appear_in_the_title == 'no') { echo ' no-logos'; } ?>">
					<?php
					if( have_rows('contactagent') ):
						$count = 0;
						?>
						
						<?php
					 	// loop through the rows of data
					    while ( have_rows('contactagent') ) : the_row();
					    	$agent_logo = get_sub_field('agent_logo');
					    	$agents_name = get_sub_field('agents_name');
					    	$agent_website = get_sub_field('agent_website');
					    	$agent_address = get_sub_field('agent_address');
					    	$agent_email = get_sub_field('agent_email');
					    	$agent_phone_number = get_sub_field('agent_phone_number');
					    	
					    	if ($count < 1) {
	    				        if($do_you_want_the_logo_to_appear_in_the_title == "yes") { ?>
	    		        	        
	    		        	    		<div class="agent-logo" style="background-image: url(<?php echo $agent_logo['url']; ?>);">
	    		        		    	</div>
	    		        	    	
    				       <?php } else {
	    				        	
	    				        } 
	    				        ?>
					    			
				    	<?php }
					     	$count++;
					    endwhile;

					else :

					    // no rows found
						?>
					
					<?php
					endif;
			?>
				</div>
				<div class="agent-title">
					<h3 class="orange-text"><?php if (!empty($agents_name)) { echo $agents_name; } ?></h3>
					<h1><?php echo get_the_title(); ?></h1>
				</div>
			</div>
		<?php
			if ($static_or_gallery == 'no') { ?>
		<?php } else {
			ouputPostGallery();
		}
		?>
		<div id="article-text">
			<p>
				<?php $content = get_post_field('post_content', get_the_ID()); ?>
				<?php $content = apply_filters('the_content', $content); ?>
				<?php echo $content; ?>
			</p>
		</div>
		<div id="article-bottom-bar">
			<!-- <div class="article-bottom-bar-left">
				<a href="<?php echo $agent_website; ?>" target="_blank">
					<div class="read-more">
						<div class="blue-arrow"></div><span><strong>Go to agent's website</strong></span>
					</div>
				</a>
			</div> -->
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
				<a href="<?php echo bloginfo('url'); ?>/land-property/">
					<div class="read-more">
						<div class="blue-arrow"></div><span><strong>Back to Properties</strong></span>
					</div>
				</a>
			</div>
		</div>
		<div class="agents-block">
		<?php 
		if( have_rows('contactagent') ):

		 	// loop through the rows of data
		    while ( have_rows('contactagent') ) : the_row();
		    	$agent_logo = get_sub_field('agent_logo');
		    	$agents_name = get_sub_field('agents_name');
		    	$agent_website = get_sub_field('agent_website');
		    	$agent_address = get_sub_field('agent_address');
		    	$agent_email = get_sub_field('agent_email');
		    	$agent_phone_number = get_sub_field('agent_phone_number');
		        $contactagent_type = get_sub_field('contactagent_type');
		    	?>
		    	<div class="agent-contact">
		    		<div class="agent-contact-info">
		    			<div class="agent-contact-logo">
		    				<div class="agent-logo" style="background-image: url(<?php echo $agent_logo['url']; ?>);">
		    				</div>
		    			</div>
			    		<div class="agent-contact-header">
			    			<h3><?php echo $contactagent_type; ?></h3>
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
			    			<div class="icon-text" id="website">
			    				<div class="icon"></div>
			    				<a href="<?php echo $agent_website; ?>">Visit Website</a>
			    			</div>
			    		</div>
			    	</div>
		    	</div>
		    	<?php
		    endwhile;

		else :

		    // no rows found

		endif;
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
