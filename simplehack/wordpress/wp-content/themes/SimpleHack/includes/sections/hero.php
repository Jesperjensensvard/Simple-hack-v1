<?php
/* if image */
$is_image = get_sub_field('page_builder_big_hero_image');
$image = get_sub_field('page_builder_big_hero_image_image');
$image_title = get_sub_field('page_builder_big_hero_image_title');
$image_text = get_sub_field('page_builder_big_hero_image_text');
$image_link = get_sub_field('page_builder_big_hero_image_link');


/* if video */
$is_video = get_sub_field('page_builder_big_hero_video');
$video = get_sub_field('page_builder_big_hero_video_video');
$video_title = get_sub_field('page_builder_big_hero_video_title');
$video_text = get_sub_field('page_builder_big_hero_video_text');
$video_link = get_sub_field('page_builder_big_hero_video_link');

if($is_video){
    ?>
    <section class="s-vide-conatiner ">
        <div class="g-100">
            <div class="m-video-bg">
                <div class="video-make-relative">
                    <video autoplay loop muted id="m-video-bg">
                        <source src='<?php echo $video['url'] ?>' type="video/mp4">
                    </video>
                    <div class="center-text-and-button">
                        <div class="wisivyg">
                      
                            <?php 
                                if(!empty($video_title)){
                                    echo '<h2>'. $video_title .'</h2>';
                                }
                                if(!empty($video_text)){
                                    
                                    echo '<p>'.$video_text.'</p>';
                                }
                            ?>
                        </div>
                        <div class="this-btn">
                    <?php
                    if(!empty($video_link)){
                        echo '  <a href="'.$video_link['url'].'">'.$video_link['title'].'</a>';
                    }
                    ?>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <?php  
}
elseif($is_image){
    ?>
    <section class="s-simple-hero">
            <div class="g-100">
                <div class="simple-hero-width-container g-100">
                    <div class="relative-container">
                        <div class="img-holder" style="background-image: url('<?php echo $image['url'];  ?>'); background-size: cover; background-position: center center; "> 
                          
                        </div>
                        <div class="text-button-holder"> 
                            <div class="wisivyg">
                                <?php if(!empty($image_title)) { ?>
                                    <h2> <?php echo $image_title; ?></h2>
                                <?php } ?>
                                <?php if(!empty($image_text)) { ?>
                                    <p> <?php echo $image_text; ?></p>
                                <?php } ?>
                                </div>
                                <?php if(!empty($image_link)) { ?>
                                    <div class="has-btn">
                                    <?php 
                                    echo '<a href="'.$link['url'].'">'.$image_link['title'].'</a>';
                                    ?>
                                    </div>
                                    <?php } ?>
                            </div>
                    </div>
                </div>
            
        </div>
    </section>   
    <?php
}
?>





