<?php
function add_content_blocks_cpt()
{
    register_post_type('content_blocks',
        array(
        'labels' => array(
            'name'					=> __('Content blocks', 'gt_template'),
            'singular_name'			=> __('Content block', 'gt_template'),
            'add_new'				=> __('Add content block', 'gt_template'),
            'add_new_item'			=> __('Add new content block', 'gt_template'),
            'edit'					=> __('Edit', 'gt_template'),
            'edit_item'				=> __('Edit content block', 'gt_template'),
            'new_item'				=> __('New content block', 'gt_template'),
            'view'					=> __('Show', 'gt_template'),
            'view_item'				=> __('Show content blocks', 'gt_template'),
            'search_items'			=> __('Search content blocks', 'gt_template'),
            'not_found'				=> __('No content blocks found', 'gt_template'),
            'not_found_in_trash' 	=> __('No content blocks in trash', 'gt_template'),
        ),
		'menu_position'				=> 32,
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
		/*
		'capability_type' => 'content_block',
		'capabilities' => array(
			'publish_posts' => 'publish_content_blocks',
			'edit_posts' => 'edit_content_blocks',
			'edit_others_posts' => 'edit_others_content_blocks',
			'delete_posts' => 'delete_content_blocks',
			'delete_others_posts' => 'delete_others_content_blocks',
			'read_private_posts' => 'read_private_content_blocks',
			'edit_post' => 'edit_content_block',
			'delete_post' => 'delete_content_block',
			'read_post' => 'read_content_block',
		),
		'map_meta_cap' => true,
		*/
    ));
}
add_action('init', 'add_content_blocks_cpt');
