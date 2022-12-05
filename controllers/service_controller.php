<?php

require('../classes/service_class.php');

function addService_ctr($cat, $brand, $title,$price,$desc,$image,$keywords){
    // create an instance of the service class
    $service_instance = new Service_class(); 
    return $service_instance->addService_cls($cat, $brand, $title,$price,$desc,$image,$keywords);
}

function delete_one_service_ctr($id){
 
    $service_instance = new Service_class();
    return $service_instance->delete_one_service_cls($id);
}

function update_one_service_ctr($id, $cat, $brand, $title,$price,$desc,$image,$keywords){
    
    $service_instance = new Service_class();
    return $service_instance->update_one_service_cls($id, $cat, $brand, $title,$price,$desc,$image,$keywords);
}

function select_all_services_ctr(){
   
    $service_instance = new Service_class();
    return $service_instance->select_all_services_cls();
}

function select_one_service_ctr($id){
    
    $service_instance = new Service_class(); 
    return $service_instance->select_one_service_cls($id);
}
// selecting a product by its brand
function select_by_category_ctr($cat){
    $service_instance = new Service_class();
    return $service_instance->select_by_category_cls($cat); 
} 

function search_ctr($name){
    $service_instance=new Service_class();
    return $service_instance->search_cls($name);
}


function addCategory_ctr($cat_name){
 
    $service_instance = new Service_class();
   
    return $service_instance->addCategory_cls($cat_name);
}

function updateCategory_ctr($id, $name){
    
    $service_instance = new Service_class();
    return $service_instance->updateCategory_cls($id, $name);
}

function displayCategories_ctr(){
  
    $service_instance = new Service_class();
    return $service_instance->displayCategories_cls();      
}

function select_one_category_ctr($id){
   
    $service_instance = new Service_class();
    return $service_instance->select_one_category_cls($id);
}

function deleteCategory_ctr($id){ 
    $service_instance = new Service_class();

    return $service_instance->deleteCategory_cls($id);
}


function  addBrand_ctr($name){
   
    $service_instance = new Service_class();
    return $service_instance->addBrand_cls($name);
}

function updateBrand_ctr($id, $name){
    
    $service_instance = new Service_class();
    return $service_instance->updateBrand_cls($id, $name);
}

function displayBrands_ctr(){
  
    $service_instance = new Service_class();
    return $service_instance->displayBrands_cls();      
}

function select_one_brand_ctr($id){
  
    $service_instance = new Service_class();
    return $service_instance->select_one_brand_cls($id);
}

function deleteBrand_ctr($id){

    $service_instance = new Service_class();
    return $service_instance->deleteBrand_cls($id);
}

?>