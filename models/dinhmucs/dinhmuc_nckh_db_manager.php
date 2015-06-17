<?php
	class DinhMuc_NCKH_db_manager {
		var $db_core;

		function __construct() {
                    $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(DinhMuc_NCKH $new_dmnckh) {
			$new_dmnckh_hv_id=$new_dmnckh->get_dmnckh_hv_id();
                        $new_dmnckh_sogio = $new_dmnckh->get_dmnckh_sogio();
			$new_dmnckh_mota = $new_dmnckh->get_dmnckh_mota();

			$queryCommand = "INSERT INTO qldm_dinhmuc_nckh(hv_id,dmnckh_sogio,dmnckh_mota) VALUES ('" . $new_dmnckh_hv_id . "','" . $new_dmnckh_sogio . "','" . $new_dmnckh_mota . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "select * from qldm_dinhmuc_nckh WHERE is_delete=0";
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

		function delete($dmnckh_id) {
			$queryCommand = "UPDATE qldm_dinhmuc_nckh SET is_delete=1 WHERE dmnckh_id = " . $dmnckh_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(DinhMuc_NCKH $edit_dmnckh) {
                        $dmnckh_hv_id=$edit_dmnckh->get_dmnckh_id();
                        $dmnckh_id=$edit_dmnckh->get_dmnckh_id();
			$dmnckh_sogio = $edit_dmnckh->get_dmnckh_sogio();
			$dmnckh_mota = $edit_dmnckh->get_dmnckh_mota();

			$queryCommand = "UPDATE qldm_dinhmuc_nckh SET hv_id = '" . $dmnckh_hv_id . "',dmnckh_sogio = '" . $dmnckh_sogio . "', dmnckh_mota = '" . $dmnckh_mota . "' WHERE dmnckh_id = " . $dmnckh_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_dinhmuc_nckh_by_id($dmnckh_id) {
			$queryCommand = "select dm.dmnckh_id,hv.hv_ten,dm.dmnckh_sogio,dm.dmnckh_mota,dm.is_delete from qldm_dinhmuc_nckh as dm inner join qlgv_hocvi as hv on dm.hv_id=hv.hv_id where dm.is_delete=0 AND dm.dmnckh_id = " . $dmnckh_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_dinhmuc_nckh_by_keyword($keyword) {
			$queryCommand = "select dm.dmnckh_id,hv.hv_ten,dm.dmnckh_sogio,dm.dmnckh_mota,dm.is_delete from qldm_dinhmuc_nckh as dm inner join qlgv_hocvi as hv on dm.hv_id=hv.hv_id WHERE  dm.is_delete=0 AND (hv.hv_ten LIKE '%".$keyword."%' OR dm.dmnckh_sogio=" . $keyword . " OR dm.dmnckh_mota LIKE '%" . $keyword . "%')";
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

		function show_dinhmuc_nckh_in_range($first, $last) {
			$queryCommand = "select dm.dmnckh_id,hv.hv_ten,dm.dmnckh_sogio,dm.dmnckh_mota,dm.is_delete from qldm_dinhmuc_nckh as dm inner join qlgv_hocvi as hv on dm.hv_id=hv.hv_id where dm.is_delete = 0 limit " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);
                      
			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_dinhmuc_nckh_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "select dm.dmnckh_id,hv.hv_ten,dm.dmnckh_sogio,dm.dmnckh_mota,dm.is_delete from qldm_dinhmuc_nckh as dm inner join qlgv_hocvi as hv on dm.hv_id=hv.hv_id WHERE dm.is_delete=0 AND (hv.hv_ten LIKE '%".$keyword."%' OR dm.dmnckh_sogio LIKE '%" . $keyword . "%' OR dm.dmnckh_mota LIKE '%" . $keyword . "%' )LIMIT " . $first . ", " . $last;
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