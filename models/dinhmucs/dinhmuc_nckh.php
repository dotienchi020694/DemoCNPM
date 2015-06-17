<?php
	class DinhMuc_NCKH {
		var $dmnckh_id;
                var $hv_id;
		var $dmnckh_sogio;
		var $dmnckh_mota;
		var $is_delete;

		function __construct() {

		}

		// SET METHODS //

		function set_dmnckh_id($dmnckh_id) {
			$this->dmnckh_id = $dmnckh_id;
		}
                
                function set_hv_id($hv_id)
                {
                    $this->hv_id=$hv_id;
                }
		function set_dmnckh_sogio($dmnckh_sogio) {
			$this->dmnckh_sogio = $dmnckh_sogio;
		}
		
		function set_dmnckh_mota($dmnckh_mota) {
			$this->dmnckh_mota = $dmnckh_mota;
		}

		function set_is_delete($is_delete) {
			$this->is_delete = $is_delete;
		}

		// GET METHODS //

		function get_dmnckh_id() {
			return $this->dmnckh_id;
		}
                
                function get_dmnckh_hv_id(){
                    return $this->hv_id;
                }
		function get_dmnckh_sogio() {
			return $this->dmnckh_sogio;
		}
		
		function get_dmnckh_mota() {
			return $this->dmnckh_mota;
		}

		function get_is_delete() {
			return $this->is_delete;
		}
	}
?>