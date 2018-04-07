<?php get_header(); ?>
<div class="grey lighten-5 videoBlckPage">
  <div class="container">
    <h2>
      <?php _e("[:ru]Наши работы [:en]Video works [:it]Il lavoro video", "framework") ?>
    </h2>
    <div class="row">
      <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'post_type' => 'video',
        'paged' => $paged,
        'posts_per_page' => 9
      );
      query_posts($args);

      if (have_posts()) :
        while (have_posts()) : the_post();
        $videourl = get_field( "videourl" );
        ?>
        <div class="col m4 s12">
          <div class="videoItem">
            <?php echo $videourl ?>
          </div>
        </div>
        <?php
        endwhile;
        endif;
        ?>
      </div>
      <div class="row">
        <?php
        wpbeginner_numeric_posts_nav();
        wp_reset_query();
        ?>
      </div>
    </div>
  </div>
  <?php get_footer(); ?>
  </body>
  </html>
