<?php
/*------------------------------------*\
    Main Includes
\*------------------------------------*/
require_once('includes/admin-ui.php');
require_once('includes/plugins.php');
require_once('includes/special.php');
/*------------------------------------*\
    Theme BASIC
\*------------------------------------*/
// add theme suppport for
function simple_hack_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
} 

add_action( 'after_setup_theme', 'simple_hack_add_woocommerce_support' );
// remove stripe fast pay form singel product page and cart
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
remove_action( 'woocommerce_proceed_to_checkout', array( WC_Stripe_Payment_Request::instance(), 'display_payment_request_button_html' ), 1 );
remove_action( 'woocommerce_proceed_to_checkout', array( WC_Stripe_Payment_Request::instance(), 'display_payment_request_button_separator_html' ), 2 );
// may need to be move to after reset after final uplaod.
remove_action( 'woocommerce_after_shop_loop_item', 'sp_loop_product_description', 6 );
add_action( 'woocommerce_after_shop_loop_item', 'ssd_powerpack_add_shortcodes_short_description', 6 );

function ssd_powerpack_add_shortcodes_short_description() {
    global $product;

    $wc_product = wc_get_product( $product );

    if ( ! $wc_product ) {
        return false;
    }

    $short_description = $wc_product->get_short_description();

    if ( '' !== $short_description ) {
        echo '<div itemprop="description">' . do_shortcode( wpautop( wptexturize( $short_description ) ) ) . '</div>';
    }    
}

/*------------------------------------*\
    OPTIONS
\*------------------------------------*/

add_action('init', 'register_logo_options_page');
add_action('init',  'register_acf_fields');
    
function register_logo_options_page()    {
	if( function_exists('acf_add_options_page') ) {
		 acf_add_options_page(array(
			'page_title'    => 'Theme Settings',
			'menu_title'    => 'Theme Settings',
			'menu_slug'     => 'Theme-Settings',
			'capability'    => 'edit_posts',
			'redirect'  => false
			));
	}
}

function register_acf_fields ()  {

	if( function_exists('acf_add_local_field_group') ){

		acf_add_local_field_group(array (
			'key' => 'footer-text-holder',
			'title' => 'Footer',
			'fields' => [
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

			],
			'location' => [
				[
					[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'Theme-Settings',
					],
				],
			],
		));
	}
}

/*------------------------------------*\
   Image, Files Support & Sizes
\*------------------------------------*/

add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

// AD COSUTOM IMAGES OPTIONS
if(function_exists('add_image_size')) {
	//add_image_size('custom_image', 500, 500, true);
	add_image_size('custom-medium', 700, 400);
	add_image_size('custom-large', 1280, 440);
	add_image_size('square-box', 600, 600, true);
	add_image_size('gallery-wide', 900, 485, true);
}


function sanitize_filename_on_upload($filename) {
	$ext = explode('.', $filename);
	$ext = end($ext);
	$sanitized = preg_replace('/[^a-zA-Z0-9-_.]/','', substr($filename, 0, -(strlen($ext)+1)));
	$sanitized = str_replace('.','-', $sanitized);
	return strtolower($sanitized.'.'.$ext);
  }
  add_filter('sanitize_file_name', 'sanitize_filename_on_upload', 10);

/*------------------------------------*\
    Styles & Scrips
\*------------------------------------*/
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; 
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/assets/css/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
	);
	
	
}


function my_scripts_method() {
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',
        array( 'jquery' )
	);
  
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

// Add defer to scripts
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
function add_defer_attribute($tag, $handle) {
	$scripts_to_defer = array('script');
	foreach($scripts_to_defer as $defer_script) {
	   if ($defer_script === $handle) {
		  return str_replace(' src', ' defer="defer" src', $tag);
	   }
	}
	return $tag;
}

// Add async to scripts
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
function add_async_attribute($tag, $handle) {
	$scripts_to_async = array('script');
	foreach($scripts_to_async as $async_script) {
		if ($async_script === $handle) {
			return str_replace(' src', ' async="async" src', $tag);
		}
	}
	return $tag;
}

add_filter( 'wc_stripe_hide_payment_request_on_product_page', '__return_true' );

add_filter('mce_buttons_2', 'tiny_mce_custom_buttons');
function tiny_mce_custom_buttons($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}


add_filter('tiny_mce_before_init', 'tiny_mce_block_formats');
function tiny_mce_block_formats($in) {
	$in['block_formats'] = __('Paragraph', 'gt_template').'=p;'.__('Header', 'gt_template').' 1=h1;'.__('Header', 'gt_template').' 2=h2;'.__('Header', 'gt_template').' 3=h3;'.__('Header', 'gt_template').' 4=h4;'.__('Header', 'gt_template').' 5=h5;'.__('Header', 'gt_template').' 6=h6;';
  	return $in;
}

/*------------------------------------*\
    Reset functions
\*------------------------------------*/

// Remove comments in header and footer
add_action('get_header', 'buffer_start');
add_action('wp_footer', 'buffer_end');
function callback($buffer){
	$buffer = preg_replace('/<!--(.|s)*?-->/', '', $buffer);
	return $buffer;
}
function buffer_start(){
	ob_start("callback");
}
function buffer_end(){
	ob_end_flush();
}
