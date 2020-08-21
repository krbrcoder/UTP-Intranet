<div class="ui container">
<?php
  wp_nav_menu( array(
    'menu'              => 'menu-2',
    'container'         => false,
    'depth'             => 2,
    'items_wrap'        =>'%3$s',
    //'echo'              => false,
    'fallback_cb'       => false,
    'walker'            => new Semantic_Nav_Walker()
  ));

?>
</div>
