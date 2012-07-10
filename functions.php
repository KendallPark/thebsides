<?php
/*
 * Include custom functions
 *
 * @package WordPress
 * @subpackage #themeName
 */

require_once('includes/scripts.php');
require_once('includes/admin-setup.php');
require_once('includes/theme-setup.php');
require_once('includes/custom-post-types/sample-post-types.php');
require_once('includes/shortcodes.php');
require_once('includes/register-widgets.php');
require_once('includes/register-sidebars.php');
require_once('includes/user-settings.php');


/*  
 * If your theme requires more intense customization include the NHP Theme Options Framework below...
 *
 * More info @ http://leemason.github.com/NHP-Theme-Options-Framework/
 *
 * If you are not going to need this framework, remove the "theme-options.php" and "options" folder for less bloat! :)
 *
 */

//require_once('theme-options.php' );