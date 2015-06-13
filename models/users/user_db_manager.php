<?php
	class User_db_manager {
		var $db_core;

		function __construct() {
                     $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(User $new_user) {
			$new_u_name = $new_user->get_u_name();
			$new_u_password = $new_user->get_u_password();
			$new_r_id = $new_user->get_r_id();
			$new_gv_id = $new_user->get_gv_id();
			$new_u_trangthai = $new_user->get_u_trangthai();
			$new_is_delete = $new_user->get_is_delete();

			$queryCommand = "INSERT INTO qltk_user(u_name, u_password, r_id, gv_id, u_trangthai, is_delete) VALUES ('" . $new_u_name . "','" . $new_u_password . "', '" . $new_r_id . "', '" . $new_gv_id . "', '" . $new_u_trangthai . "', " . $new_is_delete . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "select * from qltk_user WHERE is_delete=0";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { 
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			}
		}

		function delete($u_id) {
			$queryCommand = "UPDATE qltk_user SET is_delete=1 WHERE u_id = " . $u_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(User $edit_user) {
			$u_id = $edit_user->get_u_id();
			$new_u_name = $edit_user->get_u_name();
			$new_u_password = $edit_user->get_u_password();
			$new_r_id = $edit_user->get_r_id();
			$new_gv_id = $edit_user->get_gv_id();
			$new_u_trangthai = $new_user->get_u_trangthai();
			$new_is_delete = $edit_user->get_is_delete();

			$queryCommand = "UPDATE qltk_user SET u_name = '" . $new_u_name . "', u_password ='" . $new_u_password . "', r_id = '" . $new_r_id . "', gv_id = '" . $new_gv_id . "', u_trangthai = '" . $new_u_trangthai . "', is_delete = '" . $new_is_delete . "' WHERE u_id = " . $u_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_user_by_id($u_id) {
			$queryCommand = "select u.u_id, u.u_name, u.u_password, u.is_delete, g.gv_ten as giangvien_name, r.r_ten as role_name, u.u_trangthai 
			from qltk_user as u inner join qlgv_giangvien as g on u.gv_id = g.gv_id
			inner join qltk_role as r on u.r_id = r.r_id where u.is_delete=1 AND u.u_id = " . $u_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_user_by_keyword($keyword) {
			$queryCommand = "select u.u_id, u.u_name, u.u_password, u.is_delete, g.gv_ten as giangvien_name, r.r_ten as role_name, u.u_trangthai 
			from qltk_user as u inner join qlgv_giangvien as g on u.gv_id = g.gv_id
			inner join qltk_role as r on u.r_id = r.r_id WHERE u.u_id LIKE '%" . $keyword . "%' OR u.u_password LIKE '%" . $keyword . "%' OR u.r_id LIKE '%" . $keyword . "%' OR u.gv_id LIKE '%" . $keyword . "%' OR u.is_delete LIKE '%" . $keyword . "%'";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { 
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			}
		}

		function show_user_in_range($first, $last) {
			$queryCommand = "select u.u_id, u.u_name, u.u_password, u.is_delete, g.gv_ten as giangvien_name, r.r_ten as role_name, u.u_trangthai 
			from qltk_user as u inner join qlgv_giangvien as g on u.gv_id = g.gv_id
			inner join qltk_role as r on u.r_id = r.r_id WHERE u.is_delete=0 limit " . $first . ", " . $last ;

			$queryResult = $this->db_core->db_query($queryCommand);

			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_user_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "select u.u_id, u.u_name, u.u_password, u.is_delete, g.gv_ten as giangvien_name, r.r_ten as role_name, u.u_trangthai 
			from qltk_user as u inner join qlgv_giangvien as g on u.gv_id = g.gv_id
			inner join qltk_role as r on u.r_id = r.r_id WHERE u.u_name LIKE '%" . $keyword . "%' OR u.u_password LIKE '%" . $keyword . "%' OR role_name LIKE '%" . $keyword . "%' OR giangvien_name LIKE '%" . $keyword . "%' OR u.is_delete LIKE '%" . $keyword . "%' LIMIT " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function check_login_account($account) {
			$username = $account->get_u_name();
			$password = $account->get_u_password();

			$queryCommand = "SELECT * FROM qltk_user WHERE u_name = '" . $username . "' AND u_password ='" . $password . "'";
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);
			if(!$result) { return NULL; }
			else { return $result; }
		}


	}
?>