<?php
	class Donvi_db_manager {
		var $db_core;

		function __construct() {
			 $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Donvi $new_donvi) {
			$new_dv_ten =  $new_donvi->get_dv_ten();
			$new_dv_mota = $new_donvi->get_dv_mota();

			$queryCommand = "INSERT INTO qlcv_donvi(dv_ten, dv_mota) VALUES ('" . $new_dv_ten . "','" . $new_dv_mota . "')";
			$queryResult = $this->db_core->db_query($queryCommand);
                            
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "select * from qlcv_donvi where is_delete=0";
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

		function delete($dv_id) {
			$queryCommand = "UPDATE qlcv_donvi SET is_delete=1 WHERE dv_id = " . $dv_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(Donvi $edit_donvi) {
			$new_dv_id = $edit_donvi->get_dv_id();
			$new_dv_ten = $edit_donvi->get_dv_ten();
			$new_dv_mota = $edit_donvi->get_dv_mota();
			

			$queryCommand = "UPDATE qlcv_donvi SET dv_ten = '" . $new_dv_ten . "', dv_mota = '" . $new_dv_mota . "' WHERE dv_id = " . $new_dv_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_donvi_by_id($dv_id) {
			$queryCommand = "select * from qlcv_donvi where is_delete=0 AND dv_id = " . $dv_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_donvi_by_keyword($keyword) {
			$queryCommand = "select * from qlcv_donvi WHERE is_delete=0 AND (dv_ten LIKE '%" . $keyword . "%' OR dv_mota LIKE '%" . $keyword . "%')";
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

		function show_donvi_in_range($first, $last) {
			$queryCommand = "select * from qlcv_donvi WHERE is_delete=0 limit " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_donvi_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand =" select * from qlcv_donvi WHERE is_delete=0 AND (dv_ten LIKE '%" . $keyword . "%' OR dv_mota LIKE '%" . $keyword . "%') LIMIT " . $first . ", " . $last;
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