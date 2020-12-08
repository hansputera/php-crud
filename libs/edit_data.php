<?php 

	include_once("../database.php");
	include_once("../config.php");
	include_once("./edit.php");

 	if (isset($_POST['submit'])) {
 		$username = $_POST["username"];
 		$password = $_POST["password"];
 		$email = $_POST["email"];

 		if (!$username || !$password || !$email) {
 			echo "<script>window.location.replace('$hostedURL');</script>";
 		} else {
 		$sqlCheck = "SELECT * FROM users WHERE username = '$username' && email = '$email'";
 		$sqlCheck_ = mysqli_query($conn, $sqlCheck);

 		if (mysqli_num_rows($sqlCheck_) >= 1) {
 			echo "<script>alert('Username atau email ada yang telah mendaftar, coba username atau email lainnya!');</script>";
 		} else {
 			$sqlRun_username = "UPDATE users SET username = '$username' WHERE username = '$data->username'";
 			$sqlRun_password = "UPDATE users SET password = '$password' WHERE username = '$data->username'";
 			$sqlRun_email = "UPDATE users SET email = '$email' WHERE username = '$data->username'";

 			$sqlRes_username = mysqli_query($conn, $sqlRun_username);
 			$sqlRes_password = mysqli_query($conn, $sqlRun_password);
 			$sqlRes_email = mysqli_query($conn, $sqlRun_email);

 			echo "<script>alert('Updated'); window.location.replace('$hostedURL');</script>";
 		}
 	  }
 	}

  ?>