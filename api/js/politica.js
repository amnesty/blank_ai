(function ($) {
   jQuery(document).ready(function () {

  $(".webform-submit").prop("type", "button");

  $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-email-email").blur(function(){

    if (isEmail($("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-email-email").val()) == true)
    {
      var params = {"email" : $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-email-email").val(),
      "operation" : 'get_member'};
      $.ajax({
        data:  params,
        url:   '/sites/all/themes/blank_ai/api/includes/get_member.php',
        type:  'post',
        dataType: 'json',
        beforeSend: function () {
          //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) {
          if ((response.id == null) || (response.no_fundraising == 1))
          {
            $('#edit-submitted-acepto-la-politica-de-privacidad-1').prop('checked',false);
            $('#edit-submitted-acepto-la-politica-de-privacidad-1').show();
          }else {
            $("#edit-submitted-acepto-la-politica-de-privacidad-1").prop('checked',true);
            $('#edit-submitted-acepto-la-politica-de-privacidad-1').hide();
          }

        }
      });
    }
  });

  $(".webform-submit").click(function() {

    var node_id = $("input[name='form_id']").val().split('webform_client_form_')[1];

    if (($('.messages').length == 1)) {

      var check = $("#edit-submitted-acepto-la-politica-de-privacidad-1");
      var check_reminder_modal = $('#ai-accion-firma__masinfo_reminder');

      if(!check.prop("checked") && check_reminder_modal.length > 0 && check_reminder_modal.data("shown") != 1) { // in case that exist an reminder_modal div
        $.magnificPopup.open({
          items: {
            src: '#test-popup'

          },
          removalDelay: 50,
          callbacks: {
            open: function() {
              var popup = this;
              var input = popup.currItem.inlineElement.find("input");
              var check = $("#ai-accion-firma__masinfo");
              input.prop("checked", false);
              check.prop("checked", false);
              $('#test-popup').data("shown", 1);
              //_paq.push(["trackEvent", "popup_check", "mostrado"]);

              input.change(function(){
                var check = $("#ai-accion-firma__masinfo");
                check.prop("checked", true);
                $("#edit-submitted-acepto-la-politica-de-privacidad-1").prop("checked", true);
                var params = {"nombre" : $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-contact-last-name").val(),
                              "apellidos" : $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-contact-last-name").val(),
                              "telefono" : $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-phone-phone").val(),
                              "email" : $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-email-email").val(),
                              "politica" : '0',
                              "operation" : 'insert_member'};
                $.ajax({
                  data:  params,
                  url:   '/sites/all/themes/blank_ai/api/includes/get_member.php',
                  type:  'post',
                  dataType: 'json',
                  beforeSend: function () {
                    //$("#resultado").html("Procesando, espere por favor...");
                  },
                  success:  function (response) {
                    $("#webform-client-form-"+node_id).submit();
                  }
                });
              });
            },
            beforeClose: function(){
              var params = {"nombre" : $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-contact-last-name").val(),
                            "apellidos" : $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-contact-last-name").val(),
                            "telefono" : $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-phone-phone").val(),
                            "email" : $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-email-email").val(),
                            "politica" : '1',
                            "operation" : 'insert_member'};
              $.ajax({
                data:  params,
                url:   '/sites/all/themes/blank_ai/api/includes/get_member.php',
                type:  'post',
                dataType: 'json',
                beforeSend: function () {
                  //$("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                  $("#webform-client-form-"+node_id).submit();
                }
              });
            }
          },
          midClick: true
        });
        event.stopImmediatePropagation();
        return false;
      }

      var params = {"nombre" : $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-contact-last-name").val(),
                    "apellidos" : $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-contact-last-name").val(),
                    "telefono" : $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-phone-phone").val(),
                    "email" : $("#edit-submitted-civicrm-1-contact-1-fieldset-fieldset-civicrm-1-contact-1-email-email").val(),
                    "politica" : $('#edit-submitted-acepto-la-politica-de-privacidad-1').val(),
                    "operation" : 'insert_member'};
       $.ajax({
  	 data:  params,
         url:   '/sites/all/themes/blank_ai/api/includes/get_member.php',
         type:  'post',
         dataType: 'json',
         beforeSend: function () {},
         success:  function (response) {
               $("#webform-client-form-"+node_id).submit();
         }});
      //$("#webform-client-form-"+node_id).submit();
      //return true;
    }else {
        $("#webform-client-form-"+node_id).submit();
        return true;
    }
  }); // on click

});//.document ready
})(jQuery)

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
