<?php
	class Namhoc {
		var $nh_id;
		var $nh_ten;

		function __construct() {

		}

		// SET METHODS //

		function set_nh_id($nh_id) {
			$this->nh_id = $nh_id;
		}

		function set_nh_ten($bm_ten) {
			$this->nh_ten = $bm_ten;
		}
		// GET METHODS //

		function get_nh_id() {
			return $this->nh_id;
		}

		function get_nh_ten() {
			return $this->nh_ten;
		}
		
	}
?>