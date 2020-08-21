<?php /* Template Name: 2 Column Left Sidebar Menu */ ?>
<?php get_header(); ?>
<div id="mainbody" role="main" aria-label="mainbody">
  <div class="ui container headline">
      <h2><?php the_title();?></h2>
      <hr class="star">
    </div>
  <div class="ui container">
    <div class="entry ui grid">
      <div id="left-sidebar" class="four wide column ui segment">
        <?php get_template_part('menus/menu','leftsidebar');?>
      </div>
        <div id="post-content" class="twelve wide column">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <?php  get_template_part('parts/part','featured-image'); ?>
        <?php the_content();?>
        <?php endwhile; ?>
      <?php endif; ?>
      </div>
    </div>
  </div>
</div><!--#mainbody-->

<?php get_footer(); ?>
