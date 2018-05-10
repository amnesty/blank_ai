<?php

  // Si es "SOCIO/A" y se cambia la contraseña de manera correcta, se redirige al certificado
  var_dump($user->roles);
  
  if( in_array('Socio_a', $user->roles) && isset($_POST['form_token']) && $_POST['form_token'] != ''){
    if($_POST['pass']['pass1'] == $_POST['pass']['pass2']){
      global $base_url;
      header('Location: ' . $base_url . '/area-privada-certificado');
    }
  }

 ?>

<div id="page-wrapper">
  <div id="page">

    <div class="login profile_edit">

      <div id="logo"></div>
      <div id="header"></div>
        <div id="content" class="clearfix">
            <!-- user-login-custom-form -->
            <p id="text-intro">Aquí puedes definir tu nueva contraseña:</p>

            <div id="user-edit-<?php print $user->uid; ?>" class="user-edit-form">
              <?php
                print drupal_render($form['account']['current_pass']);
                print drupal_render($form['account']['pass']);
                print drupal_render($form['account']['pass2']);
              ?>
            </div><!--end user-edit-->
            <?php
              print drupal_render($form['form_build_id']);
              print drupal_render($form['form_id']);
              print drupal_render($form['form_token']);
              print drupal_render($form['actions']);
              print drupal_render($form['#validate']);

            ?>
          </div>

      </div>

  </div>
</div>
