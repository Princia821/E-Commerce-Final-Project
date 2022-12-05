<?php

require('../classes/customer_class.php');

function addCustomer_ctr($name, $email, $password,$country,$city,$contact,$role){
      // create an instance of the customer class
    $customer_instance = new customer_class(); 
    
    return $customer_instance->addCustomer_cls($name, $email, $password,$country,$city,$contact,$role);
}

function select_one_customer_ctr($email){
   
    $customer_instance = new customer_class();
    
    return $customer_instance->select_one_customer_cls($email);
}

function selectCustomer_ctr($id){
  
    $customer_instance = new customer_class();
  
    return $customer_instance->selectCustomer_cls($id);
}

function select_all_customers_ctr(){
  
    $customer_instance = new customer_class();
  
    return $customer_instance->select_all_customers_cls();
}

function update_one_customer_ctr($id,$name, $email, $password,$country,$city,$contact,$image,$role){
    
    $customer_instance = new customer_class();
   
    return $customer_instance->update_one_customer_cls($id,$name, $email, $password,$country,$city,$contact,$image,$role);
}

function delete_one_customer_ctr($id){
    
    $customer_instance = new customer_class();
   
    return $customer_instance->delete_one_customer_cls($id);
}

?>