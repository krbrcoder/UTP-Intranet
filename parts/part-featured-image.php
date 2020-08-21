<?php if ( has_post_thumbnail() && (!empty(get_the_post_thumbnail())) ) { ?>
<div class="ui fluid image">
  <!--<img id="featured-image" src="<?php //the_post_thumbnail_url(); ?>"class="ui image centered" alt="<?php //the_title();?>"/>-->
  <?php the_post_thumbnail('full', array('id'=>'featured-image','class' => 'img-fluid ui image centered')); ?>
</div>
<div class="ui divider"></div>
<?php } ?>
