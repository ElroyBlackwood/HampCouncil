<?php
    function outputNewsWdgSldr() {
        
        if( have_rows('home_story_wide', 'option') ):
        ?>
        <div class="container-fluid" id="story_wdg_wide">
        <?php
            while ( have_rows('home_story_wide', 'option') ) : the_row();
            $wdg_content = get_sub_field('wide_text_content');
            $feat_img = get_sub_field('wide_background_image');
            $link = get_sub_field('wide_link');
            $title = get_sub_field('wide_title');
            ?>
        <a href="<?php echo $link['url']; ?>">
            <div class="wdg-container dimmedcurve curveshadow" style="background-image: url(<?php echo $feat_img['url']; ?>);border-top-left-radius: 50% 15px;border-top-right-radius: 50% 15px;">
                <div class="color-overlay addcurve"></div>
                <div class="wdg-overlay">
                    <h2><?php echo $title; ?></h2>
                    <?php echo $wdg_content; ?>
                    <div class="read-more">
                        <div class="blue-arrow"></div>
                    <span>Read More</span>
                    </div>
                </div>
            <div class="curve_btm hmp_orange_bg" style=""></div>
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

        
        
