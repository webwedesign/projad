<?php
/*

Page haut.php

Page incluse créant le doctype etc etc.

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
?>
<!DOCTYPE html>
<html>
	<head>
	<?php
	/**********Vérification du titre...*************/
	
	if(isset($titre) && trim($titre) != '')
	$titre = $titre.' : '.TITRESITE;
	
	else
	$titre = TITRESITE;
	
	/***********Fin vérification titre...************/
	?>
		<title><?php echo $titre; ?></title>
		<meta  charset="UTF-8" />
		<meta name="language" content="fr" />
		<link rel="stylesheet" title="Design" href="/design.css" type="text/css" media="screen" />
	</head>


	<body>
		<div id="banniere">
			<a href="/index2.php"><img src="/images/banniere.png"/></a>
		</div>
		
		<div id="menu">
			<div id="menu_gauche">
			<!-- Vide, mettez-y les liens qui ne dépendent pas du statut
			du membre (connecté ou non) -->
			</div>
			
			<div id="menu_droite">
			<?php
			if(isset($_SESSION['membre_id']))
			{
			?>
				<a href="../membres/moncompte.php">Gérer mon compte</a>   <a href="../membres/deconnexion.php">Se déconnecter</a>
			<?php
			}
			
			else
			{
			?>
				<a href="../membres/inscription2.php">Inscription</a>   <a href="../membres/connexion.php">Connexion</a>
			<?php
			}
			?>
			</div>
		</div>