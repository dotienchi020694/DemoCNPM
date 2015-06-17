<?php
	class Danhmuc_quydoi {
		var $dmqd_id;
		var $lv_id;
		var $dmqd_congvieccuthe;
		var $dmqd_sogio;
		var $dmqd_sodonvi;
		var $dv_id;
		var $dmqd_xacnhan;
		var $dmqd_ghichu;
		var $is_delete;

		function __construct() {

		}

		// SET METHODS //

		function set_dmqd_id($dmqd_id) {
			$this->dmqd_id = $dmqd_id;
		}

		function set_lv_id($lv_id) {
			$this->lv_id = $lv_id;
		}

		function set_dmqd_congvieccuthe($dmqd_cvct) {
			$this->dmqd_congvieccuthe = $dmqd_cvct;
		}

		function set_dmqd_sogio($dmqd_sogio) {
			$this->dmqd_sogio = $dmqd_sogio;
		}
		
		function set_dmqd_sodonvi($dmqd_sodonvi) {
			$this->dmqd_sodonvi=$dmqd_sodonvi;
		}

		function set_dv_id($dv_id) {
			$this->dv_id = $dv_id;
		}

		function set_dmqd_xacnhan($dmqd_xacnhan) {
			$this->dmqd_xacnhan = $dmqd_xacnhan;
		}

		function set_dmqd_ghichu($dmqd_ghichu) {
			$this->dmqd_ghichu = $dmqd_ghichu;
		}

		
		function set_is_delete($is_delete) {
			$this->is_delete = $is_delete;
		}

		// GET METHODS //

		function get_dmqd_id() {
			return $this->dmqd_id;
		}

		function get_lv_id() {
			return $this->lv_id;
		}

		function get_dmqd_congvieccuthe() {
			return $this->dmqd_congvieccuthe;
		}

		function get_dmqd_sogio() {
			return $this->dmqd_sogio;
		}
		
                function get_dmqd_sodonvi(){
                        return $this->dmqd_sodonvi;
                }
		function get_dv_id() {
			return $this->dv_id;
		}

		function get_dmqd_xacnhan() {
			return $this->dmqd_xacnhan;
		}

		function get_dmqd_ghichu() {
			return $this->dmqd_ghichu;
		}

                function get_is_delete() {
			return $this->is_delete;
		}

		
	}
?>