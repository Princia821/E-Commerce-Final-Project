<?php
ob_start();

session_start(); 

$current_file = $_SERVER['SCRIPT_NAME']; 

//funtion to check for login
function check_login(){
	
	if (!isset($_SESSION['user_id'])) 
	{
		
    	header('Location: ../login/login.php');
	}
	else{
		return true;
	}
}

//function to check for permission 
function check_permission(){
	
	if (isset($_SESSION['user_role'])) {
		//assign session to an array
		return $_SESSION['user_role'];
	}
}

function check_error(){
	if(isset($_SESSION['error'])){
		$message = $_SESSION['error'];
		echo "<script>alert('$message');</script>";
		unset($_SESSION['error']);

	}
}

?>