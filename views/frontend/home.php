<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Trang quản lý số giờ nghiên cứu khoa học của giảng viên Đại học Thăng Long</title>

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

			.admin-main-body {
				margin-top: 48px;
			}

			.admin-caregory-list {
				margin: 0px -15px;
			}

			.admin-caregory-list span {
				color: #d3d3d3;
			}

			.admin-caregory-list li {
				border-radius: 0px !important;
				background-color: #5a5a5a;
				border: 0px;
				padding: 20px 18px;
			}

			.admin-caregory-list li:hover {
				background-color: #6a6a6a;
				transition: background-color 0.3s;
			}

			.admin-caregory-list li a {
				text-decoration: none;
				color: white;
				margin-left: 15px;
			}




			.admin-caregory-list ul {
				list-style: none;
				padding: 0px;
				margin: 0px;
			}

			.admin-caregory-list ul li {
				display: block;
				position: relative;
				float: left;
			}

			.admin-caregory-list ul li a:hover {
				transition: background 0.5s ease;
			}

			.admin-caregory-list li ul {
				display: none;
			}

			.admin-caregory-list li:hover > ul {
				display: block;
				position: absolute;
			}

			.admin-caregory-list li:hover ul li {
				background-color: #6a6a6a;
				min-width: 230px;
				z-index: 1;
			}

			.admin-caregory-list li:hover ul li:hover {
				background-color: #4a4a4a;
				transition: background 0.5s ease;
			}

			.admin-caregory-list li:hover ul li a {
				margin: 5px;
			}

			.admin-caregory-list ul {
				left: 100%;
				top: 0;
			}

	    </style>
	</head>
	<body>
		<?php require_once 'views/layouts/header.php'; ?>
		<?php require_once 'views/layouts/left_sidebar.php'; ?>
	</body>
</html>