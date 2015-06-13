<?php
	class bomon_controller {
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
						$bomon = new Bomon();

						$khoa_db_manager = new Khoa_db_manager();
						$khoas = $khoa_db_manager->list_all();

						require_once("views/frontend/bomons/add_bomon.php");
						break;
					}

					$new_bomon = new Bomon();
					$new_bomon->set_bm_ten($_POST['newbmten']);
					$new_bomon->set_bm_mota($_POST['newbmmota']);
					$new_bomon->set_k_id($_POST['newkid']);
					$new_bomon->set_is_delete(1);

					$bomon_db_manager = new Bomon_db_manager();
					$bomon_db_manager->insert($new_bomon);

					if (!$bomon_db_manager) {
						$_SESSION["create_bomon_fail"] = "Thêm mới bộ môn thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_bomon_successful"] = "Tạo bộ môn mới thành công !";
					}
					header("Location: index.php?controller=bomon");
					break;

				case 'edit':
					$bm_id = $_GET["bm_id"];
					$action_POST = isset($_POST["bm_id"]) ? $_POST["bm_id"] : '';
					if (empty($action_POST)) {
						$bomon_db_manager = new Bomon_db_manager();
						$result = $bomon_db_manager->show_bomon_by_id($bm_id);

						$khoa_db_manager = new Khoa_db_manager();
						$khoas = $khoa_db_manager->list_all();

						require_once("views/frontend/bomons/edit_bomon.php");
						break;
					}

					$edit_bomon = new Bomon();
					$edit_bomon->set_bm_id($_POST['bm_id']);
					$edit_bomon->set_bm_ten($_POST['editbmten']);
					$edit_bomon->set_bm_mota($_POST['editbmmota']);
					$edit_bomon->set_k_id($_POST['editkid']);
					$edit_bomon->set_is_delete(1);

					$bomon_db_manager = new Bomon_db_manager();
					$result = $bomon_db_manager->edit($edit_bomon);

					if (!$result) {
						$_SESSION["edit_bomon_fail"] = "Chỉnh sửa bộ môn thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_bomon_successful"] = "Chỉnh sửa bộ môn thành công !";
					}
					header("Location: index.php?controller=bomon");
					break;

				case 'delete':
					$bm_id = $_GET["bm_id"];
					$bomon_db_manager = new Bomon_db_manager();
					$result = $bomon_db_manager->delete($bm_id);

					if (!$result) {
						$_SESSION["delete_bomon_fail"] = "Xóa bộ môn thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_bomon_successful"] = "Xóa bộ môn thành công !";
					}
					header("Location: index.php?controller=bomon");
					break;

				case 'search':
					// $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					// $bomon_db_manager = new Bomon_db_manager();
					// $result = $bomon_db_manager->search_bomon_by_keyword($keyword);
					// require_once("views/frontend/bomons/index.php");

					$bomon_db_manager = new Bomon_db_manager();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $bomon_db_manager->search_bomon_by_keyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}
					if($_GET["page"] >= 1) {
						$result = $bomon_db_manager->search_bomon_by_keyword_in_range($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $bomon_db_manager->show_bomon_in_range(0,5);
					}
					require_once("views/frontend/bomons/index.php");

					break;

				case 'show':
					$bomon_db_manager = new Bomon_db_manager();
					$result = $bomon_db_manager->show_bomon_by_id($_GET["bm_id"]);
					require_once("views/frontend/bomons/show_bomon.php");
					break;

				default:
					// $bomon_db_manager = new Bomon_db_manager();
					// $result = $bomon_db_manager->all_bomon();
					// require_once("views/frontend/bomons/index.php");
					$bomon_db_manager = new Bomon_db_manager();
					$page_number = $bomon_db_manager->list_all();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $bomon_db_manager->show_bomon_in_range(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $bomon_db_manager->show_bomon_in_range(0,5);
					}
					require_once("views/frontend/bomons/index.php");
					break;
			}

		}
	}
?>