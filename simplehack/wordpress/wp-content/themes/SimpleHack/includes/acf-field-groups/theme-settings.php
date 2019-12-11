<?php

$fields = [
	[
		'key' => 'field_theme_setting_footer_tab',
		'name' => 'theme_setting_footer_tab',
		'label' => esc_html__('Footer', 'gt_template'),
		'type' => 'tab',
		'placement' => 'left',
	],
	[
		'key' => 'field_theme_setting_footer_content',
		'name' => 'theme_setting_footer_content',
		'label' => esc_html__('Content', 'gt_template'),
		'type' => 'wysiwyg',
		'media_upload' => 0,
		'toolbar' => 'very_simple',
	],
	[
		'key' => 'field_theme_setting_error_page_tab',
		'name' => 'theme_setting_error_page_tab',
		'label' => esc_html__('404 - Error page', 'gt_template'),
		'type' => 'tab',
		'placement' => 'left',
	],
	[
		'key' => 'field_theme_setting_error_page_content',
		'name' => 'theme_setting_error_page_content',
		'label' => esc_html__('Content', 'gt_template'),
		'type' => 'wysiwyg',
		'media_upload' => 0,
	],
	[
		'key' => 'field_theme_setting_cookie_page_tab',
		'name' => 'theme_setting_cookie_page_tab',
		'label' => esc_html__('Cookie text', 'gt_template'),
		'type' => 'tab',
		'placement' => 'left',
	],
	[
		'key' => 'field_theme_setting_cookie_page_content',
		'name' => 'theme_setting_cookie_page_content',
		'label' => esc_html__('Content', 'gt_template'),
		'type' => 'text',
		'media_upload' => 0,
	],
	[
		'key' => 'field_theme_setting_scripts_tab',
		'name' => 'theme_setting_scripts_tab',
		'label' => esc_html__('Scripts', 'gt_template'),
		'type' => 'tab',
		'placement' => 'left',
	],
	[
		'key' => 'field_theme_setting_scripts_head',
		'name' => 'theme_setting_scripts_head',
		'label' => __('Scripts in head', 'gt_template'),
		'type' => 'textarea',
	],
	[
		'key' => 'field_theme_setting_scripts_body',
		'name' => 'theme_setting_scripts_body',
		'label' => __('Scripts in body', 'gt_template'),
		'type' => 'textarea',
	],
	[
		'key' => 'field_theme_setting_scripts_footer',
		'name' => 'theme_setting_scripts_footer',
		'label' => __('Scripts in footer', 'gt_template'),
		'type' => 'textarea',
	],
];

$location = [
	[
		'param' => 'options_page',
		'operator' => '==',
		'value' => 'gt_template_options',
	],
];

acf_add_local_field_group([
	'key' => 'group_theme_settings',
	'title' => esc_html__('Customization Settings', 'gt_template'),
	'fields' => $fields,
	'location' => [$location],
]);
