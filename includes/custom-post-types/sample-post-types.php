<?php

// Separate out custom post type declarations into unique files inside of the "custom-post-types" folder for ease of use - The code below is just a sample of how to create a CPT

/**
 * Register Custom Post Types
 * The Custom Post Type is just a sample of how to create and register your own CPTs
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

/**
 * Register custom fields if needed
 * The custom field below is just a sample of how to create and register custom fields…
 */ 

add_action("admin_init", "admin_init");
 
function admin_init(){
  add_meta_box("sample_testimonials", "sample Page Testimonials", "sample_testimonials", "sample", "normal", "low");
}

function sample_testimonials() {
  global $post;
  $custom = get_post_custom($post->ID);
  $htest = $custom["htest"][0];
  $hname = $custom["hname"][0];
  $ctest = $custom["ctest"][0];
  $cname = $custom["cname"][0];
  ?>
  <p><label>Sample Testimonial:</label><br />
  <textarea cols="80" rows="2" name="htest"><?php echo $htest; ?></textarea></p>
  <p><label>Sample Name:</label><br />
  <textarea cols="80" rows="1" name="hname"><?php echo $hname; ?></textarea></p>
  <p><label>Sample Owner Testimonial:</label><br />
  <textarea cols="80" rows="2" name="ctest"><?php echo $ctest; ?></textarea></p> 
  <p><label>Sample Owner Name:</label><br />
  <textarea cols="80" rows="1" name="cname"><?php echo $cname; ?></textarea></p> 
  <?php
}

add_action('save_post', 'save_sample_testimonials');   
  
function save_sample_testimonials(){  
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

?>