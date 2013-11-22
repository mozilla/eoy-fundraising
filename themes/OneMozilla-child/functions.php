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
 * Register script and stylesheet for graphs.
 *
 */
function graph_script_and_stylesheet() {
    wp_enqueue_style('graph-style', get_stylesheet_directory_uri() . '/graph.css' );
    wp_enqueue_script( 'graph-script', get_stylesheet_directory_uri() . '/graph.js' );
}
add_action('wp_head', 'graph_script_and_stylesheet');



?>