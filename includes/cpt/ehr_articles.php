<?php
// Register Custom Post Type EHR Article
// Post Type Key: ehrarticle
function create_ehrarticle_cpt() {

	$labels = array(
		'name' => __( 'EHR Articles', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'EHR Article', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'EHR Articles', 'textdomain' ),
		'name_admin_bar' => __( 'EHR Article', 'textdomain' ),
		'archives' => __( 'EHR Article Archives', 'textdomain' ),
		'attributes' => __( 'EHR Article Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent EHR Article:', 'textdomain' ),
		'all_items' => __( 'All EHR Articles', 'textdomain' ),
		'add_new_item' => __( 'Add New EHR Article', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New EHR Article', 'textdomain' ),
		'edit_item' => __( 'Edit EHR Article', 'textdomain' ),
		'update_item' => __( 'Update EHR Article', 'textdomain' ),
		'view_item' => __( 'View EHR Article', 'textdomain' ),
		'view_items' => __( 'View EHR Articles', 'textdomain' ),
		'search_items' => __( 'Search EHR Article', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into EHR Article', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this EHR Article', 'textdomain' ),
		'items_list' => __( 'EHR Articles list', 'textdomain' ),
		'items_list_navigation' => __( 'EHR Articles list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter EHR Articles list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'EHR Article', 'textdomain' ),
		'description' => __( 'This area is reserved for updates and information for the EHR - Allsripts division.', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-laptop',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'page-attributes', 'post-formats', 'custom-fields', ),
		'taxonomies' => array('topic', ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'ehrarticle', $args );

}
add_action( 'init', 'create_ehrarticle_cpt', 0 );

//  ****************  Topics Taxonomy for ehr_articles

// Register Taxonomy Topic
// Taxonomy Key: topic
function create_topic_tax() {

	$labels = array(
		'name'              => _x( 'Topics', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Topic', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Topics', 'textdomain' ),
		'all_items'         => __( 'All Topics', 'textdomain' ),
		'parent_item'       => __( 'Parent Topic', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Topic:', 'textdomain' ),
		'edit_item'         => __( 'Edit Topic', 'textdomain' ),
		'update_item'       => __( 'Update Topic', 'textdomain' ),
		'add_new_item'      => __( 'Add New Topic', 'textdomain' ),
		'new_item_name'     => __( 'New Topic Name', 'textdomain' ),
		'menu_name'         => __( 'Topic', 'textdomain' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'This categorizing feature is dedicated  to the EHR section of the intranet website.', 'textdomain' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
	);
	register_taxonomy( 'topic', array('ehrarticle', ), $args );

}
add_action( 'init', 'create_topic_tax' );

?>
