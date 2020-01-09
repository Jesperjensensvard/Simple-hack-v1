<?php

/*------------------------------------*\
   Load custom javascript and css in admin
\*------------------------------------*/
/* 
add_action('admin_enqueue_scripts', 'custom_admin_scripts_and_styles');
function custom_admin_scripts_and_styles() {
    if(is_admin()) {
        $admin_js_ver  = date('ymd-Gis', filemtime(get_template_directory().'/assets/js/admin/scripts.min.js'));
        wp_register_script('admin-script', get_template_directory_uri().'/assets/js/admin'.'/scripts.min.js', array(), $admin_js_ver, true);
        wp_enqueue_script('admin-script');
    }
} */

/*------------------------------------*\
   Login Page & Footer
\*------------------------------------*/

add_action('login_enqueue_scripts', 'custom_login_logo');
function custom_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/admin/site-login-logo.png) !important;
			background-size: cover !important;
			height: 130px !important;
			width: 320px !important;
        }
    </style>
<?php } 

add_filter('login_headerurl', 'custom_login_logo_url');
function custom_login_logo_url() {
    return home_url();
}

/* add_filter('login_headertitle', 'custom_login_logo_url_title');
function custom_login_logo_url_title() {
	return GT_THEME_NAME;
} */

add_filter('admin_footer_text', 'custom_admin_footer');
function custom_admin_footer() {
	echo '<span id="footer-thankyou">'.__('Developed by', 'gt_template').' <a href="" target="_blank">Jesper</a></span>';
}

/*------------------------------------*\
    Admin Menus & Bar
\*------------------------------------*/

//add_filter('show_admin_bar', '__return_false');

/*add_action('get_header', 'my_filter_head');
function my_filter_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}*/

add_action('admin_menu', 'remove_admin_menus');
function remove_admin_menus(){
  //remove_menu_page( 'index.php' );					//Dashboard
  remove_menu_page( 'edit.php' );						//Posts
  //remove_menu_page( 'upload.php' );					//Media
  //remove_menu_page( 'edit.php?post_type=page' );		//Pages
  remove_menu_page( 'edit-comments.php' );				//Comments
  //remove_menu_page( 'themes.php' );					//Appearance
  //remove_menu_page( 'plugins.php' );					//Plugins
  //remove_menu_page( 'users.php' );					//Users
  //remove_menu_page( 'tools.php' );					//Tools
  //remove_menu_page( 'options-general.php' );			//Settings
}

// Add menu seperator
add_action('admin_init', 'add_admin_menu_separator');
function add_admin_menu_separator($position) {
	global $menu;
	$menu[$position] = array(
		0	=>	'',
		1	=>	'read',
		2	=>	'separator' . $position,
		3	=>	'',
		4	=>	'wp-menu-separator'
	);
}

add_action('admin_menu', 'set_admin_menu_separator');
function set_admin_menu_separator() {
	do_action( 'admin_init', 47 );
}

// Remove admin bar items
add_action('wp_before_admin_bar_render', 'custom_admin_bar_render');
function custom_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
}

/*------------------------------------*\
   Dashboard Widgets
\*------------------------------------*/

// Disable welcome panel
remove_action('welcome_panel', 'wp_welcome_panel');

// Disable default dashboard widgets
add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets', 11);
function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

	// remove plugin dashboard boxes
	//unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);			// Yoast's SEO Plugin Widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);	// bbPress Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['icl_dashboard_widget']);		// WPML Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);			// Gravity Forms Plugin Widget
}

// Custom dashboard widget
function welcome_dashboard_widget() {
	$current_user = wp_get_current_user();
	echo '<p>';
	printf(esc_html__('Welcome %1$s, to the administration area for %2$s.', 'gt_template'), $current_user->user_login, get_bloginfo('name'));
	echo '</p>';
}

add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');
function add_custom_dashboard_widget() {
	wp_add_dashboard_widget('welcome_dashboard_widget', __('Welcome!', 'gt_template'), 'welcome_dashboard_widget');
}
