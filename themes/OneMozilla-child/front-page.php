<?php get_header(); ?>
    <div id="thankyou-message">
      <div data-close="true" class="close">&times;</div>
      <p class="title">Success! Thanks for donating to our year-end fundraising campaign.</p>
      <div id="thankyou-content-wrapper">
        <div id="message-wrapper"><p class="message">Ready to do more? Check out what our fundraising efforts look like from planning to testing to real-time results. And then help shape our campaign by joining the conversation.</p></div>
        <div id="showme-wrapper"><a id="showme-button" class="button button-red" data-close="true"><b>Show me!</b></a></div>
      </div>
    </div>

    <div id="dashboard-main" role="main">

      <div class="row" id="second-row">
        <section id="view-blog-section" class="white-bg">
          <h3>View Source Fundraising Blog</h3>
          <?php if ( dynamic_sidebar('view-blog-widget') ) : else : endif; ?>
          <div id="latest-blog-summary">
              <?php get_template_part( 'latest-post' ); ?>
          </div>
        </section>

        <section id="older-blog-post-section" class="white-bg">
          <h3>Older Blog Posts</h3>
          <?php if ( dynamic_sidebar('older-blog-post-widget') ) : else : endif; ?>
          <div class="archive-link"><a href="/all-posts/">See all posts</a></div>
        </section>

        <div class="sub-row">
          <section id="twitter-feeds" class="white-bg two-columns">
            <h3>Twitter Feeds</h3>
            <?php if ( dynamic_sidebar('twitter-feed-widget') ) : else : endif; ?>
            <a class="twitter-timeline" href="//twitter.com/search?q=%23lovetheweb+OR+%23protecttheweb" data-widget-id="401474842102202368" data-tweet-limit="1" data-chrome="noheader nofooter transparent noborders">Tweets about "#lovetheweb OR #protecttheweb"</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          </section>

          <section id="links" class="white-bg two-columns">
            <h3>Links</h3>
            <?php if ( dynamic_sidebar('links-widget') ) : else : endif; ?>
          </section>
        </div>
      </div>



    </div><!-- #content-main -->
<?php get_footer(); ?>
