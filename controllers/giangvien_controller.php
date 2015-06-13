<?php
	class giangvien_controller {
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
						$giangvien = new Giangvien();

						$bomon_db_manager = new Bomon_db_manager();
						$bomons = $bomon_db_manager->list_all();

						$chucdanh_db_manager = new Chucdanh_db_manager();
						$chucdanhs = $chucdanh_db_manager->list_all();

						$hocvi_db_manager = new Hocvi_db_manager();
						$hocvis = $hocvi_db_manager->list_all();

						$tinhtrang_db_manager = new Tinhtrang_db_manager();
						$tinhtrangs = $tinhtrang_db_manager->list_all();

						require_once("views/frontend/giangviens/add_giangvien.php");
						break;
					}

					$new_giangvien = new Giangvien();
					$new_giangvien->set_gv_magv($_POST['newgvmagv']);
					$new_giangvien->set_gv_ten($_POST['newgvten']);
					$new_giangvien->set_gv_gioitinh($_POST['newgvgioitinh']);
					$new_giangvien->set_gv_diachi($_POST['newgvdiachi']);
					$new_giangvien->set_gv_sdt($_POST['newgvsdt']);
					$new_giangvien->set_gv_email($_POST['newgvemail']);
					$new_giangvien->set_gv_time_start_job($_POST['newgvtimestartjob']);
					$new_giangvien->set_bm_id($_POST['newbmid']);
					$new_giangvien->set_cd_id($_POST['newcdid']);
					$new_giangvien->set_hv_id($_POST['newhvid']);
					$new_giangvien->set_tt_id($_POST['newttid']);
					$new_giangvien->set_gv_mota($_POST['newgvmota']);
					$new_giangvien->set_is_delete(0);

					$giangvien_db_manager = new Giangvien_db_manager();
					$result = $giangvien_db_manager->insert($new_giangvien);

					if (!$result) {
						$_SESSION["create_giangvien_fail"] = "Thêm mới giảng viên thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_giangvien_successful"] = "Tạo giảng viên mới thành công !";
					}
					header("Location: index.php?controller=giangvien");
					break;

				case 'edit':
					$gv_id = $_GET["gv_id"];
					$action_POST = isset($_POST["gv_id"]) ? $_POST["gv_id"] : '';
					if (empty($action_POST)) {
						$giangvien_db_manager = new Giangvien_db_manager();
						$result = $giangvien_db_manager->show_giangvien_by_id($gv_id);

						$bomon_db_manager = new Bomon_db_manager();
						$bomons = $bomon_db_manager->list_all();

						$chucdanh_db_manager = new Chucdanh_db_manager();
						$chucdanhs = $chucdanh_db_manager->list_all();

						$hocvi_db_manager = new Hocvi_db_manager();
						$hocvis = $hocvi_db_manager->list_all();

						$tinhtrang_db_manager = new Tinhtrang_db_manager();
						$tinhtrangs = $tinhtrang_db_manager->list_all();

						require_once("views/frontend/giangviens/edit_giangvien.php");
						break;
					}

					$edit_giangvien = new Giangvien();
					$edit_giangvien->set_gv_id($_POST['gv_id']);
					$edit_giangvien->set_gv_magv($_POST['editgvmagv']);
					$edit_giangvien->set_gv_ten($_POST['editgvten']);
					$edit_giangvien->set_gv_gioitinh($_POST['editgvgioitinh']);
					$edit_giangvien->set_gv_diachi($_POST['editgvdiachi']);
					$edit_giangvien->set_gv_sdt($_POST['editgvsdt']);
					$edit_giangvien->set_gv_email($_POST['editgvemail']);
					$edit_giangvien->set_gv_time_start_job($_POST['editgvtimestartjob']);
					$edit_giangvien->set_bm_id($_POST['editbmid']);
					$edit_giangvien->set_cd_id($_POST['editcdid']);
					$edit_giangvien->set_hv_id($_POST['edithvid']);
					$edit_giangvien->set_tt_id($_POST['editttid']);
					$edit_giangvien->set_gv_mota($_POST['editgvmota']);
					$edit_giangvien->set_is_delete(0);

					$giangvien_db_manager = new Giangvien_db_manager();
					$result = $giangvien_db_manager->edit($edit_giangvien);

					if (!$result) {
						$_SESSION["edit_giangvien_fail"] = "Chỉnh sửa giảng viên thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_giangvien_successful"] = "Chỉnh sửa giảng viên thành công !";
					}
					header("Location: index.php?controller=giangvien");
					break;

				case 'delete':
					$gv_id = $_GET["gv_id"];
					$giangvien_db_manager = new Giangvien_db_manager();
					$result = $giangvien_db_manager->delete($gv_id);

					if (!$result) {
						$_SESSION["delete_giangvien_fail"] = "Xóa giảng viên thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_giangvien_successful"] = "Xóa giảng viên thành công !";
					}
					header("Location: index.php?controller=giangvien");
					break;

				case 'search':
					// $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					// $giangvien_db_manager = new Giangvien_db_manager();
					// $result = $giangvien_db_manager->search_giangvien_by_keyword($keyword);
					// require_once("views/frontend/giangviens/index.php");

					$giangvien_db_manager = new Giangvien_db_manager();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $giangvien_db_manager->search_giangvien_by_keyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}
					if($_GET["page"] >= 1) {
						$result = $giangvien_db_manager->search_giangvien_by_keyword_in_range($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $giangvien_db_manager->show_giangvien_in_range(0,5);
					}
					require_once("views/frontend/giangviens/index.php");

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
					$giangvien_db_manager = new Giangvien_db_manager();
					$page_number = $giangvien_db_manager->list_all();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $giangvien_db_manager->show_giangvien_in_range(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $giangvien_db_manager->show_giangvien_in_range(0,5);
					}
					require_once("views/frontend/giangviens/index.php");
					break;
			}

		}
	}
?>