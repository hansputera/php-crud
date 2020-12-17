<?php 

    session_start();

	include_once("database.php");
	include_once("config.php");
    
	$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
    $total = mysqli_num_rows($result);

    if (!isset($_SESSION["userInfo"])) {
        echo "<script>window.location.replace('$hostedURL');</script>";
    }
 ?>

<?php if ($_SESSION["userInfo"]["username"] === "admin") { ?>
 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="statics/style.css">
 	<title>Halaman awal</title>
 </head>
 <body>
 	<br /><br />
    <h1 class="profile">Hi <?= $_SESSION["userInfo"]["username"] ?></h1><br />
    <h1>Total Data: <?= $total ?></h1>
 	<table width="80%" border="1">
 		<tr>
 			<th>ID</th> <th>Name</th> <th>Password</th> <th>Email</th> <th>Admin</th> <th>Tools</th>
 		</tr>
 		<?php  
        while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['username']."</td>";
        $pass = $user_data['password'];
        echo "<td>".str_repeat("*", strlen($pass))."</td>";
        echo "<td>".$user_data['email']."</td>"; 

        if ($user_data["isAdmin"] == 0) {
            echo "<td>Tidak</td>";
        } else {
            echo "<td>Ya</td>";
        }

        echo "<td><a href='libs/edit.php?id=$user_data[id]'>Edit</a> <a href='libs/delete.php?id=$user_data[id]'>Hapus</a></td></tr>"; 
    }
    ?>
 	</table>

    <button class="add">Add user</button>
 </body>
 <script type="text/javascript" src="statics/index.js"></script>
    <script type="text/javascript" src="statics/device.js"></script>
 </html>

 <?php } else { ?>
    <h1>Denied</h1>
<?php } ?>