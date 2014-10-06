<?php 
//    require '../../vendor/autoload.php';
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
    <link href="assets/bootflatv2/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/html5shiv/dist/html5shiv.min.js"></script>
      <script src="assets/respond/dest/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>Hello, world!</h1>
    <h1><?php echo 'Hello World ';   ?></h1>
    
    
    <!-- <fieldset> // regroupant des inputs
    <input>
    <input>
    <input> -->
    <form class="form-inline" role="form" method="get">
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail2">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
  </div>
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">@</div>
      <input class="form-control" type="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword2">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-default">Sign in</button>
   <br>
  <div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
    Option one is this and that&mdash;be sure to include why it's great
  </label>
</div>
 <br>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
    Option two can be something else and selecting it will deselect option one
  </label>
</div>
 <br>
<div class="radio disabled">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
    Option three is disabled
  </label>
  <br>
  <select class="form-control">
  <option>Fiat</option>
  <option>Peugeot</option>
  <option>Lada</option>
  <option>Renault</option>
  <option>Seat</option>
</select>
<br>
<select multiple class="form-control">
  <option>Fiat</option>
  <option>Peugeot</option>
  <option>Lada</option>
  <option>Renault</option>
  <option>Seat</option>
</select>
<br>

</form>
 <br>
    
    input
        -text  
        -password
        -submit
        -checkbox
        -radio
        -hidden
        -.... // faire attention selon les navigateurs
        
     select
        option
        optgroup
      
      
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>