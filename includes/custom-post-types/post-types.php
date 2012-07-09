<?php

// separate out custom post type declarations for ease of use

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

?>