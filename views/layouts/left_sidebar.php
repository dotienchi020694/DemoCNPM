<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Trang quản trị</title>

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

	    </style>
	</head>
	<body>
		<div class="container-fluid admin-main-body">
			<div class="row">
				<div class="col-md-2" style="background-color: #5a5a5a; height: 100%;">
					<ul class="list-group admin-caregory-list">
						<li class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="index.php?controller=home">Trang chủ</a></li>
						<li class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span><a href="#">Quản lý giảng viên</a><span class="glyphicon glyphicon-menu-right" style="float: right;" aria-hidden="true"></span>
							<ul>
								<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span><a href="index.php?controller=giangvien">Danh sách giảng viên</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-flag" style="margin-right: 12px;" aria-hidden="true"></span><a href="index.php?controller=khoa">Khoa</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span><a href="index.php?controller=bomon">Bộ môn</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-flag" style="margin-right: 12px;" aria-hidden="true"></span><a href="index.php?controller=chucdanh">Chức danh</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span><a href="index.php?controller=hocvi">Học vị</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span><a href="index.php?controller=tinhtrang">Tình trạng</a></li>
							</ul>
						</li>	
						<li class="list-group-item"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span><a href="#">Quản lý định mức</a><span class="glyphicon glyphicon-menu-right" style="float: right;" aria-hidden="true"></span>
							<ul>
								<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Thông tin định mức</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-flag" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Chế độ giảm định mức</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Hệ số giảng viên</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-flag" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Quản lý quy đổi giờ chuẩn</a><span class="glyphicon glyphicon-menu-right" style="float: right;" aria-hidden="true"></span>
									<ul>
										<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Loại việc</a></li>
										<li class="list-group-item"><span class="glyphicon glyphicon-flag" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Đơn vị quy đổi</a></li>
										<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Danh mục quy đổi giờ chuẩn</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span><a href="#">Quản lý Sermina</a></li>
						<li class="list-group-item"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span><a href="#">Quản lý số giờ NCKH</a><span class="glyphicon glyphicon-menu-right" style="float: right;" aria-hidden="true"></span>
							<ul>
								<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Số giờ NCKH cá nhân</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-flag" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Số giờ NCKH của GV</a></li>
							</ul>
						</li>
						<li class="list-group-item"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><a href="#">Phê duyệt số giờ NCKH</a></li>
						<li class="list-group-item"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><a href="#">Thông tin giờ giảng dạy</a><span class="glyphicon glyphicon-menu-right" style="float: right;" aria-hidden="true"></span>
							<ul>
								<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Số giờ giảng dạy cá nhân</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-flag" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Số giờ giảng dạy của GV</a></li>
							</ul>
						</li>
						<li class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="#">Quản lý tài khoản</a><span class="glyphicon glyphicon-menu-right" style="float: right;" aria-hidden="true"></span>
							<ul>
								<li class="list-group-item"><span class="glyphicon glyphicon-th-list" style="margin-right: 12px;" aria-hidden="true"></span><a href="index.php?controller=user">Danh sách tài khoản</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-bookmark" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Nhóm người dùng</a></li>
							</ul>
						</li>
						<li class="list-group-item"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span><a href="#">Xem báo cáo<span class="glyphicon glyphicon-menu-right" style="float: right;" aria-hidden="true"></span></a>
							<ul>
								<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Xem báo cáo cá nhân</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-flag" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Xem báo cáo của GV</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="col-md-10">
				<!-- Chỗ này dùng để render các view đến -->
<!-- 	 			</div>

			</div>
		</div> -->
					
	</body>
</html>