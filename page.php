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
          <?php  get_template_part('parts/part','featured-image'); ?>
      <?php the_content();?>
      <?php endwhile; ?>
    <?php endif; ?>
    </div>
  </div>
</div><!--#mainbody-->

<?php get_footer(); ?>
