        <div class="ui fluid image">
          <?php
          $args = array(
          	'post_type' => array('post'),
            'category_name' => 'news+featured',
          	'posts_per_page' => 1,
          	'order' => 'DESC',
          );
          $news_query = new WP_Query( $args );
           ?>

           <?php if ( $news_query->have_posts() ) : while ( $news_query->have_posts() ) : $news_query->the_post();
           ?>
           <a href="<?php echo get_site_url(); ?>/category/news" title="See All News" class="ui blue big top right attached label">See All News</a>
           <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" class="ui ribbon label"><?php the_title();?>... <span class="readmore">read more &raquo;</span></a>
           <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title();?>"/>
          <?php endwhile; endif; wp_reset_query();  ?>
        </div>
