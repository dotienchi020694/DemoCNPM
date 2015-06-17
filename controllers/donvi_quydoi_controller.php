<?php
	class donvi_quydoi_controller {
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
                                                require_once("views/frontend/donvis/add_donvi.php");
						break;
					}

					$new_donvi = new DonVi();
					$new_donvi->set_dv_ten($_POST['ten']);
					$new_donvi->set_dv_mota($_POST['mota']);
                                        
					$donvi_db_manager = new Donvi_db_manager();
					$result=$donvi_db_manager->insert($new_donvi);
                                       

					if (!$result) {
						$_SESSION["create_bomon_fail"] = "Thêm mới đơn vị thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_bomon_successful"] = "Tạo mói đơn vị thành công !";
					}
					header("Location: index.php?controller=donvi_quydoi");
					break;

				case 'edit':
					$dv_id = $_GET["dv_id"];
					$action_POST = isset($_POST["dv_id"]) ? $_POST["dv_id"] : '';
					if (empty($action_POST)) {
						$donvi_db_manager = new Donvi_db_manager();
						$result = $donvi_db_manager->show_donvi_by_id($dv_id);
                                                
						require_once("views/frontend/donvis/edit_donvi.php");
						break;
					}

					$edit_donvi = new DonVi();
					$edit_donvi->set_dv_id($_POST['dv_id']);
					$edit_donvi->set_dv_ten($_POST['dv_ten']);
					$edit_donvi->set_dv_mota($_POST['dv_mota']);

					$donvi_db_manager = new Donvi_db_manager();
					$result = $donvi_db_manager->edit($edit_donvi);

					if (!$result) {
						$_SESSION["edit_bomon_fail"] = "Chỉnh sửa đơn vị thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_bomon_successful"] = "Chỉnh sửa đơn vị thành công !";
					}
					header("Location: index.php?controller=donvi_quydoi");
					break;

				case 'delete':
					$dv_id = $_GET["dv_id"];
					$donvi_db_manager = new Donvi_db_manager();
					$result = $donvi_db_manager->delete($dv_id);

					if (!$result) {
						$_SESSION["delete_bomon_fail"] = "Xóa đơn vị thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_bomon_successful"] = "Xóa đơn vị thành công !";
					}
					header("Location: index.php?controller=donvi_quydoi");
					break;

				case 'search':
					// $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					// $bomon_db_manager = new Bomon_db_manager();
					// $result = $bomon_db_manager->search_bomon_by_keyword($keyword);
					// require_once("views/frontend/bomons/index.php");

					$donvi_db_manager = new Donvi_db_manager();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $donvi_db_manager->search_donvi_by_keyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}
					if($_GET["page"] >= 1) {
						$result = $donvi_db_manager->search_donvi_by_keyword_in_range($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $donvi_db_manager->show_donvi_in_range(0,5);
					}
					require_once("views/frontend/donvis/index.php");

					break;

				default:
					// $bomon_db_manager = new Bomon_db_manager();
					// $result = $bomon_db_manager->all_bomon();
					// require_once("views/frontend/bomons/index.php");
					$donvi_db_manager = new Donvi_db_manager();
					
                                        $page_number = $donvi_db_manager->list_all();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $donvi_db_manager->show_donvi_in_range(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $donvi_db_manager->show_donvi_in_range(0,5);
					}
					require_once("views/frontend/donvis/index.php");
					break;
			}

		}
	}
?>