<?php

// Separate out custom post type declarations into unique files inside of the "custom-post-types" folder for ease of use - The code below is just a sample of how to create a CPT

/*
 * Register Custom Post Types
 */ 

function register_sample_posts() {

	$labels = array(
		'name' => _x('Sample Custom Post Type', 'post type general name'),
		'singular_name' => _x('sample Page', 'post type singular name'),
		'add_new' => _x('Add New', 'sample Post'),
		'add_new_item' => __('Add New sample Post'),
		'edit_item' => __('Edit sample Post'),
		'new_item' => __('New sample Post'),
		'view_item' => __('View sample Post'),
		'search_items' => __('Search sample Post'),
		'not_found' =>  __('No sample Post Found'),
		'not_found_in_trash' => __('No sample Post Found In Trash'),
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

	register_post_type( 'sample' , $args );

}

add_action ('init', 'register_sample_posts');

?>