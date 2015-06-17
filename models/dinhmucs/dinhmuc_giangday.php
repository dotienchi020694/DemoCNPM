<?php
	class DinhMuc_GiangDay {
		var $dmgd_id;
		var $dmgd_sogio;
		var $dmgd_mota;
		var $is_delete;

		function __construct() {

		}

		// SET METHODS //

		function set_dmgd_id($dmgd_id) {
			$this->dmgd_id = $dmgd_id;
		}

		function set_dmgd_sogio($dmgd_sogio) {
			$this->dmgd_sogio = $dmgd_sogio;
		}
		
		function set_dmgd_mota($dmgd_mota) {
			$this->dmgd_mota = $dmgd_mota;
		}

		function set_is_delete($is_delete) {
			$this->is_delete = $is_delete;
		}

		// GET METHODS //

		function get_dmgd_id() {
			return $this->dmgd_id;
		}

		function get_dmgd_sogio() {
			return $this->dmgd_sogio;
		}
		
		function get_dmgd_mota() {
			return $this->dmgd_mota;
		}

		function get_is_delete() {
			return $this->is_delete;
		}
	}
?>