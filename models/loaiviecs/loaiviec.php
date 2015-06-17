<?php
	class Loaiviec {
		var $lv_id;
		var $lv_ten;
		var $lv_mota;
		var $is_delete;

		function __construct() {

		}

		// SET METHODS //

		function set_lv_id($lv_id) {
			$this->lv_id = $lv_id;
		}

		function set_lv_ten($lv_ten) {
			$this->lv_ten = $lv_ten;
		}
		
		function set_lv_mota($lv_mota) {
			$this->lv_mota = $lv_mota;
		}

		function set_is_delete($is_delete) {
			$this->is_delete = $is_delete;
		}

		// GET METHODS //

		function get_lv_id() {
			return $this->lv_id;
		}

		function get_lv_ten() {
			return $this->lv_ten;
		}
		
		function get_lv_mota() {
			return $this->lv_mota;
		}

                function get_is_delete() {
			return $this->is_delete;
		}

		
	}
?>