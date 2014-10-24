<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap 101 Template</title>

<!-- Bootstrap -->
<link href="assets/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="assets/bootflatv2/bootflat/css/bootflat.min.css"
	rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="assets/html5shiv/dist/html5shiv.min.js"></script>
      <script src="assets/respond/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="container">
		<form class="form-horizontal" action="" method="POST">
			<fieldset>

				<!-- Form Name -->
				<legend>Inscription</legend>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="last_name">Nom</label>
					<div class="col-md-4">
						<input id="last_name" name="last_name" type="text" placeholder=""
							class="form-control input-md">

					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="first_name">Prénom</label>
					<div class="col-md-4">
						<input id="first_name" name="first_name" type="text"
							placeholder="" class="form-control input-md">

					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="email">Email</label>
					<div class="col-md-4">
						<input id="email" name="email" type="text" placeholder=""
							class="form-control input-md">

					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="reemail"></label>
					<div class="col-md-4">
						<input id="reemail" name="reemail" type="text"
							placeholder="Votre email" class="form-control input-md">

					</div>
				</div>

				<!-- Password input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="password">Mot de passe</label>
					<div class="col-md-4">
						<input id="password" name="password" type="password"
							placeholder="" class="form-control input-md">

					</div>
				</div>

				<!-- Password input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="repassword"></label>
					<div class="col-md-4">
						<input id="repassword" name="repassword" type="password"
							placeholder="Votre mot de passe" class="form-control input-md">

					</div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="selectbasic">Date de naissance</label>
					<div class="col-md-1">
						<select id="day" name="day" class="form-control">
							<?php 
							$i = 1;
							for (;$i <= 31;$i++){
							   echo "<option value=\"$i\">$i</option>";
							}?>
						</select>
					</div>
					<div class="col-md-2">
						<select id="month" name="month" class="form-control">
							<?php $i = 1;
							for(;$i <= 12;){
							    echo "<option value=\"$i\">$i</option>";
							    $i++;
							}
							?>
						</select>
					</div>
					<div class="col-md-1">
						<select id="year" name="year" class="form-control">
							<?php 
							    $i = 1996;
    							for(;;){
    							    if($i >= 1914){
    							        echo "<option value=\"$i\">$i</option>";
    							        $i--;
    							    } else {
    							        break;
    							    }
    							}
							?>
						</select>
					</div>
				</div>

				<!-- Button -->
				<div class="form-group">
					<div class="col-md-4 col-md-offset-4">
						<input type="reset" class="btn btn-danger">
					    <button id="signup" type="submit" name="signup" class="btn btn-primary">S'inscrire</button>
					</div>
				</div>

			</fieldset>
		</form>


	</div>
</body>
</html>