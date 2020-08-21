<?php
$labels = array(
		'name' => __( 'Employee of the Month', 'Post Type General Name', 'textdomain' ),
		'menu_name' => __( 'Employee of the Month', 'textdomain' ),
		'all_items' => __( 'All Employees of the Month', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Employee of the Month', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
    'menu_icon' => 'dashicons-star-filled',
    'has_archive' => false,
		'supports' => array ('title', 'revisions','thumbnail'),
    'rewrite' => array (
                  'slug' => 'employee-of-the-month',
                  'with_front' => false
                ),
	);

$eom = register_cuztom_post_type( 'eom', $args );

$empInfo = register_cuztom_meta_box(
    'employee_information',
    'eom',
    array(
        'title'  => __('Employee Information', 'cuztom'),
        'fields' => array(
              array(
                'id'			  => '_employee_information_eom_name',
                'label'			=> 'Name',
                'type'			=> 'text'
              ),
              array(
                'id'			    => '_employee_information_eom_title',
                'label'       => 'Role at UT Physicians',
                'description' => "What is the Employee's job title?",
                'type'			=> 'text'
              ),
              array(
                'id'			    => '_employee_information_eom_specialty',
                'label'       => 'Specialty or Division',
                'description' => "What is the Employee's specialty or division?",
                'type'			=> 'text'
              ),
              array(
                'id'			    => '_employee_information_eom_hire_date',
                'label'       => 'Hire Date Year',
                'description' => "What year did the Employee join UT Physicians?",
                'type'			=> 'text'
              ),
              array(
                'id'			    => '_employee_information_youtube_video',
                'label'       => 'Youtube Video',
                'description' => "Paste a direct youtube video link for this EOM.",
                'type'			=> 'wysiwyg'
              ),
              array(
                'id'     => 'what_people_are_saying',
                'type'   => 'bundle',
                'fields' => array(
                  array(
                    'id'			  => '_what_people_are_saying_bea_comment',
                    'label'			=> 'Associate Testimonial Comment',
                    'description' => "Add one comment per person making the comment.",
                    'type'			=> 'text'
                  )
              )
          )
    )
));