<?php
  /** Template Name: Active Contracts Page **/
?>
<?php get_header(); ?>
<div id="mainbody" role="main" aria-label="mainbody">
  <div class="ui container headline">
      <h2><?php the_title(); ?></h2>
      <hr class="star">
  </div>
    <div id="active-contracts" class="entry ui container">
      <?php get_template_part('parts/part','livesearch'); ?>
      <div class="ui hidden divider"></div>
      <div class="ui column">
        <div class="ui relaxed list">
          <?php
          $letter=' ';
          query_posts(array(
            'post_type' => 'active_contracts',
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1
          ));
          if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <?php $title = get_the_title();
                $link = get_the_permalink();
                $initial = strtoupper(substr($title,0,1));
                if ( $initial !=$letter ) { ?>
                  <div class="item live-filter letter"><?php echo $initial; ?></div>
                  <?php $letter=$initial; ?>
                <?php } ?>
                <div class="item live-filter">
                  <a href="<?php echo $link; ?>">
                    <?php if (has_post_thumbnail()) { ?>
                      <div class="ui middle aligned tiny image"><?php the_post_thumbnail(); ?></div>
                    <?php } ?>
                    &nbsp;<?php echo $title; ?>
                  </a>
                </div>
            <?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>
        </div>
      </div>

  </div>
</div><!--#mainbody-->
<div class="ui hidden divider"></div>
<?php get_footer(); ?>
