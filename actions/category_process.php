<?php

require('../controllers/service_controller.php');

if(isset($_POST['addcat'])){
   
    $name = $_POST['catname'];
   
    $result = addCategory_ctr($name);

    if($result == true){
        echo '<script> alert("Category Added succesfully!")
        window.location.href="../admin/category.php"
        </script>';
    }
    else{
        echo '<script> alert("Category Failed!")
        window.location.href="../admin/category.php"
        </script>';
    };

}

if(isset($_GET['deletecatID'])){

    $id = $_GET['deletecatID'];

    // call the delete category function
    $result = deleteCategory_ctr($id); 

    if($result) {
        echo '<script> alert("Category succesfully deleted!")
        window.location.href="../admin/category.php"
        </script>';
    }
    else {
        echo '<script> alert("Category Failed to delete!")
        window.location.href="../admin/category.php"
        </script>';
    }


}


// Update category
if(isset($_POST['updatecat'])){
  
    $name = $_POST['catname'];
    $id = $_POST['catid'];

    $result = updateCategory_ctr($id, $name); 

    if($result){
        echo '<script> alert("Category updated succesfully!")
        window.location.href="../admin/category.php"
        </script>';
    }
    else {
        echo '<script> alert("Category failed to update!")
        window.location.href="../admin/category.php"
        </script>';
    }
}

?> 