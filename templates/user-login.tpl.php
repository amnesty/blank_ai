<div id="page-wrapper">

  <div id="page">
    <div class="login">

      <div id="logo"></div>
      <div id="header"></div>

        <div id="content" class="clearfix">

            <!-- user-login-custom-form -->

            <p id="text-intro"><?php print render($intro_text); ?></p>

            <div class="blank-ai-user-login-form-wrapper">
              <?php //print drupal_render_children($form) ?>

              <?php
                // split the username and password so we can put the form links were we want (they are in the "user-login-links" div bellow)
                $form['name']['#title'] = 'Usuario (NIF/NIE)';
                $form['name']['#attributes']['placeholder'] = '111111111X';
                print drupal_render($form['name']);
                print drupal_render($form['pass']);
              ?>

            </div>

            <?php
                // render login button
                print drupal_render($form['form_build_id']);
                print drupal_render($form['form_id']);
                print drupal_render($form['actions']);
            ?>

            <div class="user-login-links">
              <p><span class="password-link"><a href="<?php  print base_path();?>user/password">¿Has olvidado tu contraseña?</a></span></p>
              <!-- <p>¿Aún no tienes usuario del área privada de socias y socios? <a href="<?php // print base_path();?>area-privada/registro" target="popup"
                  onclick="window.open('<?php // print base_path();?>area-privada/registro','popup','width=600,height=400');return false;">Regístrate aquí</a></p>
               -->
            </div>

            <!-- /user-login-custom-form -->
        </div>

      </div>
  </div>

</div>
