<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Trang quản trị</title>

		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	    <style>
	    	body {
				font-family: Helvetica;
				font-size: 13px;
				background-color: #f1f1f1;
				margin: 0px;
				padding: 0px;
			}

			span {
				margin-right: 5px;
			}

			.admin-navbar {
				background-color: #3a3a3a;
				padding: 0px;
				margin-bottom: 0px;
				width: 100%;
				float: left;

				position: fixed;
				top: 0;
				left: 0;
				z-index: 9999;
			}

			.admin-navbar ul {
				list-style: none;
				background: #3a3a3a;
			}

			.admin-navbar ul li {
				display: block;
				position: relative;
				float: left;
			}

			.admin-navbar #admin-navbar-brand {
				background-color: #4a4a4a;
			}

			.admin-navbar ul li:hover {
				background-color: #4a4a4a;
				transition: background-color 0.4s;
			}

			.admin-navbar ul li a {
				display: block;
				text-decoration: none;
				color: white;
				padding: 15px 25px;
			}

			.admin-navbar .admin-navbar-left {
				float: left;
				
			}

			.admin-navbar .admin-navbar-right {
				float: right;
				margin-right: 30px;
			}

	    </style>
	</head>
	<body>
		<div class="admin-navbar">
			<div class="admin-navbar-left">
				<ul>
					<li id="admin-navbar-brand"><a href="index.php">Đại học Thăng Long</a></li>
				</ul>
			</div>
			<div class="admin-navbar-right">
				<ul>
					<?php
						echo "<li><a href='index.php?controller=user&action=show&user_id=" . $_SESSION["current_user"]["u_id"] . "'>" . $_SESSION["current_user"]["u_name"] . "</a></li>";
					?>
					<li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Thông báo</a></li>
					<li><a href="index.php?controller=home&action=logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>Thoát</a></li>
				</ul>
			</div>
		</div>		
	</body>
</html>