<?php 

	include_once("../database.php");
	include_once("../config.php");

	$id = $_GET["id"];
	if (!$id) {
		echo "<script>window.location.reload('$hostedURL');</script>";
	}

	$sql = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
	if (mysqli_num_rows($sql) < 1) {
		echo "<script>alert('Data tidak ditemukan!');window.location.reload('$hostedURL');</script>";
	} else {
		$data = mysqli_fetch_assoc($sql);

		if ($data["suspended"] == 0) {
			echo "User ini belum di suspend!<br /><a href='$hostedURL'>Back</a>";
		} else {
			$sql_unsuspend = "UPDATE users SET suspended = '0'";
			$sql_unsus = mysqli_query($conn, $sql_unsuspend);

			echo "Sukses User ini telah di unsuspend!<br /><a href='$hostedURL'>Back</a>";
		}
	}

 ?>