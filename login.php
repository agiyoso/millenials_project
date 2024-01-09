<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Millenials.Sply</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
	<div class="box-login">
		<h2>Login</h2>
		<form action="" method="POST">
			<input type="text" name="user" placeholder="Username" class="input-control">
			<input type="password" name="pass" placeholder="Password" class="input-control">
			<input type="submit" name="submit" value="Login" class="btn">
			<a href="index.php"><p style="padding:8px 15px;
				background-color: #fff;
				margin-top: 10px;
				color: #000000;
				border: 1px solid black;
				cursor: pointer;
				width: 65px;">Beranda</p></a>

		</form>
		<?php 
		//error_reporting(0)
			if(isset($_POST['submit'])){
				session_start();
				include 'db.php';

				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pas = mysqli_real_escape_string($conn, $_POST['pass']);

				$sql = "SELECT * FROM tb_admin WHERE username = '$user' And password= '$pas' ";
				$cek = mysqli_query($conn, $sql);
				if(mysqli_num_rows($cek) > 0){
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login'] = true;
					$_SESSION['a_global'] = $d;
					$_SESSION['id'] = $d->admin_id;

					echo '<script>window.location="dashboard.php"</script>';
				}else{
					echo '<script>alert("Username atau password Anda salah!")</script>';
				}
			}
		?>
	</div>
</body>
</html>