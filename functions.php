<?php
////////////////////////////////////////////////////////////
//             CONSTANT / VARIABLE DEFINITIONS
////////////////////////////////////////////////////////////
define( 'BASE', get_template_directory(). '/library' );
define( 'THEME_DIR', get_stylesheet_directory() );
define( 'THEME_INCLUDE', THEME_DIR . '/includes' );

////////////////////////////////////////////////////////////
//                   HEADER FUNCTIONS
////////////////////////////////////////////////////////////

//Cleaning Head Section
remove_action( 'wp_head', 'feed_links');
remove_action( 'wp_head', 'feed_links_extra');
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action( 'wp_head', 'noindex');
remove_action( 'wp_head', 'wp_print_styles');
remove_action( 'wp_head', 'wp_print_head_scripts');
remove_action( 'wp_head', 'wp_generator');
remove_action( 'wp_head', 'rel_canonical');
remove_action( 'wp_head', 'wp_shortlink_wp_head');

// add a favicon to your
function uthealth_favicon() {
  echo '<link rel="apple-touch-icon" sizes="57x57" href="'. BASE . '/assets/img/favicon/apple-touch-icon-57x57.png">';
  echo '<link rel="apple-touch-icon" sizes="114x114" href="'. BASE . '/assets/img/favicon/apple-touch-icon-114x114.png">';
  echo '<link rel="apple-touch-icon" sizes="72x72" href="'. BASE . '/assets/img/favicon/apple-touch-icon-72x72.png">';
  echo '<link rel="apple-touch-icon" sizes="144x144" href="'. BASE . '/assets/img/favicon/apple-touch-icon-144x144.png">';
  echo '<link rel="apple-touch-icon" sizes="60x60" href="'. BASE . '/assets/img/favicon/apple-touch-icon-60x60.png">';
  echo '<link rel="apple-touch-icon" sizes="120x120" href="'. BASE . '/assets/img/favicon/apple-touch-icon-120x120.png">';
  echo '<link rel="apple-touch-icon" sizes="76x76" href="'. BASE . '/assets/img/favicon/apple-touch-icon-76x76.png">';
  echo '<link rel="apple-touch-icon" sizes="152x152" href="'. BASE . '/assets/img/favicon/apple-touch-icon-152x152.png">';
  echo '<link rel="apple-touch-icon" sizes="180x180" href="'. BASE . '/assets/img/favicon/apple-touch-icon-180x180.png">';
  echo '<meta name="apple-mobile-web-app-title" content="UT Physicians Website">';
  echo '<link rel="icon" type="image/png" href="'. BASE . '/assets/img/favicon/favicon-192x192.png" sizes="192x192">';
  echo '<link rel="icon" type="image/png" href="'. BASE . '/assets/img/favicon/favicon-160x160.png" sizes="160x160">';
  echo '<link rel="icon" type="image/png" href="'. BASE . '/assets/img/favicon/favicon-96x96.png" sizes="96x96">';
  echo '<link rel="icon" type="image/png" href="'. BASE . '/assets/img/favicon/favicon-16x16.png" sizes="16x16">';
  echo '<link rel="icon" type="image/png" href="'. BASE . '/assets/img/favicon/favicon-32x32.png" sizes="32x32">';
  echo '<meta name="msapplication-TileColor" content="#da532c">';
  echo '<meta name="msapplication-TileImage" content="'. BASE . '/assets/img/favicon/mstile-144x144.png">';
  echo '<meta name="application-name" content="UT Physicians Website">';
}
add_action('wp_head', 'uthealth_favicon');


// required css files
function load_css_files() {
  wp_register_style('semantic-css', get_template_directory_uri() . '/library/semantic-ui/2.3.1/semantic.min.css' , '2.3.1');
  wp_register_style('utpconnect', get_stylesheet_directory_uri() . '/includes/sass/style.css' , '1.0.0');
  wp_register_style('fontawesome', get_template_directory_uri() . '/library/fontawesome/5.0.13/css/fontawesome.min.css', '5.0.13');

  wp_enqueue_style('semantic-css');
  wp_enqueue_style('utpconnect');
  wp_enqueue_style('fontawesome');
}
add_action( 'wp_enqueue_scripts', 'load_css_files' );

//Enqueue Additional Scripts
	function base_js_load(){
    wp_register_script('jq', get_template_directory_uri() . '/library/jquery/3.3.1/jquery-3.3.1.min.js', array(), '3.3.1', false );
		wp_register_script('semantic-js', get_template_directory_uri() . '/library/semantic-ui/2.3.1/semantic.min.js', array('jq'), '2.3.1', true );
		wp_register_script('semantic-accordion-js', get_template_directory_uri() . '/library/semantic-ui/2.3.1/components/accordion.min.js', array('jq'), '2.3.1', true );
		wp_register_script('utpconnect-js', get_stylesheet_directory_uri() . '/includes/js/utpconnect.js', array(), '1.0.0', true );
		//wp_register_script('utprest', get_stylesheet_directory_uri() . '/includes/js/utprestapi.js', array('jq'), '1.0.0', false );

    wp_enqueue_script('jq');
    wp_enqueue_script('semantic-js');
    wp_enqueue_script('semantic-accordion-js');
    wp_enqueue_script('utpconnect-js');
    //wp_enqueue_script('utprest');
  }
  add_action( 'wp_enqueue_scripts', 'base_js_load' );

////////////////////////////////////////////////////////////
//                    PHP INCLUDES
////////////////////////////////////////////////////////////

// Mobile Detect Feature - Used for Header

  require_once( BASE . '/mobiledetect/2.8.32/Mobile_Detect.php');

// custom posts types
  require_once( THEME_INCLUDE . '/cpt/active-contracts.php');
  require_once( THEME_INCLUDE . '/cpt/infection_prevention.php');
  require_once( THEME_INCLUDE . '/cpt/ehr_articles.php');
  require_once( THEME_INCLUDE . '/cpt/letstalk.php');
//   require_once( THEME_INCLUDE . '/cpt/page.php');
  require_once( THEME_INCLUDE . '/cpt/employee-otm.php');
  require_once( THEME_INCLUDE . '/cpt/ac-posts.php');




////////////////////////////////////////////////////////////
//           UTPCONNET THEME SPECIFIC FUNCTIONS
////////////////////////////////////////////////////////////

//convert regular Youtube link to Embed format with no related content
function embedify_youtube_link( $link, $relparm='' ){
  $conversion = str_replace("watch?v=","embed/",$link);
  $embedLink =$conversion.$relparm;
  return $embedLink;
}

	//Adding Support for Menus
	add_action( 'init', 'register_my_menus' );

	function register_my_menus() {
		register_nav_menus(
		array(
    		'menu-1' => __( 'Main Nav' ),
    		'menu-2' => __( 'Super Nav' )
    ));
    }

    require_once( BASE . '/semantic-ui/navwalker/semantic_nav_walker.php' );



////////////////////////////////////////////////////////////
//                WORDPRESS SHORT CODES
////////////////////////////////////////////////////////////


function insert_utpconnect_gravity_form($atts){
  //an alternative to load gravity forms to eliminates js or css conflicts
  //shortcode snippet [utpgravityform id="0"]
  echo do_shortcode( '[gravityform id="'.$atts['id'].'" title="false" description="false"]' );
}

add_shortcode( 'utpgravityform', 'insert_utpconnect_gravity_form' );

function custom_post_articles_list($atts) {
  //adds a preview list of articles from a custom post type
  //shortcode snippet [articleslist posttype="pt" postquantity=3 order="DESC"]
  $args = array(
    'post_type' => array($atts['posttype']),
    'posts_per_page' => $atts['postquantity'],
    'order' => $atts['order'],
  );
  $cp_query = new WP_Query( $args );
  //dynamic html var : string
  $itemsblock='';
  //container div
  $itemsblock.='<div class="ui divided items">';
  //get items loop
   if ( $cp_query->have_posts() ) {
     while ( $cp_query->have_posts() ) : $cp_query->the_post();
      $itemsblock.='<div class="item">
        <div class="content">
          <a class="header" href="'.get_the_permalink().'">'.get_the_title().'</a>
          <div class="meta">
            <span class="cinema">'.get_the_date('F d, Y').'</span>
          </div>
          <div class="description">
            <p>'.get_the_excerpt().'</p>
          </div>
          <div class="extra">
            <a class="ui right floated primary button" href="'.get_the_permalink().'" title="'.get_the_title().'">
              Read Article
              <i class="right chevron icon"></i>
            </a>
          </div>
        </div>
      </div>';
    endwhile; wp_reset_query(); }
    //close container div
    $itemsblock.='</div>';
    return $itemsblock;
}
add_shortcode( 'articleslist', 'custom_post_articles_list' );


function utp_outabout_iframe( $atts, $content = null ) {

    $output_string = '<iframe src="https://calendar.google.com/calendar/embed?mode=AGENDA&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=uth.edu_vg6i7mju1iu4gjl5tqkfrvon38%40group.calendar.google.com&amp;color=%2323164E&amp;ctz=America%2FChicago" style="border-width:0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>';
    return $output_string;
}
add_shortcode('out-about-calendar', 'utp_outabout_iframe');



////////////////////////////////////////////////////////////
//             WORDPRESS ADMIN FUNCTIONS
////////////////////////////////////////////////////////////
// add_theme_support( 'post-thumbnails', array( 'post','page','infectionprevention','ehrarticle' ) );

	//Enable Thumbnails
	add_theme_support('post-thumbnails');
  //Remove those pesky automatic <p> tags
  //remove_filter( 'the_content', 'wpautop' );
  //remove_filter( 'the_excerpt', 'wpautop' );
  //disable auto save
  function disable_autosave() {
        wp_deregister_script( 'autosave' );
  }
  add_action( 'admin_init', 'disable_autosave' );
?>
