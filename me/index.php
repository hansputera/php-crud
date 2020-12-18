<?php 

	session_start();

	include "../config.php";
	include "../database.php";
	include "../libs/base.php";
	include "../libs/functions.php";

	if (!isset($_SESSION["userInfo"])) {
		echo redirect($hostedURL);
	} else {
		$base = new Base($conn);
		if ($base->isSuspended($_SESSION["userInfo"]["id"]) === TRUE) {
			echo redirectWithText($hostedURL, "Akunmu telah di suspend!");
		}
	}

	$user = @$_SESSION["userInfo"];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>"<?= $user["username"] ?>" Profile</title>
 	<link rel="stylesheet" type="text/css" href="../statics/profile.css" />
 </head>
 <body>
 	<section class="detail">
 		<h1>Detil Profil</h1>
 		<table border="1" width="80%">
 			<tr>
 				<th>Nama</th> <th>Password</th> <th>Email</th>
 			</tr>
 			<tr>
 				<td><?= $user["username"] ?></td>
 				<td><?= str_repeat("^", strlen($user["password"])) ?></td>
 				<td><?= $user["email"] ?></td>
 			</tr>
 		</table>
 	</section>

 	<section class="updates">
 		<h1>Update</h1>

 		<form action="<?= $hostedURL . '/me/index.php' ?>" method="POST">
 			<div class="update-group">
 				<h2>Change Password</h2>
 				<label for="old-password">Old Password</label>
 				<input type="password" placeholder="Masukan password lama" id="old-password" name="old-password" required />

 				<label for="new-password">New Password</label>
 				<input type="password" placeholder="Masukan password baru" name="new-password" id="new-password" required />

 				<button type="submit" name="changePassword">Change</button>
 			</div>
 		</form>

 		<form action="<?= $hostedURL . '/me/index.php' ?>" method="POST">
 			<div class="update-group">
 				<h2>Change Email</h2>
 				<label for="new-email">New Email</label>
 				<input type="email" placeholder="Masukan email baru" name="new-email" id="new-email" required />
 				<button type="submit" name="changeEmail">Change</button>
 			</div>
 		</form>
 		<br /> 
 	</section>
 </body>
 </html>

 <?php 

 	if (isset($_POST["changePassword"])) {
 		$oldPass = $_POST["old-password"];
 		$newPass = $_POST["new-password"];

 		if ($oldPass !== $user["password"]) {
 			echo "<script>alert('Password salah');</script>";
 		} else {
 			$sql = mysqli_query($conn, "UPDATE users SET password = '$newPass' WHERE id = '$user[id]'");
 			// change session information
 			$_SESSION["userInfo"]["password"] = $newPass;
 			echo "<script>alert('Password telah diganti!');window.location.replace('$hostedURL/me');</script>";
 		}
 	}

 	if (isset($_POST["changeEmail"])) {
 		$newEmail = $_POST["new-email"];
 		$sql = mysqli_query($conn, "UPDATE users SET email = '$newEmail' WHERE id = '$user[id]'");
 		// change session information
 		$_SESSION["userInfo"]["email"] = $newEmail;
 		echo "<script>alert('Email telah diganti!');window.location.replace('$hostedURL/me');</script>";
 	}
 ?>