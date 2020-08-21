<?php /* Template Name: Homepage Template*/ ?>
<?php get_header(); ?>

<div id="mainbody" role="main" aria-label="mainbody">
  <?php if (is_front_page()) {
        $homealertargs = array(
          'category_name'		=>	'home-alert',
          'posts_per_page'	=>	'1'
        );
        $homealertquery = new WP_Query($homealertargs);
        if ( $homealertquery->have_posts() ) {
          get_template_part( 'parts/part', 'homealert' );
        }
  } ?>
  <div class="ui middle aligned stackable grid container">
      <div id="left-masthead" class="eleven wide column">
        <?php get_template_part('parts/home','leftmasthead'); ?>
      </div>

      <div id="right-masthead" class="five wide column ui cards">
        <?php get_template_part('parts/home','rightmasthead'); ?>

      </div><!-- END RIGHT MASTHEAD -->

  </div><!-- END UI CONTAINER -->


  <div id="employee-relations" class="ui grid">

    <div class="ui container headline">
      <h2>Employee Relations</h2>
      <hr class="star">
    </div>

    <div class="ui container cards">
        <div id="employee-month" class="column ui card">
          <?php get_template_part('parts/home','employeemonth'); ?>
        </div><!-- END COLUMN -->

        <div id="milestones" class="column ui card">
          <?php get_template_part('parts/home','milestones'); ?>
        </div><!-- END COLUMN -->

        <div id="wellness" class="column ui card">
          <?php get_template_part('parts/home','wellness'); ?>
        </div><!-- END COLUMN -->

    </div><!-- END GRID CARDS CONTAINER -->
  </div><!-- END EMPLOYEE RELATIONS GRID -->

  <div id="events-recent-news" class="ui grid">

    <div class="ui container headline">
      <h2>Events & Recent News</h2>
      <hr class="star">
    </div>

    <div class="ui container cards">
        <div id="headlines" class="column ui card">
          <?php get_template_part('parts/home','headlines'); ?>
        </div>

        <div id="ip-outnabout" class="column ui card">
          <?php get_template_part('parts/home','ip-outnabout'); ?>
        </div>

        <div id="difference" class="column ui card">
          <?php get_template_part('parts/home','difference'); ?>
        </div>

    </div>

  </div>

  <div id="letstalk" class="ui grid">
    <?php get_template_part('parts/home','letstalk'); ?>
  </div>

</div>
</div><!-- END UI GRID -->


<?php get_footer(); ?>
