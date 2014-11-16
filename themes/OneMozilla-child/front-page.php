<?php get_header(); ?>

  <!-- Left column starts =======================  -->
  <div id="left-column">
    <section>
      <h3>Donors by Country</h3>
      <div style="height: 450px;border: 1px solid #eee; color: #888;">placeholder for the visualization</div>
    </section>

    <section>
      <h3>Donors by Source</h3>
      <div style="height: 450px;border: 1px solid #eee; color: #888;">placeholder for the visualization</div>
    </section>
  </div>
  <!-- Left column ends =======================  -->

  <!-- Right column starts =======================  -->
  <div id="right-column">
    <section>
      <h3>Latest Blog Posts</h3>
      <?php get_template_part( 'latest-post' ); ?>
    </section>

    <section>
      <h3>Older Blog Posts</h3>
      <?php if ( dynamic_sidebar('older-blog-post-widget') ) : else : endif; ?>
      <div class="archive-link"><a href="/all-posts/">See all blog posts</a></div>
    </section>

  </div>
  <!-- Right column ends =======================  -->

  <div id="get-moz-updates">
    <p>Get important updates about Mozilla’s work</p>
    <!-- <div class="btn-container"> -->
      <a href="//sendto.mozilla.org/page/s/sign-up-for-mozilla/" target="_blank" class="button button-red">Sign up</a>
    <!-- </div> -->
  </div>

  <div>
    <div id="relevant-links" class="half-column">
      <h3>Explore</h3>
      <?php if ( dynamic_sidebar('links-widget') ) : else : endif; ?>
    </div>

    <div id="twitter-feeds" class="half-column">
      <h3>On Twitter</h3>
      <?php if ( dynamic_sidebar('twitter-feed-widget') ) : else : endif; ?>
      <a class="twitter-timeline" href="//twitter.com/search?q=%23lovetheweb+OR+%23protecttheweb" data-widget-id="401474842102202368" data-tweet-limit="1" data-chrome="noheader nofooter transparent noborders">Tweets about "#lovetheweb OR #protecttheweb"</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
  </div>






    </div><!-- #content-main -->
<?php get_footer(); ?>
