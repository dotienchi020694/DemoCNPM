<?php
	class Role_db_manager {
		var $db_core;

		function __construct() {
                     $this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Role $new_role) {
			$new_r_ten = $new_role->get_r_ten();			

			$queryCommand = "INSERT INTO qltk_role(r_ten) VALUES ('" . $new_r_ten . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function list_all() {
			$queryCommand = "select * from qltk_role WHERE is_delete=0";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { 
				$arr = array();
				while($row =  mysql_fetch_array($queryResult)) {
				    $arr[] = $row;
				}
				return $arr;
			}
		}

		function delete($r_id) {
			$queryCommand = "UPDATE qltk_role SET is_delete=1 WHERE r_id = " . $r_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit(Role $edit_role) {
			$r_id = $edit_role->get_r_id();
			$new_r_ten = $edit_role->get_r_ten();			

			$queryCommand = "UPDATE qltk_role SET r_ten = '" . $new_r_ten . "' WHERE u_id = " . $u_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}
	}
?>