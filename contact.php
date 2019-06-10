<?php 
	/* Template Name: Contact Page */ 
?>

<?php get_header(); ?>
	<div class="page-title">
		<h1>Contact</h1>
	</div>
	<?php outputTextContentBlock('contact_top_content'); ?>
	<div class="container-fluid" id="contact_info">
		<div id="contact-details">
			<?php outputContactDetailsTextBlock(); ?>
		</div>
		<div id="contact-form">
			<?php echo do_shortcode('[contact-form-7 id="280" title="Contact form 1"]'); ?>
		</div>
	</div>

<?php get_footer(); ?>