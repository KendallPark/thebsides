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
	<link href='http://fonts.googleapis.com/css?family=Lato|Revalia' rel='stylesheet' type='text/css'>
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
				<div class="span5">
			
					<h1 id="title">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
					
					<p id="titleline"><?php bloginfo( 'description' ); ?></p>
				</div> <!-- .span4 -->
				
				<div class="span5">
						<!-- Sets primary navigation and use wp_page_menu as a fall back -->
						<nav role="navigation">
						<div id="main-nav">
								<?php
								wp_nav_menu(
									array (
										'theme_location' => 'primary',
										'container_class' => 'menu-header',
										'items_wrap' => '<ul id="%1$s" class="%2$s nav nav-pills">%3$s</ul>',
										)
									);
								?>	
							
						</div> <!-- .navbar -->
						<div id="secondary-nav">
							<?php 
								if (is_page("Resources") || is_child(get_ID_by_page_name("Resources")) ) {
									wp_nav_menu(
										array ('theme_location' => 'resources',
											'container_class' => 'menu-header',
										)
									);
								} else if (is_page("Us") || is_child(get_ID_by_page_name("Us")) ) {
									wp_nav_menu(
										array ('theme_location' => 'us',
											'container_class' => 'menu-header',
										)
									);
								}
							?>
						</div> <!-- #secondardy-nav-->
						</nav>
				</div> <!-- .span6 -->
		
			
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- #header-container -->
	</header>