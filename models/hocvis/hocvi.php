<?php
	class Hocvi {
		var $hv_id;
		var $hv_ten;
		var $hv_mota;
		var $is_delete;

		function __construct() {

		}

		// SET METHODS //

		function set_hv_id($hv_id) {
			$this->hv_id = $hv_id;
		}

		function set_hv_ten($hv_ten) {
			$this->hv_ten = $hv_ten;
		}
		
		function set_hv_mota($hv_mota) {
			$this->hv_mota = $hv_mota;
		}

		function set_is_delete($is_delete) {
			$this->is_delete = $is_delete;
		}

		// GET METHODS //

		function get_hv_id() {
			return $this->hv_id;
		}

		function get_hv_ten() {
			return $this->hv_ten;
		}
		
		function get_hv_mota() {
			return $this->hv_mota;
		}

		function get_is_delete() {
			return $this->is_delete;
		}
	}
?>