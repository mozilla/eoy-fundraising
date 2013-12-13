<?php
/*
Template Name: Visualizer
*/
?>

<?php get_header('visualizer'); ?>
    <div id="dashboard-main" role="main">
        <section class="visualization" data-visualization="total-bar">
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

        <section class="visualization" data-visualization="source-bar">
          <h3>Donations by Source</h3>
          <div class="graph-box-container">
            <div id="source-graph-container" data-source-bar-container>
              <div class="column">
                <div class="bar"><div class="above-title"></div><div class="below-title"></div></div>
              </div>
            </div>
          </div>
        </section>

        <section class="visualization image" data-visualization="country-pie" style="background-image:url('//www.evernote.com/shard/s202/sh/b7437622-efe8-4779-be7c-5f6a3e3738bf/5a2422e883a28a1b40a6a4587c284ab4/deep/0/donations_by_locale20131203.png');"></section>
        <section class="visualization image" data-visualization="source-pie" style="background-image:url('//www.evernote.com/shard/s202/sh/ec08f5f9-5127-453c-b369-dd87851e0842/d4e189581e4c0daa5fcf743349383db4/deep/0/Screenshot-12-3-13-11-51-PM.png')"></section>
      </div>

    </div><!-- #content-main -->
<?php get_footer('visualizer'); ?>
