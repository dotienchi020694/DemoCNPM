<?php
	class chucdanh_controller {
		function __construct() {

		}

		function run() {

			$action_GET = isset($_GET["action"]) ? $_GET["action"] : '';
			//die('action='.$action_GET);
			switch ($action_GET) {
				// case 'login':
				// 	require_once("views/frontend/sign_in.php");
				// 	break;
				case 'add':
					$action_POST = isset($_POST["submit"]) ? $_POST["submit"] : '';
					if (empty($action_POST)) {
						$chucdanh = new Chucdanh();
						require_once("views/frontend/chucdanhs/add_chucdanh.php");
						break;
					}

					$new_chucdanh = new Chucdanh();
					$new_chucdanh->set_cd_ten($_POST['newcdten']);
					$new_chucdanh->set_cd_mota($_POST['newcdmota']);
					// $new_chucdanh->set_cd_dmgiam($_POST['newcddmgiam']);
					$new_chucdanh->set_is_delete(1);

					$chucdanh_db_manager = new Chucdanh_db_manager();
					$chucdanh_db_manager->insert($new_chucdanh);

					if (!$chucdanh_db_manager) {
						$_SESSION["create_chucdanh_fail"] = "Thêm mới chức danh thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_chucdanh_successful"] = "Tạo chức danh mới thành công !";
					}
					header("Location: index.php?controller=chucdanh");
					break;

				case 'edit':
					$cd_id = $_GET["cd_id"];
					$action_POST = isset($_POST["cd_id"]) ? $_POST["cd_id"] : '';
					if (empty($action_POST)) {
						$chucdanh_db_manager = new Chucdanh_db_manager();
						$result = $chucdanh_db_manager->show_chucdanh_by_id($cd_id);
						require_once("views/frontend/chucdanhs/edit_chucdanh.php");
						break;
					}

					$edit_chucdanh = new Chucdanh();
					$edit_chucdanh->set_cd_id($_POST['cd_id']);
					$edit_chucdanh->set_cd_ten($_POST['editcdten']);
					$edit_chucdanh->set_cd_mota($_POST['editcdmota']);
					$edit_chucdanh->set_is_delete(1);

					$chucdanh_db_manager = new Chucdanh_db_manager();
					$result = $chucdanh_db_manager->edit($edit_chucdanh);

					if (!$result) {
						$_SESSION["edit_chucdanh_fail"] = "Chỉnh sửa chức danh thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_chucdanh_successful"] = "Chỉnh sửa chức danh thành công !";
					}
					header("Location: index.php?controller=chucdanh");
					break;

				case 'delete':
					$cd_id = $_GET["cd_id"];
					$chucdanh_db_manager = new Chucdanh_db_manager();
					$result = $chucdanh_db_manager->delete($cd_id);

					if (!$result) {
						$_SESSION["delete_chucdanh_fail"] = "Xóa chức danh thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_chucdanh_successful"] = "Xóa chức danh thành công !";
					}
					header("Location: index.php?controller=chucdanh");
					break;

				case 'search':
					// $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					// $chucdanh_db_manager = new Chucdanh_db_manager();
					// $result = $chucdanh_db_manager->search_chucdanh_by_keyword($keyword);
					// require_once("views/frontend/chucdanhs/index.php");

					$chucdanh_db_manager = new Chucdanh_db_manager();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $chucdanh_db_manager->search_chucdanh_by_keyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}
					if($_GET["page"] >= 1) {
						$result = $chucdanh_db_manager->search_chucdanh_by_keyword_in_range($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $chucdanh_db_manager->show_chucdanh_in_range(0,5);
					}
					require_once("views/frontend/chucdanhs/index.php");

					break;

				case 'show':
					$chucdanh_db_manager = new Chucdanh_db_manager();
					$result = $chucdanh_db_manager->show_chucdanh_by_id($_GET["cd_id"]);
					require_once("views/frontend/chucdanhs/show_chucdanh.php");
					break;

				default:
					// $chucdanh_db_manager = new Chucdanh_db_manager();
					// $result = $chucdanh_db_manager->all_chucdanh();
					// require_once("views/frontend/chucdanhs/index.php");
					$chucdanh_db_manager = new Chucdanh_db_manager();
					$page_number = $chucdanh_db_manager->list_all();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $chucdanh_db_manager->show_chucdanh_in_range(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $chucdanh_db_manager->show_chucdanh_in_range(0,5);
					}
					require_once("views/frontend/chucdanhs/index.php");
					break;
			}

		}
	}
?>