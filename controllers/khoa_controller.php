<?php
	class khoa_controller {
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
						$khoa = new Khoa();
						require_once("views/frontend/khoas/add_khoa.php");
						break;
					}

					$new_khoa = new Khoa();
					$new_khoa->set_k_ten($_POST['newkten']);
					$new_khoa->set_k_makhoa($_POST['newkmakhoa']);
					$new_khoa->set_k_email($_POST['newkemail']);
					$new_khoa->set_k_sdt($_POST['newksdt']);
					$new_khoa->set_k_mota($_POST['newkmota']);
					$new_khoa->set_is_delete(1);

					$khoa_db_manager = new Khoa_db_manager();
					$khoa_db_manager->insert($new_khoa);

					if (!$khoa_db_manager) {
						$_SESSION["create_khoa_fail"] = "Thêm mới khoa thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_khoa_successful"] = "Tạo khoa mới thành công !";
					}
					header("Location: index.php?controller=khoa");
					break;

				case 'edit':
					$k_id = $_GET["k_id"];
					$action_POST = isset($_POST["k_id"]) ? $_POST["k_id"] : '';
					if (empty($action_POST)) {
						$khoa_db_manager = new Khoa_db_manager();
						$result = $khoa_db_manager->show_khoa_by_id($k_id);

						// $khoa_group_service = new Khoa_group_service();
						// $khoa_groups = $khoa_group_service->seeAllKhoaGroup();

						require_once("views/frontend/khoas/edit_khoa.php");
						break;
					}

					$edit_khoa = new Khoa();
					$edit_khoa->set_k_id($_POST['k_id']);
					$edit_khoa->set_k_ten($_POST['editkten']);
					$edit_khoa->set_k_makhoa($_POST['editkmakhoa']);
					$edit_khoa->set_k_email($_POST['editkemail']);
					$edit_khoa->set_k_sdt($_POST['editksdt']);
					$edit_khoa->set_k_mota($_POST['editkmota']);
					$edit_khoa->set_is_delete(1);

					$khoa_db_manager = new Khoa_db_manager();
					$result = $khoa_db_manager->edit($edit_khoa);

					if (!$result) {
						$_SESSION["edit_khoa_fail"] = "Chỉnh sửa khoa thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_khoa_successful"] = "Chỉnh sửa khoa thành công !";
					}
					header("Location: index.php?controller=khoa");
					break;

				case 'delete':
					$k_id = $_GET["k_id"];
					$khoa_db_manager = new Khoa_db_manager();
					$result = $khoa_db_manager->delete($k_id);

					if (!$result) {
						$_SESSION["delete_khoa_fail"] = "Xóa khoa thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_khoa_successful"] = "Xóa khoa thành công !";
					}
					header("Location: index.php?controller=khoa");
					break;

				case 'search':
					// $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					// $khoa_db_manager = new Khoa_db_manager();
					// $result = $khoa_db_manager->search_khoa_by_keyword($keyword);
					// require_once("views/frontend/khoas/index.php");

					$khoa_db_manager = new Khoa_db_manager();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $khoa_db_manager->search_khoa_by_keyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}
					if($_GET["page"] >= 1) {
						$result = $khoa_db_manager->search_khoa_by_keyword_in_range($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $khoa_db_manager->show_khoa_in_range(0,5);
					}
					require_once("views/frontend/khoas/index.php");

					break;

				case 'show':
					$khoa_db_manager = new Khoa_db_manager();
					$result = $khoa_db_manager->show_khoa_by_id($_GET["k_id"]);
					$bomons = $khoa_db_manager->get_bomon_from_khoa_by_id($_GET["k_id"]);
					require_once("views/frontend/khoas/show_khoa.php");
					break;

				default:
					// $khoa_db_manager = new Khoa_db_manager();
					// $result = $khoa_db_manager->all_khoa();
					// require_once("views/frontend/khoas/index.php");
					$khoa_db_manager = new Khoa_db_manager();
					$page_number = $khoa_db_manager->list_all();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $khoa_db_manager->show_khoa_in_range(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $khoa_db_manager->show_khoa_in_range(0,5);
					}
					require_once("views/frontend/khoas/index.php");
					break;
			}

		}
	}
?>