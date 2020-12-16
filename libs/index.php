<?php 

	if (!isset($_SESSION["userInfo"])) {
		echo "You are not allowed to visit this page!";
	} elseif ($_SESSION["userInfo"]["username"] === "admin") {
		echo "Welcome!";
	}
 ?>