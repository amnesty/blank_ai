<?php

if (!function_exists("encoremed_bootstrap_menu_tree__primary") {
  /** Bootstrap theme wrapper function for the primary menu links. **/
  function encoremed_bootstrap_menu_tree__primary(&$variables) {
      return '<ul class="menu nav navbar-nav navbar-right">' . $variables['tree'] . '</ul>';
    }
}

/* Login Page */
function blank_ai_theme() {
      $items = array();
      // create custom user-login.tpl.php
      $items['user_login'] = array(
        'render element' => 'form',
        'path' => drupal_get_path('theme', 'blank_ai') . '/templates',
        'template' => 'user-login',
        'preprocess functions' => array(
            'blank_ai_preprocess_user_login'
        ),
      );
      $items['user_pass'] = array(
        'render element' => 'form',
        'path' => drupal_get_path('theme', 'blank_ai') . '/templates',
        'template' => 'user-pass',
        'preprocess functions' => array(
          'blank_ai_preprocess_user_pass'
        ),
      );
      $items['user_profile_form'] = array(
        'render element' => 'form',
        'path' => drupal_get_path('theme', 'blank_ai') . '/templates',
        'template' => 'user-profile-edit',
      );
      return $items;
}

function blank_ai_preprocess_user_login(&$vars) {
  $vars['intro_text'] = t('');
}

function blank_ai_preprocess_user_pass(&$vars) {
  $vars['intro_text'] = t('Introduce tu correo electrónico para que podamos mandarte un correo de restablecimiento de la contraseña. ¡Gracias!');
}
