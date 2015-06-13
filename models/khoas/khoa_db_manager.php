<?php
	class Khoa_db_manager {
		var $db_core;

		function __construct() {
                     $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Khoa $new_khoa) {
			$new_k_ten = $new_khoa->get_k_ten();
			$new_k_makhoa = $new_khoa->get_k_makhoa();
			$new_k_email = $new_khoa->get_k_email();
			$new_k_sdt = $new_khoa->get_k_sdt();
			$new_k_mota = $new_khoa->get_k_mota();
			$new_is_delete = $new_khoa->get_is_delete();

			$queryCommand = "INSERT INTO qlgv_khoa(k_ten, k_makhoa, k_email, k_sdt, k_mota, is_delete) VALUES ('" . $new_k_ten . "','" . $new_k_makhoa . "', '" . $new_k_email . "', '" . $new_k_sdt . "', '" . $new_k_mota . "', '" . $new_is_delete . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "select * from qlgv_khoa where is_delete=0 ";
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

		function delete($k_id) {
			$queryCommand = "UPDATE qlgv_khoa SET is_delete=1 WHERE k_id = " . $k_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(Khoa $edit_khoa) {
			$k_id = $edit_khoa->get_k_id();
			$new_k_ten = $edit_khoa->get_k_ten();
			$new_k_makhoa = $edit_khoa->get_k_makhoa();
			$new_k_email = $edit_khoa->get_k_email();
			$new_k_sdt = $edit_khoa->get_k_sdt();
			$new_k_mota = $edit_khoa->get_k_mota();
			$new_is_delete = $edit_khoa->get_is_delete();

			$queryCommand = "UPDATE qlgv_khoa SET k_ten = '" . $new_k_ten . "', k_makhoa = '" . $new_k_makhoa . "', k_email ='" . $new_k_email . "', k_sdt = '" . $new_k_sdt . "', k_mota = '" . $new_k_mota . "', is_delete = 0 WHERE k_id = " . $k_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_khoa_by_id($k_id) {
			$queryCommand = "select * from qlgv_khoa where is_delete=0 AND k_id = " . $k_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			// echo '<pre>';
			// print_r($result);
			// die();

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_khoa_by_keyword($keyword) {
			$queryCommand = "select * from qlgv_khoa WHERE is_delete=0 AND (k_ten LIKE '%" . $keyword . "%' OR k_email LIKE '%" . $keyword . "%' OR k_sdt LIKE '%" . $keyword . "%' OR k_mota LIKE '%" . $keyword . "%')";
			
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

		function show_khoa_in_range($first, $last) {
			$queryCommand = "select * from qlgv_khoa where is_delete=0 limit " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_khoa_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "select * from qlgv_khoa WHERE is_delete=0 AND(k_ten LIKE '%" . $keyword . "%' OR k_makhoa LIKE '%" . $keyword . "%' OR k_email LIKE '%" . $keyword . "%' OR k_sdt LIKE '%" . $keyword . "%' OR k_mota LIKE '%" . $keyword . "%') LIMIT " . $first . ", " . $last;

                        $queryResult = $this->db_core->db_query($queryCommand);

			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function get_bomon_from_khoa_by_id($k_id) {
			$queryCommand = "select * from qlgv_bomon where is_delete=0 AND k_id=" . $k_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}
               
	}
?>