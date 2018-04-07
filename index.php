  <?php get_header(); ?>

    <div class="sliderBlc">
      <div class="carousel carousel-slider center" data-indicators="true">
        <div class="prevItemS ItemS">
          <i class="fa fa-angle-left" aria-hidden="true"></i>
        </div>
        <div class="nextItemS ItemS">
          <i class="fa fa-angle-right" aria-hidden="true"></i>
        </div>
        <div class="carousel-fixed-item center">
          <a class="btnRed waves-effect waves-light btn" href="/contacts">
            <?php _e("[:ru]Связаться с нами [:en]Connect with us [:it]Contattarci", "framework") ?>
          </a>
          <i class="fa fa-angle-double-down downClick" aria-hidden="true"></i>
        </div>
        <?php
        $args = array(
          'post_type' => 'sliderMel',
          'has_archive' => true
        );
        query_posts($args);

        if (have_posts()) :
          while (have_posts()) : the_post();
            if ( has_post_thumbnail()) {
               $tr_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
               ?>
               <a class="carousel-item" href='<?php the_permalink() ?>'>
                 <img src="<?php echo $tr_image_url[0] ?>" alt="<?php echo the_title() ?>">
               </a>
             <?php
             }
          endwhile;
      endif;
      wp_reset_query();
      ?>
      </div>
    </div>

    <div class="grey lighten-5">
      <div class="container">
        <col l4 m6 s12>
        <?php
          $id = 5;
          $post = get_post($id);
          $content = $post->post_content;
        ?>
        <div class="row">
          <div class="col m12 center">
            <h2><?php the_title() ?></h2>
            <div class="contentExcerpt"><?php the_excerpt() ?></div>
            <a class="btnRed waves-effect waves-light btn" href='<?php the_permalink() ?>'>
              <?php _e("[:ru]Читать подробнее [:en]Read more [:it]Per saperne di più", "framework") ?>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="grey darken-4 centerQuote">
      <div class="container">
        <div class="row">
          <div class="col m12 center">
            <i class="fa fa-quote-left grey-text quoteIco" aria-hidden="true"></i>
            <p class="grey-text">
              <?php _e("[:ru]При изготовлении пиломатериалов мы используем современное оборудование, работаем с соблюдением всех норм и стандартов. Находясь в непрерывном развитии, постоянно осваиваем новые материалы и технологии.
               [:en]In the manufacture of lumber we use modern equipment, working in compliance with all regulations and standards. We are in continuous development, constantly developing new materials and technologies.
                [:it]Nella produzione di legname che utilizziamo attrezzature moderne, lavorando nel rispetto di tutte le normative e gli standard. Siamo in continua evoluzione, in costante sviluppo di nuovi materiali e tecnologie.", "framework") ?>
              </p>
          </div>
        </div>
      </div>
    </div>

    <div class="grey lighten-5" id="pagin">
      <div class="container">
        <h2>
          <?php _e("[:ru]Что мы делаем [:en]What we do [:it]Di che cosa ci occupiamo", "framework") ?>
        </h2>
        <div class="row">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  					$args = array(
  						'post_type' => 'post',
              'paged' => $paged,
              'posts_per_page' => 3,
  						'has_archive' => true
  					);
  					query_posts($args);

  					if (have_posts()) :
              while (have_posts()) : the_post();
              ?>
              <div class="col l4 m4 s12">
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
        <div class="row">
          <?php
          wpbeginner_numeric_posts_nav();
          wp_reset_query();
          ?>
        </div>
      </div>
    </div>

    <div class="greyBgImg grey darken-4 vadeoInd">
      <div class="container">
        <h2>
          <?php _e("[:ru]Видео работы[:en]Video of work [:it]Video del lavoro", "framework") ?>
        </h2>
        <div class="row">
          <?php
          $args = array(
            'post_type' => 'video',
            'posts_per_page' => 3
          );
          query_posts($args);

          if (have_posts()) :
            $count = 0;
            while (have_posts()) : the_post();
            $videourl = get_field( "videourl" );
            $count++;
            ?>
            <?php if ($count == 1){ ?>
              <div class="col m8 s12">
                <div class="videoItem">
                  <?php echo $videourl ?>
                </div>
              </div>
            <?php } ?>
            <?php if ($count == 2){ ?>
              <div class="col m4 s12">
                <div class="videoItem videoItemm">
                  <?php echo $videourl ?>
                </div>
            <?php } ?>
            <?php if ($count == 3){ ?>
                <div class="videoItem videoItemm">
                  <?php echo $videourl ?>
                </div>
              </div>
            <?php } ?>

          <?php
          endwhile;
          endif;
          wp_reset_query();
          ?>
        </div>
        <div class="center">
          <a href='<?php the_permalink() ?>' class="btnRed waves-effect waves-light btn">
            <?php _e("[:ru]Больше видео [:en]More videos [:it]Altri video", "framework") ?>
          </a>
        </div>
      </div>
    </div>

    <div class="grey lighten-5">
      <div class="container">
        <h2>
        <?php _e("[:ru]Последние работы [:en]Last works [:it]Ultimi lavori", "framework") ?>
        </h2>
        <div class="row">
          <?php
          $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 6,
            'has_archive' => true
          );
          query_posts($args);

          if (have_posts()) :
            while (have_posts()) : the_post();
            if ( has_post_thumbnail()) {
               $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
               $tr_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
             ?>
            <div class="col m4 s12">
              <div class="card cardHover">
                <div class="card-image">
                  <div class="imgMin">
                    <img src="<?php echo $tr_image_url[0] ?>" alt="<?php echo the_title() ?>">
                  </div>
                  <img class="materialboxed" src="<?php echo $large_image_url[0] ?>" alt="<?php echo the_title() ?>">
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
              endwhile;
              endif;
              wp_reset_query();
            ?>
          </div>
          <div class="center">
            <a href="/catalog"class="btnRed waves-effect waves-light btn">
              <?php _e("[:ru]Больше работ [:en]More works [:it]Altri lavori", "framework") ?>
            </a>
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
        $('.carousel.carousel-slider').carousel({
          full_width: true,
          indicators: true
        });
        $('.parallax').parallax();
      });
      $(document).ready(function () {
        var wW = $(window).width();
        var wH = $(window).height();
        if (wW > 1200) {
          $('.sliderBlc').attr('style', 'height:' + (wH-64) + 'px');
          $('.sliderBlc .carousel').attr('style', 'height:' + (wH-64) + 'px');
          $('.sliderBlc ul:not(.browser-default)').attr('style', 'top:' + (wH - 200) + 'px');
          $('.sliderBlc ul:not(.browser-default)').css('bottom', 'auto');
          $('.carousel.carousel-slider .carousel-fixed-item.with-indicators').css('bottom', 'auto');
          $('.carousel.carousel-slider .carousel-fixed-item.with-indicators').attr('style', 'top:' + (wH - 150) + 'px');

          $('.downClick').click(function(){
            $('html,body').animate({
              scrollTop: wH - 64
            })
          })
        }
        var carH = $('.sliderBlc').height();
        $('.ItemS').css('height', carH);
        $('.ItemS i').css('margin-top', carH / 2 - 16);
        $('.nextItemS i').click(function () {
          $('.carousel').carousel('next');
        });
        $('.prevItemS i').click(function () {
          $('.carousel').carousel('prev');
        });
      });
    </script>
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
