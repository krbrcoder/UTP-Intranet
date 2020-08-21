          <div class="content top">
            <div class="right floated meta"><a href="<?php echo get_site_url(); ?>/category/employee-wellness">View All <span class="sr-only">stories on employee wellness</span></a></div>
            <h3>Employee Wellness</h3>
          </div>
          <div class="ui divided selection list articles">
            <?php
            $args = array(
            	'post_type' => array('post'),
              'category_name' => 'employee-wellness',
            	'posts_per_page' => 2,
            	'order' => 'DESC',
            );
            $pe_query = new WP_Query( $args );
             ?>
             <?php if ( $pe_query->have_posts() ) : while ( $pe_query->have_posts() ) : $pe_query->the_post();
             ?>
             <div class="item">
              <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title();?>" title="<?php the_title();?>" class="ui image" />
                <div class="title"><?php the_title();?></div>
                <div class="date">Published: <?php echo get_the_date('F d, Y');?></div>
              </a>
            </div>
            <?php endwhile; endif; wp_reset_query();  ?>
          </div>
