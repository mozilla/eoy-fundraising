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
        <a id="donate-button" href="https://sendto.mozilla.org/page/contribute/givenow-1page?preset=2&source=FMO&ref=EOYFR2014&utm_campaign=EOYFR2014&utm_source=FMO&utm_medium=referral&utm_content=FMO_redbutton" target="_blank" class="button button-red">Donate</a>
      </div>
    <?php endif; ?>
  </header><!-- #masthead -->
