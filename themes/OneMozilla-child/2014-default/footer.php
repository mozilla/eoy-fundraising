<?php $theme_options = onemozilla_get_theme_options(); ?>

    </main><!-- #content -->
  </div> <!-- /.wrap -->

  <div id="get-moz-updates">
    <div class="wrap">
        Get Mozilla updates
        <div id="go-to-newsletter">
          <a href="//sendto.mozilla.org/page/s/sign-up-for-mozilla/" target="_blank" class="button button-blue">Go to sign up page</a>
        </div>
    </div>
  </div>

</div><!-- /#page -->


<footer id="site-info" role="contentinfo">
  <div class="wrap">
    <p id="foot-logo">
      <a class="top" href="#page"><?php _e('Return to top', 'onemozilla'); ?></a>
      <a class="logo" href="http://mozilla.org" rel="external">Mozilla</a>
    </p>

    <p id="colophon">
      <?php printf(__('Except where otherwise <a href="%1s" rel="external">noted</a>, content on this site is licensed under the <a href="%2s" rel="external license">Creative Commons Attribution Share-Alike License v3.0</a> or any later version.', 'onemozilla'), esc_attr('http://www.mozilla.org/en-US/about/legal.html#site'), esc_attr('http://creativecommons.org/licenses/by-sa/3.0/') ); ?>
    </p>

    <nav id="nav-meta">
      <ul role="navigation">
        <li><a href="https://www.mozilla.org/contact/" rel="external"><?php _e('Contact Us', 'onemozilla'); ?></a></li>
        <li><a href="https://www.mozilla.org/en-US/privacy/" rel="external"><?php _e('Privacy Policy', 'onemozilla'); ?></a></li>
        <li><a href="https://www.mozilla.org/en-US/about/legal.html" rel="external"><?php _e('Legal Notices', 'onemozilla'); ?></a></li>
        <li><a href="https://www.mozilla.org/en-US/legal/fraud-report/index.html" rel="external"><?php _e('Report Trademark Abuse', 'onemozilla'); ?></a></li>
        <li><a href="https://github.com/mozilla/One-Mozilla-blog/" rel="external"><?php _e('Theme Code ', 'onemozilla'); ?></a></li>
      </ul>
    </nav>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
