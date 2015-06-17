<?php
	class Chucdanh_db_manager {
		var $db_core;

		function __construct() {
                    $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Chucdanh $new_chucdanh) {
			$new_cd_ten = $new_chucdanh->get_cd_ten();
			$new_cd_mota = $new_chucdanh->get_cd_mota();

			$queryCommand = "INSERT INTO qlgv_chucdanh(cd_ten, cd_mota) VALUES ('" . $new_cd_ten . "','" . $new_cd_mota . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "select * from qlgv_chucdanh WHERE is_delete=0";
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

		function delete($cd_id) {
			$queryCommand = "UPDATE qlgv_chucdanh SET is_delete=1 WHERE cd_id = " . $cd_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(Chucdanh $edit_chucdanh) {
			$cd_id = $edit_chucdanh->get_cd_id();
			$new_cd_ten = $edit_chucdanh->get_cd_ten();
			$new_cd_mota = $edit_chucdanh->get_cd_mota();

			$queryCommand = "UPDATE qlgv_chucdanh SET cd_ten = '" . $new_cd_ten . "', cd_mota = '" . $new_cd_mota . "' WHERE cd_id = " . $cd_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}
                
		function show_chucdanh_by_id($cd_id) {
			$queryCommand = "select * from qlgv_chucdanh where is_delete=0 AND cd_id = " . $cd_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_chucdanh_by_keyword($keyword) {
			$queryCommand = "select * from qlgv_chucdanh WHERE  is_delete=0 AND (cd_ten LIKE '%" . $keyword . "%' OR cd_mota LIKE '%" . $keyword . "%')";
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

		function show_chucdanh_in_range($first, $last) {
			$queryCommand = "select * from qlgv_chucdanh where is_delete = 0 limit " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);
                      
			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_chucdanh_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "select * from qlgv_chucdanh WHERE is_delete=0 AND (cd_ten LIKE '%" . $keyword . "%' OR cd_mota LIKE '%" . $keyword . "%' )LIMIT " . $first . ", " . $last;
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