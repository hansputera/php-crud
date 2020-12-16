<?php 
	include_once("../database.php");
	include_once("../config.php");

	$id = $_GET["id"];
	if (!$id) {
		echo "<script>window.location.replace('$hostedURL');</script>";
	}

	$sql = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
	
	if (mysqli_num_rows($sql) < 1) {
		echo "<script>alert('Data tidak ditemukan!'); window.location.replace('$hostedURL');</script>";
	}
		$data = mysqli_fetch_assoc($sql);

    if ($data == 1) {
      echo "<script>alert('Akun ini telah di suspend!');window.location.reload('$hostedURL');</script>"
    } else {}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8" />
 	<link rel="stylesheet" type="text/css" href="../statics/edit.css"/>
 	<title>Edit User</title>
 </head>
 <body>
  	<h1>Edit [ <?= $data['username']; ?> ]</h1>
  <form action="<?= $hostedURL . "/libs/edit_data.php?id=$id" ?>" method="POST">
  	<div class="form-group">
  	<label for="username">Username</label>
  	<input type="text" name="username" value="<?= $data['username']; ?>">
	</div>
  	<div class="form-group">
  	<label for="password">Password</label>
  	<input type="password" name="password" value="<?= $data['password']; ?>">
  	</div>
  	<div class="form-group">
  	<label for="email">Email</label>
  	<input type="email" name="email" value="<?= $data['email']; ?>">
  	</div>
  	<button class="submitBtn" name="submit">Update</button>
  </form>
 </body>
  <script type="text/javascript" src="../statics/device.js"></script>
 </html>