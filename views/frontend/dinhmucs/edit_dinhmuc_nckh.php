<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Hệ thống quản lý quy định về định mức giảng dạy và nghiên cứu khoa học</title>

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
				min-width: 250px;
				z-index: 3;
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

			.admin-caregory-list > li > ul > li:hover > ul > li {
				background-color: #4a4a4a !important;
			}

			.admin-caregory-list > li > ul > li:hover > ul > li:hover {
				background-color: #6a6a6a !important;
			}

			.admin-footer {
				width: 100%;
				padding-top: 25px; padding-bottom: 25px;
				background-color: #3a3a3a;
				text-align: center;
				color: white;
			}



			a {
				text-decoration: none !important;
				color: white !important;
			}

			.panel-main-body {
				width: 800px;
			}

			.panel-main-body .panel-heading {
				background-color: white !important;
				padding-top: 15px; padding-bottom: 15px;

			}

			.panel-main-body .panel-heading .panel-title {
				font-size: 22px;
			}

			.panel-main-body .form-group {
				padding: 15px 10px;
			}

			.panel-main-body .panel-heading .panel-title {
				font-size: 18px;
			}

			.breadcrumb {
				margin-top: 15px;
				font-size: 16px;
				background-color: white !important;
				border-radius: 0px !important;
				box-shadow: 1px 1px 1px 1px #b5b5b5;
			}

			.breadcrumb li a {
				color: #2a2a2a !important;
			}

			.button-form {
				margin-left: 20px; margin-right: 25px;
				margin-top: 45px;
				padding-top: 15px;
				border-top: 1px solid #d3d3d3;
			}

			.button-form button {
				float: left; margin-right: 5px;
			}

	    </style>
	</head>
	<body>
                <?php require_once 'views/layouts/header.php'; ?>
		<?php require_once 'views/layouts/left_sidebar.php'; ?>
					<!-- PHẦN CODE -->

					<ol class="breadcrumb">
					    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="admin.php">Trang chủ</a></li>
					    <li class="active">Quản lý định mức</li>
					    <li>Thông tin định mức</li>
					    <li class="active">Thêm định mức giờ NCKH</li>
					</ol>

                                        <form class="panel panel-default panel-main-body" method="POST" action="">
						<div class="panel-heading">
							<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Thêm định mức giờ NCKH</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
							    <label for="inputEmail3" class="col-sm-2 control-label">Học vị</label>
							    <div class="col-md-10">
                                                                <select class="form-control" name="hocvi">
                                                                <?php
                                                                    foreach ($hocvis as $value) {
                                                                        echo "<option value=".$value["hv_id"]." "; if($value["hv_ten"]==$result["hv_ten"]){ echo "selected"; } echo ">" . $value["hv_ten"] . "</option>";
                                                                    }
                                                                    
                                                                ?>
                                                            </select>
							    </div>
							</div>
							<div class="form-group">
							    <label for="inputEmail3" class="col-sm-2 control-label">Số giờ</label>
							    <div class="col-md-10">
                                                                <input type="text" class="form-control" id="inputEmail3" name="sogio" value="<?php echo $result["dmnckh_sogio"];?>">
							    </div>
							</div>
							
							<div class="form-group">
                                                            <label for="comment">Mô tả</label>
                                                            <textarea class="form-control" name="mota" rows="5" id="comment"><?php echo $result["dmnckh_mota"];?></textarea>
				</div>
							<div class="button-form">
								<button class="btn btn-primary"><a href="index.php?controller=dinhmuc_giangday">Quay lại</a></button>
                                                                <button id="update-btn" class="btn btn-success" type="submit" name="dmnckh_id" value=<?php echo $_GET["dmnckh_id"]; ?>>Cập nhật</button>
							</div>
						</div>
					</form>	
	</body>
</html>