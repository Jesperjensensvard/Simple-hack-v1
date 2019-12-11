<?php
$map = get_sub_field('field_page_builder_map_map');
$bg_color_map = get_sub_field('field_page_builder_map_map_trans_bg');
$width_full_map = get_sub_field('field_page_builder_map_map_full_width');
?>
    <section class="s-google-maps">
        <div class="g-container g-colx2 <?php  ?>">
            <div class="padding-around  <?php if($bg_color_map == true){echo 'bg_color_map';} if($width_full_map == true) {echo ' width_full_map';} ?>">
                <div class="google-map <?php if($bg_color_map == true){echo 'box-s';} ?>"  data-lat="<?php echo $map['lat']?>" data-lng="<?php echo $map['lng']?>"></div>
            </div>
        </div>
    </section>
		