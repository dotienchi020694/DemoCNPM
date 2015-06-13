<?php
	class Giangvien {
		var $gv_id;
		var $gv_magv;
		var $gv_ten;
		var $gv_gioitinh;
		var $gv_diachi;
		var $gv_sdt;
		var $gv_email;
		var $gv_time_start_job;
		var $bm_id;
		var $cd_id;
		var $hv_id;
		var $tt_id;
		var $gv_mota;
		var $is_delete;

		function __construct() {

		}

		// SET METHODS //

		function set_gv_id($gv_id) {
			$this->gv_id = $gv_id;
		}

		function set_gv_magv($gv_magv) {
			$this->gv_magv = $gv_magv;
		}

		function set_gv_ten($gv_ten) {
			$this->gv_ten = $gv_ten;
		}

		function set_gv_gioitinh($gv_gioitinh) {
			$this->gv_gioitinh = $gv_gioitinh;
		}
		
		function set_gv_diachi($gv_diachi) {
			$this->gv_diachi = $gv_diachi;
		}

		function set_gv_sdt($gv_sdt) {
			$this->gv_sdt = $gv_sdt;
		}

		function set_gv_email($gv_email) {
			$this->gv_email = $gv_email;
		}

		function set_gv_time_start_job($gv_time_start_job) {
			$this->gv_time_start_job = $gv_time_start_job;
		}

		function set_bm_id($bm_id) {
			$this->bm_id = $bm_id;
		}

		function set_cd_id($cd_id) {
			$this->cd_id = $cd_id;
		}

		function set_hv_id($hv_id) {
			$this->hv_id = $hv_id;
		}

		function set_tt_id($tt_id) {
			$this->tt_id = $tt_id;
		}

		function set_gv_mota($gv_mota) {
			$this->gv_mota = $gv_mota;
		}

		function set_is_delete($is_delete) {
			$this->is_delete = $is_delete;
		}

		// GET METHODS //

		function get_gv_id() {
			return $this->gv_id;
		}

		function get_gv_magv() {
			return $this->gv_magv;
		}

		function get_gv_ten() {
			return $this->gv_ten;
		}

		function get_gv_gioitinh() {
			return $this->gv_gioitinh;
		}
		
		function get_gv_diachi() {
			return $this->gv_diachi;
		}

		function get_gv_sdt() {
			return $this->gv_sdt;
		}

		function get_gv_email() {
			return $this->gv_email;
		}

		function get_gv_time_start_job() {
			return $this->gv_time_start_job;
		}

		function get_bm_id() {
			return $this->bm_id;
		}

		function get_cd_id() {
			return $this->cd_id;
		}

		function get_hv_id() {
			return $this->hv_id;
		}

		function get_tt_id() {
			return $this->tt_id;
		}

		function get_gv_mota() {
			return $this->gv_mota;
		}

		function get_is_delete() {
			return $this->is_delete;
		}

		
	}
?>