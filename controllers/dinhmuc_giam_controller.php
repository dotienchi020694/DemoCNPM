<?php
	class dinhmuc_giam_controller {
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
                        $dinhmuc_giam_db_manager = new DinhMuc_Giam_db_manager();
                        $list_cd=$dinhmuc_giam_db_manager->list_all(0);
						require_once("views/frontend/dinhmuc_giams/add_dinhmuc_giam.php");
						break;
					}               
                                        
					$new_chucdanh = new Chucdanh();
                    $new_chucdanh->set_cd_id($_POST["cd_id"]);
                    $new_chucdanh->set_cd_dmg_giangday($_POST["dmg_giangday"]);
                    $new_chucdanh->set_cd_dmg_nckh($_POST["dmg_nckh"]);

					$chucdanh_db_manager = new DinhMuc_Giam_db_manager();
					$result = $chucdanh_db_manager->insert($new_chucdanh);

					if (!$result) {
						$_SESSION["create_dinhmuc_giam_fail"] = "Thêm mới chế độ giảm định mức thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_dinhmuc_giam_successful"] = "Tạo chế độ giảm định mức thành công !";
                                                
					}
					header("Location: index.php?controller=dinhmuc_giam");
					break;

				case 'edit':
					$cd_id = $_GET["cd_id"];
					$action_POST = isset($_POST["cd_id"]) ? $_POST["cd_id"] : '';
					if (empty($action_POST)) {
						$dinhmuc_giam_db_manager = new DinhMuc_Giam_db_manager();
						$result = $dinhmuc_giam_db_manager->show_dinhmuc_giam_by_id($cd_id);
						require_once("views/frontend/dinhmuc_giams/edit_dinhmuc_giam.php");
						break;
					}

					$edit_chucdanh = new Chucdanh();
					$edit_chucdanh->set_cd_id($_POST['cd_id']);
					$edit_chucdanh->set_cd_dmg_giangday($_POST['dmg_giangday']);
					$edit_chucdanh->set_cd_dmg_nckh($_POST['dmg_nckh']);
                                        
					$dinhmuc_giam_db_manager = new DinhMuc_Giam_db_manager();
					$result = $dinhmuc_giam_db_manager->edit($edit_chucdanh);

					if (!$result) {
						$_SESSION["edit_dinhmuc_giam_fail"] = "Chỉnh sửa chế độ giảm định mức thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_dinhmuc_giam_successful"] = "Chỉnh sửa chế độ giảm định mức thành công !";
					
                                        }
					header("Location: index.php?controller=dinhmuc_giam");
					break;

				case 'delete':
					$cd_id = $_GET["cd_id"];
					$dinhmuc_giam_db_manager = new DinhMuc_Giam_db_manager();
					$result = $dinhmuc_giam_db_manager->delete($cd_id);

					if (!$result) {
						$_SESSION["delete_dinhmuc_giam_fail"] = "Xóa định mức thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_dinhmuc_giam_successful"] = "Xóa định mức thành công !";
					}
					header("Location: index.php?controller=dinhmuc_giam");
					break;

				case 'search':
					// $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					// $chucdanh_db_manager = new Chucdanh_db_manager();
					// $result = $chucdanh_db_manager->search_chucdanh_by_keyword($keyword);
					// require_once("views/frontend/chucdanhs/index.php");

					$dinhmuc_giam_db_manager = new DinhMuc_Giam_db_manager();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $dinhmuc_giam_db_manager->search_dinhmuc_giam_by_keyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}
					if($_GET["page"] >= 1) {
						$result = $dinhmuc_giam_db_manager->search_dinhmuc_giam_by_keyword_in_range($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $dinhmuc_gaim_db_manager->show_dinhmuc_giam_in_range(0,5);
					}
					require_once("views/frontend/dinhmuc_giams/index.php");

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
					$dinhmuc_giam_db_manager = new DinhMuc_Giam_db_manager();
					$page_number = $dinhmuc_giam_db_manager->list_all(1);
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $dinhmuc_giam_db_manager->show_dinhmuc_giam_in_range(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $dinhmuc_giam_db_manager->show_dinhmuc_giam_in_range(0,5);
					}
					require_once("views/frontend/dinhmuc_giams/index.php");
					break;
			}

		}
	}
?>