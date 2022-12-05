<?php

include_once('../settings/db_connect.php'); 

// inherit the methods from Connection
class Service_class extends Connection{

	function addService_cls($cat, $brand, $title,$price,$desc,$image,$keywords){
		
		$sql = "INSERT INTO `services`(`service_cat`, `service_brand`, `service_title`, `service_price`, `service_desc`, `service_image`, `service_keywords`) 
        VALUES ('$cat','$brand','$title','$price','$desc','$image','$keywords')"; 

		return $this->query($sql);
	}
    
	function delete_one_service_cls($id){
		
		$sql = "DELETE FROM `services` WHERE `service_id` = '$id'"; 
		return $this->query($sql);  
	}

	function update_one_service_cls($id, $cat, $brand, $title,$price,$desc,$image,$keywords){
		
		$sql = "UPDATE `services` SET `service_id`='$id',`service_cat`='$cat',`service_brand`='$brand',`service_title`='$title',
        `service_price`='$price',`service_desc`='$desc',`service_image`='$image',`service_keywords`='$keywords' WHERE `service_id` = '$id'";

		return $this->query($sql);
	}

    function select_all_services_cls(){
		
		$sql = "SELECT * FROM `services`";  

		return $this->fetch($sql);
	}
	
	function select_one_service_Cls($id){
		
		$sql = "SELECT * FROM `services` WHERE service_id='$id'"; 
		return $this->fetchOne($sql); 
	}

	function search_cls($name){
		$sql = "SELECT * FROM services WHERE service_title LIKE '%$name%' OR service_keywords LIKE '%$name%'";
		return $this->fetch($sql);
	}

	function select_by_category_cls($cat){
	
	$sql = "SELECT * FROM `services` WHERE service_cat='$cat'";
		return $this->fetch($sql);
	}


	//adding a category 
	function addCategory_cls($cat_name){
		
		$sql = "INSERT INTO `categories`(`cat_name`) VALUES ('$cat_name')"; 
		return $this->query($sql);
	}

	function updateCategory_cls($id, $name){
		
		$sql = "UPDATE `categories` SET `cat_name`='$name' WHERE cat_id = '$id'";
		return $this->query($sql); 
	}

	function displayCategories_cls(){
		$sql = "SELECT * FROM `categories`";
        return $this->fetch($sql);      
    }

	function select_one_category_cls($id){
		
		$sql = "SELECT * FROM `categories` WHERE cat_id = '$id'"; 
		return $this->fetchOne($sql);
	}

	function deleteCategory_cls($id){
		
		$sql = "DELETE FROM `categories` WHERE cat_id = '$id'"; 
		return $this->query($sql);
	}


    function  addBrand_cls($name){
	
		$sql = "INSERT INTO `brands`(`brand_name`) VALUES ('$name')";  
		return $this->query($sql);
	}

    function updateBrand_cls($id, $name){
		
		$sql = "UPDATE `brands` SET `brand_name`='$name' WHERE brand_id = '$id'";
		return $this->query($sql); 
	}

	function displayBrands_cls(){

		$sql = "SELECT * FROM `brands`"; 
        return $this->fetch($sql);      
    }

	function select_one_brand_cls($id){
		
		$sql = "SELECT * FROM `brands` WHERE brand_id='$id'";
		return $this->fetchOne($sql); 
	}

    function deleteBrand_cls($id){
	
		$sql = "DELETE FROM `brands` WHERE brand_id = '$id'"; 
		return $this->query($sql);
	}
	
}

?>