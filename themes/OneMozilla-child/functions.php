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
  // visualizations
  wp_enqueue_style( 'eoy-2014-charts-style', get_stylesheet_directory_uri() . '/bower_components/mofo-eoy-charts/charts.css' );
  wp_enqueue_script( 'jquery-script', get_stylesheet_directory_uri() . '/js/jquery-2.1.1.min.js', array(), '', true );
  wp_enqueue_script( 'd3-script', get_stylesheet_directory_uri() . '/bower_components/d3/d3.min.js', array('jquery-script'), '', true );
  wp_enqueue_script( 'eoy-2014-charts-script', get_stylesheet_directory_uri() . '/bower_components/mofo-eoy-charts/charts.js', array('d3-script'), '', true );

  wp_enqueue_script( 'ui-script', get_stylesheet_directory_uri() . '/js/ui.js', array('eoy-2014-charts-script'), '', true );
}
add_action('wp_enqueue_scripts', 'eoy_2014_theme_scripts_and_stylesheets');


/**
 * Show blog post preview
 *
 */
function displayBlogPreview($the_post) {
  $the_post_date = explode("-", substr($the_post["post_date"],0,10));
  $the_post_year = $the_post_date[0];
  $the_post_month = substr( date("F",mktime(0,0,0,$the_post_date[1])), 0, 3);
  $the_post_day = $the_post_date[2];
  $the_post_url = get_permalink($the_post["ID"]);
  $the_post_title = $the_post["post_title"];
  $the_author = get_user_by('id',$the_post["post_author"]);
  $the_author_page = get_author_posts_url($the_post["post_author"]);
  $the_author_name = $the_author->display_name;
  $word_cap = 100;
  if ( $the_post["post_excerpt"] ){
    $the_excerpt = $the_post["post_excerpt"];
  }else{
    $the_excerpt = $the_post["post_content"];
  }
  $the_excerpt = strip_shortcodes(strip_tags( apply_filters('the_content', $the_excerpt), "<a><br><p>" ));
  if ( str_word_count($the_excerpt) > $word_cap ){
    $continue_reading_tag = "Continue reading";
  }
  // show the first x words
  $the_excerpt = explode(" ", $the_excerpt);
  $the_excerpt = implode(" ",array_slice($the_excerpt,0,$word_cap));
  // add wrapper
  echo "<div class='blog-preview'>";
  // post date
  echo "<div class='blog-post-date'>";
  echo "<div class='month'>" . $the_post_month . "</div>";
  echo "<div class='day'>" . $the_post_day . "</div>";
  echo "<div class='year'>" . $the_post_year . "</div>";
  echo "</div>";
  // post title
  echo "<div class='blog-preview-header'>";
  echo "<a class='blog-title' href='" . $the_post_url . "' title='" . esc_attr($the_post_title)."' >" . $the_post_title . "</a> ";
  // post author
  echo "<div class='author'>". $the_author_name . "</div> ";
  echo "</div>";
  echo "<div class='clear'></div>";
  // post excerpt
  echo "<div class='blog-excerpt'>" . $the_excerpt;
  if ( $continue_reading_tag ){
    echo "... ";
    echo '<a href="' . $the_post_url . '" >' . $continue_reading_tag .'</a>';
  }
  echo "</div>";
  // end
  echo "</div>";
}

?>
