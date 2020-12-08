<?php 
	include_once("../config.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../statics/add.css">
	<title>Add Data</title>
</head>
<body>
	<div class="alertModal">
		<strong>NOTE:</strong> Perangkat Android Tidak Friendly :D
	</div>
	<h1>
		Add user
	</h1>
	<form action="<?= $hostedURL . "/libs/add.php" ?>" method="post" name="form">
		<table width="10%" border="0">
			<tr>
				<td>
					Username
				</td>
				<td>
					<input type="text" name="username" required />
				</td>
			</tr>
			<tr>
				<td>
					Password
				</td>
				<td>
					<input type="password" name="password" required autocomplete />
				</td>
			</tr>
			<tr>
				<td>
					Email
				</td>
				<td>
					<input type="email" name="email" required />
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Submit" class="submitBtn" />
				</td>
			</tr>
		</table>
	</form>

	<footer>
		&copy; Latihan PHP dan MySQL
	</footer>
</body>
</html>

<?php 

	if (isset($_POST["submit"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$email = $_POST["email"];

		include_once("../database.php");


		$sql = "SELECT * FROM users WHERE username = '$username' && email = '$email'";
		$res = mysqli_query($conn, $sql);
		$rowCheck = mysqli_num_rows($res);

		if ($rowCheck > 0) {
			echo "<script>alert('Data tersebut sudah ada, coba user lain.'); window.location.replace('$hostedURL');</script>";
		} else {

		$randomID = random_int(100, 255);

		$result = mysqli_query($conn, "INSERT INTO users (id, username, password, email) VALUES ('$randomID', '$username', '$password', '$email')");

		echo '<script>alert("User telah dimasukan, kembali ke halaman awal untuk melihat!"); window.location.replace("$hostedURL");;</script>';
		}
	}
 ?>