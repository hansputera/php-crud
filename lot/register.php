<?php 
	session_start();
	include '../config.php';

	if (isset($_SESSION["userInfo"])) {
		echo "<script>window.location.replace('$hostedURL');</script>";
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<script type="text/javascript">
 		window.location.replace("<?= $hostedURL . '/libs/add.php' ?>");
 	</script>
 </head>
 </html>