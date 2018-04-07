<footer class="page-footer greyBgImg grey darken-4">
  <div class="container">
    <div class="row center">
      <div class="col l3 s12 offset-l1">
        <a class="contLink" href="tel:+380984404878">
          <i class="fa fa-phone redI" aria-hidden="true"></i>098 440 48 78</a>
        <a class="contLink" href="tel:+380661072546">
          <i class="fa fa-phone redI" aria-hidden="true"></i>066 107 25 46</a>
      </div>
      <div class="col l4 s12">
        <span class="addr">
          <i class="fa fa-map-marker redI" aria-hidden="true"></i>
          <?php _e("[:ru]Украина, Черниговская область, г.Городня, ул. Троицкая 64-А
          [:en]Ukraine, Chernigov region, city Gorodnya, Trinity Street 64-A
          [:it]Ucraina, regione Chernigov, città Gorodnya, Trinity Street 64-A", "framework") ?>
        </span>
      </div>
      <div class="col l3 s12 mailcol">
        <a class="contLink" href="mailto:d.v.1970@i.ua">
          <i class="fa fa-envelope-o redI" aria-hidden="true"></i>d.v.1970@i.ua</a>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      <a class="grey-text text-lighten-4 right">© 2016 Copyright VladvaS WooD
      </span>
    </div>
  </div>
</footer>

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function(){
    $('.language-chooser').prepend('<li class="cuurIt"><?php echo qtrans_getLanguage() ?></li> ');
  });
  $(document).ready(function () {
    $(".button-collapse").sideNav();
    $(".dropdown-button").dropdown();
    $('.materialboxed').materialbox();
    var mediaBoxPar;
    $('.cardHoverText').click(function () {
      mediaBoxPar = $(this).closest('.cardHover');
      mediaBoxPar = $(mediaBoxPar).find('.materialboxed');
      mediaBoxPar.trigger( 'click' );
      console.log('sdf');
    })
    $('.language-chooser')
    $('.language-chooser').click(function(){
      var choserLg = $(".language-chooser");
      choserLg.hasClass('openLg') ? choserLg.removeClass('openLg') : choserLg.addClass('openLg');
    })

  });
</script>
