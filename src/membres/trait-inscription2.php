<?php

/*

Page trait-inscription.php

Permet de valider son inscription.

Quelques indications : (utiliser l'outil de recherche et rechercher les mentions données)

Liste des fonctions :
--------------------------
Aucune fonction
--------------------------


Liste des informations/erreurs :
--------------------------
Déjà inscrit (en cas de bug...)
--------------------------
*/

session_start();
header('Content-type: text/html; charset=utf-8');
include('../functions/config.php');

/********Actualisation de la session...**********/

include('../functions/fonctions.php');
connexionbdd();
actualiser_session();

/********Fin actualisation de session...**********/

if(isset($_SESSION['membre_id']))
{
    header('Location: index.php');
    exit();
}
?>