<?php

if (!function_exists("encoremed_bootstrap_menu_tree__primary")) {
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

/*function blank_ai_form_webform_client_form_alter(&$form, &$form_state, $form_id) {
  $form = array();

  $form['cities'] = array(
    '#title' => t('City'),
    '#type' => 'textfield',
    '#maxlength' => 60,
    '#autocomplete_path' => 'city/autocomplete',
  );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Submit',
  );
var_dump($form);
  return $form;
}*/

/*function blank_ai_menu_alter() {

  $items['city/autocomplete'] = array(
    'page callback' => '_blank_ai_autocomplete',
    'access arguments' => array('access content'),
    'type' => MENU_CALLBACK,
  );
  var_dump($items);
  return $items;
}*/

/*function _blank_ai_autocomplete($string){
    $matches = array();
    $result = db_select('node', 'n')
      ->fields('n', array('nid'))
      ->condition('nid', '%' . db_like($string) . '%', 'LIKE')
      ->execute();

    // save the query to matches
    foreach ($result as $row) {
      $matches[$row->nid] = check_plain($row->nid);
    }

    // Return the result to the form in json
    drupal_json_output($matches);
}*/


function blank_ai_preprocess_user_login(&$vars) {
  $vars['intro_text'] = t('');
}

function blank_ai_preprocess_user_pass(&$vars) {
  $vars['intro_text'] = t('Introduce tu NIF/NIE o correo electrónico para que podamos mandarte un correo de restablecimiento de la contraseña. ¡Gracias!');
}
