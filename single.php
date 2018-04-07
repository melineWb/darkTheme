<?php get_header(); ?>
  <div class="textBlc grey lighten-5">
    <div class="container white">
      <div class="row">
        <div class="col m12">
          <?php
          while ( have_posts() ) : the_post();
          if ( has_post_thumbnail() ) {
            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'  );
            $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), $size, $icon );
          }
          ?>
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
          <?php
            endwhile;
            $urlLink = $post->post_name;
            wp_reset_query();
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php
    $args = array(
      'post_type' => 'photo',
      'nopaging' => '1'
    );
    query_posts($args);
    echo $cat;

    if (have_posts()) :
  ?>
  <div class="grey lighten-5">
    <div class="container">
      <h2>
      <?php _e("[:ru]Наши работы [:en]Our works [:it]Nostri risultati", "framework") ?>
      </h2>
      <div class="row">
          <?php

            while (have_posts()) : the_post();
            $cat = get_field( "cat" );
            if ($urlLink == $cat) {
              if ( has_post_thumbnail()) {
                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                $tr_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
          ?>
          <div class="col m4 s12">
            <div class="card cardHover">
              <div class="card-image">
                <div class="imgMin">
                  <?php
                  echo '<img src="' . $tr_image_url[0] . '" alt="">';
                  ?>
                </div>
                <?php
                echo '<img class="materialboxed" src="' . $large_image_url[0] . '" alt="">';
                ?>
                  <div class="cardHoverText center">
                      <h3 class="card-title"><?php the_title() ?></h3>
                      <div class="cardDescr">
                        <?php the_content() ?>
                      </div>
                      <div class="icoPlus">
                        <span>+</span>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
              }
            }
          endwhile;
          endif;
          wp_reset_query();
          ?>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
<script type="text/javascript">
$(document).ready(function () {
  $('.pagination li a').each(function(index) {
    var oldLinkhref = $( this ).attr('href');
    var newLinkhref = oldLinkhref + '#pagin';
    $( this ).attr('href', newLinkhref);
  });
});
</script>
</body>
</html>
