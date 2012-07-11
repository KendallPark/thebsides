<?php

/**
 * Load custom login logo to login page
 */
function custom_login_logo() {
  echo '<style type="text/css">
    h1 a { background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
    </style>';
}

add_action('login_head', 'custom_login_logo');

/**
 * Customize the admin footer
 */
 function modify_footer_admin () {
  echo 'Created by <a href="http://integritystl.com" target="_blank">Integrity</a>.';
}

add_filter('admin_footer_text', 'modify_footer_admin');

/**
 * Add a custom admin dashboard welcome widget
 */
function custom_dashboard_widget() {
	echo '<h2>Welcome to your custom WordPress site built by <a href="http://integritystl.com" target="_blank">Integrity!</a></h2><p>If you have any questions or need any help, please do not hesitate to call us!</p><strong>Phone: 314-727-3600</strong>';
}
function add_custom_dashboard_widget() {
	wp_add_dashboard_widget('custom_dashboard_widget', 'Integrity Welcomes You To WordPress!', 'custom_dashboard_widget');
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');

/**
 * Remove useless admin dashboard widgets
 */
function disable_default_dashboard_widgets() {

	remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}
add_action('admin_menu', 'disable_default_dashboard_widgets');

/**
 * Remove any unnecessary admin menus & sub-menus
 */
function remove_menus () {
global $menu;
	$restricted = array(__('Links'));
	// Additional options - > __('Dashboard'), __('Pages'), , __('Comments'), __('Media')
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}

add_action('admin_menu', 'remove_menus');

function remove_submenus() {
  global $submenu;
  //Dashboard menu
  //unset($submenu['index.php'][10]); // Removes Updates
  //Posts menu
  //unset($submenu['edit.php'][5]); // Leads to listing of available posts to edit
  //unset($submenu['edit.php'][10]); // Add new post
  //unset($submenu['edit.php'][15]); // Remove categories
  //unset($submenu['edit.php'][16]); // Removes Post Tags
  //Media Menu
  //unset($submenu['upload.php'][5]); // View the Media library
  //unset($submenu['upload.php'][10]); // Add to Media library
  //Links Menu
  //unset($submenu['link-manager.php'][5]); // Link manager
  //unset($submenu['link-manager.php'][10]); // Add new link
  //unset($submenu['link-manager.php'][15]); // Link Categories
  //Pages Menu
  //unset($submenu['edit.php?post_type=page'][5]); // The Pages listing
  //unset($submenu['edit.php?post_type=page'][10]); // Add New page
  //Appearance Menu
  //unset($submenu['themes.php'][5]); // Removes 'Themes'
  //unset($submenu['themes.php'][7]); // Widgets
  //unset($submenu['themes.php'][15]); // Removes Theme Installer tab
  //Plugins Menu
  //unset($submenu['plugins.php'][5]); // Plugin Manager
  //unset($submenu['plugins.php'][10]); // Add New Plugins
  //unset($submenu['plugins.php'][15]); // Plugin Editor
  //Users Menu
  //unset($submenu['users.php'][5]); // Users list
  //unset($submenu['users.php'][10]); // Add new user
  //unset($submenu['users.php'][15]); // Edit your profile
  //Tools Menu
  //unset($submenu['tools.php'][5]); // Tools area
  //unset($submenu['tools.php'][10]); // Import
  //unset($submenu['tools.php'][15]); // Export
  //unset($submenu['tools.php'][20]); // Upgrade plugins and core files
  //Settings Menu
  //unset($submenu['options-general.php'][10]); // General Options
  //unset($submenu['options-general.php'][15]); // Writing
  //unset($submenu['options-general.php'][20]); // Reading
  //unset($submenu['options-general.php'][25]); // Discussion
  //unset($submenu['options-general.php'][30]); // Media
  //unset($submenu['options-general.php'][35]); // Privacy
  //unset($submenu['options-general.php'][40]); // Permalinks
  //unset($submenu['options-general.php'][45]); // Misc
}
add_action('admin_menu', 'remove_submenus');

// Remove Theme Editor

add_action('admin_init', 'my_remove_menu_elements', 102);

function my_remove_menu_elements()
{
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
}

/**
 * Remove any unwanted widgets...
 *
 *  @uses WP_Widget_Pages                   = Pages Widget
 *  @uses WP_Widget_Calendar                = Calendar Widget
 *  @uses WP_Widget_Archives                = Archives Widget
 *  @uses WP_Widget_Links                   = Links Widget
 *  @uses WP_Widget_Meta                    = Meta Widget
 *  @uses WP_Widget_Search                  = Search Widget
 *  @uses WP_Widget_Text                    = Text Widget
 *  @uses WP_Widget_Categories              = Categories Widget
 *  @uses WP_Widget_Recent_Posts            = Recent Posts Widget
 *  @uses WP_Widget_Recent_Comments         = Recent Comments Widget
 *  @uses WP_Widget_RSS                     = RSS Widget
 *  @uses WP_Widget_Tag_Cloud               = Tag Cloud Widget
 *  @uses WP_Nav_Menu_Widget                = Menus Widget
 *
 */
add_action('admin_menu', 'remove_menus');

function remove_some_wp_widgets(){
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Recent_Comments');
}

add_action('widgets_init','remove_some_wp_widgets', 1);

?>