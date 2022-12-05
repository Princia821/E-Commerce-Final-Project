<?php
require_once("../controllers/cart_controller.php");

session_start();
// deleting a service from the cart
if(isset($_GET['deleteid'])){

    $sid = $_GET['deleteid'];
    $ipadd = getRealIpAddr();
    if(isset($_SESSION['user_id'])){
       $cid = $_SESSION['user_id'];
        $delete = deleteCart_ctr($cid,$sid);
        if($delete){
            header("location: ../views/cart.php");
        }else{
            echo "something went wrong";
        }

    }else{
       $delete = deleteCartNull_ctr($ipadd,$sid); 
        if($delete){
            header("location: ../views/cart.php");
        }else{
            echo "something went wrong";
        }
    }

}else{
    header("location:../views/shop.php");
}

?>