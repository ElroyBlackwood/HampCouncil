<?php 

function outputTeamMembers() {
	?>
	<div class="container-fluid" id="team-members">
		<?php
		if( have_rows('team_members') ):

		    while ( have_rows('team_members') ) : the_row();
		       $profile_picture = get_sub_field('profile_picture');
		       $tm_name = get_sub_field('tm_name');
		       $tm_position = get_sub_field('tm_position');
		       $tm_bio = get_sub_field('tm_bio');
		       $tm_email_address = get_sub_field('tm_email_address');
		       $name_split = explode(" ", $tm_name);
		       $first_name = $name_split[0];
		       ?>
		       <div class="team-member">
		       		<div class="team-member-img-container">
			       		<div class="team-member-img dimmed" style="background-image: url(<?php echo $profile_picture['url']; ?>);">
						</div>
					</div>
		       		<div class="team-member-content">
		       			<h2><?php echo $tm_name; ?></h2>
		       			<h2 class="blue-text"><?php echo $tm_position; ?></h2>
		       			<p><?php echo $tm_bio; ?></p>
		       			<a href="mailto:<?php echo $tm_email_address; ?>"><div class="email-icon"></div>Email <?php echo $first_name; ?></a>
		       		</div>
		       </div>
		       <?php
		    endwhile;

		else :

		endif;
		?>
	</div>
	<?php
}

?>