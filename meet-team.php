<?php 
	/* Template Name: Meet the team */ 
?>

<?php get_header(); ?>
<?php 
	$displayTitle = get_field('display_page_title');

	if ($displayTitle == 'yes') {
		outputTitle();
	}
?>
<?php outputTeamMembers(); ?>

<?php get_footer(); ?>