<?php
  $homealertargs = array(
              'category_name'		=>	'home-alert',
              'posts_per_page'	=>	'1'
  );
  $homealertquery = new WP_Query($homealertargs);
  if ( $homealertquery->have_posts() ) : while ( $homealertquery->have_posts() ) : $homealertquery->the_post();
  $homealertID		=	get_the_ID();
  $homealertTitle		=	get_the_title();
  $homealertContent	=	get_the_content();

  //print_r($homealertContent);
?>
<div class="ui container">
<div class="ui message huge blue">
  <i class="close icon"></i>
  <div class="header">
    <?php echo $homealertTitle; ?>
  </div>
  <p><?php echo $homealertContent; ?></p>
</div>
</div>

<?php endwhile;
endif;
wp_reset_query(); ?>
