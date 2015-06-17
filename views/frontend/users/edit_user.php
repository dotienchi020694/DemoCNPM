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
					    <li class="active">Quản lý tài khoản</li>
					    <li>Danh sách tài khoản</li>
					    <li class="active">Chỉnh sửa tài khoản</li>
					</ol>

					<form class="panel panel-default panel-main-body" method="POST" onsubmit="return checkPassword()">
						<div class="panel-heading">
							<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Chỉnh sửa tài khoản  <?php echo $result["u_name"]; ?></h3>
						</div>
						<div class="panel-body">
<!-- 							<div class="form-group">
							    <label for="inputEmail3" class="col-sm-2 control-label">Tên đăng nhập</label>
							    <div class="col-md-10">
							        <input type="text" class="form-control" id="inputEmail3" placeholder="Tên đăng nhập">
							    </div>
							</div> -->
							<div class="form-group">
							    <label for="inputEmail3" class="col-sm-2 control-label">Tên giảng viên</label>
							    <div class="col-md-10">
							        <select class="form-control" name="editgvid">
							        <?php
							        	foreach($danh_sach_gvs as $row)  {
							        		if($row["gv_ten"] == $result["giangvien_name"]){
							        			echo "<option value=". $row["gv_id"] ." selected>" . $row["gv_ten"] . " - " . $row["gv_magv"] ."</option>";
							        		}
							        		else
							        			echo "<option value=". $row["gv_id"] .">" . $row["gv_ten"] . " - " . $row["gv_magv"] ."</option>";
							        	}
							        ?>
							    	</select>
							    </div>
							</div>							
							<div class="form-group">
							    <label for="inputEmail3" class="col-sm-2 control-label">Thay đổi mật khẩu</label>
							    <div class="col-md-10">
							        <input type="checkbox" aria-label="..." id="password-checkbox">
							    </div>
							</div>
							<div class="form-group " style="padding: 10px; padding-left: 135px; padding-right: 10px; margin-bottom: 25px;">
							    <label for="inputEmail3" class="col-sm-3 control-label">Mật khẩu mới</label>
							    <div class="col-md-9">
							        <input type="password" class="form-control" id="password-input" name="editupassword" placeholder="Mật khẩu mới">
							    </div>
							</div>
							<div class="form-group " style="padding: 10px; padding-left: 135px; padding-right: 10px;">
							    <label for="inputEmail3" class="col-sm-3 control-label">Xác nhận mật khẩu mới</label>
							    <div class="col-md-9">
							        <input type="password" class="form-control" id="repassword-input" placeholder="Xác nhận mật khẩu mới">
							    </div>
							</div>
							<div class="form-group" style="clear: both;">
							    <label for="inputEmail3" class="col-sm-2 control-label">Nhóm người dùng</label>
							    <div class="col-md-10">
							        <select class="form-control" name="editrid">
									     <?php
								        	foreach($danh_sach_role as $row)  {
								        		if($row["r_ten"] == $result["role_name"]){
								        			echo "<option value=".$row["r_id"]." selected>" . $row["r_ten"] ."</option>";
								        		}
								        		else
								        			echo "<option value=".$row["r_id"].">" . $row["r_ten"] ."</option>";
								        	}
								        ?>
									</select>
							    </div>
							</div>
							<div class="form-group">
							    <label for="inputEmail3" class="col-sm-2 control-label">Tình trạng</label>
							    <div class="col-md-10">
							        <select class="form-control" name="editutrangthai">
									    <option value="1">Bình thường</option>
									    <option value="2">Khóa</option>
									</select>
							    </div>
							</div>
							<div class="button-form">
								<button class="btn btn-primary"><a href="index.php?controller=user">Quay lại</a></button>
								<input class="btn btn-success" id="create-btn" value="Cập nhật" name="u_id" type="submit">
							</div>
						</div>
					</form>

		<script type="text/javascript">

		function checkPassword(){
			if(document.getElementById("password-checkbox").checked){
				if(document.getElementById("password-input").value.length == 0){
		           	window.alert("Bạn chưa nhập mật khẩu!");
		           	return false;
		        }
			    else if(document.getElementById("repassword-input").value.length == 0){
		            window.alert("Bạn chưa nhập xác nhận mật khẩu!");
		            return false;
		        } 	   
			    else if (document.getElementById("password-input").value != document.getElementById("repassword-input").value) {
		            window.alert("Mật khẩu xác nhận không đúng!");
		            return false;
		        }		       
			}
			return true;						
		}

		$(document).ready(function(){
			$("#password-input").attr("disabled", true);
			$("#repassword-input").attr("disabled", true);

		    $("#password-checkbox").change(function() {
			    if(this.checked) {
			        $("#password-input").attr("disabled", false);
					$("#repassword-input").attr("disabled", false);					
			    }
			    else{
			    	$("#password-input").attr("disabled", true);
					$("#repassword-input").attr("disabled", true);
			    }
			});			
		});
			
		</script>
	</body>
</html>