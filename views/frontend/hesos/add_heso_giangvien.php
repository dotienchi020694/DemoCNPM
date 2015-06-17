<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Thêm mới hệ số giảng viên</title>

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

	    <script>
	    	$(document).ready(function(){
			    $("#checkNamLonHon").attr('disabled', true);
			    $("#checkNamNhoHon").attr('disabled', true);
			    $("#checkNamLonHonValue").attr('disabled', true);
			    $("#checkNamNhoHonValue").attr('disabled', true);

			    $("#checkNam").change(function(){
			    	if($(this).is(':checked')) {
						$("#checkNamLonHon").attr('disabled', false);
					    $("#checkNamNhoHon").attr('disabled', false);
					    $("#checkNamLonHonValue").attr('disabled', false);
			    		$("#checkNamNhoHonValue").attr('disabled', false);
					} else {
						$("#checkNamLonHon").attr('disabled', true);
			   			$("#checkNamNhoHon").attr('disabled', true);
			   			$("#checkNamLonHonValue").attr('disabled', true);
			   			$("#checkNamNhoHonValue").attr('disabled', true);

			   			$("#checkNamNhoHonValue").val('');
			   			$("#checkNamLonHonValue").val('');
					}
				});

				$("#checkNamLonHon").click(function(){
				   	$("#checkNamNhoHonValue").val('');
				});

				$("#checkNamNhoHon").click(function(){
				   	$("#checkNamLonHonValue").val('');
				});
			});
	    </script>
	</head>
	<body>
		<?php require_once 'views/layouts/header.php'; ?>
		<?php require_once 'views/layouts/left_sidebar.php'; ?>
			<!-- PHẦN CODE -->

		<ol class="breadcrumb">
		    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="index.php?controller=home">Trang chủ</a></li>
		    <li class="active">Quản lý định mức</li>
		    <li>Bộ môn</li>
		    <li class="active">Hệ số giảng viên</li>
		</ol>

		<form class="panel panel-default panel-main-body" method="POST" action="">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Thêm hệ số giảng viên</h3>
			</div>
			<div class="panel-body">
                <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Học vị</label>
				    <div class="col-md-10">
				    	<select class="form-control" name="hocvi">
				        <?php
				        	foreach($hocvi as $row)  {
				        		echo "<option value=".$row["hv_id"].">" . $row["hv_ten"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
                <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Năm học</label>
				    <div class="col-md-10">
				    	<select class="form-control" name="namhoc">
				        <?php
				        	foreach($namhoc as $row)  {
				        		echo "<option value=".$row["nh_id"].">" . $row["nh_ten"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Hệ số</label>
				    <div class="col-md-10">
				        <input type="text" name="heso" class="form-control" id="inputEmail3" placeholder="Nhập hệ số">
				    </div>
				</div>
				<div class="form-group">
	                <label for="inputEmail3" class="col-sm-2 control-label">Số năm yêu cầu</label>
	                <div class="col-md-10">
	                    <input type="checkbox" aria-label="..." name="checkNam" value=1 id="checkNam">
	                </div>
                </div>
                <div class="require-year-form" style="padding: 10px; padding-left: 135px; padding-right: 25px; margin-bottom: -30px;">
                    <div class="input-group" style="margin-bottom: 10px;">
                        <span class="input-group-addon">
                                <input type="radio" name="sonam" value=2 id="checkNamLonHon" aria-label="...">
                            </span>
                            <input type="text" name="checkNamLonHonValue" id="checkNamLonHonValue" class="form-control" aria-label="..." placeholder="Lớn hơn">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" name="sonam" value=1 id="checkNamNhoHon" aria-label="...">
                            </span>
                                <input type="text" name="checkNamNhoHonValue" id="checkNamNhoHonValue" class="form-control" aria-label="..." placeholder="Nhỏ hơn">
                        </div>
                </div>
				<div class="form-group">
				  	<label for="comment">Mô tả</label>
				  	<textarea class="form-control" name="mota" rows="5" id="comment"></textarea>
				</div>
				<div class="button-form">
					<a href="index.php?controller=dinhmuc_heso_giangvien"><button type="button" class="btn btn-primary">Quay lại</button></a>
					<input class="btn btn-success" type="submit" name="submit" id="create-btn" value="Thêm hệ số">
				</div>
			</div>
		</form>
	</body>
</html>