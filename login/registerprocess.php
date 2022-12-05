<?php
require('../controllers/customer_controller.php');

if(isset($_POST['register'])){
    
    // retrieve the deatils of the customer
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $pswd = password_hash($_POST["pswd"], PASSWORD_DEFAULT);
    $confpswd = password_hash($_POST["confpswd"], PASSWORD_DEFAULT);
    $country = $_POST['country'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $role = 1;


   if ($_POST['pswd'] == $_POST['confpswd']){ 

        $result = addCustomer_ctr($name, $email, $pswd, $country, $city, $contact, $role);
    
        if($result == true){
            echo"<script>alert('User Registration Completed!')</script>";
            header("Location:login.php");
        }
        else{
            echo "<script>alert('regstration failed!')</script>";
        }
} 

}

?>