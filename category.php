<?php get_header(); ?>
<div id="mainbody" role="main" aria-label="mainbody">
  <div class="ui container headline">
      <h2><?php single_cat_title();?></h2>
      <hr class="star">
    </div>
  <div class="ui container">
    <div class="entry">
      <?php if (is_category('practice-notes')) : ?>
      <h3>Previous Practice Notes:</h3>
    <?php elseif (is_category('news')) : ?>
      <h3>Previous News for UT Physicians:</h3>
    <?php elseif (is_category('patient-experience')) : ?>
      <h3>Previous Patient Experience Articles:</h3>
    <?php elseif (is_category('in-the-media')) : ?>
      <h3>Previous Stories of UT Physicians In the Media:</h3>
    <?php elseif (is_category('employee-wellness')) : ?>
      <h3>Previous Employee Wellness Articles</h3>
      <?php else : ?>
      <h3>General Post Entry</h3>
      <?php endif; ?>
      <div class="ui divided items">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        ?>
          <div class="item">
            <?php if (is_category(array('employee-wellness','news'))):?>
            <div class="image">
              <?php the_post_thumbnail('thumbnail');?>
            </div>
            <?php endif; ?>
            <div class="content">
              <?php if( is_category('in-the-media')){ $articleurl=get_the_content(); } ?>
              <a class="header" href="<?php if($articleurl){ echo $articleurl; }else{ the_permalink(); }?>"><?php the_title();?></a>
              <div class="meta">
                <span class="cinema"><?php echo get_the_date('F d, Y');?></span>
              </div>
              <?php if(!is_category('in-the-media')):?>
              <div class="description">
                <p><?php echo get_the_excerpt();?></p>
              </div>
              <div class="extra">
                <a class="ui right floated primary button" href="<?php the_permalink();?>" title="<?php the_title();?>">
                  Read Article
                  <i class="right chevron icon"></i>
                </a>
              </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; endif;?>
        </div>
      <div>
    </div>
  </div>
</div><!--#mainbody-->

<?php get_footer(); ?>
