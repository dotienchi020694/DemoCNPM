<?php
	class home_controller {
		function __construct() {

		}

		function run() {

			$action_GET = isset($_GET["action"]) ? $_GET["action"] : "index";
			switch ($action_GET) {
				case 'login':
					$action_POST = isset($_POST["submit"]) ? $_POST["submit"] : '';
					if(!$action_POST) {
						if(!isset($_SESSION["current_user"])) {
							require_once("views/frontend/sign_in.php");
							break;
						} else {
							header("Location: index.php?controller=home");
							break;
						}
					} else {
						$current_user = new User();
						$current_user->set_u_name($_POST["uname"]);
						$current_user->set_u_password($_POST["upassword"]);

						$user_db_manager = new User_db_manager();
						$result = $user_db_manager->check_login_account($current_user);
						if(!$result) {
							$_SESSION["login_fail"] = "Đăng nhập thất bại, xin mời thử lại";
							header("Location: index.php?controller=home&action=login");
							break;
						} else {
							$_SESSION["current_user"] = $result;
							header("Location: index.php?controller=home");
							break;
						}
					}
					break;

				case 'logout':
					unset($_SESSION["current_user"]);
					header("Location: index.php?controller=home");
					break;

				case 'index':
					if(!isset($_SESSION["current_user"])) {
						header("Location: index.php?controller=home&action=login");
						break;
					}
					require_once("views/frontend/home.php");
					break;
				
				default:
					# code...
					break;
			}
		}
	}
?>