<?php get_header(); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<?php if (in_category('28')) { ?>
		<?php 
			$intro_text = get_field('introduction_text');
			$job_details = get_field('job_details');
			$j_ref = $job_details['reference'];
			$j_posted = $job_details['posted'];
			$j_closes = $job_details['closes'];
			$j_salary = $job_details['salary'];
			$j_hours = $job_details['hours'];

			$job_location_details = get_field('job_location_&_direction_info');
			$j_location = $job_location_details['location'];
			$j_longlat = $job_location_details['location_coordinates'];
			$j_long = $j_longlat['longitude'];
			$j_lat = $j_longlat['latitude'];
			$car_link = $job_location_details['car_direction_link'];
			$trans_link = $job_location_details['transport_direction_link'];
			$cycle_link = $job_location_details['cycle_direction_link'];
			$walking_link = $job_location_details['walking_direction_link'];

			$job_desc = get_field('job_description');
					?>
			<div class="vacancies-intro">
				<?php echo $intro_text; ?>
			</div>
			<div class="vacancies-wrapper">
				<div class="vacancies-info">
					<h3><?php echo $j_location; ?></h3>
					<div class="vacancies-gmap" id="vacancies-gmap">
					</div>
					<div class="directions-links">
						<div class="directions-link car-link">
							<a href="<?php echo $car_link; ?>" target="_blank">
								<div class="directions-icon car-icon" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/car-icon.png);">
								</div>
								<p>CAR</p>
							</a>
						</div>
						<div class="directions-link trans-link">
							<a href="<?php echo $trans_link; ?>" target="_blank">
								<div class="directions-icon transport-icon" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/transport-icon.png);">
								</div>
								<p>TRANSPORT</p>
							</a>
						</div>
						<div class="directions-link cycle-link">
							<a href="<?php echo $cycle_link; ?>" target="_blank">
								<div class="directions-icon cycle-icon" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/cycle-icon.png);">
								</div>
								<p>CYCLE</p>
							</a>
						</div>
						<div class="directions-link walking-link">
							<a href="<?php echo $walking_link; ?>" target="_blank"> 
								<div class="directions-icon walking-icon" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/walking-icon.png);">
								</div>
								<p>WALK</p>
							</a>
						</div>
					</div>
					<div class="vacancies-details">
						<p>Reference: <?php echo $j_ref; ?></p>
						<p>Posted: <?php echo $j_posted; ?></p>
						<p>Closes: <?php echo $j_closes; ?></p>
						<p>Contract: <?php echo $j_hours; ?></p>
						<p>Salary: <?php echo $j_salary; ?></p>
						<p>Hours: <?php echo $j_hours; ?></p>
						<a href="#apply_now" id="apply_now">Apply Now</a>
					</div>
				</div>
				<div class="vacancies-description">
					<?php echo $job_desc; ?>
				</div>
			</div>
			<div class="application-form-wrapper" id="apply_now">
				<div class="application-form">
					<?php if (in_category('29')) { ?>
						<?php echo do_shortcode('[contact-form-7 id="511" title="Driver Application Form"]'); ?>
					<?php } elseif (in_category('30')) { ?>
						<?php echo do_shortcode('[contact-form-7 id="664" title="Office Application Form"]'); ?>
					<?php } ?>
				</div>
			</div>

			<script>
				function initMap() {
					  // The location of Uluru
					  var uluru = {lat: <?php echo $j_lat; ?>, lng: <?php echo $j_long; ?>};
					  // The map, centered at Uluru
					  var map = new google.maps.Map(
					      document.getElementById('vacancies-gmap'), {zoom: 15, center: uluru});
					  // The marker, positioned at Uluru
					  // var marker = new google.maps.Marker({position: uluru, map: map});
					}
			</script>
		<?php 	 
			} elseif(in_category('3')) {
				outputContentBlocks();
			} elseif(in_category('31')) {
				outputContentBlocks();
			}
		?>
	<?php endwhile; ?>

	<?php else: ?>

	<?php endif; ?>

<?php get_footer(); ?>
