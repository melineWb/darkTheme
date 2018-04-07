<?php
wp_redirect( 'http://www.example.com', 301 );
if (isset($_GET['code'])) {
  $client_id = '1249798144';
  $public_key = 'CBAJGPHLEBABABABA';
  $client_secret = 'B2875546167726D44B7D7F32';
  $redirect_uri = 'http://vladvaswood.com/feedback';
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
   //  $userEmailSoc = $userInfo['email'];
    $userUrlSoc = 'http://www.ok.ru/profile/' . $userInfo['uid'] . '';
    $userPhotoSoc =$userInfo['pic_2'];
    echo $userNameSoc;
    // wp_redirect( 'http://vladvaswood.com/feedback/', 301 );

}


?>
