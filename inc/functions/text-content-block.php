<?php
	function outputTextContentBlock($block_name) {
			$text_content_block = get_field($block_name);
			// var_dump($text_content_block);
			if( $text_content_block ): ?>
				<div class="container-fluid text-content-block" id="update-content">
					<div class="title">
						<div class="text-content-title-icon" style="background-image: url(<?php echo $text_content_block['title_icon']['url']; ?>);"></div>
						<h2><?php echo $text_content_block['title']; ?></h2>
					</div>
					<div class="text-content">
						<?php echo $text_content_block['text_content']; ?>
					</div>
				</div>
		<?php endif;
	}
?>