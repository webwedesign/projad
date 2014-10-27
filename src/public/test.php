<?php
  $form['#method'] = 'post';
  $erreur ='';
  $form['nom_course']= array(
    '#type' => 'textfield',
    '#title' => t("Renseigner le nom de la course"),
    '#description' => t("Renseigner ici le nom de la course à ajouter"),
    '#default_value' => ''
  );
  
   $form['millesime'] = array(
    '#type' => 'textfield',
    '#title' => t("Renseigner l'année de la course au format '0000'"),
    '#description' => t("Renseigner ici la date de la course à ajouter"),
    '#default_value' => ''
     
  );
    
     $form['csv']['csv_file'] = array(
    '#type' => 'file',
    '#title' => t("charger un fichier csv 'fichier.csv' "),
    '#description' => t("IMPORTANT : Les entrées du fichier .csv doivent étre séparées par des ' ; ' ."),
    '#default_value' => ''     
  );
     
    
   $form['distance'] = array(
    '#type' => 'textfield',
    '#title' => t("Renseigner ici la distance"),
    '#description' => t("Renseigner ici la distance de la course à ajouter"),
    '#default_value' => ''
  );
  
   //champ concernant  l'avant course
   
   $form  ['labels']['nom']= array(
    '#type' => 'textfield',
    '#title' => t("Renseigner le nom du coureur"),
    '#description' => t("Renseigner ici le nom du coureur à ajouter"),
    '#default_value' => ''
  );
  
   $form  ['labels']['prenom'] = array(
    '#type' => 'textfield',
    '#title' => t("Renseigner le prenom du coureur"),
    '#description' => t("Renseigner ici le prenom du coureur à ajouter"),
    '#default_value' => ''
     
  );
    
   $form  ['labels']['categorie'] = array(
    '#type' => 'select',
    '#title' => t("Renseigner ici la categorie"),
    '#description' => t("Renseigner ici la categorie de la course à ajouter"),
    '#default_value' => '',
    '#options' =>array(
        1=>'option A',
        2=>'option A',
        3=>'option A',
    )
  );
   $form  ['labels']['nationalite']= array(
    '#type' => 'textfield',
    '#title' => t("Renseigner la nationalité du coureur"),
    '#description' => t("Renseigner ici la nationalité du coureur à ajouter"),
    '#default_value' => ''
  );
  
   $form  ['labels']['numeroLicence'] = array(
    '#type' => 'textfield',
    '#title' => t("Renseigner le numero de licence du coureur"),
    '#description' => t("Renseigner ici le numero de licence ajouter"),
    '#default_value' => ''
     
  );
    
   $form  ['labels']['dossard'] = array(
    '#type' => 'textfield',
    '#title' => t("Renseigner ici le numero de dossard ex : 025420."),
    '#description' => t("Renseigner ici le numero de dossard à ajouter"),
    '#default_value' => ''
  );
   $form  ['labels']['club']= array(
    '#type' => 'textfield',
    '#title' => t("Renseigner le nom du club"),
    '#description' => t("Renseigner ici le nom du club à ajouter"),
    '#default_value' => ''
  );
  
   $form  ['labels']['etatInscription'] = array(
    '#type' => 'textfield',
    '#title' => t("Renseigner l'etat d'inscription du coureur"),
    '#description' => t("Renseigner ici l'etat d'inscription du coureur à ajouter"),
    '#default_value' => ''
     
  );

   $form['submit'] = array(
       '#type' => 'submit', 
       '#value' => t('Envoyer'
        ));
 
   $form['#attributes']['enctype'] = "multipart/form-data";
   
   
  function csv_form_validate($form, &$form_state) {
  // Save file to Drupal public directory
  $filepath = 'public://contact_attachments/';
  file_prepare_directory($filepath, FILE_CREATE_DIRECTORY);
  $file = file_save_upload('upload', array('file_validate_extensions' => array('csv')), $filepath, FILE_EXISTS_RENAME);
  if(!$file){
    form_set_error('upload', t('There was an error uploading the file.'));
  }
  else {
    $file->status = FILE_STATUS_PERMANENT;
    $file = file_save($file);
    // Save the file for use in the submit handler.
    $form_state['storage']['file'] = $file;
  }
}

function csv_form_submit($form, &$form_state) {
  $line_max = variable_get('user_import_line_max', 1000);
  ini_set('auto_detect_line_endings', true);
  $filepath = $form_state['values']['file_upload']->filepath;
  $handle = @fopen($filepath, "r");
  // start count of imports for this upload
  $send_counter = 0;
  while ($row = fgetcsv($handle, $line_max, ';')) {
    // $row is an array of elements in each row
    // e.g. if the first column is the email address of the user, try something like
    $mail = $row[0];
  }
  $validators = array('file_validate_extensions' => array('csv'));

    $file = file_save_upload('file_upload',$validators);


}
   
   if(isset($_POST['nom_course']) && isset($_POST['millesime']) && isset($_POST['distance'])) {
       if(preg_match("#^[0-9]{4,4}$#", $_POST['millesime'])){
   $nid = db_insert('csv_course') // Table name no longer needs {}
        ->fields(array(
        'course_name'=>$_POST['nom_course'],
        'millesime'=>$_POST['millesime'],
        'distance'=>$_POST['distance'],
    ))
    ->execute();
     }
   }else{
       $erreur = 'erreur dans le format de la date respecter la regex suivante : 0000';
   }
   
 /*  
if(isset($_FILES['[csv_file]'])){
    $files = $_FILES['[csv_file]']['name']['tmp_name'];
    $fichier = fopen($_FILES['csv_file']['tmp_name'], "r"); 

    //tant qu'on est pas a la fin du fichier : 
    while (!feof($fichier)) 
    { 
    // On recupere toute la ligne 
    $uneLigne = fgets($fichier, 1024);
    var_dump($fichier);
    //On met dans un tableau les differentes valeurs trouvés (ici séparées par un ';') 
    $tableauValeurs = explode(';', $uneLigne);
    
    // On crée la requete pour inserer les donner (ici il y a 12 champs donc de [0] a [11]) 

    $nid = db_insert('csv_avant') // Table name no longer needs {}
        ->fields(array(
        'nom'=>$tableauValeurs[0],
        'prenom'=>$tableauValeurs[1],
        'categorie'=>$tableauValeurs[2],
    ))
    ->execute(); 
     }
    }*/
    
       return system_settings_form($form);
      
    } 




/**
 * Add the herp_derp table for the herp module.
 */
function csv_update_7001() {
  db_create_table('test_csv', drupal_get_schema_unprocessed('csv', 'test_csv'));
  return 'Add the herp_derp table for the herp module.';
}


function csvErrorMessage(array $error) {
  $message = t('%type: !message in %function (line ', $error);
  $this->assertRaw($message, t('Found error message: !message.', array('!message' => $message)));
}
?>