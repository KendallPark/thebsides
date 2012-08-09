<?php

// Separate out custom each custom taxonomy declaration into unique files inside of the "custom-taxonomies" folder for ease of use - The code below is just a sample of how to create a custom taxonomy

/*
 * Register Custom Taxonomy
 */ 
add_action( 'init', 'create_sample_taxonomy' );
function create_sample_taxonomy() {
 $labels = array(
    'name' => _x( 'Sample Taxonomy', 'taxonomy general name' ),
    'singular_name' => _x( 'Sample Taxonomy', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Sample Taxonomies' ),
    'all_items' => __( 'All Sample Taxonomies' ),
    'parent_item' => __( 'Parent Sample Taxonomy' ),
    'parent_item_colon' => __( 'Parent Sample Taxonomy:' ),
    'edit_item' => __( 'Edit Sample Taxonomy' ),
    'update_item' => __( 'Update Sample Taxonomy' ),
    'add_new_item' => __( 'Add New Sample Taxonomy' ),
    'new_item_name' => __( 'New Sample Taxonomy Name' ),
  ); 	

  register_taxonomy('sampe-taxonomy','sample',array(
    'hierarchical' => true,
    'labels' => $labels
  ));
}
?>