<?php
	class User {
		var $u_id;
		var $u_name;
		var $u_password;
		var $r_id;
		var $gv_id;
		var $u_trangthai;
		var $is_delete;

		function __construct() {

		}

		// SET METHODS //

		function set_u_id($u_id) {
			$this->u_id = $u_id;
		}

		function set_u_name($u_name) {
			$this->u_name = $u_name;
		}

		function set_u_password($u_password) {
			$this->u_password = $u_password;
		}

		function set_r_id($r_id) {
			$this->r_id = $r_id;
		}

		function set_gv_id($gv_id) {
			$this->gv_id = $gv_id;
		}

		function set_u_trangthai($u_trangthai) {
			$this->u_trangthai = $u_trangthai;
		}

		function set_is_delete($is_delete) {
			$this->is_delete = $is_delete;
		}

		// GET METHODS //

		function get_u_id() {
			return $this->u_id;
		}

		function get_u_name() {
			return $this->u_name;
		}

		function get_u_password() {
			return $this->u_password;
		}

		function get_r_id() {
			return $this->r_id;
		}

		function get_gv_id() {
			return $this->gv_id;
		}

		function get_u_trangthai() {
			return $this->u_trangthai;
		}

		function get_is_delete() {
			return $this->is_delete;
		}
	}
?>