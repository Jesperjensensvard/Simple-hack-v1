<?php 
if(have_rows('page_builder_repeater_articles')){

    while(have_rows('page_builder_repeater_articles')) { the_row();
        $artical_img = get_sub_field('page_builder_articles_img');
        $artical_alt = $artical_img ['alt'];
        $artical_image_id = $artical_img ['id'];
        $artical_image_size = 'custom-medium';
        $artical_max_width = '700px';
        $artical_focal_top = $artical_img ['focal_point']['top'];
        $artical_focal_bottom = $artical_img ['focal_point']['bottom'];
        $artical_focal_left = $artical_img ['focal_point']['left'];
        $artical_focal_right = $artical_img ['focal_point']['right'];
        $artical_calc_y_center = floatval(floatval($artical_focal_top) + floatval($artical_focal_bottom))/2;
        $artical_calc_x_center = floatval(floatval($artical_focal_left) + floatval($artical_focal_right))/2;
        $artical_text = get_sub_field('page_builder_articles_text');
        $artical_position = get_sub_field('page_builder_articles_left_right');
        $artical_space = get_sub_field('page_builder_articles_air');
        $artical_bg_type = get_sub_field('page_builder_articles_bg_type');
        $translated_artical_pos = esc_html__($artical_position, 'gt_template');
        ?>
            <section class="s-left-right <?php  if($artical_space == true) { echo ' spacer';} ?>" style="background-color: <?php if($artical_bg_type) { echo $artical_bg_type;} ?>;">
                <div class="g-container g-colx2">
                    <div class="g-100 has-match-height clearfix">
                        <div class="g-50 img-container <?php if($translated_artical_pos == esc_html__('left', 'gt_template')){ echo ' left';} else{ echo ' right';} ?>">
                            <div class="image-responsify">
                                <?php echo focalpoint_with_srcset($artical_image_id, $artical_image_size, $artical_max_width, $artical_alt, $artical_calc_x_center, $artical_calc_y_center);?> 
                            </div>
                        </div>
                        <div class="g-50 <?php if($translated_artical_pos == esc_html__('left', 'gt_template')){ echo ' right';} else{ echo ' left';} ?> ">
                            <div class="wysiwyg text-handler">
                                <?php echo $artical_text ?>
                            </div>
                        </div>
                    </div>
                </div>	
            </section>
        <?php 				
    }
}