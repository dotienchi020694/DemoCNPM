<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Thêm mới giảng viên</title>

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
		    <li class="active">Quản lý giảng viên</li>
		    <li>Danh sách giảng viên</li>
		    <li class="active">Tạo giảng viên</li>
		</ol>

		<form class="panel panel-default panel-main-body" method="POST" action="">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Tạo giảng viên</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Họ và tên</label>
				    <div class="col-md-10">
				        <input type="text" name="newgvten" class="form-control" id="inputEmail3" placeholder="Tên giảng viên">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Giới tính</label>
				    <div class="col-md-10">
				    	<select class="form-control" name="newgvgioitinh">
				        	<option value="1">Nam</option>;
				        	<option value="2">Nữ</option>;
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Mã giảng viên</label>
				    <div class="col-md-10">
				        <input type="text" name="newgvmagv" class="form-control" id="inputEmail3" placeholder="Mã giảng viên">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-md-10">
				        <input type="text" name="newgvemail" class="form-control" id="inputEmail3" placeholder="Email">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
				    <div class="col-md-10">
				        <input type="text" name="newgvsdt" class="form-control" id="inputEmail3" placeholder="Số điện thoại">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
				    <div class="col-md-10">
				        <input type="text" name="newgvdiachi" class="form-control" id="inputEmail3" placeholder="Địa chỉ">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Thời gian bắt đầu công việc</label>
				    <div class="col-md-10">
				        <input type="text" name="newgvtimestartjob" class="form-control" id="inputEmail3" placeholder="Thời gian bắt đầu công việc">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Học vị</label>
				    <div class="col-md-10">
				    	<select class="form-control" name="newhvid">
				        <?php
				        	foreach($hocvis as $row)  {
				        		echo "<option value=".$row["hv_id"].">" . $row["hv_ten"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Chức danh</label>
				    <div class="col-md-10">
				    	<select class="form-control" name="newcdid">
				        <?php
				        	foreach($chucdanhs as $row)  {
				        		echo "<option value=".$row["cd_id"].">" . $row["cd_ten"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Bộ môn</label>
				    <div class="col-md-10">
				    	<select class="form-control" name="newbmid">
				        <?php
				        	foreach($bomons as $row)  {
				        		echo "<option value=".$row["bm_id"].">" . $row["bm_ten"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Tình trạng</label>
				    <div class="col-md-10">
				    	<select class="form-control" name="newttid">
				        <?php
				        	foreach($tinhtrangs as $row)  {
				        		echo "<option value=".$row["tt_id"].">" . $row["tt_ten"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				  	<label for="comment">Mô tả</label>
				  	<textarea class="form-control" name="newgvmota" rows="5" id="comment"></textarea>
				</div>
				<div class="button-form">
					<a href="index.php?controller=giangvien"><button type="button" class="btn btn-primary">Quay lại</button></a>
					<input class="btn btn-success" type="submit" name="submit" id="create-btn" value="Tạo giảng viên">
				</div>
			</div>
		</form>
	</body>
</html>