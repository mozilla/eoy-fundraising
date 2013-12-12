<?php get_header(); ?>
    <div id="thankyou-message">
      <div data-close="true" class="close">&times;</div>
      <p class="title">Success! Thanks for donating to our year-end fundraising campaign.</p>
      <p class="message">Ready to do more? Check out what our fundraising efforts look like from planning to testing to real-time results. And then help shape our campaign by joining the conversation.</p>
      <p class="message"><a data-close="true"><b>Show me!</b></a></p>
    </div>

    <div id="dashboard-main" role="main">
      <div class="row" id="first-row">
        <section class="white-bg two-columns">
        <h3>EOY Campaign Total: <span id="period-graph-title"></span></h3>
        <div class="graph-box-container">
          <div id="period-graph-container">
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
            <a href="//sendto.mozilla.org/page/contribute/EOYFR2013-newdefault?source=viewsource_bottom_link">Donate Today</a><br/>
            <a href="//fundraising.mozilla.org/campaign-overview/">Campaign Overview</a><br/>
            <a href="//www.mozilla.org/en-US/about/manifesto/">Mozilla Manifesto</a><br/>
            <a href="//fundraising.mozilla.org/what-is-view-source-fundraising/">What is View-source Fundraising</a>
          </section>
        </div>
      </div>



    </div><!-- #content-main -->
<?php get_footer(); ?>
