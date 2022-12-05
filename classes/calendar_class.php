<?php

include_once('../settings/db_connect.php'); // THIS WILL CHANGE, USE THE ONES IN THE LAB

// inherit the methods from Connection
class Calendar extends Connection{

	function addAppointment($appo, $cid, $sid){

		$sql = "INSERT INTO `appointments`(`customer_id`, `appointment_date`, `service_id`) VALUES ('$cid','$appo',$sid )";

		return $this->query($sql);
	}
    
}

?>