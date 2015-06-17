<?php
	class Role {
		var $r_id;
		var $r_ten;		
		var $is_delete;

		function __construct() {

		}

		// SET METHODS //

		function set_r_id($r_id) {
			$this->r_id = $r_id;
		}

		function set_r_ten($r_ten) {
			$this->r_ten = $r_ten;
		}
		
		function set_is_delete($is_delete) {
			$this->is_delete = $is_delete;
		}

		// GET METHODS //

		function get_r_id() {
			return $this->r_id;
		}

		function get_r_ten() {
			return $this->r_ten;
		}

		function get_is_delete() {
			return $this->is_delete;
		}
	}
?>