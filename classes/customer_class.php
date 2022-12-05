<?php

include_once('../settings/db_connect.php'); 

// inherit the methods from Connection
class customer_class extends Connection{


	function addCustomer_cls($name, $email, $password,$country,$city,$contact,$role){
		
		$sql = "INSERT INTO `customer`( `customer_name`, `customer_email`, `customer_pass`, 
		`customer_country`, `customer_city`, `customer_contact`, `user_role`) 
        VALUES ('$name','$email','$password','$country','$city','$contact','$role')"; 

		return $this->query($sql); 
	}

	function select_one_customer_cls($email){
		//select customer using their email
		$sql = "SELECT * FROM `customer` WHERE `customer_email`='$email'";

		return $this->fetchOne($sql);
	}

	//select customer using their id
	function selectCustomer_cls($id){
		// return associative array or false
		$sql = "SELECT * FROM `customer` WHERE `customer_id`='$id'";

		return $this->fetchOne($sql);
	}

	function select_all_customers_cls(){
		// return array or false
		$sql = "SELECT * FROM `customer`";

		return $this->fetch($sql);
	}

	function update_one_customer_cls($id,$name, $email, $password,$country,$city,$contact,$image,$role){
		// return true or false
		$sql = "UPDATE `customer` SET `customer_name`='$name',`customer_email`='$email',`customer_pass`='$password',
		`customer_country`='$country',`customer_city`='$city',`customer_contact`='$contact' WHERE `customer_id`='$id'";

		return $this->query($sql); 
	}

	function delete_one_customer_cls($id){
		
		$sql = "DELETE FROM `customer` WHERE `customer_id`='$id'";

		return $this->query($sql); 
	}

}

?>