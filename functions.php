<?php
/*
 * Include custom functions
 *
 * @package WordPress
 * @subpackage #rezSTL
 */

require_once('includes/scripts.php');
require_once('includes/admin-setup.php');
require_once('includes/theme-setup.php');
require_once('includes/custom-post-types/post-types.php');
require_once('includes/custom-meta-fields/meta-fields.php');
require_once('includes/custom-taxonomies/taxonomy.php');
require_once('includes/shortcodes.php');
require_once('includes/register-widgets.php');
require_once('includes/register-sidebars.php');
require_once('includes/user-settings.php');


/*  
 * If your theme requires more intense customization include the NHP Theme Options Framework below...
 *
 * More info @ http://leemason.github.com/NHP-Theme-Options-Framework/
 *
 * If you are not going to need this framework, remove the "theme-options.php" and "options/" folder for less bloat! :)
 *
 */

//require_once('theme-options.php' );

/*
 * Development Helper Functions/wp-config Settings...
 */
 
// Custom Log Messages - Call this function whenever you want to log a message to the debug log ex->  log_me('This function works!'); 
/*
function log_me($message) {
    if (WP_DEBUG === true) {
        if (is_array($message) || is_object($message)) {
            error_log(print_r($message, true));
        } else {
            error_log($message);
        }
    }
}
*/ 
  
// Turn on WP/PHP debugging! ADD THESE TO YOUr CONFIG FILE! NOT FUNCTIONS :)
/*
// Enable WP_DEBUG mode
define('WP_DEBUG', true);

// Enable Debug logging to the /wp-content/debug.log file
define('WP_DEBUG_LOG', true);

// Disable display of errors and warnings 
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors',0);

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define('SCRIPT_DEBUG', true);
*/

// Disable WP Admin editors (Always add this to your wp-config file!)
//define( 'DISALLOW_FILE_EDIT', true); 

//Dynamically set WP_SITEURL based on $_SERVER['SERVER_NAME'] - Useful for moving sites from server to server
//define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/path/to/wordpress');

//Dynamically set WP_HOME based on $_SERVER['SERVER_NAME']
//define('WP_HOME', 'http://' . $_SERVER['SERVER_NAME'] . '/path/to/wordpress');

// Modify post auto-save interval 
//define('AUTOSAVE_INTERVAL', 160 );  // seconds

// Specify the Number of Post Revisions
//define('WP_POST_REVISIONS', 3);

// Disable Post Revisions
//define('WP_POST_REVISIONS', false );
