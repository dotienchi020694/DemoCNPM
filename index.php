<?php
	session_start();

	require_once 'views/layouts/share_view.php';
	require_once "config/db_core.php";

	require_once 'models/users/user.php';
	require_once 'models/users/user_db_manager.php';

	require_once 'models/giangviens/giangvien.php';
	require_once 'models/giangviens/giangvien_db_manager.php';

	require_once 'models/khoas/khoa.php';
	require_once 'models/khoas/khoa_db_manager.php';

	require_once 'models/bomons/bomon.php';
	require_once 'models/bomons/bomon_db_manager.php';

	require_once 'models/chucdanhs/chucdanh.php';
	require_once 'models/chucdanhs/chucdanh_db_manager.php';

	require_once 'models/hocvis/hocvi.php';
	require_once 'models/hocvis/hocvi_db_manager.php';

	require_once 'models/tinhtrangs/tinhtrang.php';
	require_once 'models/tinhtrangs/tinhtrang_db_manager.php';

	$controller = isset($_GET["controller"]) ? strtolower($_GET["controller"]) : "home";
	require_once("controllers/" . $controller . "_controller.php");
	// require_once("models/" . $controller . "_model.php");
	// require_once("models/" . $controller . ".php");	

	$controller_class = $controller . "_controller()";
	$cmd = '$controller = new ' . $controller_class . ';';
	eval($cmd);
	$controller->run();
?>