jQuery(document).ready(function($) {
	if (!(typeof tinymce === 'undefined' || tinymce === null)) {
		tinymce.create('tinymce.plugins.shortcodes_menu_plugin', {
		/* 	init: function (ed, url) {
				ed.addButton('shortcodes_menu_button', {
					text: 'Snabbkoder',
					icon: false,
					type: 'menubutton',
					menu: [

						{
							text: 'Innehållsblock',
							onclick: function () {
								ed.insertContent('[content_block code=""]');
							}
						},
						{
							text: 'Kontaktformulär',
							onclick: function () {
								ed.insertContent('[simple-contact-form]');
							}
						}
					]
				});
			}, */
		});
		tinymce.PluginManager.add('shortcodes_menu_button', tinymce.plugins.shortcodes_menu_plugin);
	}

    /* tinymce.create('tinymce.plugins.wpse72394_plugin', {
        init : function(ed, url) {
                // Register command for when button is clicked
                 ed.addCommand('wpse72394_insert_shortcode', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        content =  '[shortcode]'+selected+'[/shortcode]';
                    }else{
                        content =  '[shortcode]';
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });

            // Register buttons - trigger above command when clicked
			//ed.addButton('wpse72394_button', {title : 'Insert shortcode', cmd : 'wpse72394_insert_shortcode', image: 'https://server.grafi.se/gullmarsstrand/wp-content/uploads/2018/12/260x260.png' });
			ed.addButton('wpse72394_button', {title : 'Insert shortcode', cmd : 'wpse72394_insert_shortcode', image: 'https://server.grafi.se/gullmarsstrand/wp-content/uploads/2018/12/260x260.png' });
        },
    });

    // Register our TinyMCE plugin
    // first parameter is the button ID1
    // second parameter must match the first parameter of the tinymce.create() function above
	tinymce.PluginManager.add('wpse72394_button', tinymce.plugins.wpse72394_plugin); */

	/* // init process for registering our button
add_action('init', 'wpse72394_shortcode_button_init');
function wpse72394_shortcode_button_init() {

	 //Abort early if the user will never see TinyMCE
	 if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
		  return;

	 //Add a callback to regiser our tinymce plugin
	 add_filter("mce_external_plugins", "wpse72394_register_tinymce_plugin");

	 // Add a callback to add our button to the TinyMCE toolbar
	 add_filter('mce_buttons', 'wpse72394_add_tinymce_button');
}


//This callback registers our plug-in
function wpse72394_register_tinymce_plugin($plugin_array) {
   $plugin_array['wpse72394_button'] = get_template_directory_uri().'/assets/js/admin'.'/admin.min.js';
   return $plugin_array;
}

//This callback adds our button to the toolbar
function wpse72394_add_tinymce_button($buttons) {
		   //Add the button ID to the $button array
   $buttons[] = "wpse72394_button";
   return $buttons;
}
 */

	/* tinymce.create('tinymce.plugins.wdm_mce_dropbutton_plugin', {
        init : function(ed, url) {
			ed.addButton( 'wpse72394_button', {
				text: 'WDM Dropdown',
				icon: false,
				type: 'menubutton',
				menu: [
					  {
					   text: 'Sample Item 1',
					   onclick: function() {
						  ed.insertContent('[wdm_shortcode 1]');
								 }
					   },
					  {
					   text: 'Sample Item 2',
					   onclick: function() {
						  ed.insertContent('[wdm_shortcode 2]');
								}
					  }
					  ]
			 });
		},
    });
	tinymce.PluginManager.add('wpse72394_button', tinymce.plugins.wdm_mce_dropbutton_plugin); */

	/* tinymce.PluginManager.add('wdm_mce_dropbutton', function( editor, url ) {
		editor.addButton( 'wdm_mce_dropbutton', {
			  text: 'WDM Dropdown',
			  icon: false,
			  type: 'menubutton',
			  menu: [
					{
					 text: 'Sample Item 1',
					 onclick: function() {
						editor.insertContent('[wdm_shortcode 1]');
							   }
					 },
					{
					 text: 'Sample Item 2',
					 onclick: function() {
						editor.insertContent('[wdm_shortcode 2]');
							  }
					}
					]
		   });
	 }); */
});



