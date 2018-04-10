<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    include_once "class/player.php";
	include_once "class/connect_db.php";
	include_once "controller/player_controller.php";
	include_once "function/setMessage.php";
	$methodPlayer = new Player_controler();
	session_start();

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Random Site 7.3.5</title>
    <link rel="stylesheet" type="text/css" href="front/styles.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
		<div class="container">
			<div class="col-md-12 logo">
				Random img
			</div>
			<?php 
				setMessage();
			?>
			<div class="col-md-12 cadre">
				<form action="./action/sub.php" method="post">
					<div class="col-md-6">
						<div class="row">
							<label> 
								Inscriptions 
							</label>
						</div>
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" placeholder="Entrer l'email" name="login_email" required>
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" placeholder="Entrer le mot de passe" name="password" required>
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" placeholder="Entrer à nouveau le mot de passe" name="pass_secure" required>
						</div>
						<div class="col-md-12 form-group center">
							<input type="submit" name="sub_input" value="S'inscrire">
						</div>
					</div>
				</form>
				<form action="./action/login.php" method="post">
					<div class="col-md-6">
						<div class="row">
							<label> 
								Connexion 
							</label>
						</div>
						<div class="col-md-12 form-group">
							<input type="email" class="form-control"placeholder="Email" name="login_email" required>
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" placeholder="Entrer le mot de passe" name="password" required>
						</div>
						<div class="col-md-12 form-group center">
							<input type="submit" name="login_input" value="Se connecter">
						</div>
					</div>
				</form>
			</div>
		</div>
  </body>
</html>
