(function ($) {
   jQuery(document).ready(function () {

  $("input[name='op']").prop("type", "button");

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

  $("input[name='op']").click(function() {
    //$("#webform-client-form-1").submit();

    if (($('.messages').length == 0)) {

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
                  url:   '/civicrm/sites/all/themes/blank_ai/api/includes/get_member.php',
                  type:  'post',
                  dataType: 'json',
                  beforeSend: function () {
                    //$("#resultado").html("Procesando, espere por favor...");
                  },
                  success:  function (response) {
                    $("#webform-client-form-1").submit();
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
                url:   '/civicrm/sites/all/themes/blank_ai/api/includes/get_member.php',
                type:  'post',
                dataType: 'json',
                beforeSend: function () {
                  //$("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                  $("#webform-client-form-1").submit();
                }
              });
            }
          },
          midClick: true
        });
        event.stopImmediatePropagation();
        return false;
      }

      $("#webform-client-form-1").submit();
      return true;
    }else {
        $("#webform-client-form-1").submit();
        return true;
    }
  }); // on click

});//.document ready
})(jQuery)

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
