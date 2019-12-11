<?php    
$simple_hero_text  = get_sub_field('page_builder_simple_text');
$simple_hero_link  = get_sub_field('page_builder_simple_link');
$simple_hero_left  = get_sub_field('page_hero_simple_left');
$simple_hero_img   = get_sub_field('page_builder_simple_img');
$simple_hero_alt   = $simple_hero_img ['alt'];
$simple_hero_image_id 	= $simple_hero_img ['id'];
$simple_hero_image_size = 'custom-medium';
$simple_hero_max_width 	= '700px';
$simple_hero_focal_top 	= $simple_hero_img ['focal_point']['top'];
$simple_hero_focal_bottom = $simple_hero_img ['focal_point']['bottom'];
$simple_hero_focal_left = $simple_hero_img ['focal_point']['left'];
$simple_hero_focal_right = $simple_hero_img ['focal_point']['right'];
$simple_hero_calc_y_center = floatval(floatval($simple_hero_focal_top) + floatval($simple_hero_focal_bottom))/2;
$simple_hero_calc_x_center = floatval(floatval($simple_hero_focal_left) + floatval($simple_hero_focal_right))/2;
$hero_background_image_opacity = get_sub_field('page_builder_simple_opacity');
$hero_background_image_color = get_sub_field('page_builder_simple_color');


if(!empty($hero_background_image_opacity)) {
    $hero_background_image_opacity = floatval($hero_background_image_opacity/100);
}

if(!empty($hero_background_image_color) && !empty($hero_background_image_opacity)) {
    list($r, $g, $b) = sscanf($hero_background_image_color, "#%02x%02x%02x");
}

?>
    <section class="simple-hero">
        <div class="g-colx2 g-container image-parent has-btn" >  
            <div class="simple-hero-inner">
                <div class="image-responsify">
                    <?php echo focalpoint_with_srcset($simple_hero_image_id, $simple_hero_image_size, $simple_hero_max_width, $simple_hero_alt, $simple_hero_calc_x_center, $simple_hero_calc_y_center); ?>
                </div>
                <div class="g-colx2 text-buttunon-handler <?php if($simple_hero_left == true) { echo ' left';} ?> ">
                    <div class="wysiwyg">
                        <?php echo $simple_hero_text ?>
                    </div>
                    <?php 
                        if(!empty(	$simple_hero_link )) {
                            echo '<div class="btn">';
                            echo '<a href="'.$simple_hero_link['url'].'">'.$simple_hero_link['title'].'</a>';
                            echo '</div>';
                        }
                    ?>
                </div>
                <?php 
                    if(!empty($hero_background_image_opacity)) {
                        echo '<div class="g-opacity" style="background-color: rgba('.$r.', '.$g.', '.$b.', '.$hero_background_image_opacity.');"></div>';
                    }
                ?> 
                </div>
            </div>
    </section> 
        