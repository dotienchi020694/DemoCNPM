<?php
	class dinhmuc_heso_giangvien_controller {
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
						$hocvi = new Hocvi();
                         $namhoc= new Namhoc();
                                                
                        $hocvi_db_manager=new Hocvi_db_manager();
						$namhoc_db_manager = new namhoc_db_manager();
						$hocvi = $hocvi_db_manager->list_all();
                        $namhoc=$namhoc_db_manager->list_all();

						require_once("views/frontend/hesos/add_heso_giangvien.php");
						break;
					}

					$new_heso = new Heso_giangvien();
					$new_heso->set_hv_id($_POST["hocvi"]);
					$new_heso->set_nh_id($_POST["namhoc"]);
					$new_heso->set_hs_heso($_POST["heso"]);


					if(isset($_POST["checkNam"])) {
						if(isset($_POST["sonam"])) {
							if($_POST["sonam"]==2) {
								if($_POST["checkNamLonHonValue"]!=NULL) {
									$new_heso->set_hs_sonamyc($_POST["checkNamLonHonValue"]);
									$new_heso->set_hs_sonamdk(2);
								} else {
									$new_heso->set_hs_sonamyc(0);
									$new_heso->set_hs_sonamdk(0);
								}
							} else if($_POST["sonam"]==1) {
								if($_POST["checkNamNhoHonValue"]!=NULL) {
									$new_heso->set_hs_sonamyc($_POST["checkNamNhoHonValue"]);
									$new_heso->set_hs_sonamdk(1);
								} else {
									$new_heso->set_hs_sonamyc(0);
									$new_heso->set_hs_sonamdk(0);
								}
							}
						} else {
							$new_heso->set_hs_sonamyc(0);
							$new_heso->set_hs_sonamdk(0);
						}
					} else {
						$new_heso->set_hs_sonamyc(0);
						$new_heso->set_hs_sonamdk(0);
					}

					$heso_db_manager = new Heso_giangvien_db_manager();
					$result = $heso_db_manager->insert($new_heso);
                                       

					if (!$result) {
						$_SESSION["create_bomon_fail"] = "Thêm mới hệ số giảng viên thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_bomon_successful"] = "Tạo mới hệ số giảng viên thành công !";
					}
					header("Location: index.php?controller=dinhmuc_heso_giangvien");
					break;

				case 'edit':
					$hv_id = $_GET["hv_id"];
                                        $nh_id = $_GET["nh_id"];
					$action_POST = isset($_POST["hv_id"]) ? $_POST["hv_id"] : '';
					if (empty($action_POST)) {
						$heso_db_manager = new Heso_giangvien_db_manager();
						$result = $heso_db_manager->show_heso_by_id($hv_id,$nh_id);

						$hocvi = new Hocvi();
                                                $namhoc= new Namhoc();
                                                
                                                $hocvi_db_manager=new Hocvi_db_manager();
						$namhoc_db_manager = new namhoc_db_manager();
						$hocvi = $hocvi_db_manager->list_all();
                                                $namhoc=$namhoc_db_manager->list_all();

						require_once("views/frontend/hesos/edit_heso_giangvien.php");
						break;
					}

					$edit_heso = new Heso_giangvien();
					$edit_heso->set_hv_id($_POST["hocvi"]);
					$edit_heso->set_nh_id($_POST["namhoc"]);
					$edit_heso->set_hs_heso($_POST["heso"]);
                    
					if(isset($_POST["checkNam"])) {
						if(isset($_POST["sonam"])) {
							if($_POST["sonam"]==2) {
								if($_POST["checkNamLonHonValue"]!=NULL) {
									$edit_heso->set_hs_sonamyc($_POST["checkNamLonHonValue"]);
									$edit_heso->set_hs_sonamdk(2);
								} else {
									$edit_heso->set_hs_sonamyc(0);
									$edit_heso->set_hs_sonamdk(0);
								}
							} else if($_POST["sonam"]==1) {
								if($_POST["checkNamNhoHonValue"]!=NULL) {
									$edit_heso->set_hs_sonamyc($_POST["checkNamNhoHonValue"]);
									$edit_heso->set_hs_sonamdk(1);
								} else {
									$edit_heso->set_hs_sonamyc(0);
									$edit_heso->set_hs_sonamdk(0);
								}
							}
						} else {
							$edit_heso->set_hs_sonamyc(0);
							$edit_heso->set_hs_sonamdk(0);
						}
					} else {
						$edit_heso->set_hs_sonamyc(0);
						$edit_heso->set_hs_sonamdk(0);
					}

					$heso_db_manager = new Heso_giangvien_db_manager();
					$result=$heso_db_manager->edit($edit_heso,$_GET["hv_id"],$_GET["nh_id"]);

					if (!$result) {
						$_SESSION["edit_bomon_fail"] = "Chỉnh sửa hệ số giảng viên thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_bomon_successful"] = "Chỉnh sửa hệ số giảng viên thành công !";
					}
					header("Location: index.php?controller=dinhmuc_heso_giangvien");
					break;

				case 'delete':
					$hv_id = $_GET["hv_id"];
                                        $nh_id = $_GET["nh_id"];
					$heso_db_manager = new Heso_giangvien_db_manager();
					$result = $heso_db_manager->delete($hv_id,$nh_id);

					if (!$result) {
						$_SESSION["delete_bomon_fail"] = "Xóa hệ số giảng viên thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_bomon_successful"] = "Xóa hệ số giảng viên thành công !";
					}
					header("Location: index.php?controller=dinhmuc_heso_giangvien");
					break;

				case 'search':
					// $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					// $bomon_db_manager = new Bomon_db_manager();
					// $result = $bomon_db_manager->search_bomon_by_keyword($keyword);
					// require_once("views/frontend/bomons/index.php");

					$heso_giangvien_db_manager = new Heso_giangvien_db_manager();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $heso_giangvien_db_manager->search_heso_by_keyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}
					if($_GET["page"] >= 1) {
						$result = $heso_giangvien_db_manager->search_heso_by_keyword_in_range($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $heso_giangvien_db_manager->show_heso_in_range(0,5);
					}
					require_once("views/frontend/hesos/index.php");

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
					$heso_db_manager = new Heso_giangvien_db_manager();
					
                                        $page_number = $heso_db_manager->list_all();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $heso_db_manager->show_heso_in_range(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $heso_db_manager->show_heso_in_range(0,5);
					}
					require_once("views/frontend/hesos/index.php");
					break;
			}

		}
	}
?>