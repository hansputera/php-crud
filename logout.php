<?php 

	session_start();

	if (isset($_SESSION["userInfo"])) {
		session_destroy();
		echo "Kamu sudah logout!";
	} else {
		echo "Kamu belum login, jadi tidak perlu logout!";
	}

 ?>