<?php
// Register Custom Post Type LetsTalk
// Post Type Key: letstalk
function create_letstalk_cpt() {

	$labels = array(
		'name' => __( "Let's Talk", 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( "Let's Talk", 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( "Let's Talk", 'textdomain' ),
		'name_admin_bar' => __( "Let's Talk", 'textdomain' ),
		'archives' => __( "Let's Talk Archives", 'textdomain' ),
		'attributes' => __( "Let's Talk Attributes", 'textdomain' ),
		'parent_item_colon' => __( 'Parent LetsTalk:', 'textdomain' ),
		'all_items' => __( "All Let's Talk", 'textdomain' ),
		'add_new_item' => __( "Add New Let's Talk", 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( "New Let's Talk", 'textdomain' ),
		'edit_item' => __( "Edit Let's Talk", 'textdomain' ),
		'update_item' => __( "Update Let's Talk", 'textdomain' ),
		'view_item' => __( "View Let's Talk", 'textdomain' ),
		'view_items' => __( "View Let's Talks", 'textdomain' ),
		'search_items' => __( "Search Let's Talks", 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( "Insert into Let's Talk", 'textdomain' ),
		'uploaded_to_this_item' => __( "Upload to this Let's Talk", 'textdomain' ),
		'items_list' => __( "Let's Talk List", 'textdomain' ),
		'items_list_navigation' => __( "Let's Talk list navigation", 'textdomain' ),
		'filter_items_list' => __( "Filter Let's Talk List", 'textdomain' ),
	);
	$args = array(
		'label' => __( "Let's Talk", 'textdomain' ),
		'description' => __( 'A question and answer listing for employees.', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-comments',
		'supports' => array('title', 'revisions', 'author', 'custom-fields', ),
		'taxonomies' => array(),
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
	register_post_type( 'letstalk', $args );

}
add_action( 'init', 'create_letstalk_cpt', 0 );

class questionsandanswersMetabox {
	private $screen = array(
		'letstalk',
	);
	private $meta_fields = array(
		array(
			'label' => 'Question',
			'id' => '_questions_and_answers_lt_question',
			'type' => 'text',
		),
		array(
			'label' => 'Answer',
			'id' => '_questions_and_answers_lt_answer',
			'type' => 'textarea',
		),
		array(
			'label' => 'Date Answered',
			'id' => '_questions_and_answers_lt_date',
			'type' => 'text',
		),
		array(
			'label' => 'Source',
			'id' => '_questions_and_answers_lt_source',
			'type' => 'text',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'questionsandanswers',
				__( 'Questions and Answers', 'textdomain' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'normal',
				'high'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'questionsandanswers_data', 'questionsandanswers_nonce' );
		$this->field_generator( $post );
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
				case 'textarea':
					$input = sprintf(
						'<textarea style="width: 100%%" id="%s" name="%s" rows="5">%s</textarea>',
						$meta_field['id'],
						$meta_field['id'],
						$meta_value
					);
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
						$meta_field['id'],
						$meta_field['id'],
						$meta_field['type'],
						$meta_value
					);
			}
			$output .= $this->format_rows( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['questionsandanswers_nonce'] ) )
			return $post_id;
		$nonce = $_POST['questionsandanswers_nonce'];
		if ( !wp_verify_nonce( $nonce, 'questionsandanswers_data' ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		foreach ( $this->meta_fields as $meta_field ) {
			if ( isset( $_POST[ $meta_field['id'] ] ) ) {
				switch ( $meta_field['type'] ) {
					case 'email':
						$_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );
						break;
					case 'text':
						$_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
						break;
				}
				update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );
			} else if ( $meta_field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, $meta_field['id'], '0' );
			}
		}
	}
}
if (class_exists('questionsandanswersMetabox')) {
	new questionsandanswersMetabox;
};
 ?>
