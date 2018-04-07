<?php get_header(); ?>
<div class="grey lighten-5">
  <div class="container">
    <h2>
      <?php _e("[:ru]Каталог [:en]Catalog [:it]Catalogo", "framework") ?>
    </h2>
    <div class="row">
        <?php
        $args = array(
          'post_type' => 'post',
          'has_archive' => true
        );
        query_posts($args);

        if (have_posts()) :
          while (have_posts()) : the_post();
          ?>
          <div class="col l4 m6 s12">
            <div class="card">
              <div class="card-image">
                <a href='<?php the_permalink() ?>'>
                  <?php if ( has_post_thumbnail()) {
                     $tr_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
                     ?>
                     <img src="<?php echo $tr_image_url[0] ?>" alt="<?php the_title() ?>">
                     <?php
                   }
                   ?>
                </a>
              </div>
              <div class="card-content">
                <a href='<?php the_permalink() ?>'>
                  <h3 class="card-title"><?php the_title() ?></h3>
                </a>
                <?php the_content() ?>
              </div>
              <div class="card-action">
                <a href='<?php the_permalink() ?>'>
                  <?php _e("[:ru]Читать подробнее [:en]Read more [:it]Per saperne di più", "framework") ?>
                </a>
              </div>
            </div>
          </div>
          <?php
          endwhile;
      endif;
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
