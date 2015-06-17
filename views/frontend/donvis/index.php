<head>
	<title>Danh sách loại việc</title>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<style type="text/css">
		body {
			background-color: #f1f1f1 !important;
			font-family: Helvetica;
			margin: 0px;
			padding: 0px;
		}

		a {
			text-decoration: none !important;
			color: white !important;
		}

		.panel-main-body {
			margin-top: 20px;
		}

		.panel-main-body .panel-heading {
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

		.bomon-function-form {
			width: 100%;
			padding: 5px;
			margin-bottom: 15px;
		}

		.bomon-function-form .form-left {
			float: left;
		}

		.bomon-function-form .form-right {
			float: right;
		}

		.bomon-function-form .form-right .input-group {
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

		table img {
			width: 140px;
			height: auto;
		}

		.pagination-body {
			text-align: center;
		}

		.pagination li a {
			color: #5a5a5a !important;
		}

	</style>
	<script>
		function checkBlankSearchInput(){
	    	if(document.getElementById('search-input').value.length == 0){
				window.alert("Bạn chưa nhập nội dung tìm kiếm");
	    		return false;
	    	}
	    	return true;
	    }

	    window.onload = function() {
			if (typeof history.pushState === "function") {
			    history.pushState("jibberish", null, null);
			    window.onpopstate = function () {
			        history.pushState('newjibberish', null, null);
			        <?php
			        	echo "header('index.php?controller=loaiviec')";
			        ?>
			    };
			}
		}
	</script>
</head>
<body>
	<?php require_once 'views/layouts/header.php'; ?>
	<?php require_once 'views/layouts/left_sidebar.php'; ?>

	<?php
		// $view = new Share_view();
		// echo $view->render('views/backend/index.php',null);

		if(!isset($_SESSION["login_status"])) {
			$_SESSION["login_status"] = 0;
		}

		if(isset($_SESSION["db_fail"])) {
			echo $_SESSION["db_fail"];
			$_SESSION["db_fail"] = "";
		}

		if(isset($_SESSION["create_bomon_successful"])) {
			echo '<p style="font-size:20px">'.$_SESSION["create_bomon_successful"].'</p>';
			$_SESSION["create_bomon_successful"] = "";
		}

		if(isset($_SESSION["create_bomon_fail"])) {
                        echo '<p style="font-size:20px">'.$_SESSION["create_bomon_fail"].'</p>';
			$_SESSION["create_bomon_fail"] = "";
		}

		if(isset($_SESSION["delete_bomon_successful"])) {
                        echo '<p style="font-size:20px">'.$_SESSION["delete_bomon_successful"].'</p>';
			$_SESSION["delete_bomon_successful"] = "";
		}

		if(isset($_SESSION["delete_bomon_fail"])) {
                        echo '<p style="font-size:20px">'.$_SESSION["delete_bomon_fail"].'</p>';
			$_SESSION["delete_bomon_fail"] = "";
		}

		if(isset($_SESSION["edit_bomon_successful"])) {
                        echo '<p style="font-size:20px">'.$_SESSION["edit_bomon_successful"].'</p>';
			$_SESSION["edit_bomon_successful"] = "";
		}

		if(isset($_SESSION["edit_bomon_fail"])) {
                        echo '<p style="font-size:20px">'.$_SESSION["edit_bomon_fail"].'</p>';
			$_SESSION["edit_bomon_fail"] = "";
		}
	?>

	<ol class="breadcrumb">
	    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="index.php?controller=home">Trang chủ</a></li>
	    <li class="active">Quản lý định mức</li>
	    <li class="active">Quản lý quy đổi giờ chuẩn</li>
            <li class="active">Đơn vị</li>
	</ol>

	<div class="panel panel-default panel-main-body">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-bomon" aria-hidden="true"></span>Danh sách đơn vị công việc</h3>
		</div>
		<div class="panel-body">
			<div class="bomon-function-form">
				<div class="form-left">
					<a href="?controller=donvi_quydoi&action=add"><button type="button" class="btn btn-primary">Thêm mới</button></a>
				</div>
				<div class="form-right">
					<form class="input-group" method="POST" action="?controller=donvi_quydoi&action=search" onsubmit="return checkBlankSearchInput()">
				        <input type="text" id="search-input" name="keyword" class="form-control" placeholder="Nhập thông tin bộ môn cần tìm">
				        <span class="input-group-btn">
				        <?php
				        echo "<button class='btn btn-primary' type='submit' name='search_submit'>Tìm kiếm</button>";
						?>
				      </span>
				    </form>
				</div>
			</div>

			<?php
				
				echo "<table class='table table-bordered'>";
					echo "<tr id='table-header-tr'>";
					 	echo "<th>Id</th>";
					 	echo "<th>Đơn vị</th>";
					 	echo "<th>Mô tả</th>";
					 	echo "<th>Chỉnh sửa</th>";
					 	echo "<th>Xóa</th>";
					 echo "</tr>";

					foreach($result as $row) {
					 	echo "<tr>";
						 	echo "<td>" . $row["dv_id"] . "</td>";
						 	echo "<td>" . $row["dv_ten"] . "</td>";
						 	echo "<td>" . $row["dv_mota"] . "</td>";
						 	echo "<td style='text-align: center'>
						 		<a href='index.php?controller=donvi_quydoi&action=edit&dv_id=".$row["dv_id"]."'><button class='btn btn-success'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Sửa</button></a>
						 	</td>";
						 	echo "<td style='text-align: center'>
						 		<a href='index.php?controller=donvi_quydoi&action=delete&dv_id=".$row["dv_id"]."'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Xóa</button></a>
						 	</td>";
						echo "</tr>";
					}
				echo "</table>";
			?>

			<nav class="pagination-body">
			    <ul class="pagination">
			    	<?php
			    		echo "<li>";
			    		if (!isset($_GET["action"])) {
			    			echo "<a href='index.php?controller=donvi_quydoi&action=search&page=".($_GET["page"]-1)."' aria-label='Previous'>";
			    		} else { 
				    		if ($_GET["action"] != "search") {
				    			echo "<a href='index.php?controller=donvi_quydoi&page=".($_GET["page"]-1)."' aria-label='Previous'>";
				    		} else {
				    			echo "<a href='index.php?controller=donvi_quydoi&action=search&page=".($_GET["page"]-1)."' aria-label='Previous'>";
				    		}
			    		}
					    echo "<span aria-hidden='true'>&laquo;</span>
					        </a>
					    </li>";
			    		for($i = 1; $i <= $page_number; $i++) {
			    			if(!isset($_GET["action"])) {
			    				echo "<li><a href='index.php?controller=donvi_quydoi&page=".$i."'> ".$i."</a></li>";
			    			} else {
			    				if ($_GET["action"] != "search") {
				    				echo "<li><a href='index.php?controller=donvi_quydoi&page=".$i."'> ".$i."</a></li>";
					    		} else {
					    			echo "<li><a href='index.php?controller=donvi_quydoi&keyword=".$keyword."&action=search&page=".$i."'> ".$i."</a></li>";
					    		}
			    			}
			    		}
			    		echo "<li>";
			    		if(!isset($_GET["action"])) {
			    			echo "<a href='index.php?controller=donvi_quydoi&action=search&page=".($_GET["page"]+1)."' aria-label='Next'>";
			    		} else { 
				    		if ($_GET["action"] != "search") {
				    			echo "<a href='index.php?controller=donvi_quydoi&action=search&page=".($_GET["page"]+1)."' aria-label='Next'>";
				    		} else {
				    			echo "<a href='index.php?controller=donvi_quydoi&action=search&page=".($_GET["page"]+1)."' aria-label='Next'>";
				    		}
				    	}
					    echo "<span aria-hidden='true'>&laquo;</span>
					        </a>
					    </li>";
			    	?>			    	
			    </ul>
			</nav>
		</div>
	</div>

	
</body>