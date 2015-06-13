<?php
	class Tinhtrang {
		var $tt_id;
		var $tt_ten;
		var $tt_mota;
		var $is_delete;

		function __construct() {

		}

		// SET METHODS //

		function set_tt_id($tt_id) {
			$this->tt_id = $tt_id;
		}

		function set_tt_ten($tt_ten) {
			$this->tt_ten = $tt_ten;
		}
		
		function set_tt_mota($tt_mota) {
			$this->tt_mota = $tt_mota;
		}

		function set_is_delete($is_delete) {
			$this->is_delete = $is_delete;
		}

		// GET METHODS //

		function get_tt_id() {
			return $this->tt_id;
		}

		function get_tt_ten() {
			return $this->tt_ten;
		}
		
		function get_tt_mota() {
			return $this->tt_mota;
		}

		function get_is_delete() {
			return $this->is_delete;
		}
	}
?>