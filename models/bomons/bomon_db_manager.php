<?php
	class Bomon_db_manager {
		var $db_core;

		function __construct() {
			 $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Bomon $new_bomon) {
			$new_bm_ten = $new_bomon->get_bm_ten();
			$new_bm_mota = $new_bomon->get_bm_mota();
			$new_k_id = $new_bomon->get_k_id();

			$queryCommand = "INSERT INTO qlgv_bomon(bm_ten, bm_mota, k_id) VALUES ('" . $new_bm_ten . "','" . $new_bm_mota . "', '" . $new_k_id . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "select b.bm_id, b.bm_ten, b.bm_mota, k.k_ten, b.is_delete from qlgv_bomon as b inner join qlgv_khoa as k on b.k_id = k.k_id";
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

		function delete($bm_id) {
			$queryCommand = "UPDATE qlgv_bomon SET is_delete=1 WHERE bm_id = " . $bm_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(Bomon $edit_bomon) {
			$bm_id = $edit_bomon->get_bm_id();
			$new_bm_ten = $edit_bomon->get_bm_ten();
			$new_bm_mota = $edit_bomon->get_bm_mota();
			$new_k_id = $edit_bomon->get_k_id();

			$queryCommand = "UPDATE qlgv_bomon SET bm_ten = '" . $new_bm_ten . "', bm_mota = '" . $new_bm_mota . "', k_id ='" . $new_k_id . "'WHERE bm_id = " . $bm_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_bomon_by_id($bm_id) {
			$queryCommand = "select b.bm_id, b.bm_ten, b.bm_mota, k.k_ten, b.is_delete from qlgv_bomon as b inner join qlgv_khoa as k on b.k_id = k.k_id where b.bm_id = " . $bm_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_bomon_by_keyword($keyword) {
			$queryCommand = "select b.bm_id, b.bm_ten, b.bm_mota, k.k_ten, b.is_delete from qlgv_bomon as b inner join qlgv_khoa as k on b.k_id = k.k_id WHERE b.bm_ten LIKE '%" . $keyword . "%' OR b.bm_mota LIKE '%" . $keyword . "%' OR k.k_ten LIKE '%" . $keyword . "%' OR b.bm_id LIKE '%" . $keyword . "%'";
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

		function show_bomon_in_range($first, $last) {
			$queryCommand = "select b.bm_id, b.bm_ten, b.bm_mota, k.k_ten, b.is_delete from qlgv_bomon as b inner join qlgv_khoa as k on b.k_id = k.k_id WHERE b.is_delete=0 limit " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_bomon_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "select b.bm_id, b.bm_ten, b.bm_mota, k.k_ten, b.is_delete from qlgv_bomon as b inner join qlgv_khoa as k on b.k_id = k.k_id WHERE b.bm_ten LIKE '%" . $keyword . "%' OR b.bm_mota LIKE '%" . $keyword . "%' OR k.k_ten LIKE '%" . $keyword . "%' OR b.bm_id LIKE '%" . $keyword . "%' LIMIT " . $first . ", " . $last;
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