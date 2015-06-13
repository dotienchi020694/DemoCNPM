<?php
	class Hocvi_db_manager {
		var $db_core;

		function __construct() {
                     $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Hocvi $new_hocvi) {
			$new_hv_ten = $new_hocvi->get_hv_ten();
			$new_hv_mota = $new_hocvi->get_hv_mota();
			$new_is_delete = $new_hocvi->get_is_delete();

			$queryCommand = "INSERT INTO qlgv_hocvi(hv_ten, hv_mota, is_delete) VALUES ('" . $new_hv_ten . "','" . $new_hv_mota . "', '" . $new_is_delete . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "select * from qlgv_hocvi WHERE is_delete=0";
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

		function delete($hv_id) {
			$queryCommand = "UPDATE qlgv_hocvi SET is_delete=1 WHERE hv_id = " . $hv_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(Hocvi $edit_hocvi) {
			$hv_id = $edit_hocvi->get_hv_id();
			$new_hv_ten = $edit_hocvi->get_hv_ten();
			$new_hv_mota = $edit_hocvi->get_hv_mota();
			$new_is_delete = $edit_hocvi->get_is_delete();

			$queryCommand = "UPDATE qlgv_hocvi SET hv_ten = '" . $new_hv_ten . "', hv_mota = '" . $new_hv_mota . "', is_delete = '" . $new_is_delete . "' WHERE hv_id = " . $hv_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_hocvi_by_id($hv_id) {
			$queryCommand = "select * from qlgv_hocvi where is_delete=0 hv_id = " . $hv_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_hocvi_by_keyword($keyword) {
			$queryCommand = "select * from qlgv_hocvi WHERE is_delete=0 AND( hv_ten LIKE '%" . $keyword . "%' OR hv_mota LIKE '%" . $keyword . "%')";
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

		function show_hocvi_in_range($first, $last) {
			$queryCommand = "select * from qlgv_hocvi where is_delete=0 limit " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_hocvi_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "select * from qlgv_hocvi where is_delete=0 AND( hv_ten LIKE '%" . $keyword . "%' OR hv_mota LIKE '%" . $keyword . "%') LIMIT " . $first . ", " . $last;
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