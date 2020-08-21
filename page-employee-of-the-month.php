<?php get_header(); ?>
<div id="mainbody" role="main" aria-label="mainbody">
  <div class="ui container headline">
      <h2><?php the_title();?></h2>
      <hr class="star">
    </div>
  <div class="ui container">
    <div class="entry">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
      <?php the_content();?>
      <?php endwhile; ?>
    <?php endif; ?>
    <!--############ EOM Archives ####################### -->
    <?php
        // Query Arguments
        $args = array(
          'post_type' => array('eom'),
          'posts_per_page' => 12,
          'order' => 'DESC',
        );

        // The Query
        $eom_query = new WP_Query( $args );
    ?>
    <h3>Previous Employees of the Month</h3>

    <div class="ui cards">
        <?php if ( $eom_query->have_posts() ) : while ( $eom_query->have_posts() ) : $eom_query->the_post();
        ?>
        <div class="card">
          <div class="image">
            <?php the_post_thumbnail();?>
          </div>
          <div class="content">
            <div class="header"><?php echo get_post_meta(get_the_ID(),'_employee_information_eom_name',true);?></div>
            <div class="meta">
              <div><?php echo get_post_meta(get_the_ID(),'_employee_information_eom_title',true);?></div>
              <div><?php echo get_post_meta(get_the_ID(),'_employee_information_eom_specialty',true);?></div>
            </div>
            <div class="description">
              <div class="ui accordion">
              <div class="title">
                <i class="dropdown icon"></i>
                <strong>What people are saying...</strong>
              </div>
              <div class="content">
                <div class="transition hidden">
              <?php
                $comments = get_post_meta(get_the_ID(),'what_people_are_saying',true);
                foreach($comments as $comment){
                  echo '<p class="ui ignored message">"'.$comment['_what_people_are_saying_bea_comment'].'"</p>';
                }
              ?>
            </div>
              </div>
            </div>
            </div>
          </div>
          <div class="extra content">
            <span class="right floated">
              Hired: <?php echo get_post_meta(get_the_ID(),'_employee_information_eom_hire_date',true);?>
            </span>
            <span>
              <i class="trophy icon"></i>
              <?php the_title(); ?>
            </span>
          </div>
        </div>
        <?php endwhile; endif; wp_reset_query();  ?>
    </div>
    </div>
  </div>
</div><!--#mainbody-->

<?php get_footer(); ?>
