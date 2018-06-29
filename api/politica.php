<?php

if (getComponentPolitica($page['content'][system_main][nodes][$node->nid][webform]['#node']->webform[components], 'politica_check')){
	global $base_url;
	$theme_path = $base_url . "/sites/all/themes/blank_ai/api/";

	?>
	<link rel="stylesheet" href="<?php print $theme_path; ?>/js/magnific-popup/dist/magnific-popup.css">
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
}
//Función que busca un componenete del formulario dentro del array que contiente todos los componentes.
function getComponentPolitica($arrayComponentes, $TipoComponente)
{

	foreach ($arrayComponentes as $aComponents)
	{
		if ($aComponents[form_key][extra][css_classes] == $TipoComponente){
			return true;
		}
	}
	return false;
}
?>
