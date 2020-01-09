<?php
if(have_rows('page_builder_repeater_box')){

echo '<section class="s-box">';
echo '<div class="g-container g-col">';
echo '<div class="list clearfix">';

while(have_rows('page_builder_repeater_box')) { the_row();
    $use_square = get_sub_field('page_builder_box_img_square');
    $text = get_sub_field('page_builder_box_text');
    $button = get_sub_field('page_builder_box_link');
    $text_align_left = get_sub_field('page_builder_box_align_left');
    $img_square = get_sub_field('page_builder_box_img_square_img');
    $thicker_font_for_p = get_sub_field('page_builder_box_text_bolder');
    $width = get_sub_field('page_builder_box_width');
    if(empty($width)) {
        $width = 33;
    }

   
        
    if(!$use_square){
        $img_with_focal_point = get_sub_field('page_builder_box_img');
        $alt = $img_with_focal_point['alt'];
        $image_id = $img_with_focal_point['id'];
        $image_size = 'custom-medium';
        $max_width = '700px';
        $focal_top = $img_with_focal_point['focal_point']['top'];
        $focal_bottom = $img_with_focal_point['focal_point']['bottom'];
        $focal_left = $img_with_focal_point['focal_point']['left'];
        $focal_right = $img_with_focal_point['focal_point']['right'];
        $calc_y_center = floatval(floatval($focal_top) + floatval($focal_bottom))/2;
        $calc_x_center = floatval(floatval($focal_left) + floatval($focal_right))/2;
    }
    
    ?>

    <div class="item g-col g-<?php echo $width;?> <?php if(!empty($button)){echo 'has-btn';} ?> ">
    <div class="inner">
   
    <?php
    
    if($use_square && !empty($img_square)){
        $img_square_src = wp_get_attachment_image_url($img_square['id'], 'square-box');
        echo '<div>';
        echo '<img src="'.$img_square_src.'" alt="" class="image-square">';
        echo '</div>'; 
    } 
    elseif(!$use_square && !empty($img_with_focal_point)) {

        // may need to add image-responsify back to image box
        ?>
        <div class="image ">
        <?php 
        echo focalpoint_with_srcset($image_id, $image_size, $max_width, $alt, $calc_x_center, $calc_y_center);
        echo '</div>'; 
    } 

    if(!empty(get_sub_field('page_builder_box_text'))) {
        ?>
        <div class="wysiwyg <?php if($text_align_left == true) {echo 'left-align';} ?>">
        <?php	
        echo get_sub_field('page_builder_box_text');
        echo '</div>';
    } 

    if(!empty(get_sub_field('page_builder_box_link'))) {
        echo '<div class="btn">';
        echo '<a href="'.$button['url'].'">'.$button['title'].'</a>';
        echo '</div>';
    } 
 
 echo '</div>';    
 echo '</div>';     

}
echo '</div>';
echo '</div>';
echo '</section>';
}