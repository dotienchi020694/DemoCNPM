<?php
	class Tinhtrang_db_manager {
		var $db_core;
		function __construct() {
                     $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Tinhtrang $new_tinhtrang) {
			$new_tt_ten = $new_tinhtrang->get_tt_ten();
			$new_tt_mota = $new_tinhtrang->get_tt_mota();
			$new_is_delete = $new_tinhtrang->get_is_delete();

			$queryCommand = "INSERT INTO qlgv_tinhtrang(tt_ten, tt_mota, is_delete) VALUES ('" . $new_tt_ten . "','" . $new_tt_mota . "', '" . $new_is_delete . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "select * from qlgv_tinhtrang";
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

		function delete($tt_id) {
			$queryCommand = "DELETE FROM qlgv_tinhtrang WHERE tt_id = " . $tt_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(Tinhtrang $edit_tinhtrang) {
			$tt_id = $edit_tinhtrang->get_tt_id();
			$new_tt_ten = $edit_tinhtrang->get_tt_ten();
			$new_tt_mota = $edit_tinhtrang->get_tt_mota();
			$new_is_delete = $edit_tinhtrang->get_is_delete();

			$queryCommand = "UPDATE qlgv_tinhtrang SET tt_ten = '" . $new_tt_ten . "', tt_mota = '" . $new_tt_mota . "', is_delete = '" . $new_is_delete . "' WHERE tt_id = " . $tt_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_tinhtrang_by_id($tt_id) {
			$queryCommand = "select * from qlgv_tinhtrang where tt_id = " . $tt_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_tinhtrang_by_keyword($keyword) {
			$queryCommand = "select * from qlgv_tinhtrang WHERE tt_ten LIKE '%" . $keyword . "%' OR tt_mota LIKE '%" . $keyword . "%'";
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

		function show_tinhtrang_in_range($first, $last) {
			$queryCommand = "select * from qlgv_tinhtrang limit " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_tinhtrang_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "select * from qlgv_tinhtrang WHERE tt_ten LIKE '%" . $keyword . "%' OR tt_mota LIKE '%" . $keyword . "%' LIMIT " . $first . ", " . $last;
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