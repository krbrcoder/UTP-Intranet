<?php /* Template Name: Quality Measures List */ ?>
<?php get_header(); ?>
<div id="mainbody" role="main" aria-label="mainbody">
  <div class="ui container headline">
      <h2><?php the_title();?></h2>
      <hr class="star">
    </div>
  <div class="ui container">
    <div class="entry">
      <table class="ui striped table">
      <tbody>
      <?php
              $args = array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'post_parent'    => $post->ID,
                'order'          => 'ASC',
                'orderby'        => 'title'
              );
              $qm_query = new WP_Query( $args );
      ?>
      <?php if ($qm_query->have_posts()) : ?>
        <?php while ($qm_query->have_posts()) : $qm_query->the_post(); ?>
          <tr><td><a class="header" href="<?php the_permalink();?>"><?php the_title();?></a></td></tr>
      <?php endwhile; ?>
    <?php endif; wp_reset_query(); ?>
    </tbody>
  </table>
    </div>
  </div>
</div><!--#mainbody-->

<?php get_footer(); ?>
