<?php get_header(); ?>

  <!-- Left column starts =======================  -->
  <div id="left-column">
    <div id="eoy-2014-charts">
    </div>
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

  <div>
    <div id="relevant-links" class="half-column">
      <h3>Explore</h3>
      <!-- <?php if ( dynamic_sidebar('links-widget') ) : else : endif; ?> -->
      <ul>
        <li><a href="//intangibleblog.files.wordpress.com/2014/03/mozilla-fundraising-infographic-web.png ">2013 End of Year Campaign Infographic</a></li>
        <li><a href="//wiki.mozilla.org/Donate">Donation FAQ</a></li>
        <li><a href="//donate.mozilla.org/?amount=50&presets=100%2C50%2C25%2C15&source=FMO&ref=EOYFR2016&utm_campaign=EOYFR2016&utm_source=FMO&utm_medium=referral&utm_content=FMO_donateTXT">Donate Now</a></li>
      </ul>
    </div>

    <div id="twitter-feeds" class="half-column">
      <h3>On Twitter</h3>
      <?php if ( dynamic_sidebar('twitter-feed-widget') ) : else : endif; ?>
      <a class="twitter-timeline" href="//twitter.com/search?q=%23lovetheweb+OR+%23protecttheweb" data-widget-id="401474842102202368" data-tweet-limit="1" data-chrome="noheader nofooter transparent noborders">Tweets about "#lovetheweb OR #protecttheweb"</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
  </div>




<!-- #content-main -->
<?php get_footer(); ?>
