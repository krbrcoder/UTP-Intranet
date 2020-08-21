<?php get_header(); ?>
<div id="mainbody" role="main" aria-label="mainbody">
  <div class="ui container headline">
      <h2>Search UTPConnect</h2>
      <hr class="star">
    </div>
  <div class="ui container">
    <div class="entry">
      <h3>Search Results:</h3>

      <div class="ui divided items">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        ?>
          <div class="item">
            <?php //if (is_category(array('employee-wellness','news'))):?>
            <!--<div class="image">
              <?php //the_post_thumbnail('thumbnail');?>
            </div>-->
            <?php //endif; ?>
            <div class="content">
              <a class="header" href="<?php the_permalink(); ?>"><?php the_title();?></a>
              <div class="meta">
                <span class="cinema"><?php the_permalink();?></span>
              </div>
              <?php //if(!is_category('in-the-media')):?>
              <div class="description">
                <p><?php echo wp_trim_words(get_the_content(),75,'...');?></p>
              </div>
              <div class="extra">
                <a class="ui right floated primary button" href="<?php the_permalink();?>" title="<?php the_title();?>">
                  View Post
                  <i class="right chevron icon"></i>
                </a>
              </div>
              <?php //endif; ?>
            </div>
          </div>
        <?php endwhile; endif;?>
        </div>
      <div>
    </div>
  </div>
</div><!--#mainbody-->

<?php get_footer(); ?>
