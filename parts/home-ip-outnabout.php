<div class="ui divider hidden"></div>
<a href="<?php echo get_site_url(); ?>/out-and-about/">
  <img class="ui centered image fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/out-and-about-banner.jpg" alt="Out & About Calendar">
</a>

<div class="ui divider"></div>
<a href="<?php echo get_site_url(); ?>/infection-prevention-corner/">
  <img class="ui centered image fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/infection-prevention-banner.jpg" alt="Infection Prevention">
</a>

<div class="ui divided selection list articles">
  <?php
    $args = array(
      'post_type' => array('infectionprevention'),
      'posts_per_page' => 1,
      'order' => 'DESC',
    );
    $ip_query = new WP_Query( $args );
   ?>
   <?php
      if ( $ip_query->have_posts() ) : while ( $ip_query->have_posts() ) : $ip_query->the_post();
   ?>
  <div class="item">
        <a href="<?php the_permalink();?>" title="<?php the_title();?>" alt="<?php the_title();?>">
          <div class="title"><?php the_title();?></div>
          <div class="date">Published: <?php echo get_the_date('F d, Y');?></div>
        </a>
    </div>
    <?php endwhile; endif; wp_reset_query();  ?>
</div>
