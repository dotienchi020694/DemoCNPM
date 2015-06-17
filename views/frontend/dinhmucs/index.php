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

                    .sub-panel {
                            margin-top: 15px; margin-left: 15px; margin-right: 15px; margin-bottom: 35px;
                            box-shadow: 1px 1px 1px 1px #b5b5b5;
                    }

                    .sub-panel .panel-heading {
                            padding-top: 12px; padding-bottom: 12px;
                    }

                    .sub-panel .panel-heading .panel-title {
                            font-size: 17px;
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

                    .user-function-form {
                            width: 100%;
                            padding: 5px;
                            margin-bottom: 15px;
                    }

                    .user-function-form .form-left {
                            float: left;
                    }

                    .user-function-form .form-right {
                            float: right;
                    }

                    .user-function-form .form-right .input-group {
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
			        	echo "header('index.php?controller=bomon')";
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
                if(isset($_SESSION["edit_dinhmuc_giangday_successful"])) {
                        echo '<p style="font-size:20px">'.$_SESSION["edit_dinhmuc_giangday_successful"].'</p>';
			$_SESSION["edit_dinhmuc_giangday_successful"] = "";
		}

		if(isset($_SESSION["edit_dinhmuc_giagday_fail"])) {
                        echo '<p style="font-size:20px">'.$_SESSION["edit_dinhmuc_giangday_fail"].'</p>';
			$_SESSION["edit_dinhmuc_giangday_fail"] = "";
		}
                
                if(isset($_SESSION["create_dinhmuc_nckh_successful"])) {
                        echo '<p style="font-size:20px">'.$_SESSION["create_dinhmuc_nckh_successful"].'</p>';
			$_SESSION["create_dinhmuc_nckh_successful"] = "";
		}

		if(isset($_SESSION["create_dinhmuc_nckh_fail"])) {
                        echo '<p style="font-size:20px">'.$_SESSION["create_dinhmuc_nckh_fail"].'</p>';
			$_SESSION["create_dinhmuc_nckh_fail"] = "";
		}
                
                if(isset($_SESSION["edit_dinhmuc_nckh_successful"])) {
                        echo '<p style="font-size:20px">'.$_SESSION["edit_dinhmuc_nckh_successful"].'</p>';
			$_SESSION["edit_dinhmuc_nckh_successful"] = "";
		}

		if(isset($_SESSION["edit_dinhmuc_nckh_fail"])) {
                        echo '<p style="font-size:20px">'.$_SESSION["edit_dinhmuc_nckh_fail"].'</p>';
			$_SESSION["edit_dinhmuc_nckh_fail"] = "";
		}
                
                if(isset($_SESSION["delete_dinhmuc_nckh_successful"])) {
                        echo '<p style="font-size:20px">'.$_SESSION["delete_dinhmuc_nckh_successful"].'</p>';
			$_SESSION["delete_dinhmuc_nckh_successful"] = "";
		}

		if(isset($_SESSION["delete_dinhmuc_nckh_fail"])) {
                        echo '<p style="font-size:20px">'.$_SESSION["delete_dinhmuc_nckh_fail"].'</p>';
			$_SESSION["delete_dinhmuc_nckh_fail"] = "";
		}
	?>      
<!-- PHẦN CODE -->
<ol class="breadcrumb">
<li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="index.php?controller=home">Trang chủ</a></li>
<li class="active">Quản lý định mức</li>
<li class="active">Thông tin định mức</li>
</ol>

<div class="panel panel-default panel-main-body">
<div class="panel-heading">
<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span>Thông tin định mức</h3>
</div>
<div class="panel-body">

<div class="panel panel-default sub-panel">
    <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-check" style="margin-right: 12px;" aria-hidden="true"></span>Định mức giờ giảng dạy</h3>
    </div>
    <div class="panel-body">
        <?php
        echo "<table class='table table-bordered'>";
            echo "<tr id='table-header-tr'>";
                    echo "<th>Id</th>";
                    echo "<th>Số giờ</th>";
                    echo "<th>Mô tả</th>";
                    echo "<th>Chỉnh sửa</th>";
             echo "</tr>";
             foreach($result as $row) {
                    echo "<tr>";
                            echo "<td>" . $row["dmgd_id"] . "</td>";
                            echo "<td>" . $row["dmgd_sogio"] . "</td>";
                            echo "<td>" . $row["dmgd_mota"] . "</td>";
                            echo "<td style='text-align: center'>
                                    <a href='index.php?controller=dinhmuc_giangday&action=edit&dmgd_id=".$row["dmgd_id"]."'><button class='btn btn-success'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Sửa</button></a>
                            </td>";
                            
                    echo "</tr>";
            }
        echo "</table>";
        ?>
        
        </div>
                    </div>

                    <div class="panel panel-default sub-panel">
                            <div class="panel-heading">
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-check" style="margin-right: 12px;" aria-hidden="true"></span>Định mức giờ nghiên cứu khoa học</h3>
                            </div>
                            <div class="panel-body">
                                    <div class="user-function-form">
                                            <div class="form-left">
                                                    <button type="button" class="btn btn-primary"><a href="index.php?controller=dinhmuc_nckh&action=add">Thêm mới</a></button>
                                            </div>
                                            <div class="form-right">
					<form class="input-group" method="POST" action="?controller=dinhmuc_nckh&action=search" onsubmit="return checkBlankSearchInput()">
				        <input type="text" id="search-input" name="keyword" class="form-control" placeholder="Nhập thông tin định mức NCKH cần tìm">
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
                    echo "<th>Học vị</th>";
                    echo "<th>Số giờ</th>";
                    echo "<th>Mô tả</th>";
                    echo "<th>Chỉnh sửa</th>";
                    echo "<th>Xóa</th>";
             echo "</tr>";
             foreach($result_nckh as $row) {
                    echo "<tr>";
                        echo "<td>".$row['dmnckh_id']."</td>";
                        echo "<td>".$row['hv_ten']."</td>";
                        echo "<td>".$row['dmnckh_sogio']."</td>";
                        echo "<td>".$row['dmnckh_mota']."</td>";
                        echo "<td style='text-align: center'>
                                <a href='index.php?controller=dinhmuc_nckh&action=edit&dmnckh_id=".$row["dmnckh_id"]."'><button class='btn btn-success'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Sửa</button></a>
                        </td>";
                        echo "<td style='text-align: center'>
                                <a href='index.php?controller=dinhmuc_nckh&action=delete&dmnckh_id=".$row["dmnckh_id"]."'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Xóa</button></a>
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
                                echo "<a href='index.php?controller=dinhmuc_giangday&action=search&page=".($_GET["page"]-1)."' aria-label='Previous'>";
                        } else { 
                                if ($_GET["action"] != "search") {
                                        echo "<a href='index.php?controller=dinhmuc_giangday&page=".($_GET["page"]-1)."' aria-label='Previous'>";
                                } else {
                                        echo "<a href='index.php?controller=dinhmuc_giangday&action=search&page=".($_GET["page"]-1)."' aria-label='Previous'>";
                                }
                        }
                            echo "<span aria-hidden='true'>&laquo;</span>
                                </a>
                            </li>";
                        for($i = 1; $i <= $page_number; $i++) {
                                if(!isset($_GET["action"])) {
                                        echo "<li><a href='index.php?controller=dinhmuc_giangday&page=".$i."'> ".$i."</a></li>";
                                } else {
                                        if ($_GET["action"] != "search") {
                                                echo "<li><a href='index.php?controller=dinhmuc_giangday&page=".$i."'> ".$i."</a></li>";
                                        } else {
                                                echo "<li><a href='index.php?controller=dinhmuc_giangday&action=search&page=".$i."'> ".$i."</a></li>";
                                        }
                                }
                        }
                        echo "<li>";
                        if(!isset($_GET["action"])) {
                                echo "<a href='index.php?controller=dinhmuc_giangday&page=".($_GET["page"]+1)."' aria-label='Next'>";
                        } else { 
                                if ($_GET["action"] != "search") {
                                        echo "<a href='index.php?controller=dinhmuc_giangday&page=".($_GET["page"]+1)."' aria-label='Next'>";
                                } else {
                                        echo "<a href='index.php?controller=dinhmuc_giangday&page=".($_GET["page"]+1)."' aria-label='Next'>";
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
            </div>
        </div>
    </body>
</html>