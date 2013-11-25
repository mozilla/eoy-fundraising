<?php
/*
Template Name: All Posts
*/
// Count search results
global $wp_query;

$wp_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'DESC', 'paged' => $paged ));

$total_results = $wp_query->found_posts;

get_header(); ?>

  <div id="content-main" class="main" role="main">

  <?php if ( $wp_query->have_posts() ) : ?>

    <?php if (fc_show_posts_nav()) : ?>
    <nav class="nav-paging top">
      <ul role="navigation">
        <?php if ( $paged < $wp_query->max_num_pages ) : ?><li class="prev"><?php next_posts_link(__('Older posts','onemozilla')); ?></li><?php endif; ?>
        <?php if ( $paged > 1 ) : ?><li class="next"><?php previous_posts_link(__('Newer posts','onemozilla')); ?></li><?php endif; ?>
      </ul>
    </nav>
    <?php endif; ?>

    <?php /* Start the Loop */ ?>
    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <?php get_template_part( 'content', 'summary' ); ?>
    <?php endwhile; ?>

    <?php if (fc_show_posts_nav()) : ?>
    <nav class="nav-paging bottom">
      <ul role="navigation">
        <?php if ( $paged < $wp_query->max_num_pages ) : ?><li class="prev"><?php next_posts_link(__('Older posts','onemozilla')); ?></li><?php endif; ?>
        <?php if ( $paged > 1 ) : ?><li class="next"><?php previous_posts_link(__('Newer posts','onemozilla')); ?></li><?php endif; ?>
      </ul>
    </nav>
    <?php endif; ?>

  <?php endif; ?>

  </div><!-- #content-main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
