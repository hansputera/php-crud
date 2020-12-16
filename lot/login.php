<?php 

	session_start();

	include_once("../config.php");
	include_once("../database.php");
	include_once("../libs/base.php");

	$base = new Base($conn);

	if (isset($_SESSION["userInfo"])) {
		echo "Kamu sudah login!";
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 	<link rel="stylesheet" type="text/css" href="../statics/login.css" />
 </head>
 <body>
 	
 	<form action="<?= $hostedURL . '/lot/login.php' ?>" method="POST">
 		<div class="group">
 			<label for="username">Username</label><br />
 			<input type="text" onchange="checkMeU()" name="username" placeholder="Masukan username!" required/>
 		</div>

 		<div class="group">
 			<label for="password">Password</label><br />
 			<input type="password" name="password" placeholder="Masukan password!" required />
 		</div>

 		<div class="group">
 			<label for="email">Email</label><br />
 			<input type="email" name="email" placeholder="Masukan email" required />
 		</div>

 		<button type="submit" name="submit" id="submit">Submit</button>
 	</form>
 </body>
	<script type="text/javascript" src="../statics/login.js"></script>
 </html>

 <?php 


 	if (isset($_POST["submit"])) {
 		$username = $_POST["username"];
 		$password = $_POST["password"];
 		$email = $_POST["email"];

 		$user = $base->getByUsername($username);
 		if (!isset($user)) {
 			echo "<script>alert('User tersebut tidak ada!');window.location.replace('$hostedURL');</script>";
 		} else {
 			if ($user["password"] !== $password) {
 				echo "<script>alert('Salah password');window.location.replace('$hostedURL');</script>";
 			} else {
 				$_SESSION["userInfo"] = $user;
 				echo "<script>alert('Kamu sudah login :D');window.location.replace('$hostedURL');</script>";
 			}
 		}
 	}
  ?>