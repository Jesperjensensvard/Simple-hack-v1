<?php

/*------------------------------------*\
    Globals
\*------------------------------------*/

/* define('GT_THEME_SITE_DOMAIN', 'foodfactorymolnlycke.se');
define('GT_THEME_CODE', 'foodfactory');
define('GT_THEME_NAME', 'foodfactory');
define('GT_THEME_LANGUAGE_CODE', 'sv');
define('GT_THEME_GOOGLE_ANALYTICS_ID', '');
define('GT_THEME_GOOGLE_TAG_ID', '');
define('GT_THEME_GOOGLE_MAPS_API_KEY', 'AIzaSyAcx_OfOv9T8IiQ0MgkKfEOrp66vSUw1Eo');
 */
/*------------------------------------*\
    Main Includes
\*------------------------------------*/

require_once('includes/admin-ui.php');
require_once('includes/plugins.php');
require_once('includes/shortcodes.php');
require_once('includes/grafi.php');

/*------------------------------------*\
    Translation & Language
\*------------------------------------*/

/* load_theme_textdomain('gt_template', get_template_directory().'/assets/translation');

function getTheLang() {
	if(function_exists('icl_get_languages')) {
		return ICL_LANGUAGE_CODE;
	}
	return GT_THEME_LANGUAGE_CODE;
}
 */
/*------------------------------------*\
    Theme Support
\*------------------------------------*/

add_theme_support('post-thumbnails', array());
//set_post_thumbnail_size(125, 125, true);

/*------------------------------------*\
   Custom Post Types
\*------------------------------------*/
//require_once('includes/cpt/callouts.php');
//require_once('includes/cpt/templates.php');
/*require_once('includes/cpt/offers.php');
require_once('includes/cpt/booking-links.php');
require_once('includes/cpt/news.php');
require_once('includes/cpt/newsletters.php');
require_once('includes/cpt/callouts.php');*/
//require_once('includes/cpt/articles.php');

/*------------------------------------*\
    Menus
\*------------------------------------*/

//remove_theme_support('menus');

register_nav_menus(array(
	'main_menu' => __('Main Menu', 'gt_template'),
	//'footer_menu' => __('Footer Menu', 'gt_template'),
));

/*------------------------------------*\
   Image, Files Support & Sizes
\*------------------------------------*/

add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

if(function_exists('add_image_size')) {
	//add_image_size('custom_image', 500, 500, true);
	add_image_size('custom-medium', 700, 400);
	add_image_size('custom-large', 1280, 440);
	add_image_size('square-box', 600, 600, true);
	add_image_size('gallery-wide', 900, 485, true);
}

add_filter('image_size_names_choose', 'custom_image_size_names');
function custom_image_size_names($sizes) {
    return array_merge($sizes, array(
        //'custom_image' => __('Custom Image', 'gt_template'),
    ));
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

add_action('wp_enqueue_scripts', 'theme_add_scripts_and_styles', 1);
function theme_add_scripts_and_styles() {
	wp_register_style('style', get_template_directory_uri().'/assets/css/style.css', array(), 'all');
	wp_enqueue_style('style');

	wp_register_style('royal', get_template_directory_uri().'/assets/css/plugins/royalslider/royalslider.css', array(), 'all');
	wp_enqueue_style('royal');

	wp_deregister_script('jquery');
	wp_deregister_script('wp-embed');
	
	wp_register_script('script', get_template_directory_uri().'/assets/js/scripts.min.js', array(), true);
	wp_enqueue_script('script');
}

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

// Remove Gutenberg styles
add_action('wp_enqueue_scripts', 'remove_wp_block_library', 100);
function remove_wp_block_library() {
	wp_dequeue_style('wp-block-library');
}

// Add inline scripts to head in frontend and amdin
/* add_action('wp_head','add_custom_script_head');
add_action('admin_head','add_custom_script_head');
function add_custom_script_head() { ?>
<script>
		var GLOBAL_SITE = {
			baseUrl: '<?php echo get_site_url(); ?>',
			basePath: '<?php echo get_template_directory_uri(); ?>',
			siteName: '<?php echo GT_THEME_CODE; ?>',
			<?php if(function_exists('acf_add_options_page')) { ?>
			siteCookieText: '<?php echo esc_html(get_field('theme_setting_cookie_page_content', 'options'.getTheLangACF())); ?>',
			<?php } ?>
			siteCookieAccept: '<?php esc_html_e('I accept cookies', 'gt_template' ); ?>',
			language: 'sv',
			googleMapsInit: false,
			googleMapsLoaded: false,
			googleMapsKey: '<?php echo GT_THEME_GOOGLE_MAPS_API_KEY; ?>',
		};
	</script>
<?php } */

/*------------------------------------*\
    TinyMce Features
\*------------------------------------*/

add_action('admin_init', 'tiny_mce_add_editor_styles');
function tiny_mce_add_editor_styles() {
    add_editor_style('assets/css/admin/editor-style.css');
}

add_filter('tiny_mce_before_init', 'ag_tinymce_paste_as_text');
function ag_tinymce_paste_as_text( $init ) {
	$init['paste_as_text'] = true;
	return $init;
}


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

// Register menu for shortcodes
add_action('admin_init', 'shortcodes_menu_shortcode_button_init');
function shortcodes_menu_shortcode_button_init() {
	if(!current_user_can('edit_posts') && !current_user_can('edit_pages') && get_user_option('rich_editing') == 'true') {
		return;
	}
	// Add a callback to regiser our tinymce plugin
	add_filter('mce_external_plugins', 'shortcodes_menu_register_tinymce_plugin');
	// Add a callback to add our button to the TinyMCE toolbar
	add_filter('mce_buttons', 'shortcodes_menu_add_tinymce_button');
}

// This callback registers our plug-in
function shortcodes_menu_register_tinymce_plugin($plugin_array) {
	$plugin_array['shortcodes_menu_button'] = get_template_directory_uri().'/assets/js/admin'.'/editor-shortcodes.min.js';
	return $plugin_array;
}

// This callback adds our button to the toolbar
function shortcodes_menu_add_tinymce_button($buttons) {
	// Add the button ID to the $button array
	$buttons[] = "shortcodes_menu_button";
	return $buttons;
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

add_theme_support( 'woocommerce' );
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
