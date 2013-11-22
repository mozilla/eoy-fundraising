<?php 
    $args = array(
        'numberposts' => 1,
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
        $the_author_avatar = get_avatar( $latest_post["post_author"], 20);
        $the_author_page = get_author_posts_url($latest_post["post_author"]);
        $the_author_name = $the_author->display_name;
        $the_num_comments = $latest_post["comment_count"];
        if ( $latest_post["post_excerpt"] ){
          $the_excerpt = strip_tags( $latest_post["post_excerpt"] );
        }else{
          $the_excerpt = strip_tags( $latest_post["post_content"] );
        }
        if ( str_word_count($the_excerpt) > 50 ){
          $continue_reading_tag = "Continue reading";
        }
        // show the first 50 words
        $the_excerpt = explode(" ", $the_excerpt);
        $the_excerpt = implode(" ",array_slice($the_excerpt,0,50));
        // post date
        echo "<div id='blog-post-date'>";
        echo "<div id='month'>" . $the_post_month . "</div>";
        echo "<div id='day'>" . $the_post_day . "</div>";
        echo "<div id='year'>" . $the_post_year . "</div>";
        echo "</div>";
        // post title
        echo "<a id='blog-title' href='" . $the_post_url . "' title='" . esc_attr($the_post_title)."' >" . $the_post_title . "</a> ";
        echo "<div class='clear'></div>";
        // post author
        echo "<div id='author'>" . "<a href='" . $the_author_page . "' title='" . esc_attr($the_author_name)."' >" ;
        echo $the_author_avatar;
        echo $the_author_name . "</a> ";
        echo "</div>";
        // post comments
        echo "<div id='num-comments'><a href='" . $the_post_url . "#comments'>" .  $the_num_comments . "</a></div>";
        echo "<div class='clear'></div>";
        // post excerpt
        echo "<div id='blog-excerpt'>" . $the_excerpt;
        if ( $continue_reading_tag ){
          echo "... ";
          echo '<a href="' . $the_post_url . '" >' . $continue_reading_tag .'</a>';
        }
        echo "</div>";

        break;
    }
    
?>