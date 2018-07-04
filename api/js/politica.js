(function ($) {
  jQuery(document).ready(function () {

    $(".webform-submit").prop("type", "button");

    $('input[name*="civicrm_1_contact_1_email_email"]').blur(function(){

      if (isEmail($('input[name*="civicrm_1_contact_1_email_email"]').val()) == true)
      {
        var params = {"email" : $('input[name*="civicrm_1_contact_1_email_email"]').val(),
        "operation" : 'get_member'};
        $.ajax({
          data:  params,
          url:   '/sites/all/themes/blank_ai/api/includes/get_member.php',
          type:  'post',
          dataType: 'json',
          beforeSend: function () {},
      	  error: function(err){
      		    console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
      	  },
          success:  function (response) {
            if ((response.id == null) || (response.no_fundraising == 1))
            {
              $('.politica_check').prop('checked',false);
              $('.politica_check').show();
            }else {
              $(".politica_check").prop('checked',true);
              $('.politica_check').hide();
            }

          }
        });
      }
    });

    $(".webform-submit").click(function() {

      var node_id = $("input[name='form_id']").val().split('webform_client_form_')[1];

      if (validarForm()){

        var check = $('.politica_check:checkbox:checked');
        var check_reminder_modal = $('#ai-accion-firma__masinfo_reminder');

        if(!check.is(":checked") && check_reminder_modal.length > 0 && check_reminder_modal.data("shown") != 1 && $('input[name*="civicrm_1_contact_1_email_email"]').val() != '') { // in case that exist an reminder_modal div
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

                input.change(function(){
                  var check = $("#ai-accion-firma__masinfo");
                  check.prop("checked", true);
                  $(".politica_check").prop("checked", true);
                  var params = {"nombre" : $('input[name*="civicrm_1_contact_1_contact_first_name"]').val(),
                  "apellidos" : $('input[name*="civicrm_1_contact_1_contact_last_name').val(),
                  "telefono" : $('input[name*="civicrm_1_contact_1_phone_phone"]').val(),
                  "email" : $('input[name*="civicrm_1_contact_1_email_email"]').val(),
                  "politica" : '0',
                  "operation" : 'insert_member'};
                  $.ajax({
                    data:  params,
                    url:   '/sites/all/themes/blank_ai/api/includes/get_member.php',
                    type:  'post',
                    dataType: 'json',
                    beforeSend: function () {},
                    error: function(err){
                		    console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
                	  },
                    success:  function (response) {
                      $("#webform-client-form-"+node_id).submit();
                    }
                  });
                });
              },
              beforeClose: function(){
                var params = {"nombre" : $('input[name*="civicrm_1_contact_1_contact_first_name"]').val(),
                "apellidos" : $('input[name*="civicrm_1_contact_1_contact_last_name').val(),
                "telefono" : $('input[name*="civicrm_1_contact_1_phone_phone"]').val(),
                "email" : $('input[name*="civicrm_1_contact_1_email_email"]').val(),
                "politica" : '1',
                "operation" : 'insert_member'};
                $.ajax({
                  data:  params,
                  url:   '/sites/all/themes/blank_ai/api/includes/get_member.php',
                  type:  'post',
                  dataType: 'json',
                  beforeSend: function () {},
                  error: function(err){
              		    console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
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
        }else if ($('input[name*="civicrm_1_contact_1_email_email"]').val() != ''){
          var politica = 1;
          if ($('.politica_check:checkbox:checked').is(":checked") == true){
            politica = 0;
          }


          var params = {"nombre" : $('input[name*="civicrm_1_contact_1_contact_first_name"]').val(),
          "apellidos" : $('input[name*="civicrm_1_contact_1_contact_last_name').val(),
          "telefono" : $('input[name*="civicrm_1_contact_1_phone_phone"]').val(),
          "email" : $('input[name*="civicrm_1_contact_1_email_email"]').val(),
          "politica" : politica,
          "operation" : 'insert_member'};

          $.ajax({
            data:  params,
            url:   '/sites/all/themes/blank_ai/api/includes/get_member.php',
            type:  'post',
            dataType: 'json',
            beforeSend: function () {},
            error: function(err){
        		    console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        	  },
            success:  function (response) {
              $("#webform-client-form-"+node_id).submit();
            }});
          }

          $("#webform-client-form-"+node_id).submit();
          return true;
        }else{
          $("#webform-client-form-"+node_id).submit();
          return true;
        }
      }); // on click


      function validarForm() {

        error = 0;
        if ($('input[name*="civicrm_1_contact_1_contact_first_name"]').val() == '') {
          error = 1;
        }

        if ($('input[name*="civicrm_1_contact_1_contact_last_name').val() == '') {
          error = 1;
        }

        if ($('input[name*="civicrm_1_contact_1_phone_phone"]').val() == '') {
          error = 1;
        }

        if ($('input[name*="civicrm_1_contact_1_email_email"]').val() == '') {
          error = 1;
        }

        if(error == 1){
          return false;
        }else{
          return true;
        }
      }




    });//.document ready
  })(jQuery)

  function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }
