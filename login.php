<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<style>
		body {
			color: #fff;
			background: #004d79;
		}

		.logo {
			margin-bottom: 50px;
		}

		.title-menu {
			text-align: left;
			color: #004d79;
			padding-bottom: 8px;
		}

		.text-center {
			color: #004d79;
		}

		.text-bottom {
			color: #004d79;
			text-decoration: none;
		}

		.form-control {
			min-height: 41px;
			background: #f2f2f2;
			box-shadow: none !important;
			border: transparent;
		}

		.form-control:focus {
			background: #e2e2e2;
		}

		.form-control,
		.btn {
			border-radius: 2px;
		}

		.login-form {
			width: 350px;
			margin: 30px auto;
			text-align: center;
		}

		.login-form h2 {
			margin: 10px 0 25px;
		}

		.login-form form {
			color: #7a7a7a;
			border-radius: 3px;
			margin-bottom: 15px;
			background: #fff;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}

		.login-form .btn {
			font-size: 16px;
			font-weight: bold;
			background: #004d79;
			border: none;
			outline: none !important;
		}

		.login-form .btn:hover,
		.login-form .btn:focus {
			background: #2389cd;
		}

		.login-form a {
			color: #fff;
			text-decoration: underline;
		}

		.login-form a:hover {
			text-decoration: none;
		}

		.login-form form a {
			color: #7a7a7a;
			text-decoration: none;
		}

		.login-form form a:hover {
			text-decoration: underline;
		}

		.text-center small {
			color: #fff;
		}
	</style>
</head>

<body>
	<div class="login-form">
		<div class="logo">
			<img src="img/logo1.png">
		</div>
		<form action="proses/ceklogin.php" method="post">
			<a href="index.php"><i class="fas fa-long-arrow-alt-left" style="float: left;"></i></a>
			<h2 class="text-center">Login</h2>
			<div class="form-group ">
				<div class="form-group has-error">
					<div class="title-menu"><i class="fas fa-user"></i> Username</div>
					<input type="text" class="form-control" name="username" placeholder="Username" required="required">
				</div>
				<div class="form-group">
					<div class="title-menu"><i class="fa fa-key" aria-hidden="true"></i> Password</div>
					<input type="password" class="form-control" name="password" placeholder="Password" required="required">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Sign in</button>
				</div>
				<p><a href="requestReset.php">Lost your Password?</a></p>
		</form>

		<p class="text-bottom">Belum punya akun? <a href="register.php">Daftar Sekarang!</a></p>

	</div>
</body>

</html>