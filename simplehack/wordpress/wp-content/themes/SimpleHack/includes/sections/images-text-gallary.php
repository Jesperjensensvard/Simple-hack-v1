<?php            
$gallary_text = get_sub_field('page_builder_gallary_wysiwyg');
$big_img_image = get_sub_field('page_builder_gallary_big_img');
$gallary_small_img_one = get_sub_field('page_builder_gallary_small_img_one');
$gallary_small_img_two = get_sub_field('page_builder_gallary_small_img_two');
?> 
<section class="s-text-and-gallary clearfix">
    <div class="g-container g-col gallary-height clearfix">
        <div class="container clearfix">
            <div class="inner clearfix">
                <div class="image1">
                        <div class="img-wrapper">
                            <div class="img g-col">
                                <?php
                                    $big_img_image_src = wp_get_attachment_image_url($big_img_image['id'], 'gallery-wide');
                                    echo '<img src="'.$big_img_image_src.'" alt="">';
                                ?>
                        </div>
                    </div>
                </div>      
                <div class="text">
                    <div class="g-col">
                        <div class="bg-wrapper">
                            <div class="bg">	
                                <div class="center-gallary-text wysiwyg ">
                                    <?php echo $gallary_text ?>
                                </div>								
                            </div>
                        </div>
                    </div>
                </div>	
                <div class="image2">
                    <div class="img-wrapper">	
                        <div class="img g-col">
                            <?php
                                $gallary_small_img_one_src = wp_get_attachment_image_url($gallary_small_img_one['id'], 'square-box');
                                echo '<img src="'.$gallary_small_img_one_src.'" alt="">';
                            ?>
                        </div>
                    </div>
                </div>    
                <div class="image3">
                    <div class="img-wrapper">
                        <div class="img g-col">
                            <?php
                                $gallary_small_img_two_src = wp_get_attachment_image_url($gallary_small_img_two['id'], 'square-box');
                                echo '<img src="'.$gallary_small_img_two_src.'" alt="">';
                            ?>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>
</section>	