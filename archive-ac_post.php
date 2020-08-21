<?php get_header(); ?>
<div id="mainbody" role="main" aria-label="mainbody">
  <div class="ui container headline">
      <h2>Active Contracts Announcements</h2>
      <hr class="star">
  </div>
  <div class="ui container">
    <div class="entry">
      <h3>Conversations with UTP</h3>
      <div class="ui comments">
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
          $postid = get_the_id();
          $cf = get_post_custom($postid);
          // echo '<pre>' . print_r($cf) . '</pre>';
        ?>
          <div class="ui divider"></div>
        <?php endwhile; endif; wp_reset_query();?>
        </div>
      <div>
    </div>
  </div>
</div><!--#mainbody-->

<?php get_footer(); ?>


