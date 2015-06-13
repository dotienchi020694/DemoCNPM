<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Chỉnh sửa giảng viên <?php echo $result["gv_ten"]; ?></title>

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
		    <li class="active">Chỉnh sửa giảng viên <?php echo $result["gv_ten"]; ?></li>
		</ol>

		<form class="panel panel-default panel-main-body" method="POST" action="">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Chỉnh sửa giảng viên <?php echo $result["gv_ten"]; ?></h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Tên giảng viên</label>
				    <div class="col-md-10">
				        <?php echo '<input type="text" name="editgvten" class="form-control" id="inputEmail3" placeholder="Tên giảng viên" value="'. $result["gv_ten"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Giới tính</label>
				    <div class="col-md-10">
				        <select class="form-control" name="editgvgioitinh">
				        	<?php echo'<option value="1"'; if($result["gv_gioitinh"]==1) { echo 'selected'; }  echo'>Nam</option>'; ?>;
				        	<?php echo'<option value="2"'; if($result["gv_gioitinh"]==2) { echo 'selected'; }  echo'>Nữ</option>'; ?>;
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Mã giảng viên</label>
				    <div class="col-md-10">
				        <?php echo '<input type="text" name="editgvmagv" class="form-control" id="inputEmail3" placeholder="Mã giảng viên" value="'. $result["gv_magv"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-md-10">
				        <?php echo '<input type="text" name="editgvemail" class="form-control" id="inputEmail3" placeholder="Email" value="'. $result["gv_email"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
				    <div class="col-md-10">
				        <?php echo '<input type="text" name="editgvsdt" class="form-control" id="inputEmail3" placeholder="Số điện thoại" value="'. $result["gv_sdt"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
				    <div class="col-md-10">
				        <?php echo '<input type="text" name="editgvdiachi" class="form-control" id="inputEmail3" placeholder="Địa chỉ" value="'. $result["gv_diachi"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Thời gian bắt đầu công việc</label>
				    <div class="col-md-10">
				        <?php echo '<input type="text" name="editgvtimestartjob" class="form-control" id="inputEmail3" placeholder="Thời gian bắt đầu công việc" value="'. $result["gv_time_start_job"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Học vị</label>
				    <div class="col-md-10">
				        <select class="form-control" name="edithvid">
				        <?php
				        	foreach($hocvis as $row)  {
				        		echo "<option value=".$row["hv_id"]. " "; if($row["hv_ten"] == $result["hv_ten"]) { echo "selected"; } echo ">" . $row["hv_ten"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Chức danh</label>
				    <div class="col-md-10">
				        <select class="form-control" name="editcdid">
				        <?php
				        	foreach($chucdanhs as $row)  {
				        		echo "<option value=".$row["cd_id"]. " "; if($row["cd_ten"] == $result["cd_ten"]) { echo "selected"; } echo ">" . $row["cd_ten"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Bộ môn</label>
				    <div class="col-md-10">
				        <select class="form-control" name="editbmid">
				        <?php
				        	foreach($bomons as $row)  {
				        		echo "<option value=".$row["bm_id"]." "; if($row["bm_ten"] == $result["bm_ten"]) { echo "selected"; } echo ">" . $row["bm_ten"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Tình trạng</label>
				    <div class="col-md-10">
				        <select class="form-control" name="editttid">
				        <?php
				        	foreach($tinhtrangs as $row)  {
				        		echo "<option value=".$row["tt_id"]." "; if($row["tt_ten"] == $result["tt_ten"]) { echo "selected"; } echo ">" . $row["tt_ten"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				  	<label for="comment">Mô tả</label>
				  	<textarea class="form-control" name="editgvmota" rows="5" id="comment"><?php echo $result["gv_mota"]; ?></textarea>
				</div>
				<div class="button-form">
					<a href="index.php?controller=giangvien"><button type="button" class="btn btn-primary">Quay lại</button></a>
					<!-- <input class="btn btn-success" type="submit" name="k_id" id="create-btn" value="Cập nhật"> -->
					<button id="update-btn" class="btn btn-success" type="submit" name="gv_id" value=<?php echo $_GET["gv_id"]; ?>>Cập nhật</button>
				</div>
			</div>
		</form>
	</body>
</html>