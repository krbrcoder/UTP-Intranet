<?php
// Register Custom Post Type Infection Prevention
// Post Type Key: infectionprevention
function create_infectionprevention_cpt() {

	$labels = array(
		'name' => __( 'Infection Prevention', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'Infection Prevention', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'Infection Prevention', 'textdomain' ),
		'name_admin_bar' => __( 'Infection Prevention', 'textdomain' ),
		'archives' => __( 'Infection Prevention Archives', 'textdomain' ),
		'attributes' => __( 'Infection Prevention Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Infection Prevention:', 'textdomain' ),
		'all_items' => __( 'All Infection Prevention', 'textdomain' ),
		'add_new_item' => __( 'Add New Infection Prevention', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Infection Prevention', 'textdomain' ),
		'edit_item' => __( 'Edit Infection Prevention', 'textdomain' ),
		'update_item' => __( 'Update Infection Prevention', 'textdomain' ),
		'view_item' => __( 'View Infection Prevention', 'textdomain' ),
		'view_items' => __( 'View Infection Prevention', 'textdomain' ),
		'search_items' => __( 'Search Infection Prevention', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Infection Prevention', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Infection Prevention', 'textdomain' ),
		'items_list' => __( 'Infection Prevention list', 'textdomain' ),
		'items_list_navigation' => __( 'Infection Prevention list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Infection Prevention list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Infection Prevention', 'textdomain' ),
		'description' => __( 'This area is reserved for content from the Infection Prevention Team.', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-plus-alt',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'page-attributes', 'custom-fields', ),
		'taxonomies' => array('category', 'post_tag' ),
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
	register_post_type( 'infectionprevention', $args );

}
add_action( 'init', 'create_infectionprevention_cpt', 0 );

 ?>
