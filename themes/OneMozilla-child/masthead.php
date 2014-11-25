  <header id="masthead" role="banner" <?php if (get_header_image()) : ?>class="image"<?php endif; ?>>
    <?php if ( (is_front_page()) && ($paged < 1) ) : ?>
    <?php else : ?>
      <hgroup>
        <h1 id="site-title"><a href="<?php echo esc_url( home_url('/') ); ?>" rel="home" title="<?php _e('Go to the front page', 'onemozilla'); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></h1>
        <?php if (get_bloginfo('description','display')) : ?>
          <div id="site-description"><?php echo esc_attr( get_bloginfo('description', 'display') ); ?></div>
        <?php endif; ?>
      </hgroup>
      <div class="donate">
        <a id="donate-button" href="https://sendto.mozilla.org/page/contribute/EOYFR2013-newdefault?source=viewsource_redbutton" target="_blank" class="button button-red">Donate</a>
      </div>
    <?php endif; ?>
  </header><!-- #masthead -->
