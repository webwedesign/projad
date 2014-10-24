<?php
/*

Page index.php

Index du site.

Quelques indications : (utiliser l'outil de recherche et rechercher les mentions données)

Liste des fonctions :
--------------------------
Aucune fonction
--------------------------


Liste des informations/erreurs :
--------------------------
Aucune information/erreur
--------------------------
*/

session_start();
header('Content-type: text/html; charset=utf-8');
include('../functions/config.php');

/********Actualisation de la session...**********/

include('functions/fonctions.php');
connexionbdd();
actualiser_session();

/********Fin actualisation de session...**********/

/********Entête et titre de page*********/

$titre = 'Inscription';

include('../functions/haut.php'); //contient le doctype, et head.

/**********Fin entête et titre***********/
?>

		<div id="colonne_gauche">
		<?php
		include('../functions/colg.php');
		?>
		<html>
	<head>
		<title><?php echo $informations[1]; ?> : <?php echo TITRESITE; ?></title>
		<meta  charset="UTF-8" />
		<meta name="language" content="fr" />
		
		<link rel="stylesheet" title="Design" href="css/design.css" type="text/css" media="screen" />
	</head>
	<body></body>
		</div>
		
		<div id="contenu">
			<div id="map">
				<a href="index.php">Accueil</a>
			</div>
			
			<h1>IP-FORMATION</h1>
			<p>Bienvenue sur le site de presence d'IP formation
			Si cela n'est pas fait, veuillez  vous <a href="../users/inscription.php">inscrire</a> arf !
			
			Doudou Direction
			</p>
		</div>
		</body>
		</html>
		<?php
		include('../functions/bas.php');
		mysql_close();
		?>