<?php get_header(); ?>

<div id="mainbody" role="main" aria-label="mainbody">
  <div class="ui container headline">
    <div class="ui breadcrumb">
      <div class="section">
        <i class="disabled folder icon"></i> <a class="anchor" href="<?php echo esc_url(get_permalink( get_page_by_title( "Active Contracts" )) ); ?>">Active Contracts</a>
        <i class="right chevron icon divider"></i>
      </div>
      <div class="active section">
        <?php the_title();?>
      </div>
    </div>
    <?php if ( has_post_thumbnail() && (!empty(get_the_post_thumbnail())) ) { ?>
      <?php the_post_thumbnail('full ui floated right image' ); ?>
    <?php } ?>
    <h2><?php the_title();?></h2>
    <hr class="star">
  </div>
  <div class="ui container">
    <div class="entry">
      <div class="ui grid">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php $pageid = $post->ID;
            $cf = get_post_custom($pageid);
            // echo '<pre>'.print_r($cf).'</pre>'; ?>

            <?php if (isset($cf['product_table'][0])) {
              $tables = unserialize($cf['product_table'][0]);
              if (!empty($tables[0]['name'])) { ?>
                <?php if (isset($cf['plan_representative'][0]) ) {
                  $representative = unserialize($cf['plan_representative'][0]);
                  if (!empty($representative[0]['name'])) {
                    $column = 'eleven';
                  } else {
                    $column = 'sixteen';
                  }
                } ?>
                <div class="<?php echo $column; ?> wide column">
                  <?php if ( $post->post_content !="" ) { ?>
                    <?php the_content();?>
                  <?php } ?>
                  <div id="product-table" class="ui segments">
                    <div class="title main ui segment">
                      <div class="selector"></div>
                      <div class="name">Name</div>
                      <div class="fsc">FSC</div>
                      <div class="exclusions">Excluded from Contract</div>
                    </div>
                    <?php foreach ($tables as $table) {
                      if (isset($table['name'])) {
                        $name = $table['name'];
                      }
                      if (isset($table['details'])) {
                        $details = apply_filters('the_content', $table['details']);
                      }
                      if (isset($table['fsc'])) {
                        $fsc = $table['fsc'];
                      }
                      if (isset($table['exclusions'])) {
                        $exclusions = $table['exclusions'];
                      } ?>
                      <div class="ui accordion segment">
                        <div class="title">
                          <div class="selector"><i class="dropdown icon"></i></div>
                            <div class="name"><?php if (!empty($name)) { echo $name; } ?></div>
                            <div class="fsc"><?php if (!empty($fsc)) { echo $fsc; } ?></div>
                            <div class="exclusions"><?php if (!empty($exclusions)) { echo $exclusions; } ?></div>
                        </div>
                      <?php if (!empty($details)) { ?>
                        <div class="content">
                          <?php echo $details; ?>
                        </div>
                      <?php } ?>
                      </div>
                    <?php } ?>
                  </div>
                  <?php if (isset($cf['body'][0])) {
                    $body = apply_filters('the_content', $cf['body'][0]); ?>
                    <div class="ui hidden large divider"></div>
                    <div class="ui container">
                      <?php if (isset($cf['title'][0])) {
                        $title = $cf['title'][0]; ?>
                        <h3 class="ui header"><?php echo $title; ?></h3>
                      <?php } else { ?>
                        <h3>Other Information</h3>
                      <?php } ?>
                      <?php echo $body; ?>
                    </div>
                  <?php } ?>

                </div>
              <?php } ?>
            <?php } ?>

            <?php if (isset($cf['plan_representative'][0])) { ?>
              <div class="five wide column">
              <?php $representative = unserialize($cf['plan_representative'][0]);
                if (!empty($representative[0]['name'])) {
                  foreach ($representative as $rep) {
                    if (isset($rep['name'])) {
                      $repname = $rep['name'];
                    }
                    if (isset($rep['title'])) {
                      $reptitle = $rep['title'];
                    }
                    if (isset($rep['email'])) {
                      $repemail = $rep['email'];
                    }
                    if (isset($rep['address'])) {
                      $repaddress = apply_filters('the_content', $rep['address']);
                    } ?>
                      <div id="plan-representative" class="ui card">
                        <div class="content">
                          <div class="header">
                            <h3><?php echo $repname; ?></h3>
                          </div>
                          <div class="meta">
                            <?php echo $reptitle; ?>
                          </div>
                        </div>
                        <div class="content">
                          <div class="ui small feed">
                            <div class="event">
                              <div class="content">
                                <div class="description">
                                   <?php echo $repaddress; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="extra content">
                          <a class="ui button" href="mailto:<?php echo $repemail; ?>">Email <?php echo $repname; ?></a>
                        </div>
                      </div>
                  <?php } ?>
                    </div>
                <?php } ?>
              <?php } ?>


            </div>
          <?php endwhile;
          endif; ?>
    </div>
  </div>
</div><!--#mainbody-->
<script language='javascript'>
   $(document).ready(function(){
      $('.ui.accordion').accordion();
   });
</script>
<?php get_footer(); ?>
