<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title property="og:title">
		<?php
		if ( is_archive() ) {
			post_type_archive_title(); echo ' | ';
		}
		elseif ( is_category() ) {
			single_cat_title(); echo ' | ';
		}
		else if ( !is_front_page() ) {
			echo the_title() . ' | ';
		} ?>
		<?php bloginfo( 'name' ); ?> <?php single_cat_title(); ?> | UTP Connect
		</title>
    <meta name="author" content="UTPconnet">
    <meta name="google-site-verification" content="yQpX2s3mW4m088Rau6H2-85OFnAjSO33K6ozEC-KdO8" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo get_the_permalink(); ?>" />
    <?php if (is_front_page()) { ?><meta name="description" property="og:description" content="UT Physicians is a caring community, with more than 1,500 clinicians certified in 80 medical specialties and subspecialties. We provide multi-specialty care for the entire family." /><?php } ?>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta property="twitter:site" content="@UTPhysicians" />
    <meta property="twitter:card" conte="summary_large_image" />


    <!--[if IE]>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/library/html5shiv/3.7.3/html5.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/library/respond/1.1.0/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>

</head>
  <body <?php body_class(); ?>>
  <div class="sr-only" id="skipnav" aria-label="skipnav" role="complementary">
    <p><a href="#mainbody">Skip to Content (Press Enter)</a></p>
  </div>
<script>

  $(document)
    .ready(function() {
      $('.ui.dropdown').dropdown({
        on: 'hover'
      });
      $('.ui.menu a.item')
        .on('click', function() {
          $(this)
            .addClass('active')
            .siblings()
            .removeClass('active')
          ;
        })
      ;
    })
  ;
  $(document)
    .ready(function() {
      $('.ui.dropdown').dropdown();

      $('.ui.buttons .dropdown.button').dropdown({
        action: 'combo'
      });
    })
  ;
</script>

<header id="navigation" class="ui menu" role="navigation" aria-label="navigation">
  <nav id="supernav" class="ui fixed inverted stackable menu" aria-label="supernav">
    <?php get_template_part( 'menus/menu' , 'supernav' ); ?>
  </nav>


  <nav id="mainnav" class="ui container stackable secondary menu" aria-label="mainnav">
    <?php get_template_part( 'menus/menu' , 'main' ); ?>
  </nav>
</header>
