<?php

global $base_url;
$theme_path = $base_url . "/sites/all/themes/blank_ai/api/";

?>
		<link rel="stylesheet" href="<?php print $theme_path; ?>/js/magnific-popup/dist/magnific-popup.css">
		<!--<script type="text/javascript" src="<?php print $theme_path; ?>/js/jquery-2.2.0.min.js"></script>-->
	        <script type="text/javascript" src="<?php print $theme_path; ?>/js/magnific-popup/dist/jquery.magnific-popup.js"></script>
		<script type="text/javascript" src="<?php print $theme_path; ?>/js/politica.js"></script>


		<div id="test-popup" class="modal-dialog mfp-hide white-popup mfp-hide" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<p>Si quieres recibir otras acciones como esta e información adicional de Amnistía Internacional, recuerda marcar la casilla verde antes de enviar tu firma</p>
					</div>
					<div class="modal-footer">
					<!--<form class="ai-accion-firma__form" >-->
					  <label class="ai-accion-firma__check bigger">
					      <input type="checkbox" id="ai-accion-firma__masinfo_reminder" class="form-check-input"/>
					      Quiero recibir acciones para cambiar el mundo
					  </label>
					<!--</form>-->
				</div>
			</div>
		</div>


<?php
  /*include_once('config.php');
  include_once('connect.php');
  include_once('api.php');

  $members = get_member_by_email($_POST['email'])[0];

  $return = $members;

  $return["json"] = json_encode($return);
  echo json_encode($return);*/
?>
