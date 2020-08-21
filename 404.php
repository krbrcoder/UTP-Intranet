<?php get_header(); ?>
	<div id="mainbody" role="main" aria-label="mainbody">
	  <div class="ui container headline">
	      <h2>Site Error</h2>
	      <hr class="star">
	    </div>
	  <div class="ui container">
	    <div class="entry">
				<div class="row">
					<div class="col-md-12">
						<div class="page-header">
							<h1>Error 404! Page not Found</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/404.jpg" alt="Page not Found" class="img-fluid" />
						<h2>The webpage you are looking for does not exist or is no longer valid.</h2>
						<p class="lead">We apologize for the inconvenience.</p>
					</div>
				</div>
	    </div>
	  </div>
	</div><!--#mainbody-->
<?php get_footer(); ?>
