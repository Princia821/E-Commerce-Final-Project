<?php
require_once("../controllers/service_controller.php");


if(isset($_POST['addservice'])){
    //get service info inputs
    $name = $_POST['sname'];
    $price = $_POST['sprice'];
    $cat = $_POST['scat'];
    $brand = $_POST['sbrand'];
    $desc = $_POST['sdesc'];
    $keyword = $_POST['skeyword'];
    
    //image upload
    $targetDir="../images/services/";
    $fileName=basename($_FILES['img']['name']);
    $targetFilePath=$targetDir.$fileName;
    $fileType=strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $tempname=$_FILES['img']['tmp_name'];

     
    //image formats allowed
 
    if ($fileType == "jpg" || $fileType == "png" || $fileType == "jpeg"){
        $image=$targetFilePath;
       
        $upload=move_uploaded_file($tempname,$targetFilePath);
        
        
        if($upload){
            //insert service in the service table
            $result= addService_ctr($cat, $brand, $name, $price, $desc, $targetFilePath, $keyword);
        
            if($result){
                header("Location: ../admin/services.php");
            }
            else{
               
               header("Location: ../admin/addservice.php");
            }
            
            }else{
                echo "Image Failed to Upload";

                }
    }  
}

?>