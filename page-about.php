  <?php get_header(); ?>
    <div class="textBlc textBlcImgF grey lighten-5">
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
          <?php endwhile;
          wp_reset_query(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="parallax-container">
      <div class="bgDarkWind">
        <div class="row">
          <div class="container center">
            <h2>
              <?php _e("[:ru]Наши преимущества [:en]Our advantages [:it]Nostri vantaggi", "framework") ?>
            </h2>
            <div class="col m4 s12">
              <div class="itemplus">
                <img src="<?php bloginfo('template_url'); ?>/img/111.png" alt="<?php echo the_title() ?>">
                <p>
                  <?php _e("[:ru]Пиломатериалы под заказ необходимых размеров и объемов
                  [:en]Tailor-made lumber products of all necessary sizes and volumes
                   [:it]Materiali di legname su commissione di tutte le misure e quantità necessarie", "framework") ?>
                </p>
              </div>
            </div>
            <div class="col m4 s12">
              <div class="itemplus">
                <img src="<?php bloginfo('template_url'); ?>/img/112.png" alt="<?php echo the_title() ?>">
                <p>
                <?php _e("[:ru]Изготовление мебели на любой вкус
                [:en]Manufacture of furniture customized for any design
                 [:it]Produzione dei mobili sulla commissione individuale per ogni tipo di design", "framework") ?>
               </p>
              </div>
            </div>
            <div class="col m4 s12">
              <div class="itemplus">
                <img src="<?php bloginfo('template_url'); ?>/img/113.png" alt="<?php echo the_title() ?>">
                <p>
                  <?php _e("[:ru]Доступные цены
                  [:en]Reasonable prices
                   [:it]Prezzi ragionevoli", "framework") ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="center">
          <a class="btnRed waves-effect waves-light btn" href="/contacts">
            <?php _e("[:ru]Контакты [:en]Contacts [:it]Contatti", "framework") ?>
            </a>
        </div>
      </div>
      <div class="parallax"><img src="<?php bloginfo('template_url'); ?>/img/interior-1026440.jpg"></div>
    </div>
  <?php get_footer(); ?>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.parallax').parallax();
    });
  </script>
</body>
</html>
