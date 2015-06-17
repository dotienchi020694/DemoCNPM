<?php
	class dinhmuc_nckh_controller {
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
						$dinhmuc_nckh = new DinhMuc_NCKH();

						$dinhmuc_nckh_db_manager = new DinhMuc_NCKH_db_manager();
                                                $hocvi_db_manager=new Hocvi_db_manager();
						$hocvis = $hocvi_db_manager->list_all();

						require_once("views/frontend/dinhmucs/add_dinhmuc_nckh.php");
						break;
					}

					$new_dinhmuc_nckh = new DinhMuc_NCKH();
					$new_dinhmuc_nckh->set_hv_id($_POST["hocvi"]);
					$new_dinhmuc_nckh->set_dmnckh_sogio($_POST["sogio"]);
					$new_dinhmuc_nckh->set_dmnckh_mota($_POST["mota"]);

					$dinhmuc_nckh_db_manager = new DinhMuc_NCKH_db_manager();
					$result=$dinhmuc_nckh_db_manager->insert($new_dinhmuc_nckh);
                                       

					if (!$result) {
						$_SESSION["create_dinhmuc_nckh_fail"] = "Thêm mới định mức nghiên cứu khoa học thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_dinhmuc_nckh_successful"] = "Thêm mới định mức nghiên cứu khoa học thành công !";
					}
					header("Location: index.php?controller=dinhmuc_giangday");
					break;

				case 'edit':
					$dmnckh_id = $_GET["dmnckh_id"];
					$action_POST = isset($_POST["dmnckh_id"]) ? $_POST["dmnckh_id"] : '';
					if (empty($action_POST)) {
						$dinhmuc_nckh_db_manager = new DinhMuc_NCKH_db_manager();
						$result = $dinhmuc_nckh_db_manager->show_dinhmuc_nckh_by_id($dmnckh_id);

						$hocvi_db_manager = new Hocvi_db_manager();
						$hocvis = $hocvi_db_manager->list_all();

						require_once("views/frontend/dinhmucs/edit_dinhmuc_nckh.php");
						break;
					}

					$edit_dinhmuc_nckh = new DinhMuc_NCKH();
                                        $edit_dinhmuc_nckh->set_dmnckh_id($dmnckh_id);
					$edit_dinhmuc_nckh->set_hv_id($_POST["hocvi"]);
					$edit_dinhmuc_nckh->set_dmnckh_sogio($_POST["sogio"]);
					$edit_dinhmuc_nckh->set_dmnckh_mota($_POST["mota"]);

					$dinhmuc_nckh_db_manager = new DinhMuc_NCKH_db_manager();
					$result = $dinhmuc_nckh_db_manager->edit($edit_dinhmuc_nckh);

					if (!$result) {
						$_SESSION["edit_dinhmuc_nckh_fail"] = "Chỉnh sửa định mức nghiên cứu khoa học thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_dinhmuc_nckh_successful"] = "Chỉnh sửa định mức nghiên cứu khoa học thành công !";
					}
					header("Location: index.php?controller=dinhmuc_giangday");
					break;

				case 'delete':
					$dmnckh_id = $_GET["dmnckh_id"];
					$dinhmuc_nckh_db_manager = new DinhMuc_NCKH_db_manager();
					$result = $dinhmuc_nckh_db_manager->delete($dmnckh_id);

					if (!$result) {
						$_SESSION["delete_dinhmuc_nckh_fail"] = "Xóa thông tin định mức nghiên cứu khoa học thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_dinhmuc_nckh_successful"] = "Xóa thông tin định mức nghiên cứu khoa học thành công !";
					}
					header("Location: index.php?controller=dinhmuc_giangday");
					break;

				case 'search':
                                    // $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					// $bomon_db_manager = new Bomon_db_manager();
					// $result = $bomon_db_manager->search_bomon_by_keyword($keyword);
					// require_once("views/frontend/bomons/index.php");
                                        $dinhmuc_giangday_db_manager = new DinhMuc_GiangDay_db_manager();
					$dinhmuc_nckh_db_manager = new DinhMuc_NCKH_db_manager();
					
                                        if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $dinhmuc_nckh_db_manager->search_dinhmuc_nckh_by_keyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}
					if($_GET["page"] >= 1) {
                                            $result = $dinhmuc_giangday_db_manager->show_dinhmuc_giangday_in_range(0,5);
                                            $result_nckh = $dinhmuc_nckh_db_manager->search_dinhmuc_nckh_by_keyword_in_range($keyword, 5*($_GET["page"] - 1),5);
					} else {
                                            $result = $dinhmuc_giangday_db_manager->show_dinhmuc_giangday_in_range(0,5);
                                            $result_nckh = $dinhmuc_nckh_db_manager->show_dinhmuc_nckh_in_range(0,5);
					}
					require_once("views/frontend/dinhmucs/index.php");

					break;
					
		}
	}
        }
?>