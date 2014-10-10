<?php 
    require '../../vendor/autoload.php';
    require_once 'functions/calculatrice.php';
    require_once 'functions/microtime.php';
    require_once 'functions/generate_array.php';
    require_once 'functions/algo_recherche_brut.php';
    require_once 'functions/algo_recherche_dicho.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootflatv2/bootflat/css/bootflat.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/html5shiv/dist/html5shiv.min.js"></script>
      <script src="assets/respond/dest/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
    <?php var_dump($_POST);?>
        <h1><?php echo 'Calculatrice !!!'; ?></h1>
        <form class="form-horizontal" action="" method="POST">
            <label>Calcul : </label>
            <input type="text" name="element1" value="<?= $element1;?>"> 
            <select name="operateur">
            <?php foreach ($operateur as $key => $value){
                echo "<option value=\"$key\">$value</option>";
            }?>
            </select>
            <input type="text" name="element2" value="<?= $element2;?>"> 
            <button type="submit" name="egal" value="submit">=</button>
            <span><?= $resultat; ?></span>
        </form>
        <h1><?php echo 'Recherche !!!'; ?></h1>
            <form action="" method="POST">
                <input name="rangeLeft" type="text"> - 
                <input name="rangeRight" type="text"><br>
                <br>
                <input name="number" type="text">
                <button type="submit" name="search" value="submit">Recherche</button>
            </form>     
            <h2><?php echo 'Recherche BrutForce !!!'; ?></h2>
            <p>On dit qu'un algorithme est de recherche par force brute lorsque toutes les entrées sont vérifiées une à une.</p>
            <p>
                Itération : <?php echo $iterateBrut;?><br>
                Temps : <?php echo $timerBrut;?> ms
            </p>
            <h2><?php echo 'Recherche Dichotomique !!!'; ?></h2>
            <p>La dichotomie (« couper en deux » en grec) est, en algorithmique, un processus itératif ou récursif de recherche où, à chaque étape, on coupe en deux parties (pas forcément égales) un espace de recherche qui devient restreint à l'une de ces deux parties.</p>
            <p>
                Itération : <?php echo $iterateDicho;?><br>
                Temps : <?php echo $timerDicho;?> ms
            </p>
   </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>


