<?php 

	include_once("../database.php");
	include_once("../config.php");
	include_once("./edit.php");


 	if (isset($_POST['submit'])) {
 		$id = $_GET["id"];
 		$username = $_POST["username"];
 		$password = $_POST["password"];
 		$email = $_POST["email"];

 		if (!$username || !$password || !$email || !$id) {
 			echo "<script>window.location.replace('$hostedURL');</script>";
 		} else {
 		$sqlrun_id = "SELECT * FROM users WHERE id = '$id'";
 		$sqlres_id = mysqli_query($conn, $sqlrun_id);
 		if (mysqli_num_rows($sqlres_id) < 1) {
 			// bypass it.
 			echo "<script>alert('Data tidak ditemukan!'); window.location.replace('$hostedURL');</script>";
 		} else {
 		$sqlCheck = "SELECT * FROM users WHERE username = '$username' && email = '$email'";
 		$sqlCheck_ = mysqli_query($conn, $sqlCheck);

 		$sqlCheck_socc = mysqli_fetch_assoc($sqlCheck_);

 		if (mysqli_num_rows($sqlCheck_) >= 1 && $sqlCheck_socc["id"] != $id) {
 			echo "<script>alert('Username atau email ada yang telah mendaftar, coba username atau email lainnya!'); window.location.replace('$hostedURL/libs/edit.php?id=$id');</script>";
 		} else {
 			$sqlRun_username = "UPDATE users SET username = '$username' WHERE username = '$data[username]'";
 			$sqlRun_password = "UPDATE users SET password = '$password' WHERE username = '$data[username]'";
 			$sqlRun_email = "UPDATE users SET email = '$email' WHERE username = '$data[username]'";

 			$sqlRes_username = mysqli_query($conn, $sqlRun_username);
 			$sqlRes_password = mysqli_query($conn, $sqlRun_password);
 			$sqlRes_email = mysqli_query($conn, $sqlRun_email);

 			echo "<script>alert('Updated'); window.location.replace('$hostedURL');</script>";
 		}
 	  }
 	}
 }

  ?>