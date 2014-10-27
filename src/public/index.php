<?php 

echo 'hello';
/*
?>
<!DOCTYPE html>
<html>
    <head>
<title>CRUD</title>
<meta charset="UTF-8" lang="fr">
</head>
<body>
<form role="form">

  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</body>
</html>*/
?>
<!DOCTYPE html> 
<html>
<head>
<title>Importer un fichier texte dans une bdd MySQL</title>
</head>
<body>
<h2>Importer un fichier texte dans une bdd MySQL</h2>

<?php
switch($action)
{
    /* LECTURE ET AJOUT DES DONNEES DANS LA TABLE */
    case "ajouter":

        /* Variables */
        $bdd = "projad"; /* Base de données */
        $host= "localhost"; /* Hote (localhost en principe) */
        $user= "root"; /* Utilisateur */
        $pass= "0000"; /* Mot de passe */

        /* Connexion bdd */
        @mysql_connect($host,$user,$pass) or die("Impossible de se connecter à la base de données");
        @mysql_select_db($bdd);

        /* On cree la table */
        if ($creertable)
        {
            $query = "CREATE TABLE $table( ID int,adresse varchar(255),nom_societe varchar(255),objet_societe varchar(255),url_societe varchar(255)  )";
            $result= MYSQL_QUERY($query);
        }

        /* On ouvre le fichier à importer en lecture seulement */
        if (file_exists($fichier))
            $fp = fopen("$fichier", "r");
        else
        { /* le fichier n'existe pas */
            echo "Fichier introuvable !<br>Importation stoppée.";
            exit();
        }

        while (!feof($fp)) /* Et Hop on importe */
        { /* Tant qu'on n'atteint pas la fin du fichier */
            $ligne = fgets($fp,4096); /* On lit une ligne */

            /* On récupère les champs séparés par ; dans liste*/
            $liste = explode( ";",$ligne);

            /* On assigne les variables */
            $nom = $liste[0];
            $prenom = $liste[1];

            /* Ajouter un nouvel enregistrement dans la table */
            $query = "INSERT INTO $table VALUES('$nom','$prenom')";
            $result= MYSQL_QUERY($query);

            if(mysql_error())
            { /* Erreur dans la base de donnees, surement la table qu'il faut créer */
                print "Erreur dans la base de données : ".mysql_error();
                print "<br>Importation stoppée.";
                exit();
            }
            else /* Tout va bien */
                print "$nom $prenom <br>";
}
 
echo "<br>Importation terminée, avec succès.";
    
/* Fermeture */
 fclose($fp);
MYSQL_CLOSE();
 
break;
 

/* FORMULAIRE DE CHOIX D'IMPORTATION */
  
 default:
 ?>
   <? echo "<form method=\"post\" action=\"$PHP_SELF\">"; ?>
     Pour ajouter ton serveur il suffit de remplir ce formulaire 
     <table border="0" cellspacing="0" cellpadding="3">
      <tr>
       <td>Table :</td> 
       <td> <input type="text" name="table"> </td> 
      </tr>
      <tr>
       <td>Fichier :</td> 
       <td> <input type="text" name="fichier"> </td> 
      </tr>
      <tr>
       <td>Créer table ? :</td> 
       <td> <input type="checkbox" name="creertable" checked> </td> 
      </tr>
      <tr>
        <td></td>  
       <td> <input type="submit" name="submit" value="Et HoP !"> </td> 
      </tr>
     </table>
     <input type="hidden" name="action" value="ajouter">  
    </form>
   <? 
   break;
   
}

  ?>

</body> 
</html>