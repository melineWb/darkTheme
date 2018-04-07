<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Главная</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style/sweet-alert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style/style.css">
  <link rel="icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico"/>

  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

</head>
<body>
  <ul id="dropdown1" class="dropdown-content grey darken-4">
    <li><a href="#!">Блок-хаус</a></li>
    <li><a href="#!">Вагонка</a></li>
    <li class="divider"></li>
    <li><a href="#!">Каталог</a></li>
  </ul>
  <ul id="dropdown2" class="dropdown-content grey darken-4">
    <li><a href="#!">Блок-хаус</a></li>
    <li><a href="#!">Вагонка</a></li>
    <li class="divider"></li>
    <li><a href="#!">Каталог</a></li>
  </ul>
  <div class="navbar-fixed">
    <div class="row">
      <nav class="nav-extended grey darken-4">
        <div class="nav-wrapper">
          <div class="col s12">
            <div class="nav-wrapper">
              <a href="/" class="brand-logo"><h1>VladvaS WooD</h1></a>
              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>

              <div class="contBlH hide-on-med-and-down">
                <div class="inlT">
                  <a class="contLink" href="tel:+380984404878">
                    <i class="fa fa-phone redI" aria-hidden="true"></i>098 440 48 78</a>
                </div>
                <div class="inlT">
                  <a class="contLink" href="tel:+380661072546">
                    <i class="fa fa-phone redI" aria-hidden="true"></i>066 107 25 46
                  </a>
                </div>
                <div class="inlT mailcol">
                  <a class="contLink" href="mailto:d.v.1970@i.ua">
                    <i class="fa fa-envelope-o redI" aria-hidden="true"></i>d.v.1970@i.ua</a>
                </div>
                <div class="inlT mailcol">
                  <a class="contLink" href="mailto:1970driga@gmail.com">
                    <i class="fa fa-envelope-o redI" aria-hidden="true"></i>1970driga@gmail.com</a>
                </div>
              </div>
              <ul class="right hide-on-med-and-down">
                <?php wp_nav_menu( array( 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
                <?php qtranxf_generateLanguageSelectCode('dropdown', ''); ?>
              </ul>
              <ul class="grey darken-4 side-nav" id="mobile-demo">
                <?php wp_nav_menu( array( 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
                <li class="divider"></li>
                <li><a class="contLink" href="tel:+380984404878">
                  <i class="fa fa-phone redI" aria-hidden="true"></i>098 440 48 78</a>
                </li>
                <li>
                  <a class="contLink" href="tel:+380661072546">
                    <i class="fa fa-phone redI" aria-hidden="true"></i>066 107 25 46
                  </a>
                </li>
                <li>
                  <a class="contLink" href="mailto:meline.pe081@gmail.com">
                    <i class="fa fa-envelope-o redI" aria-hidden="true"></i>d.v.1970@mail.ru</a>
                </li>
                <li class="divider"></li>
                <?php qtranxf_generateLanguageSelectCode('dropdown', ''); ?>
             </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
