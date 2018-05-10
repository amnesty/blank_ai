<?php
  // Si acaba de cambiar la contraseña, sin error
  if( isset($_POST) && isset($_GET['pass-reset-token']) && $_GET['pass-reset-token'] != ''){
    echo "aquí redirigiremos";
    exit(1);
  }


 ?>

<div id="page-wrapper">

  <div id="page">
    <div class="login">

      <div id="logo"></div>
      <div id="header"></div>

        <div id="content" class="clearfix">
            <p id="text-intro"><?php print render($intro_text); ?></p>
            <div class="blank-ai-user-pass-form-wrapper">
              <?php print drupal_render_children($form) ?>
            </div>
            <p>Si tienes cualquier problema, <a href="mailto:socios@es.amnesty.org">escríbenos</a>.</p>
        </div>

      </div>
  </div>

</div>
