<?php
	class Khoa {
		var $k_id;
		var $k_ten;
		var $k_makhoa;
		var $k_email;
		var $k_sdt;
		var $k_mota;
		var $is_delete;

		function __construct() {

		}

		// SET METHODS //

		function set_k_id($k_id) {
			$this->k_id = $k_id;
		}

		function set_k_ten($k_ten) {
			$this->k_ten = $k_ten;
		}

		function set_k_makhoa($k_makhoa) {
			$this->k_makhoa = $k_makhoa;
		}

		function set_k_email($k_email) {
			$this->k_email = $k_email;
		}

		function set_k_sdt($k_sdt) {
			$this->k_sdt = $k_sdt;
		}
		
		function set_k_mota($k_mota) {
			$this->k_mota = $k_mota;
		}

		function set_is_delete($is_delete) {
			$this->is_delete = $is_delete;
		}

		// GET METHODS //

		function get_k_id() {
			return $this->k_id;
		}

		function get_k_ten() {
			return $this->k_ten;
		}

		function get_k_makhoa() {
			return $this->k_makhoa;
		}

		function get_k_email() {
			return $this->k_email;
		}

		function get_k_sdt() {
			return $this->k_sdt;
		}
		
		function get_k_mota() {
			return $this->k_mota;
		}

		function get_is_delete() {
			return $this->is_delete;
		}

		
	}
?>