<?php
	class Giangvien_db_manager {
		var $db_core;

		function __construct() {
			 $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Giangvien $new_giangvien) {
			$new_gv_magv = $new_giangvien->get_gv_magv();
			$new_gv_ten = $new_giangvien->get_gv_ten();
			$new_gv_gioitinh = $new_giangvien->get_gv_gioitinh();
			$new_gv_diachi = $new_giangvien->get_gv_diachi();
			$new_gv_sdt = $new_giangvien->get_gv_sdt();
			$new_gv_email = $new_giangvien->get_gv_sdt();
			$new_gv_time_start_job = $new_giangvien->get_gv_time_start_job();
			$new_bm_id = $new_giangvien->get_bm_id();
			$new_cd_id = $new_giangvien->get_cd_id();
			$new_hv_id = $new_giangvien->get_hv_id();
			$new_tt_id = $new_giangvien->get_tt_id();
			$new_gv_mota = $new_giangvien->get_gv_mota();
			$new_is_delete = $new_giangvien->get_is_delete();

			$queryCommand = "INSERT INTO qlgv_giangvien(gv_magv, gv_ten, gv_gioitinh, gv_diachi, gv_sdt, gv_email, gv_time_start_job, bm_id, cd_id, hv_id, tt_id, gv_mota, is_delete) VALUES ('" . $new_gv_magv . "','" . $new_gv_ten . "', '" . $new_gv_gioitinh . "', '" . $new_gv_diachi . "', '" . $new_gv_sdt . "', '" . $new_gv_email . "', '" . $new_gv_time_start_job . "', '" . $new_bm_id . "', '" . $new_cd_id . "', '" . $new_hv_id . "', '" . $new_tt_id . "', '" . $new_gv_mota . "', '" . $new_is_delete . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "select g.gv_id, g.gv_magv, g.gv_ten, g.gv_gioitinh, g.gv_diachi, g.gv_sdt, g.gv_email, g.gv_time_start_job, b.bm_ten, c.cd_ten, h.hv_ten, t.tt_ten, g.gv_mota, g.is_delete from qlgv_giangvien as g inner join qlgv_bomon as b on g.bm_id = b.bm_id inner join qlgv_chucdanh as c on g.cd_id = c.cd_id inner join qlgv_hocvi as h on g.hv_id = h.hv_id inner join qlgv_tinhtrang as t on g.tt_id = t.tt_id where g.is_delete=0";
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

		function delete($gv_id) {
			$queryCommand = "UPDATE qlgv_giangvien SET is_delete=1 WHERE gv_id = " . $gv_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(Giangvien $edit_giangvien) {
			$gv_id = $edit_giangvien->get_gv_id();
			$new_gv_magv = $edit_giangvien->get_gv_magv();
			$new_gv_ten = $edit_giangvien->get_gv_ten();
			$new_gv_gioitinh = $edit_giangvien->get_gv_gioitinh();
			$new_gv_diachi = $edit_giangvien->get_gv_diachi();
			$new_gv_sdt = $edit_giangvien->get_gv_sdt();
			$new_gv_email = $edit_giangvien->get_gv_email();
			$new_gv_time_start_job = $edit_giangvien->get_gv_time_start_job();
			$new_bm_id = $edit_giangvien->get_bm_id();
			$new_cd_id = $edit_giangvien->get_cd_id();
			$new_hv_id = $edit_giangvien->get_hv_id();
			$new_tt_id = $edit_giangvien->get_tt_id();
			$new_gv_mota = $edit_giangvien->get_gv_mota();
			$new_is_delete = $edit_giangvien->get_is_delete();

			$queryCommand = "UPDATE qlgv_giangvien SET gv_magv = '" . $new_gv_magv . "', gv_ten ='" . $new_gv_ten . "', gv_gioitinh = '" . $new_gv_gioitinh . "', gv_diachi = '" . $new_gv_diachi . "', gv_sdt = '" . $new_gv_sdt . "', gv_email = '" . $new_gv_email . "', gv_time_start_job = '" .$new_gv_time_start_job. "', bm_id = '" . $new_bm_id . "', cd_id = '" . $new_cd_id . "', hv_id = '" . $new_hv_id . "', tt_id = '" . $new_tt_id . "', gv_mota = '" . $new_gv_mota . "', is_delete = '" . $new_is_delete . "' WHERE gv_id = " . $gv_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_giangvien_by_id($gv_id) {
			$queryCommand = "select g.gv_id, g.gv_magv, g.gv_ten, g.gv_gioitinh, g.gv_diachi, g.gv_sdt, g.gv_email, g.gv_time_start_job, b.bm_ten, c.cd_ten, h.hv_ten, t.tt_ten, g.gv_mota, g.is_delete from qlgv_giangvien as g inner join qlgv_bomon as b on g.bm_id = b.bm_id inner join qlgv_chucdanh as c on g.cd_id = c.cd_id inner join qlgv_hocvi as h on g.hv_id = h.hv_id inner join qlgv_tinhtrang as t on g.tt_id = t.tt_id where g.is_delete=0 AND g.gv_id = " . $gv_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_giangvien_by_keyword($keyword) {
			$queryCommand = "select g.gv_id, g.gv_magv, g.gv_ten, g.gv_gioitinh, g.gv_diachi, g.gv_sdt, g.gv_email, g.gv_time_start_job, b.bm_ten, c.cd_ten, h.hv_ten, t.tt_ten, g.gv_mota, g.is_delete from qlgv_giangvien as g inner join qlgv_bomon as b on g.bm_id = b.bm_id inner join qlgv_chucdanh as c on g.cd_id = c.cd_id inner join qlgv_hocvi as h on g.hv_id = h.hv_id inner join qlgv_tinhtrang as t on g.tt_id = t.tt_id WHERE g.is_delete=0 AND( g.gv_magv LIKE '%" . $keyword . "%' OR g.gv_ten LIKE '%" . $keyword . "%' OR g.gv_diachi LIKE '%" . $keyword . "%' OR g.gv_sdt LIKE '%" . $keyword . "%' OR g.gv_email LIKE '%" . $keyword . "%' OR b.bm_ten LIKE '%" . $keyword . "%' OR c.cd_ten LIKE '%" . $keyword . "%' OR h.hv_ten LIKE '%" . $keyword . "%' OR t.tt_ten LIKE '%" . $keyword . "%')";
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

		function show_giangvien_in_range($first, $last) {
			$queryCommand = "select g.gv_id, g.gv_magv, g.gv_ten, g.gv_gioitinh, g.gv_diachi, g.gv_sdt, g.gv_email, g.gv_time_start_job, b.bm_ten, c.cd_ten, h.hv_ten, t.tt_ten, g.gv_mota, g.is_delete from qlgv_giangvien as g inner join qlgv_bomon as b on g.bm_id = b.bm_id inner join qlgv_chucdanh as c on g.cd_id = c.cd_id inner join qlgv_hocvi as h on g.hv_id = h.hv_id inner join qlgv_tinhtrang as t on g.tt_id = t.tt_id where g.is_delete=0 limit " . $first . ", " . $last;

			$queryResult = $this->db_core->db_query($queryCommand);

			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_giangvien_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "select g.gv_id, g.gv_magv, g.gv_ten, g.gv_gioitinh, g.gv_diachi, g.gv_sdt, g.gv_email, g.gv_time_start_job, b.bm_ten, c.cd_ten, h.hv_ten, t.tt_ten, g.gv_mota, g.is_delete from qlgv_giangvien as g inner join qlgv_bomon as b on g.bm_id = b.bm_id inner join qlgv_chucdanh as c on g.cd_id = c.cd_id inner join qlgv_hocvi as h on g.hv_id = h.hv_id inner join qlgv_tinhtrang as t on g.tt_id = t.tt_id WHERE g.is_delete=0 AND(g.gv_magv LIKE '%" . $keyword . "%' OR g.gv_ten LIKE '%" . $keyword . "%' OR g.gv_diachi LIKE '%" . $keyword . "%' OR g.gv_sdt LIKE '%" . $keyword . "%' OR g.gv_email LIKE '%" . $keyword . "%' OR b.bm_ten LIKE '%" . $keyword . "%' OR c.cd_ten LIKE '%" . $keyword . "%' OR h.hv_ten LIKE '%" . $keyword . "%' OR t.tt_ten LIKE '%" . $keyword . "%' )LIMIT " . $first . ", " . $last;
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