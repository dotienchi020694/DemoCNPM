<?php
	class Bomon {
		var $bm_id;
		var $bm_ten;
		var $bm_mota;
		var $k_id;
		var $is_delete;

		function __construct() {

		}

		// SET METHODS //

		function set_bm_id($bm_id) {
			$this->bm_id = $bm_id;
		}

		function set_bm_ten($bm_ten) {
			$this->bm_ten = $bm_ten;
		}
		
		function set_bm_mota($bm_mota) {
			$this->bm_mota = $bm_mota;
		}

		function set_k_id($k_id) {
			$this->k_id = $k_id;
		}

		function set_is_delete($is_delete) {
			$this->is_delete = $is_delete;
		}

		// GET METHODS //

		function get_bm_id() {
			return $this->bm_id;
		}

		function get_bm_ten() {
			return $this->bm_ten;
		}
		
		function get_bm_mota() {
			return $this->bm_mota;
		}

		function get_k_id() {
			return $this->k_id;
		}

		function get_is_delete() {
			return $this->is_delete;
		}

		
	}
?>