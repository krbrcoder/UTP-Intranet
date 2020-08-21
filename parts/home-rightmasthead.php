
          <?php
            $mhcatetories=['practice-notes','patient-experience','in-the-media'];
          ?>
          <?php foreach($mhcatetories as $thecategory ){?>
          <?php
                  $thecat = get_category_by_slug( $thecategory );
                  $thecatname = $thecat->name;
                  $args = array(
                    'post_type' => array('post'),
                    'category_name' => $thecategory,
                    'posts_per_page' => 1,
                    'order' => 'DESC',
                  );
                  $mh_query = new WP_Query( $args );
          ?>
          <?php if ( $mh_query->have_posts() ) : while ( $mh_query->have_posts() ) : $mh_query->the_post();
          ?>
          <div id="<?php echo $thecategory;?>" class="ui link card horizontal">
            <a href="<?php echo get_site_url(); ?>/category/<?php echo $thecategory; ?>" class="image">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/temp/<?php echo $thecategory;?>.jpg" class="ui fluid image square" alt="<?php echo $thecatname.' image';?>" title="<?php the_title();?>">
            </a>
            <div class="content">
              <a href="<?php echo get_site_url(); ?>/category/<?php echo $thecategory; ?>" class="header" title="<?php the_title();?>"><?php echo $thecatname; ?>
                <div class="title"><?php echo wp_trim_words(get_the_title(),11,'...');?></div>
                <div class="date">Published: <?php echo get_the_date('F d, Y');?></div>
              </a>
            </div>
          </div>
          <?php endwhile; endif; wp_reset_query();  ?>
        <?php } //end forech category ?>
