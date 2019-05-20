<?php 
	/* Template Name: Contact - Enquiry */ 
?>

<?php get_header(); ?>

<?php outputContentBlocks(); ?>
<div class="frms-container">
	<div class="frms-wrapper">
		<div class="callback">
			<div class="callback-txt">
				<p>CONTACT ONE OF OUR TEAM ON</p>
				<h3>0845 850 86 87</h3>
				<p>Want us to call you?...</p>
			</div>
			<?php echo do_shortcode('[contact-form-7 id="517" title="Callback Form"]'); ?>
		</div>

		<div class="enquiry-forms">
			<ul class="nav nav-tabs">
			  <li><a class="tab-btn active show" data-toggle="tab" href="#general-enquiry">GENERAL ENQUIRY</a></li>
			  <li><a class="tab-btn" data-toggle="tab" href="#transport-enquiry">TRANSPORT ENQUIRY</a></li>
			  <li><a class="tab-btn" data-toggle="tab" href="#accounts-enquiry">ACCOUNTS / FINANCIAL ENQUIRY</a></li>
			</ul>

			<div class="tab-content">
				<div id="general-enquiry" class="tab-pane fade in active show">
					<?php echo do_shortcode('[contact-form-7 id="514" title="General Enquiry"]'); ?>
				</div>
				<div id="transport-enquiry" class="tab-pane fade">
					<?php echo do_shortcode('[contact-form-7 id="515" title="Transport Enquiry"]'); ?>
				</div>
				<div id="accounts-enquiry" class="tab-pane fade">
					<?php echo do_shortcode('[contact-form-7 id="516" title="Accounts / Financial Enquiry"]'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="gmap-wrapper">
	<div class="gmap" id="gmap-depots">

	</div>

	<div class="custom-map-marker">
		<h4>HEAD OFFICE</h4>
		<p><strong>David Watson Transport Ltd</strong></p>
		<p>Mundford Road, Weeting, Norfolk</p>
		<p>IP27 0PL</p>
		<br />
		<p><i>T:&emsp;<a href="tel:01842816910">01842 816910</a></i></p>
		<p><i>E:&emsp;</i><a href="mailto:email@email.com">Email Us</a></p>
	</div>
</div>

<div class="custom-map-marker custom-map-marker-mb">
	<h4>HEAD OFFICE</h4>
	<p><strong>David Watson Transport Ltd</strong></p>
	<p>Mundford Road, Weeting, Norfolk</p>
	<p>IP27 0PL</p>
	<br />
	<p><i>T:&emsp;<a href="tel:01842816910">01842 816910</a></i></p>
	<p><i>E:&emsp;</i><a href="mailto:email@email.com">Email Us</a></p>
</div>

<div class="depot-info">
	<h1>REGIONAL DEPOTS</h1>
	<div class="depot-row">
		<div class="depot-wdg red-border">
			<h4>ESSEX</h4>
			<p>Depot Manager. Martin Bunn</p>
			<br />
			<p><strong>David Watson Transport Ltd</strong></p>
			<p>Earls Colne Business Park</p>
			<p>Earls Colne, Colchester</p>
			<p>Essex, CO6 2NS</p>
			<br />
			<p><i>T:&emsp;<a href="tel:01787224226">01787 224226</a></i></p>
		</div>
		
		<div class="depot-wdg red-border">
			<h4>NORFOLK</h4>
			<p>Depot Manager. Paul Pitt</p>
			<br />
			<p><strong>David Watson Transport Ltd</strong></p>
			<p>Mundford Road</p>
			<p>Weeting</p>
			<p>Norfolk, IP27 0PL</p>
			<br />
			<p><i>T:&emsp;<a href="tel:01842816910">01842 816910</a></i></p>
		</div>

		<div class="depot-wdg red-border">
			<h4>STAFFORD</h4>
			<p>Depot Manager. Jon Hutchinson</p>
			<br />
			<p><strong>David Watson Transport Ltd,</strong></p>
			<p>Drummond Road</p>
			<p>Astonfields Industrial Estate</p>
			<p>Stafford, ST16 3HJ</p>
			<br />
			<p><i>T:&emsp;<a href="tel:01785228200">01785 228200</a></i></p>
		</div>

		<div class="depot-wdg red-border">
			<h4>YORKSHIRE</h4>
			<p>Depot Manager. Andrew Smith</p>
			<br />
			<p><strong>David Watson Transport Ltd</strong></p>
			<p>Moxon Way, Moor Lane Trading Estate</p>
			<p>Sherburn-in-Elmet</p>
			<p>Leeds, LS25 6ES</p>
			<br />
			<p><i>T:&emsp;<a href="tel:01977808505">01977 808505</a></i></p>
		</div>
	</div>
	<div class="depot-row">
		<div class="depot-wdg">
			<h4>KENT</h4>
			<p>Depot Manager. Mark Dadson</p>
			<br />
			<p><strong>David Watson Transport Ltd</strong> 
			<p>Arnolde Close</p>
			<p>Medway City Estate, Rochester</p>
			<p>Kent, ME2 4QW</p>
			<br />
			<p><i>T:&emsp;<a href="tel:01634719618">01634 719618</a></i></p>
		</div>
		<div class="depot-wdg">
			<h4>NORTHANTS</h4>
			<p>Depot Manager. Lee Drinkwater</p>
			<br />
			<p><strong>David Watson Transport Ltd</strong></p>
			<p>Unit 4, Building 15, Royal Ordnance Depot</p>
			<p>Harmans Way, Weedon</p>
			<p>Northampton, NN7 4PS</p>
			<br />
			<p><i>T:&emsp;<a href="tel:01327342678">01327 342678</a></i></p>
		</div>
		<div class="depot-wdg">
			<h4>WELLINGBOROUGH</h4>
			<p>Depot Manager. Steve Priest</p>
			<br />
			<p><strong>David Watson Transport Ltd</strong></p>
			<p>Rixon Road</p>
			<p>Wellingborough</p>
			<p>NN8 4BB</p>
			<br />
			<p><i>T:&emsp;<a href="tel:01933272003">01933 272003</a></i></p>
		</div>
	</div>
</div>

<script>
	function initMap() {
		  // The location of Uluru
		  var uluru = {lat: 52.456450, lng: 0.626300};
		  // The map, centered at Uluru
		  var map = new google.maps.Map(
		      document.getElementById('gmap-depots'), {zoom: 15, center: uluru});
		  // The marker, positioned at Uluru
		  // var marker = new google.maps.Marker({position: uluru, map: map});
		}
</script>
<?php get_footer(); ?>