<?php
/**
 * Includes scripts and styles (through wp_head())
 * Register ALL of your scripts in this function to prevent conflicts...
 */

function register_scripts() {

    if(is_admin()) {
        return;
    }

    $url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'; // The URL to check against
    $test_url = @fopen($url,'r'); // Test parameters

    if($test_url == false)
        $url = bloginfo('template_url').'/js/libs/jquery-1.7.1.min.js';

    define('JQUERY_PATH', $url);

    function load_jQuery() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', JQUERY_PATH, __FILE__, false, '1.7.1', true);
        wp_enqueue_script('jquery');
    }
    add_action('wp_enqueue_scripts', 'load_jQuery');

    wp_register_script('modernizer', get_bloginfo('template_directory') .'/js/modernizr.js','jquery');
    wp_enqueue_script('modernizer');
}

add_action( 'init', 'register_scripts');

?>