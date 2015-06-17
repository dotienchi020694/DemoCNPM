<?php
	class Heso_giangvien_db_manager {
		var $db_core;

		function __construct() {
			 $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Heso_giangvien $new_heso_giangvien) {
			$new_hv_id = $new_heso_giangvien->get_hv_id();
            $new_nh_id=$new_heso_giangvien->get_nh_id();
			$new_hs_heso = $new_heso_giangvien->get_hs_heso();
            $new_hs_mota=$new_heso_giangvien->get_hs_mota();
			$new_hs_sonamyc=$new_heso_giangvien->get_hs_sonamyc();
			$new_hs_sonamdk=$new_heso_giangvien->get_hs_sonamdk();
                        

			$queryCommand = "INSERT INTO qldm_heso(hv_id,nh_id, hs_heso, hs_mota,hs_sonamyc, hs_sonamdk) VALUES ('" . $new_hv_id . "','". $new_nh_id . "','" . $new_hs_heso . "', '" . $new_hs_mota . "', '" . $new_hs_sonamyc . "', '" . $new_hs_sonamdk . "')";

			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "SELECT hs.*,hv.hv_ten,nh.nh_ten FROM `qldm_heso` as hs inner join namhoc as nh on hs.nh_id=nh.nh_id inner join qlgv_hocvi as hv on hs.hv_id=hv.hv_id where hs.is_delete=0";
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

		function delete($hv_id,$nh_id) {
			$queryCommand = "UPDATE qldm_heso SET is_delete=1 WHERE hv_id = " . $hv_id." AND nh_id=".$nh_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(Heso_giangvien $edit_heso_giangvien,$hv,$nh) {
			$new_hv_id = $edit_heso_giangvien->get_hv_id();
            $new_nh_id=$edit_heso_giangvien->get_nh_id();
			$new_hs_heso = $edit_heso_giangvien->get_hs_heso();
            $new_hs_mota=$edit_heso_giangvien->get_hs_mota();
			$new_hs_sonamyc=$edit_heso_giangvien->get_hs_sonamyc();
			$new_hs_sonamdk=$edit_heso_giangvien->get_hs_sonamdk();
                        
			$queryCommand = "UPDATE qldm_heso SET hv_id = " . $new_hv_id . ", nh_id =" . $new_nh_id . ", hs_heso =" . $new_hs_heso .", hs_mota =\"".$new_hs_mota."\", hs_sonamyc=".$new_hs_sonamyc.", hs_sonamdk=".$new_hs_sonamdk." WHERE hv_id = " . $hv." AND nh_id=".$nh;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_heso_by_id($hv_id,$nh_id) {
			$queryCommand = "SELECT hs.*,hv.hv_ten,nh.nh_ten FROM `qldm_heso` as hs inner join namhoc as nh on hs.nh_id=nh.nh_id inner join qlgv_hocvi as hv on hs.hv_id=hv.hv_id where hs.is_delete=0 AND hs.hv_id=".$hv_id." AND hs.nh_id=".$nh_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_heso_by_keyword($keyword) {
                        //$queryCommand = "SELECT * FROM `qldm_heso` as hs inner join namhoc as nh on hs.nh_id=nh.nh_id inner join qlgv_hocvi as hv on hs.hv_id=hv.hv_id where hs.is_delete=0 AND( nh.nh_ten LIKE '%" . $keyword . "%' )";
			$queryCommand = "SELECT * FROM `qldm_heso` as hs inner join namhoc as nh on hs.nh_id=nh.nh_id inner join qlgv_hocvi as hv on hs.hv_id=hv.hv_id where hs.is_delete=0 AND( nh.nh_ten LIKE '%" . $keyword . "%' OR hv.hv_ten LIKE '%" . $keyword . "%' OR hs.hs_mota LIKE '%" . $keyword . "%' OR hs.hs_heso ='%" . $keyword . "%')";
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

		function show_heso_in_range($first, $last) {
			$queryCommand = "SELECT * FROM `qldm_heso` as hs inner join namhoc as nh on hs.nh_id=nh.nh_id inner join qlgv_hocvi as hv on hs.hv_id=hv.hv_id where hs.is_delete=0 limit " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(isset($queryResult)) {
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function search_heso_by_keyword_in_range($keyword, $first, $last) {
                        $queryCommand = "SELECT * FROM `qldm_heso` as hs inner join namhoc as nh on hs.nh_id=nh.nh_id inner join qlgv_hocvi as hv on hs.hv_id=hv.hv_id where hs.is_delete=0 AND( nh_ten LIKE '%" . $keyword . "%' OR hv_ten LIKE '%" . $keyword . "%' OR hs.hs_mota LIKE '%" . $keyword . "%' OR hs.hs_heso ='%" . $keyword . "%') LIMIT " . $first . ", " . $last;
			
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