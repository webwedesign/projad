<?php


function calcul($x, $y, $op)
{
     
    if($x == "")
    {
        return  "pas de caractères spéciaux !";
    }
    if($y == "")
    {
        return  "pas de caractères spéciaux !";
    }

     
    if($op == "+")
    {
        return  $x + $y;
    }
    elseif( $op == "-")
    {
        return  $x - $y;
    }
     
    elseif( $op == "*")
    {
        if ($y!=0)
        {
            return  $x*$y;
        }
        else
        {
            return  0;
        }
    }
     
    elseif( $op == "/")
    {
        if($y!=0)
        {
            return  $x/$y;
        }
         

         
        else
        {
            return  ' Vous ne pouvez pas diviser par 0';
        }
    }

}

// On vérifie que toutes les valeurs des associations contenues dans $_POST sont remplies
$is_valid = true;
foreach($_POST as $val)
{
    if(trim($val) == '')
    {
        $is_valid = false;
    }
}


if(isset($_POST['number1'])  && isset($_POST['number2'])  && isset($_POST['operator']) && $is_valid)
{
    $afficher = true;
    $x = $_POST['number1'];
    $y = $_POST['number2'];
    $op = $_POST['operator'];


    $result = calcul((int)$x, (int)$y, $op);
    $error = is_string($result);
}
else
{
    $afficher = false;
    $result = false;
    $error = false;
}
 

?>
    <!DOCTYPE html>
    <head>
        <title>Calculatrice</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
         
    <body>
        <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootflatv2/css/bootstrap.min.css" rel="stylesheet">
        
        <form class="form-inline" role="form" method="post" Action="calcul.php"">
            <div class="form-group">
                <label class="sr-only" for="number1">Number1</label>
                <input type="text" class="form-control" name="number1" placeholder="Enter a number">
            </div>
            <div class="form-group">
                <select class="form-control" name="operator">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">x</option>
                    <option value="/">&divide</option>
                </select>
                </div>
                  <div class="form-group">
                    <label class="sr-only" for="number2">Number2</label>
                     <input type="text" class="form-control" name="number2" placeholder="enter another number">
                  </div>
               <button type="submit" class="btn btn-default" name="result">Result</button>
               
             
         </form>
    
        <?php
        if($afficher)
        {
            if($error)
         {
            echo $result;
         }
            else
         {
            echo 'vous avez choisi les valeurs : '.$x. ' ' .$op. ' ' .$y; ?><br />
            <?php echo 'le resultat de votre operation est : ' .$result; ?>
                <?php
                    }
                    }
                    $tab=array();
                    ?>
       <!-- jQuery (necessary for Bootstrap JavaScript plugins) -->
        <script src="assets/jquery/dist/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
 </body>
</html>