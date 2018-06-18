<?php

  include_once('connect.php');
  include_once('api.php');

  switch ($_POST['operation']) {
    case 'get_member':
        $members = get_member_by_email($_POST['email'])[0];
        $return = $members;
        break;
    case 'insert_member':
        $nombre = $_POST['nombre'];
      	$apellidos = $_POST['apellidos'];
      	$email = $_POST['email'];
      	$telefono = $_POST['telefono'];
      	$no_fundraising = $_POST['politica'];
        $pais_nombre = null;
    		$pais_siglas = null;

        //nuev@s interesad@s
    		$socio = es_interesado($email);

    		// 0 = interesado, 1 = socio
    		$estado = 'interesado_a';
    		if ($socio == 1)
    		{
    				$estado = 'socio_a';
    		}

        $member_id = get_member_by_email($email)[0]["id"];

  			// si no existe el member, lo creamos internamente
  			if(!isset($member_id)) {
  				$member = post_member_ai($email, $nombre, $apellidos, $telefono, $pais_siglas, $pais_nombre, $estado, $no_fundraising);
  				$member_id = $member['id'];
  				//insertamos el member en la plaforma de envio de correos
  				post_member_experian($member_id, $nombre, $apellidos, $email, $telefono, $pais_siglas, $pais_nombre, $estado, $no_fundraising);
  			}else{
  				// Si existe actualizamos el campo no_fundraising siempre y cuando acepte recibir información (no_fundraising = 0)
  				put_member_ai($member_id, $email, $no_fundraising); // API interna
  				put_member_experian($member_id, $email, $no_fundraising); // API Experian
  			}
  			// vemos si existe la purchase internamente
  			//$purchase = get_purchase_by_member_product($product_id, $member_id);

  			// si no existe la purchase, la creamos en experian, junto con el member (crear o actualizar)
  			/*if($purchase["count"] == 0) {
  				$purchase = post_purchase_ai($member_id, $product_id);
  				$purchase_id = $purchase["id"];
  				post_member_purchase_experian($purchase_id, $product_id, $member_id, $email);
  			}
  			else {
  				$purchase_id = $purchase["results"][0]["id"];
  			}*/

        $return = $member;
        break;
  }

  $return["json"] = json_encode($return);
  echo json_encode($return);

?>
