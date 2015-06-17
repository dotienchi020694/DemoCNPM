<?php
	class dinhmuc_giangday_controller {
		function __construct() {

		}

		function run() {

			$action_GET = isset($_GET["action"]) ? $_GET["action"] : '';
			//die('action='.$action_GET);
			switch ($action_GET) {
				// case 'login':
				// 	require_once("views/frontend/sign_in.php");
				// 	break;
				case 'edit':
					$dmgd_id = $_GET["dmgd_id"];
					$action_POST = isset($_POST["dmgd_id"]) ? $_POST["dmgd_id"] : '';
					if (empty($action_POST)) {
						$dinhmuc_giangday_db_manager = new DinhMuc_GiangDay_db_manager();
						$result_dmgd = $dinhmuc_giangday_db_manager->show_dinhmuc_giangday_by_id($dmgd_id);

						require_once("views/frontend/dinhmucs/edit_dinhmucgiangday.php");
						break;
					}

					$edit_qldm = new DinhMuc_GiangDay();
                                        
					$edit_qldm->set_dmgd_id($dmgd_id);
					$edit_qldm->set_dmgd_sogio($_POST['sogio']);
					$edit_qldm->set_dmgd_mota($_POST['mota']);

					$dinhmuc_giangday_db_manager = new DinhMuc_GiangDay_db_manager();
					$result = $dinhmuc_giangday_db_manager->edit($edit_qldm);
					if (!$result) {
                                                $_SESSION["edit_dinhmuc_giangday_fail"] = "Chỉnh sửa thông tin định mức giảng dạy thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_dinhmuc_giangday_successful"] = "Chỉnh sửa thông tin định mức giảng dạy thành công !";
					}
					header("Location: index.php?controller=dinhmuc_giangday");
					break;
                                default:
                                $dinhmuc_giangday_db_manager = new DinhMuc_GiangDay_db_manager();
                                $dinhmuc_nckh_db_manager=new DinhMuc_NCKH_db_manager();

                                $page_number = $dinhmuc_nckh_db_manager->list_all();
                                $page_number = ceil(count($page_number)/3);

                                if (!isset($_GET["page"])) {
                                        $_GET["page"] = 1;
                                }

                                if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
                                        $result = $dinhmuc_giangday_db_manager->show_dinhmuc_giangday_in_range(0,5);
                                        $result_nckh = $dinhmuc_nckh_db_manager->show_dinhmuc_nckh_in_range(3*($_GET["page"] - 1),3);
                                } else {
                                        $_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
                                        $result_nckh = $dinhmuc_nckh_db_manager->show_dinhmuc_nckh_in_range(0,5);
                                        $result = $dinhmuc_giangday_db_manager->show_dinhmuc_giangday_in_range(0,3);
                                }
                                require_once("views/frontend/dinhmucs/index.php");
                                break;
			}

		}
	}
?>