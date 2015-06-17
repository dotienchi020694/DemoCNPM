<?php
	class DinhMuc_Giam_db_manager {
		var $db_core;

		function __construct() {
                    $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Chucdanh $edit_chucdanh) {
			$cd_id = $edit_chucdanh->get_cd_id();
			$new_cd_dmg_gd = $edit_chucdanh->get_cd_dmg_giangday();
			$new_cd_dmg_nckh = $edit_chucdanh->get_cd_dmg_nckh();

			$queryCommand = "UPDATE qlgv_chucdanh SET cd_dmg_giangday =" . $new_cd_dmg_gd . ", cd_dmg_nckh = " . $new_cd_dmg_nckh . " WHERE cd_id = " . $cd_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all($status) {
                        if($status==0)
                            $queryCommand = "select * from qlgv_chucdanh WHERE is_delete=0 AND cd_dmg_giangday=0 AND cd_dmg_nckh=0 ";
			else
                            $queryCommand = "select * from qlgv_chucdanh WHERE is_delete=0 AND cd_dmg_giangday!=0 OR cd_dmg_nckh!=0 ";
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
			$queryCommand = "UPDATE qlgv_chucdanh SET cd_dmg_giangday=0, cd_dmg_nckh=0 WHERE cd_id = " . $cd_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(Chucdanh $edit_chucdanh) {
			$cd_id = $edit_chucdanh->get_cd_id();
			$new_cd_dmg_giangday = $edit_chucdanh->get_cd_dmg_giangday();
			$new_cd_dmg_nckh = $edit_chucdanh->get_cd_dmg_nckh();
			$queryCommand = "UPDATE qlgv_chucdanh SET cd_dmg_giangday = " . $new_cd_dmg_giangday . ", cd_dmg_nckh = " . $new_cd_dmg_nckh . " WHERE cd_id = " . $cd_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}
                
                function show_dinhmuc_giam_by_id($cd_id) {
			$queryCommand = "select * from qlgv_chucdanh where is_delete=0 AND cd_id = " . $cd_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}
                
		function search_dinhmuc_giam_by_keyword($keyword) {
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

		function show_dinhmuc_giam_in_range($first, $last) {
			$queryCommand = "select * from qlgv_chucdanh where is_delete = 0 AND (cd_dmg_giangday!=0 OR cd_dmg_nckh!=0) limit " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);
                      
			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_dinhmuc_giam_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "select * from qlgv_chucdanh WHERE is_delete = 0 AND (cd_dmg_giangday!=0 OR cd_dmg_nckh!=0) AND (cd_dmg_giangday!=0 OR cd_dmg_nckh!=0) AND (cd_ten LIKE '%" . $keyword . "%' OR cd_mota LIKE '%" . $keyword . "%' )LIMIT " . $first . ", " . $last;
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