<?php
/**
 * Includes scripts and styles (through wp_head())
 * Register ALL of your scripts in this function to prevent conflicts...
 */

function register_scripts() {

    if(is_admin()) {
        return;
    }

    define_jquery_path();

    wp_deregister_script('jquery'); //deregistering jquery from wordpress

    register_and_enque("jquery", JQUERY_PATH);
    register_and_enque('modernizer', get_bloginfo('template_directory') .'/js/modernizr.js','jquery');

}

add_action( 'init', 'register_scripts');


function register($name, $path) {
    wp_register_script($name, $path);
}

function register_and_enque($name, $path) {
    register($name, $path);
    wp_enqueue_script($name);
}

function define_jquery_path() {
    $url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'; // The URL to check against
    $test_url = @fopen($url,'r'); // Test parameters

    if($test_url == false)
        $url = bloginfo('template_url').'/js/libs/jquery-1.7.1.min.js';

    define('JQUERY_PATH', $url);
}

?>