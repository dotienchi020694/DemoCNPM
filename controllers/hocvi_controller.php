<?php
	class hocvi_controller {
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
						$hocvi = new Hocvi();
						require_once("views/frontend/hocvis/add_hocvi.php");
						break;
					}

					$new_hocvi = new Hocvi();
					$new_hocvi->set_hv_ten($_POST['newhvten']);
					$new_hocvi->set_hv_mota($_POST['newhvmota']);
					// $new_hocvi->set_hv_dmgiam($_POST['newhvdmgiam']);
					$new_hocvi->set_is_delete(1);

					$hocvi_db_manager = new Hocvi_db_manager();
					$hocvi_db_manager->insert($new_hocvi);

					if (!$hocvi_db_manager) {
						$_SESSION["create_hocvi_fail"] = "Thêm mới học vị thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_hocvi_successful"] = "Tạo học vị mới thành công !";
					}
					header("Location: index.php?controller=hocvi");
					break;

				case 'edit':
					$hv_id = $_GET["hv_id"];
					$action_POST = isset($_POST["hv_id"]) ? $_POST["hv_id"] : '';
					if (empty($action_POST)) {
						$hocvi_db_manager = new Hocvi_db_manager();
						$result = $hocvi_db_manager->show_hocvi_by_id($hv_id);
						require_once("views/frontend/hocvis/edit_hocvi.php");
						break;
					}

					$edit_hocvi = new Hocvi();
					$edit_hocvi->set_hv_id($_POST['hv_id']);
					$edit_hocvi->set_hv_ten($_POST['edithvten']);
					$edit_hocvi->set_hv_mota($_POST['edithvmota']);
					$edit_hocvi->set_is_delete(1);

					$hocvi_db_manager = new Hocvi_db_manager();
					$result = $hocvi_db_manager->edit($edit_hocvi);

					if (!$result) {
						$_SESSION["edit_hocvi_fail"] = "Chỉnh sửa học vị thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_hocvi_successful"] = "Chỉnh sửa học vị thành công !";
					}
					header("Location: index.php?controller=hocvi");
					break;

				case 'delete':
					$hv_id = $_GET["hv_id"];
					$hocvi_db_manager = new Hocvi_db_manager();
					$result = $hocvi_db_manager->delete($hv_id);

					if (!$result) {
						$_SESSION["delete_hocvi_fail"] = "Xóa học vị thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_hocvi_successful"] = "Xóa học vị thành công !";
					}
					header("Location: index.php?controller=hocvi");
					break;

				case 'search':
					// $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					// $hocvi_db_manager = new Hocvi_db_manager();
					// $result = $hocvi_db_manager->search_hocvi_by_keyword($keyword);
					// require_once("views/frontend/hocvis/index.php");

					$hocvi_db_manager = new Hocvi_db_manager();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $hocvi_db_manager->search_hocvi_by_keyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}
					if($_GET["page"] >= 1) {
						$result = $hocvi_db_manager->search_hocvi_by_keyword_in_range($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $hocvi_db_manager->show_hocvi_in_range(0,5);
					}
					require_once("views/frontend/hocvis/index.php");

					break;

				case 'show':
					$hocvi_db_manager = new Hocvi_db_manager();
					$result = $hocvi_db_manager->show_hocvi_by_id($_GET["hv_id"]);
					require_once("views/frontend/hocvis/show_hocvi.php");
					break;

				default:
					// $hocvi_db_manager = new Hocvi_db_manager();
					// $result = $hocvi_db_manager->all_hocvi();
					// require_once("views/frontend/hocvis/index.php");
					$hocvi_db_manager = new Hocvi_db_manager();
					$page_number = $hocvi_db_manager->list_all();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $hocvi_db_manager->show_hocvi_in_range(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $hocvi_db_manager->show_hocvi_in_range(0,5);
					}
					require_once("views/frontend/hocvis/index.php");
					break;
			}

		}
	}
?>