<?php
/***************************************************************/
/******* Librería de llamadas a la API de Cheetah *************/
/*************************************************************/

/************* Obtener TOKEN de Cheetah ***********************/
function get_token(){

    $clientId = CH_CLIENT_ID;
    $consumerKey = CH_CONSUMER_KEY;
    $consumerSecret = CH_CONSUMER_SECRET;

    // Header
    $headers = array(
        "grant_type" => "password",
        "client_id" => $clientId,
        "username" => $consumerKey,
        "password" => $consumerSecret,
        "content_type" => "application/x-www-form-urlencoded"
    );
    $postText = http_build_query($headers);

    // URL
    $url = "https://api.ccmp.eu/services/authorization/oauth2/token";

    try {
        $res = do_curl($url, "POST", "", $postText);
    } catch ( Exception $e ) {
        throw new Exception("Error during the call. Here the message: " . $e -> Message);
    }
    return $res['result']['access_token'];
}

function post_member_experian($members_id, $firstname, $lastname, $email, $telefono, $pais_siglas, $pais_nombre, $estado = null, $no_fundraising = null){

  // Token
  $token = get_token();

  // Header
  $headers = array(
    "Authorization: Bearer ".$token,
    "content-type: application/json",);

    $url = "https://api.ccmp.eu/services2/api/Recipients/";

    date_default_timezone_set('Europe/Madrid');
    //$now = date("m/d/Y H:i:s");
    $now = date("d/m/Y H:i:s");

    $postText = '{
      "apiPostId": "23",
      "data": [
        {
          "name":"members_id",
          "value":"'.$members_id.'"
        },
        {
          "name": "firstname",
          "value": "'.$firstname.'"
        },
        {
          "name": "lastname2",
          "value": "'.$lastname.'"
        },
        {
          "name": "email",
          "value": "'.$email.'"
        },
        {
          "name":"mobile_sp1_status_id",
          "value":"100"
        },
        {
          "name":"email_sp2_status_id",
          "value":"100"
        },
        {
          "name": "mobile",
          "value": "'.$telefono.'"
        },
        {
          "name": "country_id",
          "value": "'.$pais_siglas.'"
        },
        {
          "name": "country",
          "value": "'.$pais_nombre.'"
        },
        {
          "name":"datejoin",
          "value":"'.$now.'"
        },
        {
          "name":"synchro_update",
          "value":"'.$now.'"
        },
        {
          "name":"estado",
          "value":"'.$estado.'"
        },
        {
          "name":"no_fundraising",
          "value":"'.$no_fundraising.'"
        }]
      }';

      $res = do_curl($url,"POST",$headers,$postText);
      return $res["result"];

}

function post_member_purchase_experian($purchase_id, $product_id, $member_id, $email){

  // Token
  $token = get_token();
  // Header
  $headers = array(
    "Authorization: Bearer ".$token,
    "content-type: application/json",);

    $url = "https://api.ccmp.eu/services2/api/Recipients/";

    date_default_timezone_set('Europe/Madrid');
    $now = date("Y-m-d H:i:s");

    $postText = '{
      "apiPostId": "26",
      "data": [
        {
          "name":"purchase_id",
          "value":"'.$purchase_id.'"
        },
        {
          "name":"members_id",
          "value": "'.$member_id.'"
        },
        {
          "name":"product_id",
          "value": "'.$product_id.'"
        },
        {
          "name":"date",
          "value":"'.$now.'"
        },
        {
          "name":"amountpaid",
          "value":"0"
        },
        {
          "name":"type",
          "value":"2"
        },
        {
          "name":"Status",
          "value":"A"
        },
        {
          "name":"countitems",
          "value":"1"
        },
        {
          "name":"source",
          "value":"'.$email.'"
        }
      ]
    }';
    $res = do_curl($url,"POST",$headers,$postText);
    //echo $purchase_id."-".$product_id."-".$member_id;
    return $res["result"];

}

function put_member_experian($members_id, $email, $no_fundraising){

  // Token
  $token = get_token();

  // Header
  $headers = array(
    "Authorization: Bearer ".$token,
    "content-type: application/json",);

    $url = "https://api.ccmp.eu/services2/api/Recipients/";

    date_default_timezone_set('Europe/Madrid');
    $now = date("m/d/Y H:i:s");

    if(empty($members_id)){
     $postText = '{
     	"apiPostId": "24",
      	"data": [
        {
          "name":"members_id",
          "value":"'.$members_id.'"
        },
        {
          "name": "email",
          "value": "'.$email.'"
        },
        {
          "name":"synchro_update",
          "value":"'.$now.'"
        },
        {
          "name":"no_fundraising",
          "value":"'.$no_fundraising.'"
        }]
      }';

      $res = do_curl($url,"POST",$headers,$postText);
      return $res["result"];
   }
}

?>
