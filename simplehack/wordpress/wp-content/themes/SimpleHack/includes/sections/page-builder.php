<?php

if(have_rows('page_builder')) {

	while ( have_rows('page_builder')) { the_row();

		if(get_row_layout() == 'page_builder_box'){
			get_template_part('includes/sections/box');
		} 
		elseif(get_row_layout() == 'page_builder_artical'){
			get_template_part('includes/sections/artical');
		}
		elseif (get_row_layout() == 'page_builder_hero_simple') {
			get_template_part('includes/sections/simple-hero');
		} 
		elseif (get_row_layout() == 'page_builder_gallary') {
			get_template_part('includes/sections/images-text-gallary');
		}
		elseif(get_row_layout() == 'page_builder_standard'){
			get_template_part('includes/sections/standard');
		}
		elseif(get_row_layout() == 'page_builder_hero'){
			get_template_part('includes/sections/hero');
		}
		elseif(get_row_layout() == 'builder_small_product'){
			get_template_part('includes/sections/product');
		}
	}
}

?>
