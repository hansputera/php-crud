<?php 

	session_start();
	$logged;
	
	include "config.php";
	if (isset($_SESSION["userInfo"]) && $_SESSION["userInfo"]["username"] === "admin") {
		
		echo "<script>window.location.replace('$hostedURL/admin.php');</script>";
	}

	if (isset($_SESSION["userInfo"])) {
		$logged = TRUE;
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="statics/index.css" />
	<title>Login or register!</title>
</head>
<body>
	<section class="alert">
		<h1>Alert</h1>
		<p>Untuk pengguna handphone maupun smartphone website ini tidak sesuai dengan perangkat anda, terimakasih!</p>
	</section>
	<section class="welcome">
		<h1 class="welcomehead">Welcome to <strong><?= $projectName ?></strong></h1>
	</section>

	<section class="loginorregister">
		<?php if (!@$logged) { ?>
		<h1>Login atau Register</h1>
		<hr />
		<div class="selections">
			<button onclick="register()" id="register" type="submit">Register</button>
			<button onclick="login()" id="login" type="submit">Login</button>
		</div>
		<?php } else { ?>
			<h1>Hai <?= $_SESSION["userInfo"]["username"] ?></h1>
		<?php } ?>
	</section>
</body>
<script type="text/javascript" src="statics/idnex.js"></script>
</html>