<?php
function outputWidgetBlock() { ?>
	<?php
		$display_block = get_field('do_you_want_to_display_widget_block_under_the_banner__slider');
	?>
	<?php 
	if ($display_block == "yes") {
		$block_title = get_field('block_title');
		$hex = get_field('image_overlay_colour');
		$hex = "#" . $hex;
		list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
		$rgb_col = "$r, $g, $b, 0.9";
		$bg_img = get_field('wdg_background_image');
		$text_col = get_field('text_colour');
		$text_col = "#" . $text_col;
		
		?>
		<style type="text/css">
			/*#wdgt_block:after {
				content: '';
				position: absolute;
				left: 50%;
				top: -3vh;
				height: 10vh;
				width: 110%;
				border-radius: 50%;
				border: 0 solid <?php echo $hex; ?>;
				border-width: 3vh 0 0 0;
				z-index: 1;
				transform: translateX(-50%);
			}*/
		</style>
		<div class="container-fluid" id="wdgt_block_outer">
			<div class="colour-overlay" style="background: linear-gradient( rgba(<?php echo $rgb_col; ?>), rgba(<?php echo $rgb_col; ?>) );">
			<h1><?php echo $block_title; ?></h1>
				<div class="widget-container container-width">
		<?php
				if( have_rows('widgets') ):
					$wdg_count = count(get_field('widgets'));
					$wdg_css_class = "";

					if ($wdg_count == 3) {
						$wdg_css_class = "three_wdg";
					} elseif ($wdg_count == 4) {
						$wdg_css_class = "four_wdg";
					}  elseif ($wdg_count == 5) {
						$wdg_css_class = "five_wdg";
					}
				    while ( have_rows('widgets') ) : the_row();

				        $wdg_icon = get_sub_field('widget_icon');
				        $wdg_title = get_sub_field('widget_title');
				        $wdg_txt = get_sub_field('widget_text', false);
				        ?>
				        	<div class="widget <?php echo $wdg_css_class; ?>">
				        		<div class="widget-icon" style="background-image: url(<?php echo $wdg_icon['url']; ?>);">
				        		</div>
				        		<div class="widget-text">
				        			<h3 style="color: <?php echo $text_col; ?>"><?php echo $wdg_title; ?></h3>
				        			<p  style="color: <?php echo $text_col; ?>"><?php echo $wdg_txt; ?></p>
				        		</div>
				        	</div>
				        <?php
				    endwhile;
				    ?>
			    <?php
				else :

				endif;
			?>
				</div>
			</div>
			<div class="container-fluid" id="wdgt_block" style="background-image: url(<?php echo $bg_img['url']; ?>); background-repeat: no-repeat; background-position: center; background-size: cover; color: <?php echo $text_col; ?>;">
				
			</div>
		</div>
		<?php
	} else {

	}
	?>
<?php 
}