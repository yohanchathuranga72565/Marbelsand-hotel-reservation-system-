<?php

	function verify_query($result_set) {

		global $connection;

		if (!$result_set) {
			die("Database query failed: " . mysqli_error($connection));
		}

	}

	function is_email($str){
		return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

	


?>