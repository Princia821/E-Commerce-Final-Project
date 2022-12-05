<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

require('../controllers/service_controller.php');


if(isset($_POST['updateservice'])){
  
    $name = $_POST['sname'];
    $price = $_POST['sprice'];
    $cat = $_POST['scat'];
    $brand = $_POST['sbrand'];
    $desc = $_POST['sdesc'];
    $keyword = $_POST['skeyword'];
    $id=$_POST['id'];
    $serviceDetails=select_one_service_ctr($id); 

    // check if a new image is being uploaded
    if(!empty($_FILES['img']['name'])){
        $targetDir="../images/services/"; 
        $fileName=basename($_FILES['img']['name']);
        $targetFilePath=$targetDir.$fileName;
        $fileType=strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $tempname=$_FILES['img']['tmp_name'];

     
    //image formats allowed
 
        if ($fileType == "jpg" || $fileType == "png" || $fileType == "jpeg"){
            $image=$targetFilePath;
            //upload file to server
            $upload=move_uploaded_file($tempname,$targetFilePath);
            
            
            if($upload){
                
                $updateService=update_one_service_ctr($id,$cat, $brand, $name, $price, $desc, $targetFilePath, $keyword);
            

                if($updateService) {
                    echo "<script>
                    window.location.href='../admin/services.php';
                    alert('Update Successful');
                    </script>";
                
                }
                
                else {echo "<script>
                window.location.href='../admin/services.php';
                alert('Update Failed');
                </script>";}
        
            }
        }
        
    }

} 

//delete service
if(isset($_GET['deleteID'])){

    $id = $_GET['deleteID'];

    // call the function
    $result = delete_one_service_ctr($id);
    
    if($result == true){
        header("Location: ../admin/services.php");
    }
    else {echo "deletion failed";

    }
}

?>