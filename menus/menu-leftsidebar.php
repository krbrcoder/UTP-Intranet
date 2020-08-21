<?php

$topLevelId = get_top_level_id();

function get_top_level_id(){
    $ancestors = get_ancestors( get_the_ID(), 'page' );
    $topLevelId = end($ancestors);
    if(!$topLevelId):
        $topLevelId = get_the_ID();
    endif;

    return $topLevelId;
}
function get_ancestors_count(){
  $ancestors = get_ancestors( get_the_ID(), 'page' );
  $count = count($ancestors);
  return $count;
}
function get_side_nav($topLevelId, $currentPageId){

    $args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post_parent'    => $topLevelId,
        'order'          => 'ASC',
        'orderby'        => 'menu_order'
    );

    $parent = new WP_Query( $args );

    $html = '';

    if ( $parent->have_posts() ) {

        $html .= '<ul class="sidemenu-page">';

        while ( $parent->have_posts() ) {
            $parent->the_post();
            //$html .= get_the_ID() == $currentPageId ? '<li class="current-menu-item">' : '<li>';
            $currentItemClass = get_the_ID() == $currentPageId ? ' current-menu-item':'';
            $menuLevelClass = get_ancestors_count() == 1 ? ' sidebar-menu-level-1':' sidebar-menu-level-2';
            $html .= '<li class="'.$menuLevelClass.'">';
            $html .= '<a class="'.$currentItemClass.'" href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>';
            $html .= get_side_nav(get_the_ID(),$currentPageId);
            $html .= '</li>';
        }

        $html .= '</ul>';
    }
    wp_reset_query();

    return $html;
}
//top level page link
echo '<a href="'.get_the_permalink($topLevelId).'" title="'.get_the_title($topLevelId).'" class="ui ribbon label">'.get_the_title($topLevelId).'</a>';
//child pages menu
echo get_side_nav($topLevelId,get_the_ID());
?>
