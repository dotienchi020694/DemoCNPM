<?php
	class DonVi {
		var $dv_id;
		var $dv_ten;
		var $dv_mota;
		var $is_delete;

		function __construct() {

		}

		// SET METHODS //

		function set_dv_id($dv_id) {
			$this->dv_id = $dv_id;
		}

		function set_dv_ten($dv_ten) {
			$this->dv_ten = $dv_ten;
		}
		
		function set_dv_mota($dv_mota) {
			$this->dv_mota = $dv_mota;
		}

		function set_is_delete($is_delete) {
			$this->is_delete = $is_delete;
		}

		// GET METHODS //

		function get_dv_id() {
			return $this->dv_id;
		}

		function get_dv_ten() {
			return $this->dv_ten;
		}
		
		function get_dv_mota() {
			return $this->dv_mota;
		}

                function get_is_delete() {
			return $this->is_delete;
		}

		
	}
?>