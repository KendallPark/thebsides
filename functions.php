<?php
/**
 * @package WordPress
 * @subpackage #themeName
 */
 
// Remove junk from wp_head()
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
 
/**
 * Includes scripts and styles (through wp_head())
 * Register ALL of your scripts in this function to prevent conflicts...
 */
 
function registerScripts() {
if(!is_admin()){
	// Ckeck if Google's jQuery CDN is working and if it is load their jQuery library, if it is not, fallback to a local jQuery library script…
	$url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'; // The URL to check against
	$test_url = @fopen($url,'r'); // Test parameters
	if($test_url !== false) { // Test if the URL exists
    	function load_external_jQuery() { // Load external file
        	wp_deregister_script( 'jquery' ); // Deregisters the default WordPress jQuery
        	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'); // Register the external file. * be sure to update version numbers whenever there is a newer version of jQuery
        	wp_enqueue_script('jquery'); // Enqueue the external file
    	}
		add_action('wp_enqueue_scripts', 'load_external_jQuery'); // Initiate the function
	} else {
    	function load_local_jQuery() {
        	wp_deregister_script('jquery'); // Initiate the function
        	wp_register_script('jquery', bloginfo('template_url').'/js/libs/jquery-1.7.1.min.js', __FILE__, false, '1.7.1', true); // Register the local file
        	wp_enqueue_script('jquery'); // Enqueue the local file
    	}
		add_action('wp_enqueue_scripts', 'load_local_jQuery'); // Initiate the function
	}
    
    // Load all other scripts you may need...
    wp_register_script('modernizer', get_bloginfo('template_directory') .'/js/modernizr.js','jquery'); // Always include Modernizr when using HTML5
    // *You should always redownload a minified/minimal version of Modernizr when pushing to a live site @ http://modernizr.com/download/
    // *for dev we have loaded a minfied version of the full Modernizr library...
    wp_enqueue_script('modernizer'); // Automatically load Modernizr into the header…
    //wp_register_script( 'ui', get_bloginfo('template_directory') .'/js/jquery-ui-1.8.18.custom.min.js','jquery'); // Load only if you need to use the jQuery UI library
	}
}

add_action( 'init', 'registerScripts' );

if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run themeName_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'themeName_setup' );

if ( ! function_exists( 'themeName_setup' ) ):
/**
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since themeName 1.0
 */
function themeName_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 200, 255, true ); // Normal post thumbnails  
    add_image_size( 'screen-shot', 720, 540 ); // Full size screen

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'themeName' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();
}
endif;

function themeName_filter_wp_title( $title, $separator ) {
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'themeName' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'themeName' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'themeName' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'themeName_filter_wp_title', 10, 2 );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function themeName_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'themeName_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 */
function themeName_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'themeName_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function themeName_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'themeName' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and themeName_continue_reading_link().
 */
function themeName_auto_excerpt_more( $more ) {
	return ' &hellip;' . themeName_continue_reading_link();
}
add_filter( 'excerpt_more', 'themeName_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function themeName_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= themeName_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'themeName_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 */
function themeName_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'themeName_remove_gallery_css' );

if ( ! function_exists( 'themeName_comment' ) ) :
/**
 * Template for comments and pingbacks.
 */

function themeName_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'themeName' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'themeName' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'themeName' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'themeName' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'themeName' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'themeName'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register Custom Post Types
 * The Custom Post Type is just a sample of how to create and register your own CPTs
 */ 
/*
function register_splash_posts() {

	$labels = array(
		'name' => _x('Splash Posts', 'post type general name'),
		'singular_name' => _x('Splash Page', 'post type singular name'),
		'add_new' => _x('Add New', 'Splash Post'),
		'add_new_item' => __('Add New Splash Post'),
		'edit_item' => __('Edit Splash Post'),
		'new_item' => __('New Splash Post'),
		'view_item' => __('View Splash Post'),
		'search_items' => __('Search Splash Post'),
		'not_found' =>  __('No Splash Post Found'),
		'not_found_in_trash' => __('No Splash Post Found In Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		//'menu_icon' => get_stylesheet_directory_uri() . '/eventicon.png', <- include this line to add custom icons for menu item
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail','custom-fields')
	  );

	register_post_type( 'splash' , $args );

}

add_action ('init', 'register_splash_posts');
*/
/**
 * Register custom fields if needed
 * The custom field below is just a sample of how to create and register custom fields…
 */ 

/*add_action("admin_init", "admin_init");
 
function admin_init(){
  add_meta_box("splash_testimonials", "Splash Page Testimonials", "splash_testimonials", "splash", "normal", "low");
}

function splash_testimonials() {
  global $post;
  $custom = get_post_custom($post->ID);
  $htest = $custom["htest"][0];
  $hname = $custom["hname"][0];
  $ctest = $custom["ctest"][0];
  $cname = $custom["cname"][0];
  ?>
  <p><label>Homeowner Testimonial:</label><br />
  <textarea cols="80" rows="2" name="htest"><?php echo $htest; ?></textarea></p>
  <p><label>Homeowner Name:</label><br />
  <textarea cols="80" rows="1" name="hname"><?php echo $hname; ?></textarea></p>
  <p><label>Commercial Owner Testimonial:</label><br />
  <textarea cols="80" rows="2" name="ctest"><?php echo $ctest; ?></textarea></p> 
  <p><label>Commercial Owner Name:</label><br />
  <textarea cols="80" rows="1" name="cname"><?php echo $cname; ?></textarea></p> 
  <?php
}

add_action('save_post', 'save_splash_testimonials');   
  
function save_splash_testimonials(){  
    global $post;    
  
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){  
        return $post_id;  
    }else{  
        update_post_meta($post->ID, "hname", $_POST["hname"]);
        update_post_meta($post->ID, "htest", $_POST["htest"]);
        update_post_meta($post->ID, "cname", $_POST["cname"]);
        update_post_meta($post->ID, "ctest", $_POST["ctest"]);  
    }  
}
*/

/**
 * Remove any unwanted widgets...
 *
 * WP_Widget_Pages                   = Pages Widget
 * WP_Widget_Calendar                = Calendar Widget
 * WP_Widget_Archives                = Archives Widget
 * WP_Widget_Links                   = Links Widget
 * WP_Widget_Meta                    = Meta Widget
 * WP_Widget_Search                  = Search Widget
 * WP_Widget_Text                    = Text Widget
 * WP_Widget_Categories              = Categories Widget
 * WP_Widget_Recent_Posts            = Recent Posts Widget
 * WP_Widget_Recent_Comments         = Recent Comments Widget
 * WP_Widget_RSS                     = RSS Widget
 * WP_Widget_Tag_Cloud               = Tag Cloud Widget
 * WP_Nav_Menu_Widget                = Menus Widget
 */
add_action('admin_menu', 'remove_menus');

function remove_some_wp_widgets(){
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Recent_Comments');
}

add_action('widgets_init','remove_some_wp_widgets', 1);

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 */
function themeName_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'themeName' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'themeName' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'themeName' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'themeName' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'themeName' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'themeName' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'themeName' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'themeName' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'themeName' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'themeName' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'themeName' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'themeName' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running themeName_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'themeName_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 */
function themeName_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'themeName_remove_recent_comments_style' );

if ( ! function_exists( 'themeName_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function themeName_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'themeName' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'themeName' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'themeName_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 */
function themeName_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'themeName' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'themeName' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'themeName' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/**
 * Load custom login logo to login page
 */
function custom_login_logo() {
  echo '<style type="text/css">
    h1 a { background-image:url('.get_bloginfo('template_directory').'/img/login/logo.png) !important; }
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
	echo "<p>Welcome to your custom WordPress site built by Integrity!</p>";
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
  unset($submenu['edit.php'][16]); // Removes Post Tags
  //Media Menu
  //unset($submenu['upload.php'][5]); // View the Media library
  //unset($submenu['upload.php'][10]); // Add to Media library
  //Links Menu
  //unset($submenu['link-manager.php'][5]); // Link manager
  //unset($submenu['link-manager.php'][10]); // Add new link
  //unset($submenu['link-manager.php'][15]); // Link Categories
  //Pages Menu
  //unset($submenu['edit.php?post_type=page'][5]); // The Pages listing
  unset($submenu['edit.php?post_type=page'][10]); // Add New page
  //Appearance Menu
  unset($submenu['themes.php'][5]); // Removes 'Themes'
  //unset($submenu['themes.php'][7]); // Widgets
  unset($submenu['themes.php'][15]); // Removes Theme Installer tab
  //Plugins Menu
  //unset($submenu['plugins.php'][5]); // Plugin Manager
  //unset($submenu['plugins.php'][10]); // Add New Plugins
  unset($submenu['plugins.php'][15]); // Plugin Editor
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