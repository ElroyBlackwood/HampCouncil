<?php 

function outputLogoCarousel() {
	$display = get_field('display_logo_carousel');

	if($display == 'yes') {

		if( have_rows('logos') ): ?>

		<script>
		(function($) {
		    $(function () {
		        $('.logo-carousel').slick({
				  infinite: false,
				  speed: 300,
				  slidesToShow: 4,
				  slidesToScroll: 4,
				  arrows: true,
				  responsive: [
					{
					  breakpoint: 1200,
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
						slidesToShow: 1,
						slidesToScroll: 1
					  }
					}
				  ]
				});
		})( jQuery );
		</script>
		<div class="slick-wrapper">
			<div class="logo-carousel">
				<h3><strong>Some of the influential financial services businesses operating in Hampshire</strong></h3>
<?php 
		    while ( have_rows('logos') ) : the_row();

		        $logo = get_sub_field('logo');
		        $logo_txt = get_sub_field('logo_text');
		        $logo_link = get_sub_field('logo_link');
?>
			<div class="slide-content">
				<a href="<?php echo $logo_link; ?>">
					<div class="logo" style="background-image: url(<?php echo $logo['url']; ?>);">
					</div>
					<h3><?php echo $logo_link; ?></h3>
				</a>
			</div>
<?php 

		    endwhile;

		else :

		endif;

	}
}

?>