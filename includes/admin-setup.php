<?php

/*
// Hide Upgrade Notices...
function hide_wp_update_nag() {
	remove_action( 'admin_notices', 'update_nag', 3 );
	add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
}
add_action('admin_menu','hide_wp_update_nag');

// Hide Upgrade Notices from admin bar...
function disable_bar_updates() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('updates');  
}  
add_action( 'wp_before_admin_bar_render', 'disable_bar_updates' );

// Hide Plugin Notices...
function hide_plugin_update_indicator(){
    global $menu,$submenu;
    $menu[65][0] = 'Plugins';
    $submenu['index.php'][10][0] = 'Updates';
}
add_action('admin_menu', 'hide_plugin_update_indicator');

// Show admin bar only for admins
if (!current_user_can('manage_options')) {
	add_filter('show_admin_bar', '__return_false');
}
// show admin bar only for admins and editors
if (!current_user_can('edit_posts')) {
	add_filter('show_admin_bar', '__return_false');
}
*/

// Remove Admin Bar from front-end for all users
add_filter( 'show_admin_bar', '__return_false' );

// Customize Admin toolbar if you do desiced to keep it around...
function change_toolbar($wp_toolbar) {
	//$wp_toolbar->remove_node('wp-logo');
	$wp_toolbar->remove_node('comments');
	$wp_toolbar->add_node(array(
		'id' => 'myhelp',
		'title' => 'Help',
		'href' => 'http://integritystl.com/contact',
		'meta' => array('target' => 'help')
	));
	$wp_toolbar->add_node(array(
	'id' => 'mysupport',
	'title' => 'Email Support',
	'parent' => 'myhelp',
	'href' => 'mailto:dev-team@integritystl.com?subject=Client%20Support%20Request'
	));
}
add_action('admin_bar_menu', 'change_toolbar', 999);  

// Disable plugin deactiviation for a specific plugin...
function integ_lock_plugins( $actions, $plugin_file, $plugin_data, $context ) {
    // Remove edit link for all
    if ( array_key_exists( 'edit', $actions ) )
        unset( $actions['edit'] );
    // Remove deactivate link for crucial plugins
    if ( array_key_exists( 'deactivate', $actions ) && in_array( $plugin_file, array(
        'slt-custom-fields/slt-custom-fields.php',
        'slt-file-select/slt-file-select.php',
        'slt-simple-events/slt-simple-events.php',
        'slt-widgets/slt-widgets.php'
    )))
        unset( $actions['deactivate'] );
    return $actions;
}

add_filter( 'plugin_action_links', 'integ_lock_plugins', 10, 4 );

/**
 * Load custom login logo to login page
 */
function custom_login_styles() {
  echo '<style type="text/css">
    		h1 a { background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
    		.login label { color: black; }
    		.login form .input, .login input[type="text"], .login form { border: 1px solid black; }
    		.login form .input:focus, .login input[type="text"]:focus { border: 1px solid orange; }
    		.login #nav a, .login #backtoblog a { color: black !important; }
    	</style>';
}

add_action('login_head', 'custom_login_styles');

/**
 * Changing the login page URL
 */
function my_login_logo_url() {
 return get_bloginfo( 'url' );
 }
 add_filter( 'login_headerurl', 'my_login_logo_url' );

/**
 * Changing the login page URL hover text
 */
function my_login_logo_url_title() {
 return get_bloginfo( 'title' );
 }
 add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
 * Customize the admin footer
 */
 function modify_footer_admin () {
  echo 'Created by <a href="http://integritystl.com" target="_blank">Integrity</a>.';
}

add_filter('admin_footer_text', 'modify_footer_admin');

/**
 * Customize admin  WP logo
 */
add_action('admin_head', 'my_custom_logo');

function my_custom_logo() {
   echo '
      <style type="text/css">
        #wp-admin-bar-wp-logo > .ab-item .ab-icon { 
        	background-image: url('.get_bloginfo('template_directory').'/images/wp-admin.png) !important; 
        	background-position: 0 0;
        	background-repeat: none;
        }
         #wp-admin-bar-wp-logo > .ab-item .ab-icon:hover, #wp-admin-bar-wp-logo > ab-item:hover { 
        	background-image: url('.get_bloginfo('template_directory').'/images/wp-admin-hover.png) !important; 
        	background-position: 0 0 !important;
        	background-repeat: none !important;
        }
      </style>
   ';
}

/**
 * Change the "Howdy" Text in admin bar
 */
function wp_admin_bar_my_custom_account_menu( $wp_admin_bar ) {
	$user_id = get_current_user_id();
	$current_user = wp_get_current_user();
	$profile_url = get_edit_profile_url( $user_id );

	if ( 0 != $user_id ) {
		/* Add the "My Account" menu */
		$avatar = get_avatar( $user_id, 28 );
		$howdy = sprintf( __('User Options - %1$s'), $current_user->display_name );
		$class = empty( $avatar ) ? '' : 'with-avatar';

		$wp_admin_bar->add_menu( array(
			'id' => 'my-account',
			'parent' => 'top-secondary',
			'title' => $howdy . $avatar,
			'href' => $profile_url,
			'meta' => array(
			'class' => $class,
			),
		) );
	}
}

add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );

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

/*
 * Sample function to hook into specific user roles - Useful to hide admin meues for specific user types...
 *
 *
function customize_menus() {
     //retrieve current user info
     global $current_user;
     get_currentuserinfo();

     //if current user level is less than 3, remove the postcustom meta box
     if ($current_user->user_level < 3) {
          remove_meta_box('postcustom','post','normal');
     }
}
add_action('admin_init','customize_menus');
*/

/**
 * Remove any unnecessary admin menus & sub-menus
 */
function remove_menus () {
global $menu;
	$restricted = array(__('Links'), __('Comments'));
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
  unset($submenu['index.php'][10]); // Removes Updates
  //Posts menu
  //unset($submenu['edit.php'][5]); // Leads to listing of available posts to edit
  //unset($submenu['edit.php'][10]); // Add new post
  //unset($submenu['edit.php'][15]); // Remove categories
  //unset($submenu['edit.php'][16]); // Removes Post Tags
  //Media Menu
  //unset($submenu['upload.php'][5]); // View the Media library
  //unset($submenu['upload.php'][10]); // Add to Media library
  //Links Menu
  unset($submenu['link-manager.php'][5]); // Link manager
  unset($submenu['link-manager.php'][10]); // Add new link
  unset($submenu['link-manager.php'][15]); // Link Categories
  //Pages Menu
  //unset($submenu['edit.php?post_type=page'][5]); // The Pages listing
  //unset($submenu['edit.php?post_type=page'][10]); // Add New page
  //Appearance Menu
  unset($submenu['themes.php'][5]); // Removes 'Themes'
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

// Remove Meta-Boxes from Posts & Pages Editor Screens
/*
function remove_extra_meta_boxes() {
remove_meta_box( 'postcustom' , 'post' , 'normal' ); // custom fields for posts
remove_meta_box( 'postcustom' , 'page' , 'normal' ); // custom fields for pages
remove_meta_box( 'postexcerpt' , 'post' , 'normal' ); // post excerpts
remove_meta_box( 'postexcerpt' , 'page' , 'normal' ); // page excerpts
remove_meta_box( 'commentsdiv' , 'post' , 'normal' ); // recent comments for posts
remove_meta_box( 'commentsdiv' , 'page' , 'normal' ); // recent comments for pages
remove_meta_box( 'tagsdiv-post_tag' , 'post' , 'side' ); // post tags
remove_meta_box( 'tagsdiv-post_tag' , 'page' , 'side' ); // page tags
remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' ); // post trackbacks
remove_meta_box( 'trackbacksdiv' , 'page' , 'normal' ); // page trackbacks
remove_meta_box( 'commentstatusdiv' , 'post' , 'normal' ); // allow comments for posts
remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' ); // allow comments for pages
remove_meta_box('slugdiv','post','normal'); // post slug
remove_meta_box('slugdiv','page','normal'); // page slug
remove_meta_box('pageparentdiv','page','side'); // Page Parent
}
add_action( 'admin_menu' , 'remove_extra_meta_boxes' );
*/

//Remove Pages Columns
function remove_pages_columns($defaults) {
  unset($defaults['comments']); 
  return $defaults;    
} 
add_filter('manage_pages_columns', 'remove_pages_columns');

/**
 * Add a custom media type filter for different media types in media library
 */
function modify_post_mime_types( $post_mime_types ) {  
  
    //these only show up if one is added 
    //go to wp-includes/functions.php to see all media types 
    
    //applications
    $post_mime_types['application/pdf'] = array( __( 'PDFs' ), __( 'Manage PDFs' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );  
    
    $post_mime_types['application/x-shockwave-flash'] = array( __( 'SWFs' ), __( 'Manage SWFs' ), _n_noop( 'SWF <span class="count">(%s)</span>', 'SWFs <span class="count">(%s)</span>' ) );
    
    $post_mime_types['application/msword'] = array( __( 'DOCs' ), __( 'Manage DOCs' ), _n_noop( 'DOCs <span class="count">(%s)</span>', 'DOCs <span class="count">(%s)</span>' ) );
    
    $post_mime_types['application/vnd.ms-excel'] = array( __( 'XLSs' ), __( 'Manage XLSs' ), _n_noop( 'XLSs <span class="count">(%s)</span>', 'XLSs <span class="count">(%s)</span>' ) );
    
    //video
    $post_mime_types['video/quicktime'] = array( __( 'MOVs' ), __( 'Manage MOVs' ), _n_noop( 'MOVs <span class="count">(%s)</span>', 'MOVs <span class="count">(%s)</span>' ) ); 
    
    $post_mime_types['video/x-flv'] = array( __( 'FLVs' ), __( 'Manage FLVs Movies' ), _n_noop( 'FLVs <span class="count">(%s)</span>', 'FLVs <span class="count">(%s)</span>' ) );
    
    
    $post_mime_types['video/avi'] = array( __( 'AVIs' ), __( 'Manage AVIs' ), _n_noop( 'AVIs <span class="count">(%s)</span>', 'AVIs <span class="count">(%s)</span>' ) ); 
    
    $post_mime_types['video/mpeg'] = array( __( 'MPEGs' ), __( 'Manage MPEGs' ), _n_noop( 'MPEGs <span class="count">(%s)</span>', 'MPEGs <span class="count">(%s)</span>' ) ); 
    
    //audio
    $post_mime_types['audio/midi'] = array( __( 'MIDIs' ), __( 'Manage MIDIs' ), _n_noop( 'MIDIs <span class="count">(%s)</span>', 'MIDIs <span class="count">(%s)</span>' ) ); 
    
    $post_mime_types['audio/wma'] = array( __( 'WMAs' ), __( 'Manage WMAs' ), _n_noop( 'WMAs <span class="count">(%s)</span>', 'WMAs <span class="count">(%s)</span>' ) ); 
    
    $post_mime_types['audio/wav'] = array( __( 'WAVs' ), __( 'Manage WAVs' ), _n_noop( 'WAVs <span class="count">(%s)</span>', 'WAVs <span class="count">(%s)</span>' ) ); 
    
    $post_mime_types['audio/mpeg'] = array( __( 'MPEGs' ), __( 'Manage MPEGs' ), _n_noop( 'MPEGs <span class="count">(%s)</span>', 'MPEGs <span class="count">(%s)</span>' ) ); 

    return $post_mime_types;  
}  
   
add_filter( 'post_mime_types', 'modify_post_mime_types' );  

?>