/********** JS *****************/

// URL Vars
function getUrlVars() {
  var vars = {};
  var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    vars[key] = value;
  });
  return vars;
}

jQuery(function($) {

  /* Esconder caja del módulo Development Environment */
  if( $(".status").text().includes("development") ){
    $(".status").css("visibility", "hidden");
    $(".status").css("height", "0px");
  }

  /* Si existe campo politica, lo manda al oculto de la actividad */
  $('.politica_check').change(function(){
    var acepta_poltica = $("[name='submitted[civicrm_1_activity_1_cg7_custom_162]']");

    console.log($(this).is(':checked'));
    acepta_poltica.val($(this).is(':checked'));
  });


  /************* Variables UTM  **************/

  // Recogemos URL
  var url = window.location.pathname;

  // Recogemos variables GET
  var urlVars = getUrlVars();
  var get_utm_medium = urlVars["utm_medium"];
  var get_utm_source = urlVars["utm_source"];
  var get_utm_campaign = urlVars["utm_campaign"];
  var get_utm_content = urlVars["utm_content"];

  // Campos para almacenar
  var medium_input = $("[name='submitted[civicrm_1_activity_1_cg7_custom_15]']"); /* medium */
  var source_input = $("[name='submitted[civicrm_1_activity_1_cg7_custom_153]']"); /* source */
  var campaign_input = $("[name='submitted[civicrm_1_activity_1_cg7_custom_154]']"); /* campaign */
  var content_input = $("[name='submitted[civicrm_1_activity_1_cg7_custom_156]']"); /* content */

  // utm-medium
  if( get_utm_medium != '' && get_utm_medium ){
    if(get_utm_medium == 'email') medium_input.val("1");
    else if(get_utm_medium == 'facetoface') medium_input.val("2");
    else if(get_utm_medium == 'ppc') medium_input.val("3");
    else if(get_utm_medium == 'telemarketing') medium_input.val("4");
    else if(get_utm_medium == 'web') medium_input.val("5");
    else if(get_utm_medium == 'terceros') medium_input.val("6");
    else if(get_utm_medium == 'social') medium_input.val("7");
    else if(get_utm_medium == 'paidsocial') medium_input.val("8");
    else if(get_utm_medium == 'social_com') medium_input.val("9");
    else if(get_utm_medium == 'banner') medium_input.val("10");
    else medium_input.val("5"); // por defecto es web
  }
  // utm-source
  if( get_utm_source != '' && get_utm_source ){
    source_input.val(get_utm_source);
  }
  else {
    source_input.val("web"); // por defecto
  }
  // utm_campaign
  if( get_utm_campaign != '' && get_utm_campaign ){ // utm_campaign
    campaign_input.val(get_utm_campaign);
  }
  // utm-content
  if( get_utm_content != '' && get_utm_content ){
    content_input.val(get_utm_content);
  }

});
