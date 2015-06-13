<?php
	class Chucdanh {
		var $cd_id;
		var $cd_ten;
		var $cd_mota;
		var $cd_dmg_nckh;
		var $cd_dmg_giangday;
		var $is_delete;

		function __construct() {

		}

		// SET METHODS //

		function set_cd_id($cd_id) {
			$this->cd_id = $cd_id;
		}

		function set_cd_ten($cd_ten) {
			$this->cd_ten = $cd_ten;
		}
		
		function set_cd_mota($cd_mota) {
			$this->cd_mota = $cd_mota;
		}

		function set_cd_dmg_nckh($cd_dmg_nckh) {
			$this->cd_dmg_nckh = $cd_dmg_nckh;
		}

		function set_cd_dmg_giangday($cd_dmg_giangday) {
			$this->cd_dmg_giangday = $cd_dmg_giangday;
		}

		function set_is_delete($is_delete) {
			$this->is_delete = $is_delete;
		}

		// GET METHODS //

		function get_cd_id() {
			return $this->cd_id;
		}

		function get_cd_ten() {
			return $this->cd_ten;
		}
		
		function get_cd_mota() {
			return $this->cd_mota;
		}

		function get_cd_dmg_nckh() {
			return $this->cd_dmg_nckh;
		}

		function get_cd_dmg_giangday() {
			return $this->cd_dmg_giangday;
		}

		function get_is_delete() {
			return $this->is_delete;
		}
	}
?>