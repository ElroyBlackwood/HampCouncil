<?php
function outputContactDetailsTextBlock() {

	$contact_details_group = get_field('contact_details_content', 'option');
	$address = $contact_details_group['address'];
	$telephone = $contact_details_group['phone_number'];
	$email = $contact_details_group['email_address'];
?>
	<div class="container-fluid container-width" id="contact-details-text-block">	
		<p><?php echo $address; ?></p>
		<div class="icon-text" id="email_address">
			<div class="icon"></div>
			<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
		</div>
		<div class="icon-text" id="phone_number">
			<div class="icon"></div>
			<a href="tel:<?php echo $telephone; ?>"><?php echo $telephone; ?></a>
		</div>
	</div>
<?php
}
?>