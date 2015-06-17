<?php
	class loaiviec_controller {
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
                                                require_once("views/frontend/loaiviecs/add_loaiviec.php");
						break;
					}

					$new_loaiviec = new Loaiviec();
					$new_loaiviec->set_lv_ten($_POST['ten']);
					$new_loaiviec->set_lv_mota($_POST['mota']);
                                        
					$loaivec_db_manager = new Loaiviec_db_manager();
					$result=$loaivec_db_manager->insert($new_loaiviec);
                                       

					if (!$result) {
						$_SESSION["create_bomon_fail"] = "Thêm mới loại việc thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_bomon_successful"] = "Tạo loại việc mới thành công !";
					}
					header("Location: index.php?controller=loaiviec");
					break;

				case 'edit':
					$lv_id = $_GET["lv_id"];
					$action_POST = isset($_POST["lv_id"]) ? $_POST["lv_id"] : '';
					if (empty($action_POST)) {
						$loaiviec_db_manager = new Loaiviec_db_manager();
						$result = $loaiviec_db_manager->show_loaiviec_by_id($lv_id);
                                                
						require_once("views/frontend/loaiviecs/edit_loaiviec.php");
						break;
					}

					$edit_loaiviec = new Loaiviec();
					$edit_loaiviec->set_lv_id($_POST['lv_id']);
					$edit_loaiviec->set_lv_ten($_POST['lv_ten']);
					$edit_loaiviec->set_lv_mota($_POST['lv_mota']);

					$loaiviec_db_manager = new Loaiviec_db_manager();
					$result = $loaiviec_db_manager->edit($edit_loaiviec);

					if (!$result) {
						$_SESSION["edit_bomon_fail"] = "Chỉnh sửa loại việc thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_bomon_successful"] = "Chỉnh sửa loại việc thành công !";
					}
					header("Location: index.php?controller=loaiviec");
					break;

				case 'delete':
					$lv_id = $_GET["lv_id"];
					$loaiviec_db_manager = new Loaiviec_db_manager();
					$result = $loaiviec_db_manager->delete($lv_id);

					if (!$result) {
						$_SESSION["delete_bomon_fail"] = "Xóa bộ môn thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_bomon_successful"] = "Xóa bộ môn thành công !";
					}
					header("Location: index.php?controller=loaiviec");
					break;

				case 'search':
					// $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					// $bomon_db_manager = new Bomon_db_manager();
					// $result = $bomon_db_manager->search_bomon_by_keyword($keyword);
					// require_once("views/frontend/bomons/index.php");

					$loaiviec_db_manager = new Loaiviec_db_manager();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $loaiviec_db_manager->search_loaiviec_by_keyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}
					if($_GET["page"] >= 1) {
						$result = $loaiviec_db_manager->search_loaiviec_by_keyword_in_range($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $loaiviec_db_manager->show_loaiviec_in_range(0,5);
					}
					require_once("views/frontend/loaiviecs/index.php");

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
					$loaiviec_db_manager = new Loaiviec_db_manager();
					
                                        $page_number = $loaiviec_db_manager->list_all();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $loaiviec_db_manager->show_loaiviec_in_range(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $loaiviec_db_manager->show_loaiviec_in_range(0,5);
					}
					require_once("views/frontend/loaiviecs/index.php");
					break;
			}

		}
	}
?>