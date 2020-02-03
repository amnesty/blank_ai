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
              //print drupal_render($form['#validate']);
            ?>
          </div>

      </div>

  </div>
</div>
