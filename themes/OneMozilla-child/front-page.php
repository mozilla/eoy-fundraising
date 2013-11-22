<?php get_header(); ?>

    <div id="dashboard-main" role="main">
      <div class="row" id="first-row">
        <section class="white-bg two-columns">
        <h3>Total so far: <span id="period-graph-title"></span></h3>
        <div class="graph-box-container">
          <div id="period-graph-container">
            <div class="top graph-amount-marker">$100</div>
            <div class="bottom graph-amount-marker">$0</div>
            <div class="spacing-container" data-period-bar-container>
              <div class="column">
                <div class="bar"><div class="above-title"></div><div class="below-title"></div></div>
              </div>
            </div>
          </div>
      </div>
      </section>

      <section class="white-bg two-columns">
        <h3>Donations by Source</h3>
        <div class="graph-box-container">
          <div id="source-graph-container" data-source-bar-container>
            <div class="column">
              <div class="bar"><div class="above-title"></div><div class="below-title"></div></div>
            </div>
          </div>
      </div>
      </section>
      </div>

      <div class="row" id="second-row">
        <section id="view-blog-section" class="white-bg">
          <h3>View Source Fundraising Blog</h3>
          <?php if ( dynamic_sidebar('view-blog-widget') ) : else : endif; ?>
          <div id="latest-blog-summary">
              <?php get_template_part( 'latest-post' ); ?>
          </div>
        </section>

        <section id="poll-section" class="white-bg">
          <h3>You Be the Fundraiser Poll</h3>
          <?php if ( dynamic_sidebar('polls-widget') ) : else : endif; ?>
        </section>

        <section id="older-blog-post-section" class="white-bg">
          <h3>Older Blog Posts</h3>
          <?php if ( dynamic_sidebar('older-blog-post-widget') ) : else : endif; ?>
        </section>

        <div class="sub-row">
          <section id="twitter-feeds" class="white-bg two-columns">
            <h3>Twitter Feeds</h3>
            <?php if ( dynamic_sidebar('twitter-feed-widget') ) : else : endif; ?>
            <a class="twitter-timeline" href="https://twitter.com/search?q=%23lovetheweb+OR+%23protecttheweb" data-widget-id="401474842102202368" data-tweet-limit="1" data-chrome="noheader nofooter transparent noborders">Tweets about "#lovetheweb OR #protecttheweb"</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          </section>

          <section id="links" class="white-bg two-columns">
            <h3>Links</h3>
            <a href="https://sendto.mozilla.org/" target="_blank">Donate Today</a><br/>
            <!-- remember to pass the right page_id: (staging) 20; -->
            <a href=<?php echo get_page_uri('20') ?> target="_blank">Campaign Overview</a><br/>
            <a href="http://www.mozilla.org/en-US/about/manifesto/" target="_blank">Mozilla Manifesto</a><br/>
            <a href="" target="">What is View-source Fundraising</a>
          </section>
        </div>
      </div>



    </div><!-- #content-main -->
<?php get_footer(); ?>