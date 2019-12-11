<?php
/*------------------------------------*\
    ACF
\*------------------------------------*/

//define('GT_ACF_PRO_LICENSE_KEY', 'b3JkZXJfaWQ9Nzc0NTZ8dHlwZT1wZXJzb25hbHxkYXRlPTIwMTYtMDMtMTYgMDk6MTA6NTI=');

// Update ACF PRO license key automatically when using WP CLI search-replace command.
/* if(defined('WP_CLI') && WP_CLI && defined('GT_ACF_PRO_LICENSE_KEY')) {
	WP_CLI::add_hook('after_invoke:search-replace', function() {
		if(function_exists('acf_pro_update_license')) {
			acf_pro_update_license(GT_ACF_PRO_LICENSE_KEY);
		}
	});
} */

// Polylang compability on ACF option pages
if(function_exists('pll_default_language')) {
	add_filter('acf/settings/default_language', function($language) {
		return pll_default_language();
	});
	add_filter('acf/settings/current_language', function($language) {
		return pll_current_language();
	});
}

// Option pages and field groups
add_action('acf/init', function() {
	if(function_exists('acf_add_local_field_group')) {
		/* CUSTOM */
		require_once 'acf-field-groups/theme-settings.php';
		require_once 'acf-field-groups/page-builder.php';
		//require_once 'acf-field-groups/callouts.php';
	}

	
});
add_filter('acf/fields/wysiwyg/toolbars', 'acf_custom_toolbars');
function acf_custom_toolbars($toolbars)
{
	$toolbars['Very Simple'] = array();
	$toolbars['Very Simple'][1] = array('pastetext', '|', 'bold' , 'italic' , 'underline', '|', 'link', 'unlink');

	$toolbars['Very Simple Extended'] = array();
	$toolbars['Very Simple Extended'][1] = array('pastetext', '|', 'bold' , 'italic');

	return $toolbars;
}


?>
