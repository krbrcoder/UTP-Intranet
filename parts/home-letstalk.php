<div class="ui container">
  <div class="ui hidden divider"></div>
  <div class="ui three column grid segment">
    <div id="title-panel" class="column">
      <div class="ui relaxed items">
        <div class="item">
          <div class="ui image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/letstalk-lg.svg" class="ui image" data-fallback="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/letstalk-lg.png" alt="Let's Talk Large Icon logo">
          </div>
          <div class="middle aligned content">
            <div class="header">Conversations with UTP</div>
            <div class="description">Send in question and get answers.</div>
          </div>
        </div>
      </div>
    </div>
    <div class="column">
      <div class="ui relaxed items">
        <div class="item">
          <div class="ui image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/letstalk-sm.svg" class="ui image" data-fallback="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/letstalk-sm.png" alt="Let's Talk Small Icon">
          </div>
          <div class="middle aligned content">
            <div class="header">Latest Question:</div>
            <?php
                    $args = array(
                      'post_type' => array('letstalk'),
                      'posts_per_page' => 1,
                      'order' => 'DESC',
                    );
                    $letstalk_query = new WP_Query( $args );
            ?>
            <?php if ( $letstalk_query->have_posts() ) : while ( $letstalk_query->have_posts() ) : $letstalk_query->the_post();
            ?>
            <div class="description"><?php echo get_post_meta(get_the_ID(), '_questions_and_answers_lt_question',true);?></div>
            <?php endwhile; endif; wp_reset_query();?>
          </div>
        </div>
      </div>
    </div>
    <div class="column">
      <div class="ui relaxed items">
        <div class="item">
          <div class="ui image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/letstalk-sm.svg" class="ui image reverse-h" data-fallback="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/letstalk-sm.png" alt="Let's Talk Small Icon">
          </div>
          <div class="middle aligned content">
            <a href="<?php echo get_site_url(); ?>/letstalk/" class="header">Read the Answer <i class="arrow circle right icon"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
