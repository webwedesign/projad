<?php
/*

Page information.php

Gère les informations (page incluse).

Quelques indications : (Utiliser l'outil de recherche et rechercher les mentions données)

Liste des fonctions :
--------------------------
Aucune fonction
--------------------------


Liste des informations/erreurs :
--------------------------
Erreur interne
--------------------------
*/

if(!isset($informations))
{
	$informations = Array(/*Erreur*/
					true,
					'Erreur',
					'Une erreur interne est survenue...',
					'',
					'index2.php',
					3
					);
}

if($informations[0] === true) $type = 'erreur';
else $type = 'information';
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $informations[1]; ?> : <?php echo TITRESITE; ?></title>
		<meta charset=UTF-8" />
		<meta name="language" content="fr" />
		<meta http-equiv="Refresh" content="<?php echo $informations[5]; ?>;url=<?php echo $informations[4]; ?>">
		<link rel="stylesheet" title="Design" href="css/design.css" type="text/css" media="screen" />
	</head>
	
	
	<body>
		<div id="info">
			<div id="<?php echo $type; ?>"><?php echo $informations[2]; ?> Redirection en cours...<br/>
			<a href="<?php echo $informations[4]; ?>">Cliquez ici si vous ne voulez pas attendre...</a><?php echo $informations[3]; ?></div>
		</div>
	</body>
</html>
<?php
unset($informations);
?>
