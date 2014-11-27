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
    foreach(wp_get_recent_posts( $args, ARRAY_A ) as $latest_post) {
        $the_post_date = explode("-", substr($latest_post["post_date"],0,10));
        $the_post_year = $the_post_date[0];
        $the_post_month = substr( date("F",mktime(0,0,0,$the_post_date[1])), 0, 3);
        $the_post_day = $the_post_date[2];
        $the_post_url = get_permalink($latest_post["ID"]);
        $the_post_title = $latest_post["post_title"];
        $the_author = get_user_by('id',$latest_post["post_author"]);
        $the_author_page = get_author_posts_url($latest_post["post_author"]);
        $the_author_name = $the_author->display_name;
        $word_cap = 100;
        if ( $latest_post["post_excerpt"] ){
          $the_excerpt = $latest_post["post_excerpt"];
        }else{
          $the_excerpt = $latest_post["post_content"];
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
