<?php

$fields = [

	[
		'key' => 'field_callouts_color_picker',
		'name' => 'callouts_color_picker',
		'label' => esc_html__('Choose color', 'gt_template'),
		'type' => 'color_picker',
		'return_format' => 'value',
		'wrapper' => [
			'width' => 33,
		],
	],
	[
		'key' => 'field_callouts_title_tag',
		'name' => 'callouts_title_tag',
		'label' => esc_html__('Title - tag (for seo)', 'gt_template'),
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
		'default_value' => 'h3',
		'layout' => 'horizontal',
		'return_format' => 'value',
		'wrapper' => [
			'width' => 33,
		],
	],
	[
		'key' => 'field_callouts_title_pos',
		'name' => 'callouts_title_pos',
		'label' => esc_html__('Title position', 'gt_template'),
		'type' => 'select',
		'required' => '1',
		'choices' => array(
			'center' => esc_html__('Default', 'gt_template'),
			'top' => esc_html__('Top', 'gt_template'),
			'bottom' => esc_html__('Bottom', 'gt_template'),
		),
		'default_value' => 'center',
		'layout' => 'horizontal',
		'return_format' => 'value',
		'wrapper' => [
			'width' => 33,
		],
	],
	[
		'key' => 'field_callouts_box_image',
		'name' => 'callouts_box_image',
		'label' => esc_html__('Image', 'gt_template'),
		'type' => 'image',
		'format' => 'object',
		'wrapper' => [
			'width' => 33,
		],
	],
	[
		'key' => 'field_callouts_box_link',
		'name' => 'callouts_box_link',
		'label' => esc_html__('Link', 'gt_template'),
		'type' => 'link',
		'return_format' => 'array',
		'wrapper' => [
			'width' => 33,
		],
	],
	[
		'key' => 'field_callouts_multiple_images',
		'name' => 'callouts_box_multiple_images',
		'label' => esc_html__('Multiple images', 'gt_template'),
		'type' => 'repeater',
		'layout' => 'block',
		'min' => 0,
		'max' => 2,
		'button_label' => esc_html__('Add new image', 'gt_template'),
		'sub_fields' => [
			[
				'key' => 'field_callouts_box_image_image',
				'name' => 'callouts_box_image_image',
				'label' => esc_html__('Image', 'gt_template'),
				'type' => 'image',
				'return_format' => 'object',
				'wrapper' => [
					'width' => 100,
				],
			],
		],
	],
];

$location = [
	[
		'param' => 'post_type',
		'operator' => '==',
		'value' => 'callouts',
	],
];

acf_add_local_field_group([
	'key' => 'group_callout',
	'title' => esc_html__('Content and settings', 'gt_template'),
	'fields' => $fields,
	'location' => [$location],
	'position' => 'acf_after_title',
	'menu_order' => 1,
	//'style' => 'seamless',
]);

