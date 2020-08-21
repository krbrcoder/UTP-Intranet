          <div class="content top">
            <div class="right floated meta"><a href="<?php echo get_site_url(); ?>/employee-of-the-month">View Past Winners</a></div>
            <h3>Employee of the month</h3>
          </div>
          <?php
          // Query Arguments
          $args = array(
          	'post_type' => array('eom'),
          	'posts_per_page' => 1,
          	'order' => 'DESC',
          );
          // The Query
          $eom_query = new WP_Query( $args );
          ?>
          <?php // The Loop
          if ( $eom_query->have_posts() ) : while ( $eom_query->have_posts() ) : $eom_query->the_post();
          			$youtubeLink = get_post_meta(get_the_ID(), '_employee_information_youtube_video', true);
          ?>
          <div class="ui embed" data-url="<?php echo embedify_youtube_link( $youtubeLink );?>"></div>
          <div class="content">
            <div class="right floated">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/star.png" alt="star logo">
            </div>
            <div class="header"><?php echo get_post_meta(get_the_ID(), '_employee_information_eom_name', true); ?></div>
            <div class="meta"><?php echo get_post_meta(get_the_ID(), '_employee_information_eom_title', true); ?></div>
            <?php endwhile; endif; wp_reset_query();  ?>
          </div>
