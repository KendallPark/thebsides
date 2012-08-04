<?php

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 */
function rezSTL_widgets_init() {
    // Area 1, located at the top of the sidebar.
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'rezSTL' ),
        'id' => 'primary-widget-area',
        'description' => __( 'The primary widget area', 'rezSTL' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'rezSTL' ),
        'id' => 'secondary-widget-area',
        'description' => __( 'The secondary widget area', 'rezSTL' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

}
/** Register sidebars by running rezSTL_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'rezSTL_widgets_init' );

?>