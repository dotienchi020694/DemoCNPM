<?php
	class DinhMuc_GiangDay_db_manager {
		var $db_core;

		function __construct() {
                    $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(DinhMuc_GiangDay $new_dmgd) {
			$new_dmgd_sogio = $new_dmgd->get_dmgd_sogio();
			$new_dmgd_mota = $new_dmgd->get_dmgd_mota();

			$queryCommand = "INSERT INTO qldm_dinhmuc_giangday(dmgd_sogio,dmgd_mota) VALUES ('" . $new_dmgd_sogio . "','" . $new_dmgd_mota . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "select * from qldm_dinhmuc_giangday WHERE is_delete=0";
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

		function delete($dmgd_id) {
			$queryCommand = "UPDATE qldm_dinhmuc_giangday SET is_delete=1 WHERE dmgd_id = " . $dmgd_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(DinhMuc_GiangDay $edit_dmgd) {
                        $dmgd_id=$edit_dmgd->get_dmgd_id();
			$dmgd_sogio = $edit_dmgd->get_dmgd_sogio();
			$dmgd_mota = $edit_dmgd->get_dmgd_mota();

			$queryCommand = "UPDATE qldm_dinhmuc_giangday SET dmgd_sogio = '" . $dmgd_sogio . "', dmgd_mota = '" . $dmgd_mota . "' WHERE dmgd_id = " . $dmgd_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_dinhmuc_giangday_by_id($dmgd_id) {
			$queryCommand = "select * from qldm_dinhmuc_giangday where is_delete=0 AND dmgd_id = " . $dmgd_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_dinhmuc_giangday_by_keyword($keyword) {
			$queryCommand = "select * from qldm_dinhmuc_giangday WHERE  is_delete=0 AND (dmgd_sogio=" . $keyword . " OR dmgd_mota LIKE %" . $keyword . "%')";
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

		function show_dinhmuc_giangday_in_range($first, $last) {
			$queryCommand = "select * from qldm_dinhmuc_giangday where is_delete = 0 limit " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);
                      
			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_dinhmuc_giangday_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "select * from qldm_dinhmuc_giangday WHERE is_delete=0 AND (dmgd_sogio =" . $keyword . " OR dmgd_mota LIKE '%" . $keyword . "%' )LIMIT " . $first . ", " . $last;
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