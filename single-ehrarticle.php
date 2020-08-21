<?php get_header(); ?>
<div id="mainbody" role="main" aria-label="mainbody">
  <div class="ui container headline">
      <h2><?php the_title();?></h2>
      <hr class="star">
    </div>
  <div class="ui container">
    <div class="entry">
      <div id="goto-nav">
      <a class="ui right floated primary button" href="<?php echo esc_url(get_permalink( get_page_by_title( "Allscripts EHR Training and Communication" )) ); ?>" title="Allscripts EHR Training and Communication">
        <i class="home icon"></i>
          Allscripts EHR Training and Communication
      </a>
      <a class="ui right floated primary button" href="<?php echo esc_url(get_permalink( get_page_by_title( "News-EHR Notifications" )) ); ?>" title="News-EHR Notifications">
        <i class="plus icon"></i>
          More Articles
      </a>
    </div>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php  get_template_part('parts/part','featured-image'); ?>
      <?php the_content();?>
      <?php endwhile; ?>
    <?php endif; ?>
    </div>
  </div>
</div><!--#mainbody-->
<?php get_footer(); ?>
