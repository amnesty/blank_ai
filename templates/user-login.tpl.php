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
              ?>
                <p style="font-size: 14px; margin-top: -15px; color: #333;"><i>Para el personal, el usuario debe ser el correo electrónico.</i></p>
              <?php
                print drupal_render($form['pass']);
              ?>

            </div>

            <div class="user-login-links">
                <p><span class="password-link"><a href="/user/password">¿Has olvidado tu contraseña?</a></span></p>
                <p>Si no estás registrado o tienes cualquier problema, <a href="mailto:socios@es.amnesty.org">escríbenos</a>.</p>
            </div>

            <?php
                // render login button
                print drupal_render($form['form_build_id']);
                print drupal_render($form['form_id']);
                print drupal_render($form['actions']);
            ?>
            <!-- /user-login-custom-form -->
        </div>

      </div>
  </div>

</div>
