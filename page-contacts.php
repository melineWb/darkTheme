<?php get_header(); ?>
<div class="textBlc grey lighten-5">
  <div class="container white">
    <div class="row">
      <?php
      while ( have_posts() ) : the_post();
      ?>
      <h2><?php the_title(); ?></h2>
      <div class="col m6 s12">
        <?php the_content(); ?>
        <?php endwhile;
        wp_reset_query(); ?>
        <?php
        $args = array(
          'post_type' => 'contacts'
        );
        query_posts($args);
        if (have_posts()) :
          while (have_posts()) : the_post();
          $phone1 = get_field( "phone1" );
          $phone2 = get_field( "phone2" );
          $email = get_field( "email" );
          $email2 = get_field( "email2" );
          $vk = get_field( "vk" );
          $odnoklassniki = get_field( "odnoklassniki" );
          $facebook = get_field( "facebook" );
          $google_plus = get_field( "google_plus" );
        ?>
        <p>
          <?php _e("[:ru]Наши контактные телефоны: [:en]Our contact phone numbers: [:it]Nostri numeri di telefono per contattarci:", "framework")  ?>
        </p>
        <?php if ($phone1 != '') { ?>
          <a class="contLink" href='tel:+38"<?php echo $phone1 ?>"' class="contLink">
            <i class="fa fa-phone redI" aria-hidden="true"></i><?php echo $phone1 ?></a>
        <?php } ?>
        <?php if ($phone2 != '') { ?>
          <a class="contLink" href='tel:+38"<?php echo $phone2 ?>"' class="contLink">
            <i class="fa fa-phone redI" aria-hidden="true"></i><?php echo $phone2 ?></a>
        <?php } ?>
        <?php if ($email != '') { ?>
          <p>
            <?php _e("[:ru]Вы можете связатся с нами по электронной почте:
            [:en]You can contact us via e-mail:
            [:it]Potete contattarci per posta elettronica:", "framework")  ?>
          </p>
          <a class="contLink" href='mailto:"<?php echo $email ?>"' class="contLink">
            <i class="fa fa-envelope-o redI" aria-hidden="true"></i><?php echo $email ?></a>
        <?php } ?>
        <?php if ($email2 != '') { ?>
          <a class="contLink" href='mailto:"<?php echo $email2 ?>"' class="contLink">
            <i class="fa fa-envelope-o redI" aria-hidden="true"></i><?php echo $email2 ?></a>
        <?php } ?>
      </div>
      <div class="formBlc">
        <div class="col m6 s12 diznF ">
            <form class="form formValid">
              <div class="row">
                <div class="input-field col m6 s12">
                  <input id="first_name" name="first_name" type="text" class="validate">
                  <label for="first_name">
                    <?php _e("[:ru]Имя
                    [:en]Name
                    [:it]Nome", "framework") ?>
                  </label>
                </div>
                <div class="input-field col m6 s12">
                  <input id="last_name" name="last_name" type="text" class="validate">
                  <label for="last_name">
                    <?php _e("[:ru]Фамилия
                    [:en]Last name
                    [:it]Cognome", "framework") ?>
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col m6 s12">
                  <input id="phonenum" name="phonenum" type="text" class="validate">
                  <label for="phonenum">
                    <?php _e("[:ru]Телефон
                    [:en]Phone
                    [:it]Telefono", "framework") ?>
                  </label>
                </div>
                <div class="input-field col m6 s12">
                  <input id="email" name="email" type="email" class="validate"> <label for="email">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <textarea id="textarea1" name="textarea1" class="materialize-textarea"></textarea>
                  <label for="textarea1">
                    <?php _e("[:ru]Сообщение
                    [:en]Message
                    [:it]Messaggi", "framework") ?>
                  </label>
                </div>
              </div>
              <div class="center">
                <button class="btnRed btn waves-effect waves-light submitBtn" type="button">
                  <?php _e("[:ru]Отправить
                  [:en]Send
                  [:it]Inviare", "framework") ?>
                </button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="greyBgImg grey darken-4 socialBg">
  <div class="socialIcoBlc center">
    <?php if ($facebook != '') { ?>
      <a href='<?php echo $facebook ?>' target="blank">
        <i class="fa fa-facebook" aria-hidden="true" style="color: #3b5998"></i>
      </a>
    <?php } ?>
    <?php if ($google_plus != '') { ?>
      <a href='<?php echo $google_plus ?>' target="blank">
        <i class="fa fa-google-plus" aria-hidden="true" style="color: #db4437"></i>
      </a>
    <?php } ?>
    <?php if ($vk != '') { ?>
      <a href='<?php echo $vk ?>' target="blank">
        <i class="fa fa-vk" aria-hidden="true" style="color: #6888ad"></i>
      </a>
    <?php } ?>
    <?php if ($odnoklassniki != '') { ?>
      <a href='<?php echo $odnoklassniki ?>' target="blank">
        <i class="fa fa-odnoklassniki" aria-hidden="true" style="color: #ee8208"></i>
      </a>
    <?php } ?>
  </div>
</div>

<?php
  endwhile;
  endif;
  wp_reset_query();
?>


<div class="mapBlck">
  <div id='map'></div>
  <div class="mapDesc center">
    <p>
      <?php _e("[:ru]Украина, Черниговская область, г.Городня, ул. Троицкая 64-А
      [:en]Ukraine, Chernigov region, city Gorodnya, Trinity Street 64-A
      [:it]Ucraina, regione Chernigov, città Gorodnya, Trinity Street 64-A", "framework") ?>
    </p>
  </div>
</div>
<?php get_footer(); ?>

<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyD8uOs5Gt5KpC_FocmJfwN6vaCUPrpucKk&sensor=false&extension=.js'></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/sweet-alert.js"></script>
<script type="text/javascript">
var ajaxurlFront = "<?php echo admin_url('admin-ajax.php'); ?>";

  $(document).ready(function(){
    $('.parallax').parallax();

    $(".submitBtn").click(function() {
      var first_name = $("#first_name").val();
      var last_name = $("#last_name").val();
      var email = $("#email").val();
      var phonenum = $("#phonenum").val();
      var textarea1 = $("#textarea1").val();
      $('.formValid .validate').each(function(){
        if ($(this).val() === '' || $(this).hasClass("invalid")) {
          $(this).addClass("invalid");
          sweetAlert("Oops...", "Заполните все поля!", "error");
          setTimeout(function(){
            $('.sweet-alert .confirm').trigger( 'click' );
          }, 3000);

        }
      })
      if (!$('.formValid .validate').hasClass("invalid")) {
        $.ajax({
          url: ajaxurlFront,
          data: {
            "action": "sendEmail",
            "first_name": first_name,
            "last_name": last_name,
            "email": email,
            "phonenum": phonenum,
            "textarea1": textarea1
          },
          type: "post",
          success: function(data) {
            console.log(data);
            $('.formValid input').val('');
            $('.formValid textarea').val('');
            swal("Good job!", "Ваше сообщение отправлено!", "success");
            setTimeout(function(){
              $('.sweet-alert .confirm').trigger( 'click' );
            }, 3000);
          }
        });
      }
    });
  })
</script>
<script>
  google.maps.event.addDomListener(window, 'load', init);
  var map;
  function init() {
    var mapOptions = {
      center: new google.maps.LatLng(51.774258, 31.181029),
      zoom: 8,
      zoomControl: true,
      zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL
      },
      disableDoubleClickZoom: true,
      mapTypeControl: true,
      mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
      },
      scaleControl: false,
      scrollwheel: false,
      panControl: true,
      streetViewControl: true,
      draggable: false,
      overviewMapControl: true,
      overviewMapControlOptions: {
        opened: false
      },
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var mapElement = document.getElementById('map');
    var map = new google.maps.Map(mapElement, mapOptions);
    var locatHref = location.host;
    var locatPr = location.protocol;
    var locations = [
      [
        'VladvaS  WooD',
        'Украина, Черниговская область, г. Городня, ул. Троицкая 64-А',
        'd.v.1970@mail.ru',
        'undefined',
        'undefined',
        51.8911132,
        31.5958531,
        'undefined'
      ]
    ];
    for (i = 0; i < locations.length; i++) {
      if (locations[i][1] == 'undefined') {
        description = '';
      } else {
        description = 'locations[i][1]';
      }
      if (locations[i][2] == 'undefined') {
        telephone = '';
      } else {
        telephone = locations[i][2];
      }
      if (locations[i][3] == 'undefined') {
        email = '';
      } else {
        email = locations[i][3];
      }
      if (locations[i][4] == 'undefined') {
        web = '';
      } else {
        web = locations[i][4];
      }
      if (locations[i][7] == 'undefined') {
        markericon = locatPr +'//'+ locatHref +'/wp-content/themes/darkTheme/img/map.png';
      } else {
        markericon = locations[i][7];
      }
      marker = new google.maps.Marker({
        icon: markericon,
        position: new google.maps.LatLng(locations[i][5], locations[i][6]),
        map: map,
        title: locations[i][0],
        desc: locations[i][1],
        tel: telephone,
        email: email,
        web: web
      });
      link = '';
      // bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web, link);
    }
  }
</script>
</body>
</html>
