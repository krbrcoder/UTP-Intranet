<?php include( BASE . '/cuztom/3.0.0/cuztom.php');

/*
$labels = array(
		'name' => __( 'Active Contracts', 'Post Type General Name', 'textdomain' ),
		'menu_name' => __( 'Active Contracts', 'textdomain' ),
		'all_items' => __( 'All Active Contracts', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Active Contracts', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
    'menu_icon' => 'dashicons-media-text',
    'has_archive' => false,
		'supports' => array ('title', 'revisions','thumbnail'),
    'rewrite' => array (
                  'slug' => 'managed-care/active-contracts',
                  'with_front' => false
                ),
	);

$activeContracts = register_cuztom_post_type( 'active_contracts', $args );
*/

$activecontracts = register_cuztom_post_type( 'active_contracts', array(
    'labels'            => array(
      'name'            => 'Active Contracts',
      'menu_name'       => 'Active Contracts',
      'all_items'       => 'All Active Contracts'
    ),
    'menu_icon'         => 'dashicons-media-text',
    'has_archive'       => false,
    'supports'          => array('title','revisions','thumbnail', 'editor', 'author' ),
    'rewrite' => array (
                  'slug' => 'managed-care/active-contracts',
                  'with_front' => false
                )
));

$section1 = array(
  'title'       => 'Product Table',
  'fields'      => array(
        array(
          'id'        => 'product_table',
          'type'      => 'bundle',
          'fields'    => array(
              array(
                'id'          => 'name',
                'label'       => 'Name',
                'type'        => 'text'
              ),
              array(
                'id'          => 'details',
                'label'       => 'Details',
                'type'        => 'textarea'
              ),
              array(
                'id'          => 'fsc',
                'label'       => 'FSC',
                'type'        => 'text'
              ),
              array(
                'id'          => 'exclusions',
                'label'       => 'Excluded from the Contract',
                'type'        => 'text'
              )
          )
        )
    )
);

$section4 = array(
  'title'       => 'Provider Info',
  'fields'      => array(
      array(
          'id'      => '_provider_logo',
          'label'   => 'Provider Logo',
          'type'    => 'image'
      ),
      array(
        'id'        => '_provider_url',
        'label'     => 'Provider Website',
        'type'      => 'text'
      )
    )
);

$section2 = array(
  'title'       => 'Other Information',
  'fields'      => array(
    array(
      'id'        => 'title',
      'label'     => 'Title',
      'type'      => 'text'
    ),
    array(
      'id'        => 'body',
      'label'     => 'Body',
      'type'      => 'wysiwyg'
    )
  )
);

$section3 = array(
  'title'       => 'Plan Representative Information',
  'fields'      => array(
        array(
          'id'        => 'plan_representative',
          'type'      => 'bundle',
          'fields'    => array(
              array(
                  'id'          => 'name',
                  'label'        => 'Plan Representative Name',
                  'description' => 'Please type the full name of the Plan Representative',
                  'type'      => 'text'
              ),
              array(
                  'id'          => 'title',
                  'label'        => 'Plan Representative Title',
                  'description' => 'Please type the title of the Plan Representative',
                  'type'      => 'text'
              ),
              array(
                  'id'          => 'email',
                  'label'        => 'Plan Representative Email',
                  'description' => 'Please type the email of the Plan Representative',
                  'type'      => 'text'
              ),
              array(
                  'id'          => 'address',
                  'label'        => 'Plan Representative Address & Phone',
                  'description' => 'Please type the address and telephone number of the Plan Representative',
                  'type'      => 'wysiwyg'
              )
        )
    )
  )
);

$pagebox1 = register_cuztom_meta_box(
    'Active Contracts Section',
    'active_contracts',
    array(
        'title'     => 'Active Contracts Area',
        'fields' => array(

			//Tabs
	        array(
	            'id'			=> '_activecontracts',
              'type'    => 'tabs',
	            'panels'	=> array( $section1, $section2, $section3, $section4 )
				)
		)
    )
);

