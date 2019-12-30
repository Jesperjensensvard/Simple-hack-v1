<?php 
get_header();
?>
    <section class="s-product-product-hero">
        <div class="product-image-text-container clearfix">  
            <div class="product-image_relative-container">
                <div class="image-responsify product-image-wrapper" style="background-image: url(<?php the_post_thumbnail_url();?>);">
                   <div class="producct-text-wrapper-holder">
                       <h1> <?php the_title(); ?></h1>
                        <h4> <?php the_excerpt();?></h4>
                   </div>
                    </div>
                </div>
    </section> 

    <section class="s-product-images-and-text-wrapper">
        <div class="g-container g-colx2">
            <div class=" g-100 clearfix section-wrapper">
                <div class="image-holder-left g-50"> 
                    <div class="image-wrapepr-holder">
                        <div class="product-image-respinsive g-50"> 
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="checkout-and-text-holder-right g-50"> 
                    <h5><?php the_title(); ?></h5>
                    <p><?php the_content(); ?></p>
                </div>
            </div>
        </div>
    </section>
<?php 
get_footer();
?>