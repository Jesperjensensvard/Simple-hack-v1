<?php
function add_callouts_cpt()
{
    register_post_type('callouts',
        array(
        'labels' => array(
            'name'					=> __('Callouts', 'gt_template'),
            'singular_name'			=> __('Callout', 'gt_template'),
            'add_new'				=> __('Add callout', 'gt_template'),
            'add_new_item'			=> __('Add new callout', 'gt_template'),
            'edit'					=> __('Edit', 'gt_template'),
            'edit_item'				=> __('Edit callout', 'gt_template'),
            'new_item'				=> __('New callout', 'gt_template'),
            'view'					=> __('Show', 'gt_template'),
            'view_item'				=> __('Show callouts', 'gt_template'),
            'search_items'			=> __('Search callouts', 'gt_template'),
            'not_found'				=> __('No callouts found', 'gt_template'),
            'not_found_in_trash' 	=> __('No callouts in trash', 'gt_template'),
        ),
		'menu_position'				=> 31,
		'menu_icon'					=> 'dashicons-grid-view',				// https://developer.wordpress.org/resource/dashicons
		'public'					=> false,								// should it have it's own permalink, and so on
		'publicity_queryable'		=> false,								// should visitors be able to query it
		'rewrite' 					=> false,								// rewrite rules
		'show_in_nav_menus'			=> false,								// should admins be able to add it to menus
		'exclude_from_search'		=> true,								// show in search results
        'show_ui'					=> true,								// editable in wp-admin
		'has_archive'				=> false,								// whether to it has archive page
		'hierarchical'				=> false, 								// whether the post type is hierarchical
		'can_export'				=> true,								// whether to allow this post type to be exported
		'supports' 					=> array(
            							'title'
		),
    ));
}
add_action('init', 'add_callouts_cpt');
