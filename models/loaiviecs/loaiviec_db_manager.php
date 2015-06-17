<?php
	class Loaiviec_db_manager {
		var $db_core;

		function __construct() {
			 $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Loaiviec $new_loaiviec) {
			$new_lv_ten =  $new_loaiviec->get_lv_ten();
			$new_lv_mota = $new_loaiviec->get_lv_mota();

			$queryCommand = "INSERT INTO qlcv_loaiviec(lv_ten, lv_mota) VALUES ('" . $new_lv_ten . "','" . $new_lv_mota . "')";
			$queryResult = $this->db_core->db_query($queryCommand);
                            
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "select * from qlcv_loaiviec where is_delete=0";
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

		function delete($lv_id) {
			$queryCommand = "UPDATE qlcv_loaiviec SET is_delete=1 WHERE lv_id = " . $lv_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(Loaiviec $edit_loaiviec) {
			$new_lv_id = $edit_loaiviec->get_lv_id();
			$new_lv_ten = $edit_loaiviec->get_lv_ten();
			$new_lv_mota = $edit_loaiviec->get_lv_mota();
			

			$queryCommand = "UPDATE qlcv_loaiviec SET lv_ten = '" . $new_lv_ten . "', lv_mota = '" . $new_lv_mota . "' WHERE lv_id = " . $new_lv_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_loaiviec_by_id($lv_id) {
			$queryCommand = "select * from qlcv_loaiviec where is_delete=0 AND lv_id = " . $lv_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_loaiviec_by_keyword($keyword) {
			$queryCommand = "select * from qlcv_loaiviec WHERE is_delete=0 AND (lv_ten LIKE '%" . $keyword . "%' OR lv_mota LIKE '%" . $keyword . "%')";
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

		function show_loaiviec_in_range($first, $last) {
			$queryCommand = "select * from qlcv_loaiviec WHERE is_delete=0 limit " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_loaiviec_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand =" select * from qlcv_loaiviec WHERE is_delete=0 AND (lv_ten LIKE '%" . $keyword . "%' OR lv_mota LIKE '%" . $keyword . "%') LIMIT " . $first . ", " . $last;
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