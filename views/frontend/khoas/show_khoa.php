<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, khoa-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Thông tin khoa <?php echo $result["k_ten"]; ?></title>

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
				margin-top: 20px;
				box-shadow: 1px 1px 1px 1px #b5b5b5;
			}

			.panel-main-body .panel-heading {
				background-color: white !important;
				padding-top: 15px; padding-bottom: 15px;

			}

			.panel-main-body .panel-heading .panel-title {
				font-size: 22px;
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

			.khoa-function-form {
				width: 100%;
				padding: 5px;
				margin-bottom: 15px;
			}

			.khoa-function-form .form-left {
				float: left;
			}

			.khoa-function-form .form-right {
				float: right;
			}

			.khoa-function-form .form-right .input-group {
				width: 350px;
			}

			table {
				clear: both;
				margin-top: 50px;
				background-color: white !important;
				font-size: 13px;
			}

			table #table-header-tr {
				border-bottom: 2px solid #d3d3d3;
			}

			table button {
				font-size: 13px !important;
			}

			table form {
				text-align: center;
			}

	    </style>
	</head>
	<body>
		<?php require_once 'views/layouts/header.php'; ?>
		<?php require_once 'views/layouts/left_sidebar.php'; ?>
		<!-- PHẦN CODE -->

		<ol class="breadcrumb">
		    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="index.php?controller=home">Trang chủ</a></li>
		    <li>Quản lý giảng viên</li>
		    <li>Khoa</li>
		    <li class="active">Thông tin khoa <?php echo $result["k_ten"]; ?></li>
		</ol>

		<div class="panel panel-default panel-main-body">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-khoa" aria-hidden="true"></span>Thông tin khoa <?php echo $result["k_ten"]; ?></h3>
			</div>
			<div class="panel-body">

				<div class="khoa-function-form">
					<div class="form-left">
						<?php echo"<a href='index.php?controller=khoa&action=edit&k_id=".$result["k_id"]."'><button class='btn btn-success'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Sửa</button></a>"; ?>
						<?php echo"<a href='index.php?controller=khoa&action=delete&k_id=".$result["k_id"]."'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Xóa</button></a>"; ?>
					</div>
				</div>

				<?php
					echo "<table class='table table-bordered'>";
						echo "<tr id='table-header-tr'>";
						 	echo "<th>Thông tin</th>";
						 	echo "<th>Mô tả</th>";
						 echo "</tr>";
					 	echo "<tr>";
					 		echo "<td>Id</td>";
						 	echo "<td>".$result["k_id"]."</td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Tên khoa</td>";
						 	echo "<td>".$result["k_ten"]."</td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Mã khoa</td>";
						 	echo "<td>".$result["k_makhoa"]."</td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Trưởng khoa</td>";
						 	echo "<td></td>";
						echo "</tr>";	
						echo "<tr>";
					 		echo "<td>Phó trưởng khoa</td>";
						 	echo "<td></td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Thư ký khoa</td>";
						 	echo "<td></td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Số điện thoại</td>";
						 	echo "<td>".$result["k_sdt"]."</td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Mô tả</td>";
						 	echo "<td>".$result["k_mota"]."</td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Các bộ môn thuộc khoa</td>";
						 	echo '<td>
						 		<table class="table table-bordered" style="margin-top: 20px;">
						    		<tr>
						    			<th>Id</th>
						    			<th>Tên bộ môn</th>
						    		</tr>
						    		';
						    		foreach($bomons as $row) {
						    			echo "<tr>";
						    			echo "<td>".$row["bm_id"]."</td>";
						    			echo "<td>".$row["bm_ten"]."</td>";
						    			echo "</tr>";
						    		}
					
							    echo '</table>
						 	</td>';
						echo "</tr>";	
					echo "</table>";
				?>
				<button class='btn btn-primary'><a href="index.php?controller=khoa">Quay lại</a></button>
			</div>
		</div>
	</body>
</html>