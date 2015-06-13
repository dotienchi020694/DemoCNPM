<?php
	class tinhtrang_controller {
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
						$tinhtrang = new Tinhtrang();
						require_once("views/frontend/tinhtrangs/add_tinhtrang.php");
						break;
					}

					$new_tinhtrang = new Tinhtrang();
					$new_tinhtrang->set_tt_ten($_POST['newttten']);
					$new_tinhtrang->set_tt_mota($_POST['newttmota']);
					$new_tinhtrang->set_is_delete(1);

					$tinhtrang_db_manager = new Tinhtrang_db_manager();
					$tinhtrang_db_manager->insert($new_tinhtrang);

					if (!$tinhtrang_db_manager) {
						$_SESSION["create_tinhtrang_fail"] = "Thêm mới tình trạng thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_tinhtrang_successful"] = "Tạo tình trạng mới thành công !";
					}
					header("Location: index.php?controller=tinhtrang");
					break;

				case 'edit':
					$tt_id = $_GET["tt_id"];
					$action_POST = isset($_POST["tt_id"]) ? $_POST["tt_id"] : '';
					if (empty($action_POST)) {
						$tinhtrang_db_manager = new Tinhtrang_db_manager();
						$result = $tinhtrang_db_manager->show_tinhtrang_by_id($tt_id);

						require_once("views/frontend/tinhtrangs/edit_tinhtrang.php");
						break;
					}

					$edit_tinhtrang = new Tinhtrang();
					$edit_tinhtrang->set_tt_id($_POST['tt_id']);
					$edit_tinhtrang->set_tt_ten($_POST['editttten']);
					$edit_tinhtrang->set_tt_mota($_POST['editttmota']);
					$edit_tinhtrang->set_is_delete(1);

					$tinhtrang_db_manager = new Tinhtrang_db_manager();
					$result = $tinhtrang_db_manager->edit($edit_tinhtrang);

					if (!$result) {
						$_SESSION["edit_tinhtrang_fail"] = "Chỉnh sửa tình trạng thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_tinhtrang_successful"] = "Chỉnh sửa tình trạng thành công !";
					}
					header("Location: index.php?controller=tinhtrang");
					break;

				case 'delete':
					$tt_id = $_GET["tt_id"];
					$tinhtrang_db_manager = new Tinhtrang_db_manager();
					$result = $tinhtrang_db_manager->delete($tt_id);

					if (!$result) {
						$_SESSION["delete_tinhtrang_fail"] = "Xóa tình trạng thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_tinhtrang_successful"] = "Xóa tình trạng thành công !";
					}
					header("Location: index.php?controller=tinhtrang");
					break;

				case 'search':
					// $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					// $tinhtrang_db_manager = new Tinhtrang_db_manager();
					// $result = $tinhtrang_db_manager->search_tinhtrang_by_keyword($keyword);
					// require_once("views/frontend/tinhtrangs/index.php");

					$tinhtrang_db_manager = new Tinhtrang_db_manager();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $tinhtrang_db_manager->search_tinhtrang_by_keyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}
					if($_GET["page"] >= 1) {
						$result = $tinhtrang_db_manager->search_tinhtrang_by_keyword_in_range($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $tinhtrang_db_manager->show_tinhtrang_in_range(0,5);
					}
					require_once("views/frontend/tinhtrangs/index.php");

					break;

				case 'show':
					$tinhtrang_db_manager = new Tinhtrang_db_manager();
					$result = $tinhtrang_db_manager->show_tinhtrang_by_id($_GET["tt_id"]);
					require_once("views/frontend/tinhtrangs/show_tinhtrang.php");
					break;

				default:
					// $tinhtrang_db_manager = new Tinhtrang_db_manager();
					// $result = $tinhtrang_db_manager->all_tinhtrang();
					// require_once("views/frontend/tinhtrangs/index.php");
					$tinhtrang_db_manager = new Tinhtrang_db_manager();
					$page_number = $tinhtrang_db_manager->list_all();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $tinhtrang_db_manager->show_tinhtrang_in_range(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $tinhtrang_db_manager->show_tinhtrang_in_range(0,5);
					}
					require_once("views/frontend/tinhtrangs/index.php");
					break;
			}

		}
	}
?>