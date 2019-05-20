<?php
	function outputContentBlocks() {

		if( have_rows('page_content_blocks') ):

		    while ( have_rows('page_content_blocks') ) : the_row();

		        if( get_row_layout() == '2_columns' ):

		        	$image_location = get_sub_field('image_on_left_or_right');
			        $is_slider = get_sub_field('is_image_a_slider');
		        	$image = get_sub_field('image');
		        	$text = get_sub_field('text');
		        	$background_colour = get_sub_field('background_colour');
		        	$font_col = get_sub_field('text_colour');
		        	?>
			        	<div class="content-block" style="background-color:<?php echo $background_colour; ?>;" id="content-block-center">
				        	<div class="content-block-center">
					        	<div class="cb-cols-2">
					        		<?php if($image_location == "left") { ?>
						        		<div class="left-col img-col">
						        			<?php if ($is_slider == "yes") { ?>
						        				<?php 
						        					$slider_images = get_sub_field('col_2_slider_images');
						        					$count = 0;
						        					$dot_count = 0;
						        					$slider_id = rand(1,100000);
						        					if( $slider_images ): ?>
						        						<div id="content_block_slider_<?php echo $slider_id; ?>" class="carousel slide carousel-fade" data-ride="carousel">
						        							<ol class="carousel-indicators">
						        							<?php foreach ($slider_images as $slide) {
						        								if ($dot_count == 0) { ?>
						        									<li data-target="#content_block_slider_<?php echo $slider_id; ?>" data-slide-to="<?php echo $dot_count; ?>" class="active"></li>
						        								<?php } else { ?>
						        									<li data-target="#content_block_slider_<?php echo $slider_id; ?>" data-slide-to="<?php echo $dot_count; ?>"></li>
						        								<?php }
						        								$dot_count++;
						        							} ?>
						        							</ol>
						        							<div class="carousel-inner">
						        							
						        						    <?php foreach( $slider_images as $slide ): 
						        						    ?>
						        						    	<?php if ($count == 0) { ?>
						        						    		<div class="carousel-item slide active" style="background-image: url(<?php echo $slide['url']; ?>);">
						        						    		</div>
						        						    	<?php } else { ?>
						        						    		<div class="carousel-item slide" style="background-image: url(<?php echo $slide['url']; ?>);">
						        						    		</div>
						        						    	<?php } ?>
						        						    	<?php $count++; ?>
						        						    <?php endforeach; ?>
						        						    </div>
						        						    <a class="carousel-control-prev" href="#content_block_slider_<?php echo $slider_id; ?>" role="button" data-slide="prev">
						        						       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						        						       <span class="sr-only">Previous</span>
						        						     </a>
						        						     <a class="carousel-control-next" href="#content_block_slider_<?php echo $slider_id; ?>" role="button" data-slide="next">
						        						       <span class="carousel-control-next-icon" aria-hidden="true"></span>
						        						       <span class="sr-only">Next</span>
						        						     </a>
						        					    </div>
						        					<?php endif;

						        				?>

						        			<?php } else { ?>
							        			<a href="<?php echo $image['url']; ?>" data-lightbox="image-<?php echo rand(0,1000000); ?>">
								        			<div class="cb-cols-2-img" style="background-image: url(<?php echo $image['url']; ?>);"></div>
								        		</a>
							        		<?php } ?>
						        		</div>
						        		<div class="right-col text-col">
						        			<div class="cb-cols-2-txt" style="color: <?php echo $font_col; ?>">
						        				<?php echo $text; ?>
						        			</div>
						        		</div>
					        		<?php 
					        		} else { ?>
						        		<div class="left-col text-col">
						        			<div class="cb-cols-2-txt" style="color: <?php echo $font_col; ?>">
						        				<?php echo $text; ?>
						        			</div>
						        		</div>
						        		<div class="right-col img-col">
	        			        			<?php if ($is_slider == "yes") { ?>
	        			        				<?php 
	        			        					$slider_images = get_sub_field('col_2_slider_images');
	        			        					$count = 0;
	        			        					$dot_count = 0;
	        			        					$slider_id = rand(1,100000);
	        			        					if( $slider_images ): ?>
	        			        						<div id="content_block_slider_<?php echo $slider_id; ?>" class="carousel slide carousel-fade" data-ride="carousel">
	        			        							<ol class="carousel-indicators">
	        			        							<?php foreach ($slider_images as $slide) {
	        			        								if ($dot_count == 0) { ?>
	        			        									<li data-target="#content_block_slider_<?php echo $slider_id; ?>" data-slide-to="<?php echo $dot_count; ?>" class="active"></li>
	        			        								<?php } else { ?>
	        			        									<li data-target="#content_block_slider_<?php echo $slider_id; ?>" data-slide-to="<?php echo $dot_count; ?>"></li>
	        			        								<?php }
	        			        								$dot_count++;
	        			        							} ?>
	        			        							</ol>
	        			        							<div class="carousel-inner">
	        			        							
	        			        						    <?php foreach( $slider_images as $slide ): 
	        			        						    ?>
	        			        						    	<?php if ($count == 0) { ?>
	        			        						    		<div class="carousel-item slide active" style="background-image: url(<?php echo $slide['url']; ?>);">
	        			        						    		</div>
	        			        						    	<?php } else { ?>
	        			        						    		<div class="carousel-item slide" style="background-image: url(<?php echo $slide['url']; ?>);">
	        			        						    		</div>
	        			        						    	<?php } ?>
	        			        						    	<?php $count++; ?>
	        			        						    <?php endforeach; ?>
	        			        						    </div>
	        			        						    <a class="carousel-control-prev" href="#content_block_slider_<?php echo $slider_id; ?>" role="button" data-slide="prev">
	        			        						       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	        			        						       <span class="sr-only">Previous</span>
	        			        						     </a>
	        			        						     <a class="carousel-control-next" href="#content_block_slider_<?php echo $slider_id; ?>" role="button" data-slide="next">
	        			        						       <span class="carousel-control-next-icon" aria-hidden="true"></span>
	        			        						       <span class="sr-only">Next</span>
	        			        						     </a>
	        			        					    </div>
	        			        					<?php endif;

	        			        				?>

	        			        			<?php } else { ?>
	        				        			<a href="<?php echo $image['url']; ?>" data-lightbox="image-<?php echo rand(0,1000000); ?>">
	        					        			<div class="cb-cols-2-img" style="background-image: url(<?php echo $image['url']; ?>);"></div>
	        					        		</a>
	        				        		<?php } ?>
						        		</div>
					        		<?php 
					        		}
					        		?>
					        	</div>
				        	</div>
			        	</div>
		        	<?php

		        elseif( get_row_layout() == 'full_width_image' ): 

		        	$overlay_yn = get_sub_field('does_it_have_an_overlay');
		        	$fw_img = get_sub_field('fw_image');
		        	$overlay_col = get_sub_field('overlay_background_colour');
		        	$overlay_txt = get_sub_field('overlay_text');
		        	?>
		        	<div class="content-block" id="fw-img">
		        		<div class="content-block-fw-img" style="background-image: url(<?php echo $fw_img['url']; ?>);">
		        		<?php 
		        			if ($overlay_yn == "yes") {
		        		?>
		        			<div class="cb-fw-overlay">
		        				<div class="cb-fw-overlay-txt">
			        				<?php echo $overlay_txt; ?>
		        				</div>
		        			</div>
		        		<?php		
		        			} else {

		        			}
		        		?>
		        		</div>
		        		<?php 
		        			if ($overlay_yn == "yes") {
		        		?>
		        			<div class="cb-fw-overlay cb-fw-overlay-mb" style="background-color: <?php echo $overlay_col; ?>">
		        				<div class="cb-fw-overlay-txt">
			        				<?php echo $overlay_txt; ?>
		        				</div>
		        			</div>
		        		<?php		
		        			} else {

		        			}
		        		?>
		        	</div>
		        	<?php

		        elseif( get_row_layout() == "post_grid" ): 
		        		$background_colour = get_sub_field('pg_background_colour');
			        	$intro_text = get_sub_field('pg_introduction_text');
			        	$post_cat = get_sub_field('post_category');
		        	?>
		        	<div class="content-block" id="post_grid" style="background-color: <?php echo $background_colour; ?>">
		        		<div class="content-block-intro-text">
			        		<?php echo $intro_text; ?>
		        		</div>
		        		<div class="post-grid">
			        	<?php 
				        	$args = array(
				        		'posts_per_page' => 5,
				        		'cat' => $post_cat,
				        		);
			        		// the query
			        		$the_query = new WP_Query( $args ); 
			        		$count = 1;
			        		?>

			        		<?php if ( $the_query->have_posts() ) : ?>

			        			<!-- pagination here -->
			        			<div class="col-left">
			        			<!-- the loop -->
			        			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 

			        				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
			        				$the_content = get_the_content();
			        				$the_s_content = wp_trim_words($the_content, 12);
			        				$the_l_content = wp_trim_words($the_content, 40);

			        				if($count < 5) {
			        			?>
				        			
				        				<div class="post-widget" id="post_widget_<?php echo $count; ?>">
				        					<a href="<?php the_permalink(); ?>" class="hover_lnk">
						        				<div class="post-widget-img square" style="background-image: url(<?php echo $featured_img_url; ?>);">
							        				<div class="post-widget-overlay">
								        				<p><?php echo $the_s_content; ?></p>
							        				</div>
						        				</div>
						        			</a>
				        				</div>
				        		<?php } elseif($count == 5) { ?>
				        		</div>
				        			<div class="col-right">
				        				<div class="post-widget" id="post_widget_<?php echo $count; ?>">
				        					<a href="<?php the_permalink(); ?>" class="hover_lnk">
						        				<div class="post-widget-img square" style="background-image: url(<?php echo $featured_img_url; ?>);">
							        				<div class="post-widget-overlay">
								        				<p><?php echo $the_l_content; ?></p>
							        				</div>
						        				</div>
						        			</a>
				        				</div>
				        			</div>
			        				<?php 
				        			}
			        				$count++; ?>
			        			<?php endwhile; ?>
			        			<!-- end of the loop -->

			        			<!-- pagination here -->

			        			<?php wp_reset_postdata(); ?>

			        		<?php else : ?>
			        			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
			        		<?php endif; ?>
			        	</div>
		        	</div>
			        <?php

		        elseif( get_row_layout() == "testimonials"):
		        	$background_img = get_sub_field('test_background_image'); 
					$logo =  get_template_directory_uri() . "/assets/images/dwt-logo-new-md.png";
		        	?>
		        	<div class="content-block" id="testimonial-content-block" style="background-image: url(<?php echo $background_img['url']; ?>);">
		        		<div class="gradiant-overlay" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/bg-red-gradiant.png');"></div>
				        	<div class="testimonial-content-block">
				        		<div class="logo">
									<img src="<?php echo $logo; ?>" alt="Logo" class="logo-img">
				        		</div>
					        	<?php 
					        		$count = 0;
					        		$dot_count = 0;

				        			if( have_rows('testimonials', 'option') ): ?>
				        			<div id="testimonial_carousel" class="carousel slide carousel-fade" data-ride="carousel">
							        	<div class="horizontal-div"></div>
				        				<ol class="carousel-indicators">
				        				<?php
				        				    while ( have_rows('testimonials', 'option') ) : the_row(); ?>
			        				    <?php
			        				    		if ($dot_count == 0) { ?>
			        				    			<li data-target="#testimonial_carousel" data-slide-to="<?php echo $dot_count; ?>" class="active"></li>
			        				    <?php 
			        							} else { ?>
													<li data-target="#testimonial_carousel" data-slide-to="<?php echo $dot_count; ?>"></li>
			        					<?php	}
			        				    ?>
				        				<?php 
				        					$dot_count++;
				        					endwhile; ?>
				        				</ol>
				        				<div class="carousel-inner">
					        			<?php
					        			    while ( have_rows('testimonials', 'option') ) : the_row(); ?>
					        			    	
					        		    <?php
					        		    		$testimonial = get_sub_field('testimonial', 'option');
					        		    		$author = get_sub_field('author', 'option');

					        		    		if ($count == 0) { ?>
					        		    			<div class="carousel-item slide active">
					        		    				<?php echo $testimonial; ?>
					        		    				<p><?php echo $author; ?></p>
					        		    			</div>
										<?php 
					        		    		} else { ?>
					        		    			<div class="carousel-item slide">
					        		    				<?php echo $testimonial; ?>
					        		    				<p><?php echo $author; ?></p>
					        		    			</div>
										<?php					        		    			
					        		    		}
					        			?>					        						
					        			<?php
					        				$count++;
					        			    endwhile;
					        		    ?>
					        			    </div>
					        			    </div>
					        		    <?php
					        			else :

					        			    // no rows found

					        			endif;			
					        	?>
				        </div>
		        	</div>
		        <?php

		        elseif ( get_row_layout() == "social_feeds"): 
		        	$background_colour = get_sub_field('sf_background_colour');
		        	?>
		        	<div class="content-block" id="content-block-social-feeds" style="background-color: <?php echo $background_colour; ?>">
			        	<div class="content-block-social-feeds">
				        	<div class="social-feed-container">
					        	<h2>INSTAGRAM</h2>
					        	<div class="instagram-wdg">
					        		<?php echo do_shortcode('[instagram-feed]') ?>
					        	</div>
				        	</div>
				        	<div class="social-feed-container">
					        	<h2>FACEBOOK</h2>
					        	<div class="facebook-wdg-container">
					        		<div class="fb-page" data-href="https://www.facebook.com/DavidWatsonTransport/" data-width="500" data-height="500" data-tabs="timeline" data-small-header="true" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/DavidWatsonTransport/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/DavidWatsonTransport/">David Watson Transport Ltd</a></blockquote></div>
					        	</div>
				        	</div>
			        	</div>
		        	</div>
		        <?php 

	                elseif ( get_row_layout() == "1_column"):
	                	$background_colour = get_sub_field('col_1_background_colour');
	                	$content_type = get_sub_field('content_type');
	                	$font_col = get_sub_field('text_colour');
	                	?>
	                	<div class="content-block" id="content-block-col-1" style="background-color: <?php echo $background_colour; ?>">
	                		<div class="content-block-col-1" style="color: <?php echo $font_col; ?>">
	                	<?php
	                	if ($content_type == "text") { 
	                		$text = get_sub_field('col_1_text');
	                		echo $text;
	                		?>
    			        	</div>
    		        	</div>
	    		        <?php
	                	} else { 
	                		$image = get_sub_field('col_1_image');
	                		?>
        		        		<div class="content-block-col-1-img" style="background-image: url('<?php echo $image['url']; ?>');"></div>
    		        		</div>
    		        	</div>
    		        	<?php
	                	}
	            elseif ( get_row_layout() == "transport_grid" ):
	            		$background_colour = get_sub_field('tg_background_colour');
		            	$intro_text = get_sub_field('tg_intro_text');
	            		?>
	            		<div class="content-block" id="content-block-transport-grid" style="background-color: <?php echo $background_colour; ?>">
			        		<div class="content-block-intro-text">
				        		<?php echo $intro_text; ?>
			        		</div>
		            		<div class="content-block-transport-grid">
		            			<?php 
		            			$args= array(
		            						'post_type' => 'page',
		            						'post_parent' => 137,
		            						'posts_per_page' => -1,
		            						'order_by' => 'title',
		            						'order' => 'ASC'
				            				);
		            			// the query
		            			$the_query = new WP_Query( $args ); ?>

		            			<?php if ( $the_query->have_posts() ) : ?>

		            				<!-- pagination here -->

		            				<!-- the loop -->
		            				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		            				<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
		            				<a href="<?php echo the_permalink(); ?>" class="scale-transport">
		            					<div class="transport-grid-item" style="background-image: url(<?php echo $featured_img_url; ?>);">
			            					
			            				</div>
		            					<div class="transport-grid-item-overlay">
			            					<h3><?php the_title(); ?></h3>
			            					<div class="left-arrow">
			            						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/left-arrow.png">
			            					</div>
		            					</div>
			            			</a>
		            				<?php endwhile; ?>
		            				<!-- end of the loop -->

		            				<!-- pagination here -->

		            				<?php wp_reset_postdata(); ?>

		            			<?php else : ?>
		            				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		            			<?php endif; ?>
		            		</div>
	            		</div>
	            		<?php
	            elseif ( get_row_layout() == "transport_links" ):
	            		$background_colour = get_sub_field('tl_background_colour');
	            	?>
	            		<div class="content-block" id="content-block-transport-links" style="background-color: <?php echo $background_colour; ?>">
		            		<div class="content-block-transport-links">
		            			<?php 
		            			$args= array(
		            						'post_type' => 'page',
		            						'post_parent' => 137,
		            						'posts_per_page' => -1,
		            						'order_by' => 'title',
		            						'order' => 'ASC'
				            				);
		            			// the query
		            			$the_query = new WP_Query( $args ); ?>

		            			<?php if ( $the_query->have_posts() ) : ?>

		            				<!-- pagination here -->
		            				<ol>
		            				<!-- the loop -->
		            				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		            				<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
		            					<li>
		            						<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
		            					</li>
		            				<?php endwhile; ?>
		            				<!-- end of the loop -->
		            				</ol>
		            				<!-- pagination here -->

		            				<?php wp_reset_postdata(); ?>

		            			<?php else : ?>
		            				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		            			<?php endif; ?>
		            		</div>
	            		</div>
	            	<?php
	            elseif ( get_row_layout() == "latest_posts" ): ?>
	            	<div class="content-block" id="content-block-latest-post" style="background-color: ">
	            		<?php  
	            			$casestudy_cat = get_sub_field('post_category');
	            			$cat_link = get_category_link($casestudy_cat);
	            			$cat_name = get_cat_name($casestudy_cat);
	            		?>
    					<div class="content-block-title">
	    	        		<h3>Latest Case Studies</h3>
	    	        	</div>

	            		<div class="content-block-latest-post">
			            	
			            	<?php 
		        			$args= array(
		        						'posts_per_page' => 3,
		        						'order_by' => 'date',
		        						'order' => 'ASC',
		        						'cat' => $casestudy_cat,
			            				);
		        			// the query
		        			$the_query = new WP_Query( $args ); ?>

		        			<?php if ( $the_query->have_posts() ) : ?>

		        				<!-- pagination here -->
		        				
		        				<!-- the loop -->
		        				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		        				<?php 
		        					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
		        					$subcontent = wp_trim_words(get_the_content(), 20);
		        				?>
		        				<a href="<?php echo the_permalink(); ?>">
		        					<div class="wdg-post-container">
			        					<div class="wdg-post-img-container">
				        					<div class="wdg-post-container-img" style="background-image: url(<?php echo $featured_img_url; ?>);"></div>
				        				</div>
			        					<h4><?php the_title(); ?></h4>
			        					<p><?php echo $subcontent; ?></p>
			        					<br>
			        					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
		        					</div>
		        				</a>
		        				<?php endwhile; ?>
		        				<!-- end of the loop -->
		        				
		        				<!-- pagination here -->

		        				<?php wp_reset_postdata(); ?>

		        			<?php else : ?>
		        				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		        			<?php endif; ?>
		        		</div>
		            	<div class="latest-btn">
			            	<a href="<?php echo bloginfo['url']; ?>/case-studies">SEE ALL CASE STUDIES</a>
		            	</div>
		        	</div>
				<?php
	            elseif ( get_row_layout() == "post_archive_mg" ): ?>
	            	<script type="text/javascript">
	            	var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
	            	var page = 2;
	            	jQuery(function($) {
	            	    $('body').on('click', '.loadmore', function() {
	            	        var data = {
	            	            'action': 'load_posts_by_ajax',
	            	            'page': page,
	            	            'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
	            	        };
	            	 
	            	        $.post(ajaxurl, data, function(response) {
	            	            $('.other-posts').append(response);
	            	            page++;
	            	            $('.masonary_row_1').each(function() {
	            	            	console.log("tried to add to masonary")
	            	            	$grid.append( $(this) ).masonry( 'appended', $(this) );
	            	            	$(this).removeClass('masonary_row_1');
	            	            	last_grid_item = $(this).attr('id');
	            	            	last_grid_item = last_grid_item.split("_");
	            	            	// console.log(last_grid_item_id);
	            	            	last_grid_item_id = last_grid_item[2];
	            	            	last_grid_item_id++;
	            	            	console.log("current - " + last_grid_item_id);
	            	            });
	            	        });
	            	        
	            	    });
	            	});
	            	</script>
	            	<div class="content-block" id="content-block-post-archive">
		            	<div class="content-block-post-archive">
		            		<?php $intro_text = get_sub_field('pamg_introduction_text'); ?>
    		        		<div class="content-block-intro-text">
    			        		<?php echo $intro_text; ?>
    		        		</div>
    		        		<script type="text/javascript">
    		        			var playerInfos = [];
    		        		</script>
    		        		<?php $popups = get_sub_field('open_in_a_popup'); ?>

			            	<?php  
			            	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			            	$post_cat = get_sub_field('post_category');

		        			$args= array(
		        						'posts_per_page' => 10,
		        						'order_by' => 'date',
		        						'order' => 'ASC',
		        						'cat' => $post_cat,
		        						'paged' => $paged,
			            				);
		        			// the query
		        			$the_query = new WP_Query( $args ); ?>

		        			<?php if ( $the_query->have_posts() ) : ?>
		        				<?php $count = 1; ?>
		        				<?php $loop_count = 0; ?>
		        				<?php $grid_item_count = 1; ?>
		        				<!-- pagination here -->
		        				<div class="grid">
		        				<div class="grid-sizer"></div>
		        				<div class="gutter-sizer"></div>
		        				</div>
		        				<div class="other-posts">
		        				<!-- the loop -->
		        				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		        				<?php 
		        					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
		        					$subcontent = wp_trim_words(get_the_content(), 20);
		        					$subcontent_lg = wp_trim_words(get_the_content(), 40);
		        					// echo $grid_item_count; //output new value
		        				?>
	    		        		<?php if ($popups == "yes") { ?>
				        				<?php 
				        					if ($count == 1 || $count == 8) { ?>
				        						<div class="grid-item <?php if($loop_count == 0) { if($count == 8) { echo 'grid-item-inv'; } else {echo 'masonary_row_1'; } } else { echo 'grid-item-inv'; } ?>" id="grid_item_<?php echo $grid_item_count; ?>">
				        							<a href="#popup-<?php echo $grid_item_count; ?>" class="popup-link">
				        								<div class="post-image-wrapper">
						        							<div class="post-image portait" style="background-image: url(<?php echo $featured_img_url; ?>);">	
						        							</div>
						        						</div>
					        							<div class="post-item-content">
					        								<div class="post-item-content-container">
							        							<h5><?php the_title(); ?></h5>
							        							<p><?php echo $subcontent; ?></p>
							        							<br>
							        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
							        						</div>
					        							</div>
					        						</a>
				        						</div>
				        					<?php } elseif ($count == 2 || $count == 3 || $count == 5 || $count == 6 || $count == 7) { ?>
				        						<div class="grid-item <?php if($loop_count == 0) { if($count == 2 || $count == 3) { echo 'masonary_row_1'; } else { echo 'grid-item-inv'; } } else { echo 'grid-item-inv'; }?>" id="grid_item_<?php echo $grid_item_count; ?>">
					        						<a href="#popup-<?php echo $grid_item_count; ?>" class="popup-link">
						        						<div class="post-image-wrapper">
						        							<div class="post-image landscape" style="background-image: url(<?php echo $featured_img_url; ?>);">	
						        							</div>
						        						</div>
					        							<div class="post-item-content">
					        								<div class="post-item-content-container">
							        							<h5><?php the_title(); ?></h5>
							        							<p><?php echo $subcontent; ?></p>
							        							<br>
							        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
							        						</div>
					        							</div>
					        						</a>
				        						</div>
				        					<?php }  elseif ($count == 4 || $count == 9) { ?>
				        						<div class="grid-item grid-item-inv grid-item--width2" id="grid_item_<?php echo $grid_item_count; ?>">
				        							<a href="#popup-<?php echo $grid_item_count; ?>" class="popup-link">
					        							<div class="post-image-wrapper">
						        							<div class="post-image landscape-double" style="background-image: url(<?php echo $featured_img_url; ?>);">	
						        							</div>
						        						</div>
					        							<div class="post-item-content">
					        								<div class="post-item-content-container">
							        							<h5><?php the_title(); ?></h5>
							        							<p><?php echo $subcontent_lg; ?></p>
							        							<br>
							        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
							        						</div>
					        							</div>
					        						</a>
				        						</div>
				        					<?php } elseif ($count == 10) { ?>
					        						<div class="grid-item grid-item-inv" id="grid_item_<?php echo $grid_item_count; ?>">
						        						<a href="#popup-<?php echo $grid_item_count; ?>" class="popup-link">
							        						<div class="post-image-wrapper">
							        							<div class="post-image landscape" style="background-image: url(<?php echo $featured_img_url; ?>);">	
							        							</div>
							        						</div>
						        							<div class="post-item-content">
						        								<div class="post-item-content-container">
								        							<h5><?php the_title(); ?></h5>
								        							<p><?php echo $subcontent; ?></p>
								        							<br>
								        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
								        						</div>
						        							</div>
						        						</a>
					        						</div>
				       						
											<?php $count = 0; ?>
											<?php $loop_count++; ?>
				        					<?php 
				        				}
									?>
									<?php 

									?>
									<div class="popup-container" id="popup-<?php echo $grid_item_count; ?>">
										<div class="popup-bg"><h1>X</h1></div>
										<div class="popup-content">
											<div class="popup-header">
												<?php if( have_rows('popup_header') ): 

													while( have_rows('popup_header') ): the_row(); 
											
														$content_type = get_sub_field('do_you_want_image_or_video');
														if ($content_type == "video") { ?>
															<div class="content-block-video">
																<?php $random_num = rand(1,10000000); ?>
																<div id="player_<?php echo $random_num; ?>"></div>
																<?php $embed_id = get_sub_field('youtube_embed_code');?>
																<script>
															      var random_num = '<?php echo $random_num; ?>';
															      var player_id = 'player_' + random_num;
															      var embed_id = '<?php echo $embed_id; ?>';
															      var playerInfo = {};
															      // console.log(random_num);
															      // console.log(player_id);
															      // console.log(embed_id);
															      playerInfo['playerID'] = player_id;
															      playerInfo['videoID'] = embed_id;
															      // console.log(playerInfo)
															      playerInfos.push(playerInfo);
															      // console.log(playerInfos);

															    </script>
															</div>
														<?php 
														} elseif ($content_type == "image") { ?>
															<?php $image = get_sub_field('popup_image'); ?>
															<div class="popup-header-img" style="background-image: url('<?php echo $image['url']; ?>')">
															</div>
													<?php }
													endwhile; ?>
													
												<?php endif; ?>
											</div>
											<div class="popup-sub-content">
												<div class="popup-sidebar">
													<hr>
													<?php the_date('F, j, Y'); ?>
													<hr class="thin">
												</div>
												<div class="popup-main-content">
													<hr>
												 	<?php outputContentBlocks(); ?>
												</div>
											</div>
										</div>
									</div>
	    		        		<?php } else { ?>
				        				<?php 
				        					if ($count == 1 || $count == 8) { ?>
				        						<div class="grid-item <?php if($loop_count == 0) { if($count == 8) { echo 'grid-item-inv'; } else {echo 'masonary_row_1'; } } else { echo 'grid-item-inv'; } ?>" id="grid_item_<?php echo $grid_item_count; ?>">
				        							<a href="<?php the_permalink(); ?>">
				        								<div class="post-image-wrapper">
						        							<div class="post-image portait" style="background-image: url(<?php echo $featured_img_url; ?>);">	
						        							</div>
						        						</div>
					        							<div class="post-item-content">
					        								<div class="post-item-content-container">
							        							<h5><?php the_title(); ?></h5>
							        							<p><?php echo $subcontent; ?></p>
							        							<br>
							        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
							        						</div>
					        							</div>
					        						</a>
				        						</div>
				        					<?php } elseif ($count == 2 || $count == 3 || $count == 5 || $count == 6 || $count == 7) { ?>
				        						<div class="grid-item <?php if($loop_count == 0) { if($count == 2 || $count == 3) { echo 'masonary_row_1'; } else { echo 'grid-item-inv'; } } else { echo 'grid-item-inv'; }?>" id="grid_item_<?php echo $grid_item_count; ?>">
					        						<a href="<?php the_permalink(); ?>">
						        						<div class="post-image-wrapper">
						        							<div class="post-image landscape" style="background-image: url(<?php echo $featured_img_url; ?>);">	
						        							</div>
						        						</div>
					        							<div class="post-item-content">
					        								<div class="post-item-content-container">
							        							<h5><?php the_title(); ?></h5>
							        							<p><?php echo $subcontent; ?></p>
							        							<br>
							        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
							        						</div>
					        							</div>
					        						</a>
				        						</div>
				        					<?php }  elseif ($count == 4 || $count == 9) { ?>
				        						<div class="grid-item grid-item-inv grid-item--width2" id="grid_item_<?php echo $grid_item_count; ?>">
				        							<a href="<?php the_permalink(); ?>">
					        							<div class="post-image-wrapper">
						        							<div class="post-image landscape-double" style="background-image: url(<?php echo $featured_img_url; ?>);">	
						        							</div>
						        						</div>
					        							<div class="post-item-content">
					        								<div class="post-item-content-container">
							        							<h5><?php the_title(); ?></h5>
							        							<p><?php echo $subcontent_lg; ?></p>
							        							<br>
							        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
							        						</div>
					        							</div>
					        						</a>
				        						</div>
				        					<?php } elseif ($count == 10) { ?>
					        						<div class="grid-item grid-item-inv" id="grid_item_<?php echo $grid_item_count; ?>">
						        						<a href="<?php the_permalink(); ?>">
							        						<div class="post-image-wrapper">
							        							<div class="post-image landscape" style="background-image: url(<?php echo $featured_img_url; ?>);">	
							        							</div>
							        						</div>
						        							<div class="post-item-content">
						        								<div class="post-item-content-container">
								        							<h5><?php the_title(); ?></h5>
								        							<p><?php echo $subcontent; ?></p>
								        							<br>
								        							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png">
								        						</div>
						        							</div>
						        						</a>
					        						</div>
				       						
											<?php $count = 0; ?>
											<?php $loop_count++; ?>
				        					<?php 
				        				} ?>
			        			<?php } ?>
		        				<?php 
		        					$grid_item_count++;
		        					// echo $grid_item_count;
		        					$count++;
		        				?>

		        				<?php endwhile; ?>

		        				<?php 
		        				if(!session_id()) session_start();
		        				$_SESSION['grid_item_count'] = $grid_item_count;
		        				$_SESSION['post_cat'] = $post_cat;
		        				$_SESSION['popups'] = $popups;
		        				?>
		        				
		        				</div>
		        				</div>
		        				<!-- pagination here -->
		        				

		        				<?php wp_reset_postdata(); ?>

		        			<?php else : ?>
		        				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		        			<?php endif; ?>
		        			<script type="text/javascript">

			        			var tag = document.createElement('script');
		        				tag.src = "http://www.youtube.com/iframe_api";
		        				var firstScriptTag = document.getElementsByTagName('script')[0];
		        				firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		        				var player;
		        				var players = new Array();

		        				function onYouTubeIframeAPIReady() {
		        				  if (typeof playerInfos === 'undefined') return;
		        				      // console.log(playerInfos);
		        				      for (var i = 0; i < playerInfos.length; i++) {
		        				          var curplayer = createPlayer(playerInfos[i]);
		        				          players[i] = curplayer;
		        				      }

		        				      jQuery('.popup-bg').click(function() {
		        				      	for (var i = 0; i < players.length; i++) {
		        				      		players[i].pauseVideo();
		        				      	}
		        				      })
		        				}

		        				function createPlayer(playerInfo) {
		        					// console.log(playerInfo.playerID);
		        					// console.log(playerInfo.videoID);
		        				    return new YT.Player(playerInfo.playerID, {
		        				        height: '100%',
		        				        width: '100%',
		        				        videoId: playerInfo.videoID,
		        				    });
		        				}


		        				function onPlayerReady(event) {
		        				  console.log("player ready");
		        				}
		        				function onPlayerStateChange(event) {
		        				  
		        				}
		        				function pauseVideo(event) {
		        					player.pauseVideo();
		        				}

		        				function stopVideo() {
		        				  player.stopVideo();
		        				}

		        			</script>
		        			<div class="loadmore">LOAD MORE</div>
		            	</div>
	            	</div>
				<?php
				elseif ( get_row_layout() == "left_aligned_text_block" ): ?>
		            	<?php $text_content = get_sub_field('text_content'); ?>
		            	<div class="content-block" id="content-left-aligned-text-block">
			            	<div class="content-left-aligned-text-block">
				            	<div class="left-align-text">
					            	<?php echo $text_content; ?>
					            </div>
			            	</div>
			            </div>
		        <?php 
		        elseif ( get_row_layout() == "full_width_image_slider" ): 
		        		$slider = get_sub_field('full_width_slider_images');
		        		$count = 0;
		        		$dot_count = 0;

		        		if( $slider ): ?>
		            	<div class="content-block" id="content-block-fw-slider">
			            	<div class="content-block-fw-slider">
			        			<div id="inpage-silder_carousel" class="carousel slide carousel-fade" data-ride="carousel">
			        				
			        				<ol class="carousel-indicators">
			        				<?php foreach ($slider as $slide) {
			        					if ($dot_count == 0) { ?>
			        						<li data-target="#inpage-silder_carousel" data-slide-to="<?php echo $dot_count; ?>" class="active"></li>
			        					<?php } else { ?>
			        						<li data-target="#inpage-silder_carousel" data-slide-to="<?php echo $dot_count; ?>"></li>
			        					<?php }
			        					$dot_count++;
			        				} ?>
			        				</ol>
			        				<div class="carousel-inner">
			        				
			        			    <?php foreach( $slider as $slide ): 
			        					    $slide_img = $slide["url"];
			        					   
			        			    ?>
			        			    	<?php if ($count == 0) { ?>
			        			    		<div class="carousel-item slide active" style="background-image: url(<?php echo $slide_img; ?>);">
			        			    			
			        			    		</div>
			        			    	<?php } else { ?>
			        			    		<div class="carousel-item slide" style="background-image: url(<?php echo $slide_img; ?>);">
			        			    			
			        			    		</div>
			        			    	<?php } ?>
			        			    	<?php $count++; ?>
			        			    <?php endforeach; ?>
			        			    </div>
			        			    <a class="carousel-control-prev" href="#inpage-silder_carousel" role="button" data-slide="prev">
			        			       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			        			       <span class="sr-only">Previous</span>
			        			     </a>
			        			     <a class="carousel-control-next" href="#inpage-silder_carousel" role="button" data-slide="next">
			        			       <span class="carousel-control-next-icon" aria-hidden="true"></span>
			        			       <span class="sr-only">Next</span>
			        			     </a>
			        		    </div>
			        		</div>
			        	</div>
	        		<?php endif;
	        		elseif ( get_row_layout() == "1_column_narrow" ): ?>
	        			<?php $background_colour = get_sub_field('1cn_background_colour'); ?>
	                	<div class="content-block" id="content-block-col-1-narrow" style="background-color: <?php echo $background_colour; ?>">
	                		<div class="content-block-col-1-narrow" >
	                	<?php
	                		$text = get_sub_field('text_content');
	                		echo $text;
	                	?>
    			        	</div>
    		        	</div>
    		        <?php 
	        		elseif ( get_row_layout() == "youtube_video" ): ?>
	                	<div class="content-block" id="content-block-video" style="background-color: <?php echo $background_colour; ?>">
	                		<div class="content-block-video" >
	                	<?php
	                		$text = get_sub_field('youtube_embed_link');
	                		echo $text;
	                	?>
    			        	</div>
    		        	</div>
		    <?php   endif;

		    endwhile;

		else :

		    // no layouts found

		endif;
	}