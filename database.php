<?php 

	$conn = mysqli_connect("localhost", "root", "", "latihan");

	# Cek kalau error pas connect.
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} else {
		# Connected
	}
 ?>