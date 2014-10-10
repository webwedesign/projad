<?php
/*

Page inscription.php

Permet de s'inscrire.

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
include('../../functions/config.php');
?>
<?php
/********Actualisation de la session...**********/

include('../functions/fonctions.php');
connexionbdd();
actualiser_session();

/********Fin actualisation de session...**********/
?>
<?php
if(isset($_SESSION['membre_id']))
{
	header('Location: /index2.php');
	exit();
}
?>
<?php
/********Entête et titre de page*********/

$titre = 'Inscription 1/2';

include('../../functions/haut.php'); //contient le doctype, et head.

/**********Fin entête et titre***********/
?>

<div id="contenu">
			<div id="map">
				<a href="../index2.php">Accueil</a> => <a href="inscription2.php">Inscription 1/2</a>
			</div>
			
			<?php
			include ('../membres/trait-inscription2.php');
			if($_SESSION['erreurs'] > 0)
			{
			?>
			<div class="border-red">
			<h1>Note :</h1>
			<p>
			Lors de votre dernière tentative d'inscription, des erreurs sont survenues, en voici la liste :<br/>
			<?php
				echo $_SESSION['nb_erreurs'];
				echo $_SESSION['pseudo_info'];
				echo $_SESSION['mdp_info'];
				echo $_SESSION['mdp_verif_info'];
				echo $_SESSION['mail_info'];
				echo $_SESSION['mail_verif_info'];
				echo $_SESSION['date_naissance_info'];
				echo $_SESSION['qcm_info'];
				
			?>
			Nous vous avons pré-rempli les champs qui étaient corrects.<br/>
			Note : la partie QCM et image est entièrement à refaire, que vous vous soyez trompé ou non.
			</p>
			</div>
			<?php
			}
			?>
			
			<h1>Formulaire d'inscription</h1>
			<p>Bienvenue sur la page d'inscription de mon site !<br/>
			Merci de remplir ces champs pour continuer.</p>
			<form action="trait-inscription2.php" method="post" name="Inscription2">
				<fieldset><legend>Identifiants</legend>
					<label for="pseudo" class="float">Pseudo :</label> <input type="text" name="pseudo" id="pseudo" size="30" value="<?php if($_SESSION['pseudo_info'] == '') echo htmlspecialchars($_SESSION['form_pseudo'], ENT_QUOTES) ; ?>" /> <em>(compris entre 3 et 32 caractères)</em><br />
					<label for="mdp" class="float">Mot de passe :</label> <input type="password" name="mdp" id="mdp" size="30" value="<?php if($_SESSION['mdp_info'] == '') echo htmlspecialchars($_SESSION['form_mdp'], ENT_QUOTES) ; ?>" /> <em>(compris entre 4 et 50 caractères)</em><br />
					<label for="mdp_verif" class="float">Mot de passe (vérification) :</label> <input type="password" name="mdp_verif" id="mdp_verif" size="30" value="<?php if($_SESSION['mdp_verif_info'] == '') echo htmlspecialchars($_SESSION['form_mdp_verif'], ENT_QUOTES) ; ?>" /><br />
					<label for="mail" class="float">Mail :</label> <input type="text" name="mail" id="mail" size="30" value="<?php if($_SESSION['mail_info'] == '') echo htmlspecialchars($_SESSION['form_mail'], ENT_QUOTES) ; ?>" /> <br />
					<label for="mail_verif" class="float">Mail (vérification) :</label> <input type="text" name="mail_verif" id="mail_verif" size="30" value="<?php if($_SESSION['mail_verif_info'] == '') echo htmlspecialchars($_SESSION['form_mail_verif'], ENT_QUOTES) ; ?>" /><br />
					<label for="date_naissance" class="float">Date de naissance :</label> <input type="text" name="date_naissance" id="date_naissance" size="30" value="<?php if($_SESSION['date_naissance_info'] == '') echo htmlspecialchars($_SESSION['form_date_naissance'], ENT_QUOTES) ; ?>" /> <em>(format JJ/MM/AAAA)</em><br/>
				</fieldset>
				<fieldset><legend>Charte du site et protection anti-robot</legend>
					<?php
					include('functions/charte.php');
					?>
					
					<h1>Système anti robots :</h1>
					
					<p>Qu'est-ce que c'est ?<br/>
					Pour lutter contre l'inscription non désirée de robots qui publient du contenu non désiré sur les sites web,
					nous avons décidé de mettre en place un systèle de sécurité.<br/>
					Aucun de ces systèmes n'est parfait, mais nous espérons que celui-ci, sans vous être inaccessible sera suffisant
					pour lutter contre ces robots.<br/>
					
				</fieldset>
				<div class="center"><input type="submit" value="Inscription2" /></div>
			</form>
		</div>
			<!--bas-->
		<?php
		include('../../functions/bas.php');
		mysql_close();
		?>