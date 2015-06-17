<html>
	<head>
		<script language="javascript" src="publics/library/ckeditor/ckeditor.js" type="text/javascript"></script>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Thêm mới danh mục quy đổi </title>

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
		    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="index.php?controller=home">Trang chủ</a></li>
		    <li class="active">Quản lý định mức</li>
		    <li>Danh mục quy đổi</li>
		    <li class="active">Thêm mới danh mục quy đổi</li>
		</ol>

		<form class="panel panel-default panel-main-body" method="POST" action="">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Tạo danh mục quy đổi</h3>
			</div>
			<div class="panel-body">
                            
                                <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Loại việc</label>
				    <div class="col-md-10">
				    	<select class="form-control" name="loaiviec">
				        <?php
				        	foreach($loaiviec as $row)  {
				        		echo "<option value=".$row["lv_id"].">" . $row["lv_ten"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
                                
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Công việc cụ thể</label>
				    <div class="col-md-10">
				        <input type="text" name="congviec" class="form-control" id="inputEmail3" placeholder="Tạo công việc cụ thể">
				    </div>
				</div>
				
                                <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Số giờ</label>
				    <div class="col-md-10">
				        <input type="text" name="gio" class="form-control" id="inputEmail3" placeholder="Nhập số giờ">
				    </div>
				</div>
                                
                                <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Số đơn vị</label>
				    <div class="col-md-10">
				        <input type="text" name="sodonvi" class="form-control" id="inputEmail3" placeholder="Nhập số đơn vị">
				    </div>
				</div>
                                
                                <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Đơn vị</label>
				    <div class="col-md-10">
				    	<select class="form-control" name="donvi">
				        <?php
				        	foreach($donvi as $row)  {
				        		echo "<option value=".$row["dv_id"].">" . $row["dv_ten"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
				
				<div class="form-group">
				  	<label for="comment">Ghi chú</label>
				  	<textarea class="form-control" name="ghichu" rows="5" id="comment"></textarea>
				</div>
				<div class="button-form">
					<a href="index.php?controller=giangvien"><button type="button" class="btn btn-primary">Quay lại</button></a>
					<input class="btn btn-success" type="submit" name="submit" id="create-btn" value="Tạo quy đổi">
				</div>
			</div>
		</form>
	</body>
</html>