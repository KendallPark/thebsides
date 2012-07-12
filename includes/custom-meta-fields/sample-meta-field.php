<?php

// Separate out custom meta field declarations into unique files inside of the "custom-meta-fields" folder for ease of use - The code below is just a sample of how to create a custom meta field

/**
 * Register Custom Meta Field
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