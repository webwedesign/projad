<?php

function csv_admin_settings_validate($form, &$form_state) {
  $file = file_save_upload('file', array('file_validate_extensions' => array('csv'),));
  if ($file) {
    if ($file = file_move($file, 'public://')) {
      $form_state['values']['file'] = $file;
    }
    else {
      form_set_error('file', t("Echec de l'enregistrement du fichier."));
    }
  }
  else {
    form_set_error('file', t(''));
  }
}

function csv_admin_settings_submit($form, &$form_state) {
  $file=$form_state['values']['file'];
  unset($form_state['values']['file']);
  $file->status = FILE_STATUS_PERMANENT;
  file_save($file);
  drupal_set_message(t('Le fichier à bien été enregistré', array('@filename' => $file->filename)));
}
?>