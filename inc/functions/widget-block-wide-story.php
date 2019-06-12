<?php
    function outputNewsWdgWide() {
        
        if( have_rows('home_story_wide') ):
        ?>
        <div class="container-fluid" id="story_wdg_wide">
        <?php
            while ( have_rows('home_story_wide') ) : the_row();
            $wdg_content = get_sub_field('wide_text_content');
            $feat_img = get_sub_field('wide_background_image');
            $link = get_sub_field('wide_link');
            $title = get_sub_field('wide_title');
            ?>
        <a href="<?php echo $link['url']; ?>">
            <div class="wdg-container dimmed" style="background-image: url(<?php echo $feat_img['url']; ?>);">
                <div class="white-curve"></div>
                <div class="color-overlay"></div>
                <div class="wdg-overlay">
                    <h2><?php echo $title; ?></h2>
                    <?php echo $wdg_content; ?>
                    <div class="read-more">
                        <div class="blue-arrow" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/blue-arrow.png);"></div>
                        <span><strong>Read More</strong></span>
                    </div>
                </div>
            </div>
        </a>
        <?php
            endwhile;
            ?>
        </div>
<?php
    else :
    
    endif;
    }

        
        
