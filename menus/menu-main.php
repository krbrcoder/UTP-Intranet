    <h1><a class="brand" href="<?php echo get_site_url(); ?>">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logo/utpconnect-logo.svg" data-fallback="<?php echo get_stylesheet_directory_uri(); ?>/assets/logo/utpconnect-logo.png" alt="utpconnect-logo">
      </a>
      <span class="sr-only">UTP Connect Logo</span>
    </h1>
						<?php
							wp_nav_menu( array(
								'menu'              => 'Main Menu',
								'container'         => false,
								'depth'             => 3,
                'items_wrap'        =>'%3$s',
								//'echo'              => false,
								'fallback_cb'       => false,
								'walker'            => new Semantic_Nav_Walker()
							));
							?>

    <div class="right menu">
      <form role="search" method="get" action="<?php echo get_site_url();?>">
        <div id="search-area" class="ui action input">
            <input type="text" value="" name="s" id="s" placeholder="Search UTP Connect" aria-labelledby="search-btn">
            <button type="submit" value="Search" id="search-btn" class="ui button"><i class="search icon"></i><span class="sr-only">Submit</span></button>
        </div>
      </form>
    </div>
