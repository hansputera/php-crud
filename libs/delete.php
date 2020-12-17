<?php 
	session_start();

	include_once("../database.php");
	include_once("../config.php");

	if (!isset($_SESSION["userInfo"])) {
		echo "<script>window.location.replace('$hostedURL');</script>";
	}

	$id = $_GET["id"];
	if (!$id) {
		echo "<script>window.location.replace('$hostedURL');</script>";
	} else {
		$sql_ = "SELECT * FROM users WHERE id = '$id'";
		$sql__ = mysqli_query($conn, $sql_);

		if (mysqli_num_rows($sql__) < 1) {
			echo "Data tersebut tidak ada";
		} else {
		$sql = "DELETE FROM users WHERE id = '$id'";
		$query = mysqli_query($conn, $sql);

		echo "<script>alert('Data berhasil dihapus!'); window.location.replace('$hostedURL');</script>";
	}
	}

 ?>