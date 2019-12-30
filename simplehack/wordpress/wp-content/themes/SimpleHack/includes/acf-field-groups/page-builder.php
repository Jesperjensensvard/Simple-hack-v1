<?php


$fields = [
	[
		'key' => 'field_page_builder',
		'name' => 'page_builder',
		'label' => esc_html__('Modules', 'gt_template'),
		'type' => 'flexible_content',
		'layouts' => [

			'field_page_builder_layout_hero' => [
				'key' => 'field_page_builder_hero',
				'name' => 'page_builder_hero',
				'label' => esc_html__('Hero', 'gt_template'),
				'display' => 'block',
				'sub_fields' => [
					[
					'key' => 'field_hero_repeater_module',
					'name' => 'hero_repeater_module',
					'label' => esc_html__('Hero', 'gt_template'),
					'type' => 'repeater',
					'layout' => 'block',
					'button_label' => esc_html__('Add new item', 'gt_template'),
					'sub_fields' => [
							[
								'key' => 'field_hero_headline',
								'name' => 'hero_headline',
								'label' => esc_html__('Headline', 'gt_template'),
								'type' => 'text',
								'wrapper' => [
									'width' => 50,
								],
							],
							[
								'key' => 'field_hero_headline_tag',
								'name' => 'hero_headline_tag',
								'label' => esc_html__('Headline - tag (for seo)', 'gt_template'),
								'type' => 'select',
								'required' => '1',
								'choices' => array(
									'h1' => esc_html__('Heading 1', 'gt_template'),
									'h2' => esc_html__('Heading 2', 'gt_template'),
									'h3' => esc_html__('Heading 3', 'gt_template'),
									'h4' => esc_html__('Heading 4', 'gt_template'),
									'h5' => esc_html__('Heading 5', 'gt_template'),
									'p' => esc_html__('Paragraph', 'gt_template'),
								),
								'default_value' => 'h2',
								'layout' => 'horizontal',
								'return_format' => 'value',
								'wrapper' => [
									'width' => 50,
								],
							],
							[
								'key' => 'field_hero_text_item',
								'name' => 'hero_text_item',
								'label' => esc_html__('Text', 'gt_template'),
								'type' => 'textarea',
								'rows' => 2,
								'wrapper' => [
									'width' => 100,
								],
							],
							[
								'key' => 'field_field_hero_left',
								'name' => 'page_hero_left',
								'label' => esc_html__('Location', 'gt_template'),
								'instructions' => esc_html__('Set Text to the left', 'gt_template'),
								'display' => 'block',
								'type' => 'true_false',
								'ui' => 1,
								'ui_on_text' => esc_html__('Yes', 'gt_template'),
								'ui_off_text' => esc_html__('No', 'gt_template'),
								'layout' => 'horizontal',
								'return_format' => 'value',
								'wrapper' => [
									'width' => 50,
								],
							],
							[
								'key' => 'field_hero_image',
								'name' => 'hero_image',
								'label' => esc_html__('Image with custom focus', 'gt_template'),
								'type' => 'focal_point',
								'save_format' => 'object',
								'image_size' => 'large',
								'preview_size' => 'medium',
								'library' => 'all',
								'wrapper' => [
									'width' => 50,
								],
							],
							[
								'key' => 'field_hero_video',
								'name' => 'hero_video',
								'label' => esc_html__('Hero video', 'gt_template'),
								'type' => 'file',
								'wrapper' => [
									'width' => 50,
								],
							],
							[
								'key' => 'field_hero_link',
								'name' => 'hero_link',
								'label' => __('Link', 'gt_template'),
								'type' => 'link',
								'return_format' => 'array',
								'wrapper' => [
									'width' => 50,
								],
							],
							[
								'key' => 'field_hero_opacity',
								'name' => 'hero_opacity',
								'label' => esc_html__('Opacity', 'gt_template'),
								'type' => 'number',
							],
							[
								'key' => 'field_hero_color',
								'name' => 'hero_color',
								'label' => esc_html__('Color', 'gt_template'),
								'type' => 'color_picker',
							],
						],
					],
				],
			],

			'field_page_builder_layout_hero_simple' => [
				'key' => 'field_page_builder_hero_simple',
				'name' => 'page_builder_hero_simple',
				'label' => esc_html__('Hero - simple', 'gt_template'),
				'display' => 'block',
				'sub_fields' => [

					[
						'key' => 'page_builder_hero_simple_img',
						'name' => 'page_builder_simple_img',
						'label' => esc_html__('Image', 'gt_template'),
						'type' => 'focal_point',
						'save_format' => 'object',
						'image_size' => 'large',
						'preview_size' => 'medium',
					],
					[
						'key' => 'page_builder_hero_simple_text',
						'name' => 'page_builder_simple_text',
						'label' => esc_html__('Text', 'gt_template'),
						'type' => 'wysiwyg',
						'required' => 0,
						'media_upload' => 1,
					],
					[
						'key' => 'page_builder_hero_simple_link',
						'name' => 'page_builder_simple_link',
						'label' => esc_html__('Link', 'gt_template'),
						'display' => 'block',
						'type' => 'link',
						'wrapper' => [
							'width' => 50,
						],
					],
					[
						'key' => 'page_builder_hero_simple_left',
						'name' => 'page_hero_simple_left',
						'label' => esc_html__('Text location', 'gt_template'),
						'instructions' => esc_html__('Set Text to the left', 'gt_template'),
						'display' => 'block',
						'type' => 'true_false',
						'ui' => 1,
						'ui_on_text' => esc_html__('Yes', 'gt_template'),
						'ui_off_text' => esc_html__('No', 'gt_template'),
						'layout' => 'horizontal',
						'return_format' => 'value',
						'wrapper' => [
							'width' => 50,
						],
					],
					[
						'key' => 'page_builder_hero_simple_opacity',
						'name' => 'page_builder_simple_opacity',
						'label' => esc_html__('Opacity', 'gt_template'),
						'type' => 'number',
					],
					[
						'key' => 'page_builder_hero_simple_color',
						'name' => 'page_builder_simple_color',
						'label' => esc_html__('Color', 'gt_template'),
						'type' => 'color_picker',
					],
				],
			],

			'field_page_builder_layout_standard' => [
				'key' => 'field_page_builder_standard',
				'name' => 'page_builder_standard',
				'label' => esc_html__('Standard', 'gt_template'),
				'display' => 'block',
				'sub_fields' => [
					[
						'key' => 'field_page_builder_standard_wysiwyg',
						'name' => 'page_builder_standard_wysiwyg',
						'label' => esc_html__('Content', 'gt_template'),
						'type' => 'wysiwyg',
						'required' => 0,
						'media_upload' => 1,
					],
				],
			],

			'field_page_builder_layout_small_product' => [
				'key' => 'field_page_builder_small_product',
				'name' => 'builder_small_product',
				'label' => esc_html__('Product', 'gt_template'),
				'display' => 'block',
				'sub_fields' => [
					[
						'key' => 'field_page_builder_layout_trhee_product',
						'name' => 'page_builder_layout_trhee_product',
						'label' => esc_html__('Show 3 Product', 'gt_template'),
						'display' => 'block',
						'type' => 'true_false',
						'ui' => 1,
						'ui_on_text' => esc_html__('Yes', 'gt_template'),
						'ui_off_text' => esc_html__('No', 'gt_template'),
					],
				],
			],

			'field_page_builder_layout_box' => [
				'key' => 'field_page_builder_box',
				'name' => 'page_builder_box',
				'label' => esc_html__('Box', 'gt_template'),

				'sub_fields' => [
					[
						'key' => 'field_page_builder_repeater_box',
						'name' => 'page_builder_repeater_box',
						'label' => esc_html__('Box', 'gt_template'),
						'button_label' => esc_html__('Add new box', 'gt_template'),
						'layout' => 'block',
						'type' => 'repeater',
						'sub_fields' => [
							[
								'key' => 'field_page_builder_box_img_square',
								'name' => 'page_builder_box_img_square',
								'label' => esc_html__('Use square image', 'gt_template'),
								'display' => 'block',
								'type' => 'true_false',
								'ui' => 1,
								'ui_on_text' => esc_html__('Yes', 'gt_template'),
								'ui_off_text' => esc_html__('No', 'gt_template'),
								'wrapper' => [
									'width' => 50,
								],
							],
							[
								'key' => 'field_page_builder_box_img',
								'name' => 'page_builder_box_img',
								'label' => esc_html__('Image', 'gt_template'),
								'type' => 'focal_point',
								'save_format' => 'object',
								'image_size' => 'large',
								'preview_size' => 'medium',
								'conditional_logic' => [
									[
										[
											'field' => 'field_page_builder_box_img_square',
											'operator' => '!=',
											'value' => '1',
										],
									],
								],
								'wrapper' => [
									'width' => 50,
								],
							],
							[
								'key' => 'field_page_builder_box_img_square_img',
								'name' => 'page_builder_box_img_square_img',
								'label' => esc_html__('Square image', 'gt_template'),
								'instructions' => esc_html__('Perfekt for contact image', 'gt_template'),
								'display' => 'block',
								'type' => 'image',
								'conditional_logic' => [
									[
										[
											'field' => 'field_page_builder_box_img_square',
											'operator' => '==',
											'value' => '1',
										],
									],
								],
								'wrapper' => [
									'width' => 50,
								],
							],
							[
								'key' => 'field_page_builder_box_text',
								'name' => 'page_builder_box_text',
								'label' => esc_html__('Text', 'gt_template'),
								'type' => 'wysiwyg',
								'required' => 0,
								'media_upload' => 1,
							],
							[
								'key' => 'field_page_builder_box_width',
								'name' => 'page_builder_box_width',
								'label' => esc_html__('Width', 'gt_template'),
								'type' => 'radio',
								'choices' => [
									33 => '33% (1/3)',
									50 => '50% (1/2)',
								],
								'wrapper' => [
									'width' => 25,
								],
							],
							[
								'key' => 'field_page_builder_box_link',
								'name' => 'page_builder_box_link',
								'label' => esc_html__('Link', 'gt_template'),
								'display' => 'block',
								'type' => 'link',
								'wrapper' => [
									'width' => 25,
								],
							],
							[
								'key' => 'field_page_builder_box_check',
								'name' => 'page_builder_box_check',
								'label' => esc_html__('Black', 'gt_template'),
								'instructions' => esc_html__('Set black background', 'gt_template'),
								'display' => 'block',
								'type' => 'true_false',
								'ui' => 1,
								'ui_on_text' => esc_html__('Yes', 'gt_template'),
								'ui_off_text' => esc_html__('No', 'gt_template'),
								'wrapper' => [
									'width' => 25,
								],
							],
							[
								'key' => 'field_page_builder_box_align_left',
								'name' => 'page_builder_box_align_left',
								'label' => esc_html__('Align left', 'gt_template'),
								'instructions' => esc_html__('Align text left', 'gt_template'),
								'display' => 'block',
								'type' => 'true_false',
								'ui' => 1,
								'ui_on_text' => esc_html__('Yes', 'gt_template'),
								'ui_off_text' => esc_html__('No', 'gt_template'),
								'wrapper' => [
									'width' => 25,
								],
							],
						],
					],
				],
			],

			'field_page_builder_layout_img_artical' => [
				'key' => 'field_page_builder_artical',
				'name' => 'page_builder_artical',
				'label' => esc_html__('Articles', 'gt_template'),
				'sub_fields' => [
					[
						'key' => 'field_page_builder_repeater_articles',
						'name' => 'page_builder_repeater_articles',
						'label' => esc_html__('Articles', 'gt_template'),
						'button_label' => esc_html__('Add new article', 'gt_template'),
						'layout' => 'block',
						'type' => 'repeater',
						'sub_fields' => [
							[
								'key' => 'field_page_builder_articles_img',
								'name' => 'page_builder_articles_img',
								'label' => esc_html__('Image', 'gt_template'),
								'type' => 'focal_point',
								'save_format' => 'object',
								'image_size' => 'large',
								'preview_size' => 'medium',
								'wrapper' => [
									'width' => 50,
								],
							],
							[
								'key' => 'field_page_builder_articles_left_right',
								'name' => 'page_builder_articles_left_right',
								'label' => esc_html__('Location', 'gt_template'),
								'instructions' => esc_html__('Set image to the left or to the right', 'gt_template'),
								'display' => 'block',
								'type' => 'select',
								'required' => '1',
								'choices' => array(
									'right' => esc_html__('Right', 'gt_template'),
									'left' => esc_html__('Left', 'gt_template'),
								),
								'layout' => 'horizontal',
								'return_format' => 'value',
								'wrapper' => [
									'width' => 50,
								],
							],
							[
								'key' => 'field_page_builder_articles_text',
								'name' => 'page_builder_articles_text',
								'label' => esc_html__('Text', 'gt_template'),
								'type' => 'wysiwyg',
								'required' => 0,
								'media_upload' => 1,
							],

							[
								'key' => 'field_page_builder_articles_air',
								'name' => 'page_builder_articles_air',
								'label' => esc_html__('Air', 'gt_template'),
								'instructions' => esc_html__('Set space around article', 'gt_template'),
								'display' => 'block',
								'type' => 'true_false',
								'ui' => 1,
								'ui_on_text' => esc_html__('Yes', 'gt_template'),
								'ui_off_text' => esc_html__('No', 'gt_template'),
							],
							[
								'key' => 'field_page_builder_articles_bg_type',
								'name' => 'page_builder_articles_bg_type',
								'label' => esc_html__('Background', 'gt_template'),
								'instructions' => esc_html__('Set transparant background', 'gt_template'),
								'display' => 'block',
								'type' => 'true_false',
								'ui' => 1,
								'ui_on_text' => esc_html__('Yes', 'gt_template'),
								'ui_off_text' => esc_html__('No', 'gt_template'),
							],
						],
					],
				],
			],

			'field_page_builder_layout_gallary' => [
				'key' => 'field_page_builder_gallary',
				'name' => 'page_builder_gallary',
				'label' => esc_html__('Text&Gallary', 'gt_template'),
				'display' => 'block',
				'sub_fields' => [
					[
						'key' => 'field_page_builder_gallary_wysiwyg',
						'name' => 'page_builder_gallary_wysiwyg',
						'label' => esc_html__('Content', 'gt_template'),
						'type' => 'wysiwyg',
						'required' => 0,
						'media_upload' => 1,
					],
					[
						'key' => 'field_page_builder_gallary_big_img',
						'name' => 'page_builder_gallary_big_img',
						'label' => esc_html__('Big image', 'gt_template'),
						'display' => 'block',
						'type' => 'image',
					],
					[
						'key' => 'field_page_builder_gallary_small_img_one',
						'name' => 'page_builder_gallary_small_img_one',
						'label' => esc_html__('Small image one', 'gt_template'),
						'display' => 'block',
						'type' => 'image',
					],
					[
						'key' => 'field_page_builder_gallary_small_img_two',
						'name' => 'page_builder_gallary_small_img_two',
						'label' => esc_html__('Small image two', 'gt_template'),
						'display' => 'block',
						'type' => 'image',
					],
				],
			],
		],
		'button_label' => esc_html__('Add module', 'gt_template'),
	],
];

$location = [
	[
		[
			'param' => 'post_type',
			'operator' => '==',
			'value' => 'page',
		],
	],
];

acf_add_local_field_group([
	'key' => 'group_page_builder',
	'title' => esc_html__('Page builder', 'gt_template'),
	'fields' => $fields,
	'location' => $location,
	'position' => 'acf_after_title',
	'menu_order' => 4,
	'hide_on_screen' => array(
		0 => 'the_content',
	),
	//'style' => 'seamless',
]);

