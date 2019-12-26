<?php
$count_hero = count(get_sub_field('hero_repeater_module'));

if($count_hero == 1) {
	$hero_class = 'hero--few-items';
} else {
	$hero_class = 'hero--has-items';
}

echo '<section class="hero rsDefault '.$hero_class.' ">';


if(have_rows('hero_repeater_module')){

	$counter = 0;
	while ( have_rows('hero_repeater_module') ) { the_row();

		$img_with_focal_point = get_sub_field('hero_image');
		$image_id = $img_with_focal_point['id'];
		$image_size = 'custom-large';
		$max_width = '1280px';
		$white_text = get_sub_field('hero_white_text');
		$hide_text = get_sub_field('hero_hide_text');
		$hero_video = get_sub_field('hero_video');
		$float_text_left = get_sub_field('page_hero_left');
		$hero_background_image_opacity = get_sub_field('hero_opacity');
		$hero_background_image_color = get_sub_field('hero_color');

		$white_text_class = '';

		if(!empty($hero_background_image_opacity)) {
			$hero_background_image_opacity = floatval($hero_background_image_opacity/100);
		}
		
		if(!empty($hero_background_image_color) && !empty($hero_background_image_opacity)) {
			list($r, $g, $b) = sscanf($hero_background_image_color, "#%02x%02x%02x");
		}

		if($white_text)
			$white_text_class = ' hero__item--is-negative';

		if(!empty($img_with_focal_point['alt']))
			$alt = $img_with_focal_point['alt'];
		else
			$alt = 'slider image';

		$focal_top = $img_with_focal_point['focal_point']['top'];
		$focal_bottom = $img_with_focal_point['focal_point']['bottom'];
		$focal_left = $img_with_focal_point['focal_point']['left'];
		$focal_right = $img_with_focal_point['focal_point']['right'];
		$calc_y_center = floatval(floatval($focal_top) + floatval($focal_bottom))/2;
		$calc_x_center = floatval(floatval($focal_left) + floatval($focal_right))/2;
		$headline = get_sub_field('hero_headline');
		$headline_tag = get_sub_field('hero_headline_tag');
		$text = get_sub_field('hero_text_item');
		$link = get_sub_field('hero_link');
		$stripped_headline = preg_replace('/<p\b[^>]*>(.*?)<\/p>/i', '', $headline );
		$hero_title_converted = str_split_unicode($stripped_headline);
		//$max_count = count($stripped_headline);

		if(!empty($link)) {
			echo '<a href="'.$link['url'].'" class="hero__item'.$white_text_class.'" >';
		} else {
			echo '<div class="hero__item'.$white_text_class.'" >';
		}

		?>
		<div class="hero__text__wrapper <?php if($float_text_left == true) { echo' left';} ?> ">
		<div class="g-container <?php if($float_text_left == true) { echo' left';} ?>  g-colx2">
		<?php
		
		echo '<div class="hero__row g-colx2">';
		echo '<'.$headline_tag.' class="hero__title">';
		echo $headline;
		echo '</'.$headline_tag.'>';
		if(!empty($text)) {
			echo '<p class="hero__text">' .$text. '</p>';
		}
		
		if(!empty($link) && !empty($link['title'])) {
			echo '<div class="g-cta-white">'.$link['title'].'</div>';	
		}
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
		
		if(!empty($hero_video)) {
		 	echo '<div class="hero__video">';
			echo '<video autoplay loop muted  style="width:100%;" playsinline>';
			echo '<source type="video/mp4" src="'.$hero_video['url'].'" />';
			echo '</video>';
			echo '</div>'; 
		} else {
			if(!empty($img_with_focal_point)) {
				echo '<div class="hero__img">';
				echo focalpoint_with_srcset($image_id, $image_size, $max_width, $alt, $calc_x_center, $calc_y_center);
				echo '</div>';
			}
		}
		if(!empty($hero_background_image_opacity)) {
			echo '<div class="g-opacity" style="background-color: rgba('.$r.', '.$g.', '.$b.', '.$hero_background_image_opacity.');"></div>';
		}
		if(!empty($link)) {
			echo '</a>';
		} else {
			echo '</div>';
			
		}

	}
	
}
echo '</section>';
