<?php
/*
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage #padawan
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory')?>/favicon.ico">
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Fallback CSS Styles for IE - Use only if needed! -->
<!--[if IE 8]>
<link rel="stylesheet" href="/IE8styles.css" />
<![endif]-->

<?php

	/* 
	 * Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 *
	 */

	wp_head();
?>
</head>
<!-- Sets body id to be unique on each page type -->
<body id="<?php echo basename(get_permalink()); ?>" <?php body_class(); ?>>

	<header>
	<div id="header-container">
	<div class="container">
		<div class="row">
			<div class="span4">
		
				<h1>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
				
				<p><?php bloginfo( 'description' ); ?></p>
			</div> <!-- .span4 -->
			
			<div class="span6">
				<div id="access">
			  		<!--Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff -->
					<a id="skip" href="#content" title="<?php esc_attr_e( 'Skip to content', 'padawan' ); ?>"><?php _e( 'Skip to content', 'padawan' ); ?></a>
					<!-- Sets primary navigation and use wp_page_menu as a fall back -->
					<nav role="navigation"><?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?></nav>
				</div><!-- #access -->
			</div> <!-- .span6 -->
	
		
		</div> <!-- .row -->
	</div> <!-- .container -->
	</div> <!-- #header-container -->
	</header>