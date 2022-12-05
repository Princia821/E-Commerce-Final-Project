<?php 

require('db_cred.php');

class Connection{

	// db connection
	public $db = null;

	public $results = null;


	function connection(){

		// connect to the database
		$this->db = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

		
		if(mysqli_connect_errno()){
			return false;
		}

		return true;

	}

	function query($query){

		// check if the connection was successful
		if($this->connection() == false){
			return false;
		}

		$this->results = mysqli_query($this->db, $query);
		
		if($this->results !=true){
			return false;
		}

		return true;

	}

	function fetch($query){

		// if query executes successfully
		if($this->query($query)) {
			// return all the rows
			return mysqli_fetch_all($this->results, MYSQLI_ASSOC);
		}

		return false;
		
	}

	function fetchOne($query){

		// if query executes successfully
		if($this->query($query)) {
			// return one row
			return mysqli_fetch_assoc($this->results);
		}

		return false;
	}
}

?>