<?php
/* ========================================= */
/*
	CPT for Active Contract News
	This is created to replace the WP Default Tags specifically for SEO Purpose since WP Search doesn't index tags page which are generated automagically
*/
/* ========================================= */

$ac_news = register_cuztom_post_type( 'ac_posts', array(
		'menu_icon'	=> 'dashicons-networking',
        'has_archive' => false,
        'supports' => array ('title','revisions', 'editor', 'excerpt', 'thumbnail'),
        'rewrite' => array (
                            'slug' => '/managed-care/active-contracts/announcements',
                            'with_front' => false
							),
        'labels' => array(
              'name'      => 'Active Contracts Announcements',
              'menu_name' => 'Active Contract Announcements',
              'all_items' => 'All Active Contract Announcements',
              'add_new'   => 'Add New AC Announcement',
              'add_new_item' => 'Add New AC Announcements'
           ),
        'menu_position' => 6,
         'capabilities' => array(
	        'publish_posts' => 'edit_published_pages',
	        'edit_posts' => 'edit_published_pages',
	        'edit_others_posts' => 'edit_published_pages',
	        'delete_posts' => 'edit_published_pages',
	        'delete_others_posts' => 'edit_published_pages',
	        'read_private_posts' => 'edit_published_pages',
	        'edit_post' => 'edit_published_pages',
	        'delete_post' => 'edit_published_pages',
	        'read_post' => 'edit_published_pages',
	    ),
    )
);

$ac_news = register_cuztom_meta_box(
  'ac_select',
  'ac_posts',
  array(
    'title'       => 'Active Contract',
    'fields'      => array(
      array(
        'id'        => 'ac_select',
        'label'     => 'Select Active Contract',
        'type'      => 'post_select',
        'args'      => array(
          'post_type'       => 'active_contracts',
          'orderby'         => 'title',
          'order'           => 'ASC',

        )
      )
    )
  )
);