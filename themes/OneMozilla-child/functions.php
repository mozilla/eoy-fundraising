<?php
/**
 * Register View Blog and widgetized areas.
 *
 */
function view_blog_widgets_init() {
  register_sidebar( array(
    'name' => 'View Source Fundraising Section',
    'id' => 'view-blog-widget',
    'before_widget' => '<div id="view-blog-widget">',
    'after_widget' => '</div>'
  ) );
}
add_action( 'widgets_init', 'view_blog_widgets_init' );





/**
 * Register Polls and widgetized areas.
 *
 */
function polls_widgets_init() {
  register_sidebar( array(
    'name' => 'Polls Section',
    'id' => 'polls-widget',
    'before_widget' => '<div id="polls-widget">',
    'after_widget' => '</div>'
  ) );
}
add_action( 'widgets_init', 'polls_widgets_init' );



/**
 * Register Older Blog Post and widgetized areas.
 *
 */
function older_blog_post_widgets_init() {
  register_sidebar( array(
    'name' => 'Older Blog Post Section',
    'id' => 'older-blog-post-widget',
    'before_widget' => '<div id="older-blog-post-widget">',
    'after_widget' => '</div>'
  ) );
}
add_action( 'widgets_init', 'older_blog_post_widgets_init' );



/**
 * Register Twitter Feed and widgetized areas.
 *
 */
function twitter_feed_widgets_init() {
  register_sidebar( array(
    'name' => 'Twitter Feeds Section',
    'id' => 'twitter-feed-widget',
    'before_widget' => '<div id="twitter-feed-widget">',
    'after_widget' => '</div>'
  ) );
}
add_action( 'widgets_init', 'twitter_feed_widgets_init' );



/**
 * Register Links and widgetized areas.
 *
 */
function links_widgets_init() {
  register_sidebar( array(
    'name' => 'Links Section',
    'id' => 'links-widget',
    'before_widget' => '<div id="links-widget">',
    'after_widget' => '</div>'
  ) );
}
add_action( 'widgets_init', 'links_widgets_init' );



/**
 * Register script and stylesheet for graphs.
 *
 */
function graph_script_and_stylesheet() {
    wp_enqueue_style('graph-style', get_stylesheet_directory_uri() . '/graph.css' );
    wp_enqueue_script( 'graph-script', get_stylesheet_directory_uri() . '/graph.js' );
}
add_action('wp_head', 'graph_script_and_stylesheet');


/**
 * Register script and stylesheet for 2014 EOY Version.
 *
 */
function eoy_2014_theme_scripts_and_stylesheets() {
  // totalizer
  wp_enqueue_style( 'odometer-style', get_stylesheet_directory_uri() . '/css/odometer-theme-minimal.css' );
  wp_enqueue_script( 'odometer-script', get_stylesheet_directory_uri() . '/js/odometer.min.js', array(), '', true );
  wp_enqueue_script( 'totalizer-script', get_stylesheet_directory_uri() . '/js/totalizer.js', array('odometer-script'), '', true );

  // visualizations
  wp_enqueue_style( 'eoy-2014-charts-style', get_stylesheet_directory_uri() . '/bower_components/mofo-eoy-charts/charts.css' );
  wp_enqueue_script( 'jquery-script', get_stylesheet_directory_uri() . '/js/jquery-2.1.1.min.js', array(), '', true );
  wp_enqueue_script( 'd3-script', get_stylesheet_directory_uri() . '/bower_components/d3/d3.min.js', array('jquery-script'), '', true );
  wp_enqueue_script( 'eoy-2014-charts-script', get_stylesheet_directory_uri() . '/bower_components/mofo-eoy-charts/charts.js', array('d3-script'), '', true );

  wp_enqueue_script( 'ui-script', get_stylesheet_directory_uri() . '/js/ui.js', array('eoy-2014-charts-script'), '', true );
}
add_action('wp_enqueue_scripts', 'eoy_2014_theme_scripts_and_stylesheets');


?>
