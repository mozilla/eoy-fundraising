<?php

    $args = array(
        'post_status' => 'publish',
        'numberposts' => 3,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'suppress_filters' => true );

    // for some reason
    // $latest_post = wp_get_recent_posts( $args, ARRAY_A )[0];
    // only works on localhost but not online
    // workaround:
    $latest_posts = wp_get_recent_posts( $args, ARRAY_A );
    // $post_to_pin = get_post(548, ARRAY_A);
    // array_unshift($latest_posts,$post_to_pin);

    foreach($latest_posts as $latest_post) {
      displayBlogPreview($latest_post);
    }

?>
