<?php 

	// if(!isset($_SESSION["login_status"])) {
	// 	$_SESSION["login_status"] = 0;
	// } else {
	// 	if($_SESSION["login_status"] == 1) {
	// 		header("Location: admin.php");
	// 	}
	// }
?>

<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Đăng nhập tài khoản</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<style type="text/css">
		body {
			background-color: #f1f1f1;
			font-family: Helvetica;
		}

		.login-form {
			padding: 20px 15px;
			background-color: white;
			width: 420px;
			margin: auto; margin-top: 220px;
			border-radius: 5px;
			-webkit-box-shadow: 0 2px 5px rgba(0,0,0,0.5);
		}

		.login-form .title {
			text-align: center;
			margin: -20px -15px 30px -15px;
			padding-top: 20px; padding-bottom: 20px;
			background-color: #0fb5cd;
			color: white;
			font-size: 20px;
			border-top-left-radius: 5px; border-top-right-radius: 5px;
		}

		.login-form .input-group {
			margin-top: 5px;
		}

		.login-form .input-group input {
			height: 40px;
		}


		.login-form .input-group-addon {
			height: 30px !important;
		}

		.login-form .checkbox {			
			font-size: 14px;
			margin-top: 15px; margin-bottom: 10px;
		}

		.login-form .action-form {
			margin-top: 15px;
			text-align: center;
		}

		.login-form .action-form #signin-btn, button {
			background-color: #0fb5cd;
			border-radius: 5px;
			color: white;
			border: 0px;
			height: 40px; width: 100%;
		}

	</style>
</head>
<body>
	

	<?php 
		// if ($_SESSION["login_status"] == 1) {
		// 	header("Location: admin.php");
		// } 
		if(isset($_SESSION["login_fail"])) {
			echo $_SESSION["login_fail"];
			unset($_SESSION["login_fail"]);
		}

		if(isset($_SESSION["db_fail"])) {
			echo $_SESSION["db_fail"];
			unset($_SESSION["db_fail"]);
		}
	?>


	<form class="login-form" method="POST" action="">
		<div class="title">Đăng nhập tài khoản</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
  			<input type="text" class="form-control login-form-field"  name="uname" placeholder="Tên đăng nhập" valua="" aria-describedby="sizing-addon2">
  		</div>
  		<div class="input-group">
  			<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></span>
			<input type="password" class="form-control login-form-field" name="upassword" value="" placeholder="Mật khẩu"><br>
		</div>
		<div class="checkbox">
		    <label>
		      <input type="checkbox"> Ghi nhớ tài khoản
		    </label>
		</div>
		<div class="action-form">
			<input type="submit" class="login-form-button" id="signin-btn" name="submit" value="Đăng nhập">
		</div>
	</form>

</body>