<?php
/*
 * Include custom functions
 *
 * @package WordPress
 * @subpackage #padawan
 */

// Always enqueue your javascript 
require_once('includes/scripts.php');

// Customizes the admin 
require_once('includes/admin-setup.php');

// Core functions of our theme
require_once('includes/theme-setup.php');

// Where all custom post types are registered
require_once('includes/custom-post-types/post-types.php');

// Where all custom meta fields are registered
require_once('includes/custom-meta-fields/meta-fields.php');

// Where all custom taxonomies are registered
require_once('includes/custom-taxonomies/taxonomy.php');

// Where shortcodes are defined 
require_once('includes/shortcodes.php');

// Where all of your custom widgets are created
require_once('includes/register-widgets.php');

// Where all sidebars are created for unique pages 
require_once('includes/register-sidebars.php');

?>