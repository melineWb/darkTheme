<?php get_header(); ?>
<div class="textBlc grey lighten-5">
  <div class="container containerFB">
    <div class="row">
      <h2>
        <?php _e("[:ru]Отзывы
        [:en]Feedback
        [:it]Commenti", "framework") ?>
      </h2>
      <div class="commentlist">
        <?php echo do_shortcode("[FB_slider]"); ?>
      </div>
    </div>
  </div>
</div>

<div class="blockFedbPAralax">
  <div class="formBlcFedbBox">
    <div class="formBlcFedb white">
      <h2>
        <?php _e("[:ru]Оставьте свой отзыв
        [:en]Leave your comment
        [:it]Lascia il tuo commento", "framework") ?>
      </h2>
      <div class="formBlc">
        <p class="center">
          <?php _e("[:ru]Войти с помощью профиля соц. сетей:
          [:en]Sign in with your social networking profile:
          [:it]Accedi con il tuo profilo di social networking:", "framework") ?>
        </p>
        <div class="socialRegBlck center">
          <?php
          // social config
          $redirect_uri = 'http://vladvaswood.com/feedback';

          $configVk = array(
                "client_id" => "5894898",
                "client_secret" => "lBdZEjjEmuYEDut7TXaf",
                "redirect_uri" => "http://vladvaswood.com/feedback?provider=vk"
          );

          $configOd = array(
            "client_id" => "1249798144",
            "client_secret" => "B2875546167726D44B7D7F32",
            "public_key" => "CBAJGPHLEBABABABA",
            "redirect_uri" => "http://vladvaswood.com/feedback?provider=odnoklassniki"
          );

          $configFb = array(
                "client_id" => "272380606529630",
                "client_secret" => "cdb979084a072cab2378d9d772b879fd",
                "uri" => "https://graph.facebook.com/oauth/access_token",
                "redirect_uri" => "http://vladvaswood.com/feedback?provider=facebook"
          );
          ?>
          <a class="btn-floating btn-large waves-effect waves-light" item="vk" href="http://oauth.vk.com/authorize?client_id=<?php echo $configVk["client_id"] ?>&redirect_uri=<?php echo $configVk["redirect_uri"] ?>&response_type=code" style="background: #6888ad"><i class="fa fa-vk" aria-hidden="true"></i></a>
          <a class="btn-floating btn-large waves-effect waves-light" item="facebook" style="background: #3b5998" href="https://www.facebook.com/dialog/oauth?client_id=<?php echo $configFb["client_id"] ?>&redirect_uri=<?php echo $configFb["redirect_uri"] ?>&response_type=code"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a class="btn-floating btn-large waves-effect waves-light" item="odnoklassniki" style="background: #ee8208" href="https://connect.ok.ru/oauth/authorize?client_id=<?php echo $configOd["client_id"] ?>&response_type=code&redirect_uri=<?php echo $configOd["redirect_uri"] ?>"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a>

          <script>
                var userUrlSoc = '';
                var userPhotoSoc = '';
          </script>

        </div>
        <form class="col s12 diznF formValid" method ="POST">
          <div class="row">
            <div class="input-field col s6">
              <input id="nameFB" name="nameFB" type="text" class="validate">
              <label for="nameFB">
                <?php _e("[:ru]Имя
                [:en]Name
                [:it]Nome", "framework") ?>
              </label>
            </div>

            <div class="input-field col s6">
              <input id="emailFB" type="email" class="" name="emailFB">
              <label for="emailFB">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="textareaFB" class="validate materialize-textarea" name="textareaFB"></textarea>
              <label for="textareaFB">
                <?php _e("[:ru]Сообщение
                [:en]Message
                [:it]Messaggio", "framework") ?>
              </label>
            </div>
          </div>

          <div class="center">
            <button class="btnRed btn waves-effect waves-light submitBtnFB" type="button">
              <?php _e("[:ru]Отправить
              [:en]Send
              [:it]Inviare", "framework") ?>
            </button>
          </div>
        </form>

        <?php
        getToken();
       //  Получение токена
       function getToken() {
         $itemCur = $_GET['provider'];

          switch ($itemCur) {
            case 'odnoklassniki':
                 if (isset($_GET['code'])) {
                   $client_id = '1249798144';
                   $public_key = 'CBAJGPHLEBABABABA';
                   $client_secret = 'B2875546167726D44B7D7F32';
                   $redirect_uri = 'http://vladvaswood.com/feedback?provider=odnoklassniki';
                   $result = false;

                   $params = array(
                     'code' => $_GET['code'],
                     'client_id' => $client_id,
                     'client_secret' => $client_secret,
                     'redirect_uri' => $redirect_uri,
                     'grant_type' => 'authorization_code',
                   );

                   $url = 'https://api.ok.ru/oauth/token.do';

                   $curl = curl_init();
                   curl_setopt($curl, CURLOPT_URL, $url);
                   curl_setopt($curl, CURLOPT_POST, 1);
                   curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
                   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                   $result = curl_exec($curl);
                   curl_close($curl);

                   $tokenInfo = json_decode($result, true);

                   if (isset($tokenInfo['access_token']) && isset($public_key)) {
                       $sign = md5("application_key={$public_key}format=jsonmethod=users.getCurrentUser" . md5("{$tokenInfo['access_token']}{$client_secret}"));

                       $params = array(
                           'method'          => 'users.getCurrentUser',
                           'access_token'    => $tokenInfo['access_token'],
                           'application_key' => $public_key,
                           'format'          => 'json',
                           'sig'             => $sign
                       );

                       $userInfo = json_decode(file_get_contents('http://api.odnoklassniki.ru/fb.do' . '?' . urldecode(http_build_query($params))), true);
                       if (isset($userInfo['uid'])) {
                           $result = true;
                       }
                   }
                 }


                 if ($result) {
                     $userNameSoc = $userInfo['name'];
                     $userUrlSoc = 'http://www.ok.ru/profile/' . $userInfo['uid'] . '';
                     $userPhotoSoc = $userInfo['pic_2'];
                     echo '<script>
                           var userNameSoc = "' . $userNameSoc . '";
                           var userUrlSoc = "' . $userUrlSoc . '";
                           var userPhotoSoc = "' . $userPhotoSoc . '";
                           $("#nameFB").val(userNameSoc);
                           $("#emailFB").val("ok.ru");
                           </script> ';
                 }
                break;

            case 'facebook':
                if (isset($_GET['code'])) {
                  $result = false;
                  $client_id = '272380606529630'; // Client ID
                  $client_secret = 'cdb979084a072cab2378d9d772b879fd'; // Client secret
                  $redirect_uri = 'http://vladvaswood.com/feedback?provider=facebook'; // Redirect URIs

                  $params = array(
                      'client_id'     => $client_id,
                      'redirect_uri'  => $redirect_uri,
                      'client_secret' => $client_secret,
                      'code'          => $_GET['code']
                  );

                  $url = 'https://graph.facebook.com/oauth/access_token';
                  $tokenInfo = null;
                  parse_str(file_get_contents($url . '?' . http_build_query($params)), $tokenInfo);
                  if (count($tokenInfo) > 0 && isset($tokenInfo['access_token'])) {
                          $params = array('access_token' => $tokenInfo['access_token']);

                          $userInfo = json_decode(file_get_contents('https://graph.facebook.com/me' . '?' . urldecode(http_build_query($params))), true);
                          if (isset($userInfo['id'])) {
                              $userInfo = $userInfo;
                              $result = true;
                          }
                      }
               }

               if ($result) {
                 $userNameSoc = $userInfo['name'];
                 $userUrlSoc =  $userInfo['link'];
                 $userPhotoSoc = 'http://graph.facebook.com/' . $userInfo['id'] . '/picture?type=large';
                 echo '<script>
                       var userNameSoc = "' . $userNameSoc . '";
                       var userUrlSoc = "' . $userUrlSoc . '";
                       var userPhotoSoc = "' . $userPhotoSoc . '";
                       $("#nameFB").val(userNameSoc);
                       $("#emailFB").val("facebook");
                       </script> ';
               }
              break;

            case 'vk':
                if (isset($_GET['code'])) {
                  $client_id = '5894898';
                  $client_secret = 'lBdZEjjEmuYEDut7TXaf';
                  $redirect_uri = 'http://vladvaswood.com/feedback?provider=vk';
                  $params = array(
                      'client_id' => $client_id,
                      'client_secret' => $client_secret,
                      'code' => $_GET['code'],
                      'redirect_uri' => $redirect_uri
                  );

                  $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

                  if (isset($token['access_token'])) {
                      $params = array(
                          'uids'         => $token['user_id'],
                          'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
                          'access_token' => $token['access_token']
                      );

                      $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);

                      if (isset($userInfo['response'][0]['uid'])) {
                          $userInfo = $userInfo['response'][0];
                          $result = true;
                      }
                  }

                  if ($result) {
                      $userNameSoc = $userInfo['first_name'];
                      $userUrlSoc =  $userInfo['screen_name'];
                      $userPhotoSoc = $userInfo['photo_big'];
                      echo '<script>
                            var userNameSoc = "' . $userNameSoc . '";
                            var userUrlSoc = "' . $userUrlSoc . '";
                            var userPhotoSoc = "' . $userPhotoSoc . '";
                            $("#nameFB").val(userNameSoc);
                            $("#emailFB").val("vk.com");
                            </script> ';
                  }
                }
                break;
           }
         }
        ?>
      </div>
    </div>
  </div>
  <div class="parallax-container">
    <div class="bgDarkWind">
    </div>
    <div class="parallax"><img src="<?php bloginfo('template_url'); ?>/img/interior-1026440.jpg"></div>
  </div>
</div>


<?php get_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/sweet-alert.js"></script>
<script type="text/javascript">
var ajaxurlFront = "<?php echo admin_url('admin-ajax.php'); ?>";

  $(document).ready(function(){
    $('.parallax').parallax();


    $('.submitBtnFB').click(function() {
      var nameFB = $("#nameFB").val();
      var emailFB = $("#emailFB").val();
      var textareaFB = $("#textareaFB").val();

      $('.formValid .validate').each(function(){
        if ($(this).val() === '' || $(this).hasClass("invalid")) {
          $(this).addClass("invalid");
          sweetAlert("Oops...", "Заполните все поля!", "error");
          var timerId = setTimeout(function(){
            $('.sweet-alert .confirm').trigger( 'click' );
          }, 3000);

        }
      })
      if (!$('.formValid .validate').hasClass("invalid")) {
        $.ajax({
          url: ajaxurlFront,
          data: {
            "action": "addFBdata",
            "nameFB": nameFB,
            "emailFB": emailFB,
            "textareaFB": textareaFB,
            "userUrlSoc": userUrlSoc,
            "userPhotoSoc": userPhotoSoc
          },
          type: "post",
          success: function(data) {
            $('.formValid input').val('');
            $('.formValid textarea').val('');
            swal("Good job!", "", "success");
            var timerId = setTimeout(function(){
              $('.sweet-alert .confirm').trigger( 'click' );
              window.location.href = 'http://vladvaswood.com/feedback/';
            }, 3000);
            // clearTimeout(timerId);
          }
        });
      }
    });
  })
</script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fedbackMel.js"></script>
