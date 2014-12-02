<?php $theme_options = onemozilla_get_theme_options(); ?>

    </main><!-- #content -->
  </div> <!-- /.wrap -->

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

<script src="//www.mozilla.org/tabzilla/media/js/tabzilla.js"></script>

<?php wp_footer(); ?>

<script>
  // some janky way to update the totalizer via WP Dashboard Editor
  (function() {
    // Novemeber total payment received
    var NOV_TOTAL = 362152;
    var updateTotalizer = function() {
      var totalizerSelector = ".odometer";
      if ( document.querySelector(totalizerSelector) ) {
        // *** timestamp updated, Date.now()): 1417545478512
        // *** update the current December total below, integer only
        var decCurrentTotal = 58995;
        var currTotal = NOV_TOTAL + decCurrentTotal;
        if ( typeof currTotal === 'number' ) {
          document.querySelector(totalizerSelector).textContent = NOV_TOTAL + decCurrentTotal;
        } else {
          document.querySelector("#totalizer-container").style.display = "none";
          document.querySelector(".button.button-red").style.marginTop = "45px";
        }
      }
    }
    // to start the animation
    setTimeout(updateTotalizer, 10); // in milliseconds
  })();
</script>

</body>
</html>
