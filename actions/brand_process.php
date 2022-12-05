<?php
require('../controllers/service_controller.php');

if(isset($_POST['addbrand'])){
    
    $name = $_POST['brandname'];
   
    $result = addBrand_ctr($name);

    if($result){
        echo '<script> alert("Brand Added succesfully!")
        window.location.href="../admin/brand.php"
        
        </script>';
    } 
    else{
        echo '<script> alert("Failed to add brand!")
        window.location.href="../admin/brand.php"
        </script>';
    } 

}

//delete Brand
if(isset($_GET['deleteBrandID'])){
    $id = $_GET['deleteBrandID'];

    $result = deleteBrand_ctr($id); 
    
    if($result){
        echo '<script> alert("Brand deleted succesfully!")
        window.location.href="../admin/brand.php"
        </script>';
    }
    else {
        echo '<script> alert("Could not deleted brand!")
        window.location.href="../admin/brand.php"
        </script>';
        }


}


// Update Brand
if(isset($_POST['updatebrand'])){
   
    $name = $_POST['brandname'];
    $id = $_POST['brandid'];

    $result = updateBrand_ctr($id, $name);

    if($result){echo '<script> alert("Brand updated succesfully!")
        window.location.href="../admin/brand.php"
        </script>';}
    else {
        echo '<script> alert("Failed to update brand!")
        window.location.href="../admin/brand.php"
        </script>';
    }
}

?>