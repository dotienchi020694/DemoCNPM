<?php
	class user_controller {
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
						$user = new User();
						require_once("views/backend/users/add_user.php");
						break;
					}

					$new_user = new User();
					$new_user->set_u_name($_POST['newuname']);
					$new_user->set_u_password($_POST['newupassword']);
					$new_user->set_r_id($_POST['newrid']);
					$new_user->set_gv_id($_POST['newgvid']);
					$new_user->set_is_delete($_POST['newisdelete']);

					$user_db_manager = new User_db_manager();
					$user_db_manager->insert($new_user);

					if (!$user_db_manager) {
						$_SESSION["create_user_fail"] = "Thêm mới tài khoản thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_user_successful"] = "Tạo tài khoản mới thành công !";
					}
					header("Location: index.php?controller=user");
					break;

				case 'edit':
					
					$u_id = $_GET["u_id"];
					$action_POST = isset($_POST["u_id"]) ? $_POST["u_id"] : '';
					if (empty($action_POST)) {
						$user_db_manager = new User_db_manager();
						$result = $user_db_manager->show_user_by_id($u_id);

						// $user_group_service = new User_group_service();
						// $user_groups = $user_group_service->seeAllUserGroup();

						require_once("views/frontend/users/edit_user.php");
						break;
					}

					$edit_user = new User();
					$edit_user->set_u_id($_POST['u_id']);
					$edit_user->set_u_name($_POST['edituname']);
					$edit_user->set_u_password($_POST['editupassword']);
					$edit_user->set_r_id($_POST['editrid']);
					$edit_user->set_gv_id($_POST['editgvid']);
					$edit_user->set_is_delete($_POST['editisdelete']);

					$user_db_manager = new User_db_manager();
					$result = $user_db_manager->edit($edit_user);

					if (!$result) {
						$_SESSION["edit_user_fail"] = "Chỉnh sửa tài khoản thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_user_successful"] = "Chỉnh sửa tài khoản thành công !";
					}
					header("Location: index.php?controller=user");
					break;

				case 'delete':
					$u_id = $_GET["u_id"];
					$user_db_manager = new User_db_manager();
					$result = $user_db_manager->delete($u_id);

					if (!$result) {
						$_SESSION["delete_user_fail"] = "Xóa người dùng thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_user_successful"] = "Xóa người dùng thành công !";
					}
					header("Location: index.php?controller=user");
					break;

				case 'search':
					// $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					// $user_db_manager = new User_db_manager();
					// $result = $user_db_manager->search_user_by_keyword($keyword);
					// require_once("views/frontend/users/index.php");

					$user_db_manager = new User_db_manager();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $user_db_manager->search_user_by_keyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}
					if($_GET["page"] >= 1) {
						$result = $user_db_manager->search_user_by_keyword_in_range($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $user_db_manager->show_user_in_range(0,5);
					}
					require_once("views/frontend/users/index.php");

					break;

				case 'show':
					$user_db_manager = new User_db_manager();
					$result = $user_db_manager->show_user_by_id($_GET["u_id"]);
					require_once("views/frontend/users/show_user.php");
					break;

				default:
					// $user_db_manager = new User_db_manager();
					// $result = $user_db_manager->all_user();
					// require_once("views/frontend/users/index.php");
					$user_db_manager = new User_db_manager();
					$page_number = $user_db_manager->list_all();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $user_db_manager->show_user_in_range(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $user_db_manager->show_user_in_range(0,5);
					}
					require_once("views/frontend/users/index.php");
					break;
			}

		}
	}
?>