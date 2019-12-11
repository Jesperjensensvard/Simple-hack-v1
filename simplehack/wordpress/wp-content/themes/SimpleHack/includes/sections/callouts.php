<?php
$ids_page_builder = get_sub_field('page_builder_callout_relationship');
$loop = new WP_Query(array(
	'post_type'            	=> 'callouts',
	'posts_per_page'     	=> -1,
	'post__in'				=> $ids_page_builder,
	'post_status'			=> 'any',
	'orderby'        		=> 'post__in',
));

echo '<section class="box">';
echo '<div class="g-container clearfix g-col">';
if($loop->have_posts()) {
	while($loop->have_posts()) {
		$loop->the_post();

		$link = get_field('callouts_box_link');
		$color_theme = get_field('callouts_color_picker');
		$pos = get_field('callouts_title_pos');
		$title = get_the_title();
		$title_tag = get_field('callouts_title_tag');
		$width = get_field('callouts_box_size');
		$image = get_field('callouts_box_image');
		$images = get_field('callouts_box_multiple_images');
		$image_id = $image['id'];
		$image_size = 'medium-large';
		$max_width = '600px';
		$image_id = $image['id'];
		$additional_classes = '';
		$alt = $image['alt'];

		if(empty($image['alt'])) {
			$alt = 'Callout image';
		}
		if(!empty($link)) {
			echo '<a href="'.$link['url'].'" class="box__item g-col clearfix" data-aos="fade-up">';
		} else {
			echo '<div class="box__item g-col clearfix" data-aos="fade-up">';
		}

		echo '<div class="box__inner" style="background-color:'.$color_theme.'">';
		echo '<div class="box--pos-'.$pos.'">';

		// Om title är vald till topp
		if(($pos == 'top') && (!empty($image))) {
			echo img_with_srcset($image_id, $image_size, $max_width, $alt);
		}

		if(!empty($title)) {
			if($pos != 'center') {
				if($pos == 'top') {
					$title_pos_class = ' g-title-light--bottom';
				} else {
					$title_pos_class = ' g-title-light--top';
				}
				echo '<'.$title_tag.' class="g-title-light'.$title_pos_class.'">'.$title.'</'.$title_tag.'>';
			} else {
				echo '<'.$title_tag.' class="g-title-light">'.$title.'</'.$title_tag.'>';
			}
		}

		// Om title är vald till botten
		if(($pos == 'bottom') && (!empty($image))) {
			echo img_with_srcset($image_id, $image_size, $max_width, $alt);
		}

		if(!empty($images) && ($pos == 'center')) {
			if(have_rows('callouts_box_multiple_images')){
				echo '<div class="box--small-img clearfix">';
				while(have_rows('callouts_box_multiple_images')){ the_row();
					$img = get_sub_field('callouts_box_image_image');
					echo '<img src="'.$img['url'].'" alt="'.$img['alt'].'" />';
				}
				echo '</div>';
			}
		}

		echo '</div>';
		echo '</div>';

		if(!empty($link)) {
			echo '</a>';
		} else {
			echo '</div>';
		}

	}

	wp_reset_postdata();
}

echo '</div>';
echo '</section>';
