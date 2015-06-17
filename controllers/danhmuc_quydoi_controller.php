<?php
	class danhmuc_quydoi_controller {
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
                                            
						$donvi = new DonVi();
                                                $donvi_db_manager = new Donvi_db_manager();
                                                $donvi=$donvi_db_manager->list_all();
                                                
                                                $loaiviec = new Loaiviec_db_manager();
						$loaiviec_db_manager = new Loaiviec_db_manager();
						$loaiviec=$loaiviec_db_manager->list_all();
                                                
						require_once("views/frontend/danhmuc_quydois/add_danhmuc_quydoi.php");
						break;
					}

					$edit_danhmuc_quydoi = new Danhmuc_quydoi();
					$edit_danhmuc_quydoi->set_dmqd_congvieccuthe($_POST["congviec"]);
					$edit_danhmuc_quydoi->set_lv_id($_POST["loaiviec"]);
					$edit_danhmuc_quydoi->set_dmqd_sogio($_POST["gio"]);
					$edit_danhmuc_quydoi->set_dmqd_sodonvi($_POST["sodonvi"]);
					$edit_danhmuc_quydoi->set_dv_id($_POST["donvi"]);
					$edit_danhmuc_quydoi->set_dmqd_ghichu($_POST["ghichu"]);
                                        
					$danhmuc_quydoi_db_manager = new Danhmuc_quydoi_db_manager();
					$result = $danhmuc_quydoi_db_manager->insert($edit_danhmuc_quydoi);


					if (!$result) {
						$_SESSION["create_giangvien_fail"] = "Thêm mới danh mục quy đổi thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_giangvien_successful"] = "Tạo danh mục quy đổi thành công !";
					}
					header("Location: index.php?controller=danhmuc_quydoi");
					break;

				case 'edit':
					$dmqd_id = $_GET["dmqd_id"];
					$action_POST = isset($_POST["dmqd_id"]) ? $_POST["dmqd_id"] : '';
					if (empty($action_POST)) {
						$donvi = new DonVi();
                                                $donvi_db_manager = new Donvi_db_manager();
                                                $donvi=$donvi_db_manager->list_all();
                                                
                                                $loaiviec = new Loaiviec_db_manager();
						$loaiviec_db_manager = new Loaiviec_db_manager();
						$loaiviec=$loaiviec_db_manager->list_all();
                                                
                                                $danhmuc_quydoi_db_manager=new Danhmuc_quydoi_db_manager();
                                                $result=$danhmuc_quydoi_db_manager->show_danhmuc_quydoi_by_id($dmqd_id);
                                                
						require_once("views/frontend/danhmuc_quydois/edit_danhmuc_quydoi.php");
						break;
					}

					$edit_danhmuc_quydoi = new Danhmuc_quydoi();
                                        $edit_danhmuc_quydoi->set_dmqd_id($dmqd_id);
					$edit_danhmuc_quydoi->set_dmqd_congvieccuthe($_POST["congviec"]);
					$edit_danhmuc_quydoi->set_lv_id($_POST["loaiviec"]);
					$edit_danhmuc_quydoi->set_dmqd_sogio($_POST["gio"]);
					$edit_danhmuc_quydoi->set_dmqd_sodonvi($_POST["sodonvi"]);
					$edit_danhmuc_quydoi->set_dv_id($_POST["donvi"]);
					$edit_danhmuc_quydoi->set_dmqd_ghichu($_POST["ghichu"]);

					$danhmuc_quydoi_db_manager = new Danhmuc_quydoi_db_manager();
					$result = $danhmuc_quydoi_db_manager->edit($edit_danhmuc_quydoi);

					if (!$result) {
						$_SESSION["edit_giangvien_fail"] = "Chỉnh sửa danh mục quy đổi thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_giangvien_successful"] = "Chỉnh sửa danh mục quy đổi thành công !";
					}
					header("Location: index.php?controller=danhmuc_quydoi");
					break;

				case 'delete':
					$dmqd_id = $_GET["dmqd_id"];
					$danhmuc_quydoi_db_manager = new Danhmuc_quydoi_db_manager();
					$result = $danhmuc_quydoi_db_manager->delete($dmqd_id);

					if (!$result) {
						$_SESSION["delete_giangvien_fail"] = "Xóa danh mục quy đổi thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_giangvien_successful"] = "Xóa danh mục quy đổi thành công !";
					}
					header("Location: index.php?controller=danhmuc_quydoi");
					break;

				case 'search':
					// $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					// $giangvien_db_manager = new Giangvien_db_manager();
					// $result = $giangvien_db_manager->search_giangvien_by_keyword($keyword);
					// require_once("views/frontend/giangviens/index.php");

					$danhmuc_quydoi_db_manager = new Danhmuc_quydoi_db_manager();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $danhmuc_quydoi_db_manager->search_danhmuc_quydoi_by_keyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}
					if($_GET["page"] >= 1) {
						$result = $danhmuc_quydoi_db_manager->search_danhmuc_quydoi_by_keyword_in_range($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $danhmuc_quydoi_db_manager->show_danhmuc_quydoi_in_range(0,5);
					}
					require_once("views/frontend/danhmuc_quydois/index.php");

					break;

				case 'show':
					$giangvien_db_manager = new Giangvien_db_manager();
					$result = $giangvien_db_manager->show_giangvien_by_id($_GET["gv_id"]);
					require_once("views/frontend/giangviens/show_giangvien.php");
					break;

				default:
					// $giangvien_db_manager = new Giangvien_db_manager();
					// $result = $giangvien_db_manager->all_giangvien();
					// require_once("views/frontend/giangviens/index.php");
					$danhmuc_quydoi_db_manager = new Danhmuc_quydoi_db_manager();
					$page_number = $danhmuc_quydoi_db_manager->list_all();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $danhmuc_quydoi_db_manager->show_danhmuc_quydoi_in_range(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $danhmuc_quydoi_db_manager->show_danhmuc_quydoi_in_range(0,5);
					}
					require_once("views/frontend/danhmuc_quydois/index.php");
					break;
			}

		}
	}
?>