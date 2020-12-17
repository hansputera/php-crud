<?php 

	session_start();
	include_once("../database.php");
	include_once("../config.php");

	if (!isset($_SESSION["userInfo"])) {
		echo "<script>window.location.replace('$hostedURL');</script>";
	}
	$id = $_GET["id"];
	if (!$id) {
		echo "<script>window.location.reload('$hostedURL');</script>";
	}

	$sql = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
	if (mysqli_num_rows($sql) < 1) {
		echo "<script>alert('Data tidak ditemukan!');window.location.reload('$hostedURL');</script>";
	} else {
		$data = mysqli_fetch_assoc($sql);

		if ($data["suspended"] == 1) {
			echo "User ini telah di suspend!<br /><a href='$hostedURL'>Back</a>";
		} else {
			$sql_suspend = "UPDATE users SET suspended = '1'";
			$sql_sus = mysqli_query($conn, $sql_suspend);

			echo "Sukses User ini telah di suspend!<br /><a href='$hostedURL'>Back</a>";
		}
	}
 ?>