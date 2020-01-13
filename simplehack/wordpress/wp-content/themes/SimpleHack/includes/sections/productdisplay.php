<?php 
$recent = get_sub_field('page_builder_layout_fetured_product');
$sale = get_sub_field('page_builder_layout_sale_product');
$best_selling = get_sub_field('page_builder_layout_best_selling_product');
$title = get_sub_field('page_builder_layout_text_product');

?>
<section class="s-product">
    <div class="g-container">
        <div class="clearfix g-100">
            <?php 
            if($title) {
                echo '<div class="title-of-simple-product">';
                echo '<h3 class>';
                    echo $title;
                echo '</h3>';
                echo '</div>';
            }        
            if($recent){
                echo do_shortcode('[products limit="3" recent_products orderby="popularity" class="recent-sale" columns="3"]');
            } elseif($sale){  
                echo do_shortcode('[products limit="3" columns="3" orderby="popularity" class="recent-sale" on_sale="true" ]');
            }elseif($best_selling){
                echo do_shortcode('[products limit="3" columns="3"  class="recent-sale" best_selling="true" ]');
            }
        ?>
        </div>
    </div>
</section>
