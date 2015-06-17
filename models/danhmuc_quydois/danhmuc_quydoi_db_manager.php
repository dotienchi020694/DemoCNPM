<?php
	class Danhmuc_quydoi_db_manager {
		var $db_core;

		function __construct() {
			 $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Danhmuc_quydoi $new_danhmuc_quydoi) {
			$new_dmqd_ten = $new_danhmuc_quydoi->get_dmqd_congvieccuthe();
			$new_lv_id = $new_danhmuc_quydoi->get_lv_id();
			$new_dmqd_sogio = $new_danhmuc_quydoi->get_dmqd_sogio();
			$new_dmqd_sodonvi = $new_danhmuc_quydoi->get_dmqd_sodonvi();
			$new_dv_id = $new_danhmuc_quydoi->get_dv_id();
			$new_dmqd_xacnhan = $new_danhmuc_quydoi->get_dmqd_xacnhan();
			$new_dmqd_ghichu = $new_danhmuc_quydoi->get_dmqd_ghichu();
			

			$queryCommand = "INSERT INTO qlcv_danhmucquydoi(lv_id, dmqd_congvieccuthe, dmqd_sogio, dmqd_sodonvi, dv_id, dmqd_xacnhan, dmqd_ghichu) "
                        . "VALUES ('" . $new_lv_id . "','" . $new_dmqd_ten . "', '" . $new_dmqd_sogio . "', '" . $new_dmqd_sodonvi . "', '" . $new_dv_id . "', '" . $new_dmqd_xacnhan . "', '" . $new_dmqd_ghichu . "')";
			
                        $queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "SELECT lv.lv_ten,dm.*, dv.dv_ten FROM `qlcv_danhmucquydoi` as dm "
                                . "inner join qlcv_loaiviec as lv on dm.lv_id=lv.lv_id inner join qlcv_donvi as dv on dm.dv_id=dv.dv_id where dm.is_delete=0";
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

		function delete($dmqd_id) {
			$queryCommand = "UPDATE qlcv_danhmucquydoi SET is_delete=1 WHERE dmqd_id = " . $dmqd_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(Danhmuc_quydoi $edit_danhmuc_quydoi) {
                        $new_dmqd_id=$edit_danhmuc_quydoi->get_dmqd_id();
			$new_dmqd_ten = $edit_danhmuc_quydoi->get_dmqd_congvieccuthe();
			$new_lv_id = $edit_danhmuc_quydoi->get_lv_id();
			$new_dmqd_sogio = $edit_danhmuc_quydoi->get_dmqd_sogio();
			$new_dmqd_sodonvi = $edit_danhmuc_quydoi->get_dmqd_sodonvi();
			$new_dv_id = $edit_danhmuc_quydoi->get_dv_id();
			$new_dmqd_xacnhan = $edit_danhmuc_quydoi->get_dmqd_xacnhan();
			$new_dmqd_ghichu = $edit_danhmuc_quydoi->get_dmqd_ghichu();

			$queryCommand = "UPDATE qlcv_danhmucquydoi SET lv_id = '" . $new_dmqd_id . "', dmqd_congvieccuthe ='" . $new_dmqd_ten . "', dmqd_sogio = '" . $new_dmqd_sogio . "', dmqd_sodonvi = '" . $new_dmqd_sogio . "', dv_id = '" . $new_dv_id . "', dmqd_xacnhan = '" . $new_dmqd_xacnhan . "', dmqd_ghichu = '" .$new_dmqd_ghichu."' WHERE dmqd_id = " . $new_dmqd_id;
			
                        $queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_danhmuc_quydoi_by_id($dmqd_id) {
			$queryCommand = "SELECT lv.lv_ten,dm.*, dv.dv_ten FROM `qlcv_danhmucquydoi` as dm "
                                . "inner join qlcv_loaiviec as lv on dm.lv_id=lv.lv_id inner join qlcv_donvi as dv on dm.dv_id=dv.dv_id where dm.is_delete=0 AND dm.dmqd_id = " . $dmqd_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_danhmuc_quydoi_by_keyword($keyword) {
			$queryCommand = "SELECT lv.lv_ten,dm.*, dv.dv_ten FROM `qlcv_danhmucquydoi` as dm "
                                . "inner join qlcv_loaiviec as lv on dm.lv_id=lv.lv_id inner join qlcv_donvi as dv on dm.dv_id=dv.dv_id where dm.is_delete=0 AND( lv.lv_ten LIKE '%" . $keyword . "%' OR dm.dmqd_congvieccuthe LIKE '%" . $keyword . "%' OR dm.dmqd_sogio LIKE '%" . $keyword . "%')";
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

		function show_danhmuc_quydoi_in_range($first, $last) {
                        $queryCommand = "SELECT lv.lv_ten,dm.*, dv.dv_ten FROM `qlcv_danhmucquydoi` as dm "
                                . "inner join qlcv_loaiviec as lv on dm.lv_id=lv.lv_id inner join qlcv_donvi as dv on dm.dv_id=dv.dv_id where dm.is_delete=0 limit " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_danhmuc_quydoi_by_keyword_in_range($keyword, $first, $last) {
                        $queryCommand = "SELECT lv.lv_ten,dm.*, dv.dv_ten FROM `qlcv_danhmucquydoi` as dm "
                                . "inner join qlcv_loaiviec as lv on dm.lv_id=lv.lv_id inner join qlcv_donvi as dv on dm.dv_id=dv.dv_id where dm.is_delete=0 AND( lv.lv_ten LIKE '%" . $keyword . "%' OR dm.dmqd_congvieccuthe LIKE '%" . $keyword . "%' OR dm.dmqd_sogio LIKE '%" . $keyword . "%')LIMIT " . $first . ", " . $last;
			//$queryCommand = "select g.gv_id, g.gv_magv, g.gv_ten, g.gv_gioitinh, g.gv_diachi, g.gv_sdt, g.gv_email, g.gv_time_start_job, b.bm_ten, c.cd_ten, h.hv_ten, t.tt_ten, g.gv_mota, g.is_delete from qlgv_giangvien as g inner join qlgv_bomon as b on g.bm_id = b.bm_id inner join qlgv_chucdanh as c on g.cd_id = c.cd_id inner join qlgv_hocvi as h on g.hv_id = h.hv_id inner join qlgv_tinhtrang as t on g.tt_id = t.tt_id WHERE g.is_delete=0 AND(g.gv_magv LIKE '%" . $keyword . "%' OR g.gv_ten LIKE '%" . $keyword . "%' OR g.gv_diachi LIKE '%" . $keyword . "%' OR g.gv_sdt LIKE '%" . $keyword . "%' OR g.gv_email LIKE '%" . $keyword . "%' OR b.bm_ten LIKE '%" . $keyword . "%' OR c.cd_ten LIKE '%" . $keyword . "%' OR h.hv_ten LIKE '%" . $keyword . "%' OR t.tt_ten LIKE '%" . $keyword . "%' )LIMIT " . $first . ", " . $last;
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