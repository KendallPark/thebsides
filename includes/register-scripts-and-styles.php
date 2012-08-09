<?php
function registerScripts() {

	if(!is_admin()) {

		// google @font face
		wp_register_style('googleFont', 'http://fonts.googleapis.com/css?family=Lato:400,700');
		wp_enqueue_style('googleFont');

		// Stylesheet compiled from /less files
		wp_register_style('Bootstrap', get_bloginfo('template_directory') . '/css/bootstrap.css');
		wp_enqueue_style('Bootstrap');

		wp_deregister_script( 'jquery' ); // Deregisters the default WordPress jQuery
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
        wp_enqueue_script('jquery'); // Enqueue the external file

        wp_register_script( 'ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js','jquery');

		wp_register_script('modernizer', get_bloginfo('template_directory') .'/js/modernizr.js','jquery');
		wp_enqueue_script('modernizer'); // Load Modernizr into the header site wide

		wp_register_script('slider', get_bloginfo('template_directory') .'/js/slider.js','jquery');

		// Js plugins that come with bootstrap.. comment out un-needed features

		// Alerts
		//wp_register_script('Balert', get_bloginfo('template_directory') .'/js/bootstrap-alert.js','jquery', '', true);
		//wp_enqueue_script('Balert');

		// Button
		wp_register_script('Bbutton', get_bloginfo('template_directory') .'/js/bootstrap-button.js','jquery', '', true);
		wp_enqueue_script('Bbutton');

		// Transition
		wp_register_script('Btransition', get_bloginfo('template_directory') .'/js/bootstrap-transition.js','jquery', '', true);
		wp_enqueue_script('Btransition');

		// Carousel
		//wp_register_script('Bcarousel', get_bloginfo('template_directory') .'/js/bootstrap-carousel.js','jquery', '', true);
		//wp_enqueue_script('Bcarousel');

		// Collapse
		//wp_register_script('Bcollapse', get_bloginfo('template_directory') .'/js/bootstrap-collapse.js','jquery', '', true);
		//wp_enqueue_script('Bcollapse');

		// Dropdown
		wp_register_script('Bdropdown', get_bloginfo('template_directory') .'/js/bootstrap-dropdown.js','jquery', '', true);
		wp_enqueue_script('Bdropdown');

		// Modal
		//wp_register_script('Bmodal', get_bloginfo('template_directory') .'/js/bootstrap-modal.js','jquery', '', true);
		//wp_enqueue_script('Bmodal');

		// Popover
		//wp_register_script('Bpopover', get_bloginfo('template_directory') .'/js/bootstrap-popover.js','jquery', '', true);
		//wp_enqueue_script('Bpopover');

		// Scrollspy
		//wp_register_script('Bscrollspy', get_bloginfo('template_directory') .'/js/bootstrap-scrollspy.js','jquery', '', true);
		//wp_enqueue_script('Bscrollspy');

		// Tabs
		//wp_register_script('Btab', get_bloginfo('template_directory') .'/js/bootstrap-tab.js','jquery', '', true);
		//wp_enqueue_script('Btab');

		// Tooltip
		//wp_register_script('Btooltip', get_bloginfo('template_directory') .'/js/bootstrap-tooltip.js','jquery', '', true);
		//wp_enqueue_script('Btooltip');

		// Type ahead
		//wp_register_script('Btypeahead', get_bloginfo('template_directory') .'/js/bootstrap-typeahead.js','jquery', '', true);
		//wp_enqueue_script('Btypeahead');

		// main js functions
		wp_register_script('main', get_bloginfo('template_directory') .'/js/main.js','jquery', '', true);
		wp_enqueue_script('main'); // Load Modernizr into the header site wide

	}
}

add_action( 'init', 'registerScripts' );

?>