<?php get_header(); ?>
<div id="mainbody" role="main" aria-label="mainbody">
  <div class="ui container headline">
      <h2>Let's Talk Questions and Answers:</h2>
      <hr class="star">
    </div>
  <div class="ui container">
    <div class="entry">
      <?php echo do_shortcode( '[gravityform id="6" title="false" description="false"]' );?>
      <?php
              $args = array(
                'post_type' => array('letstalk'),
                'posts_per_page' => -1,
                'order' => 'DESC',
              );
              $letstalk_query = new WP_Query( $args );
      ?>
      <h3>Conversations with UTP</h3>
      <div class="ui comments">
        <?php if ( $letstalk_query->have_posts() ) : while ( $letstalk_query->have_posts() ) : $letstalk_query->the_post();
          $postid = get_the_id();
          $cf = get_post_custom($postid);
          // echo '<pre>' . print_r($cf) . '</pre>';
          if (isset($cf['_questions_and_answers_lt_question'][0])) {
            $question = apply_filters( 'the_content', $cf['_questions_and_answers_lt_question'][0]);
          }
          if (isset($cf['_questions_and_answers_lt_answer'][0])) {
            $answer = apply_filters( 'the_content', $cf['_questions_and_answers_lt_answer'][0]);
          }
          if (!empty($cf['_questions_and_answers_lt_source'][0] )) {
            $source = $cf['_questions_and_answers_lt_source'][0];
          }else {
            $source = '';
          }
        ?>
        <div class="comment">
            <a class="avatar">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/letstalk-q.jpg">
            </a>
            <div class="content">
              <a class="author">Employee Question</a>
              <div class="metadata">
                <!--<span class="date">Employee</span>-->
              </div>
              <div class="text">
                <p><?php echo $question; ?></p>
              </div>
              <div class="actions">
                <!--<a class="reply">Reply</a>-->
              </div>
            </div>
            <div class="comments">
              <div class="comment">
                <a class="avatar">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/letstalk-a.jpg">
                </a>
                <div class="content">
                  <a class="author">UT Physicians Answer</a>
                  <div class="metadata">
                    <?php if (isset($cf['_questions_and_answers_lt_date'][0])) {
                      $date = $cf['_questions_and_answers_lt_date'][0]; ?>
                      <span class="date">Date Replied: <?php echo $date; ?></span>
                    <?php } ?>
                  </div>
                  <div class="text">
                    <p><?php echo $answer; ?></p>
                    <?php if (!empty($source)){?><div class="ui label">Source: <?php echo $source; ?></div><?php }?>
                  </div>
                  <div class="actions">
                    <!--<a class="reply">Reply</a>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="ui divider"></div>
        <?php endwhile; endif; wp_reset_query();?>
        </div>
      <div>
    </div>
  </div>
</div><!--#mainbody-->

<?php get_footer(); ?>
