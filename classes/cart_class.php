<?php
//connect to database class
include_once("../settings/db_connect.php"); 

class cart_class extends Connection
{
    //method to insert into the cart
    public function insertServiceIntoCart_cls($sid, $ipadd, $cid, $qty){

        $sql = "INSERT INTO `cart`(`s_id`, `ip_add`, `c_id`, `qty`) VALUES ('$sid', '$ipadd', '$cid', '$qty')";
        return $this->query($sql);
    }

    //for customers who haven't logged in.
    public function insertServiceIntoCartNull_cls($sid, $ipadd,$qty){

        $sql = "INSERT INTO `cart`(`s_id`, `ip_add`,`c_id`, `qty`) VALUES ('$sid', '$ipadd',NULL, '$qty')";
        return $this->query($sql);
    }

    //check for duplicate
    //logged in customers
    public function checkDuplicate_cls($sid, $cid){
        $sql = "SELECT * FROM `cart` WHERE `s_id`='$sid' AND `c_id`='$cid'";
        return $this->fetchOne($sql);
    }

    //not logged in customers
    public function checkDuplicateNull_cls($sid, $ipadd){
        $sql = "SELECT * FROM `cart` WHERE `ip_add`='$ipadd' AND `s_id`='$sid'";
        return $this->fetchOne($sql);
    }

    //display cart
    //logged in customers
    public function displayCart_cls($cid){
        $sql = "SELECT `cart`.`s_id`, `cart`.`c_id`, `cart`.`qty`, `services`.`service_title`, `services`.`service_price`, `services`.`service_image` FROM `cart`
        JOIN `services` on (`cart`.`s_id` = `services`.`service_id`)
        WHERE `cart`.`c_id` = '$cid'";
        //run the query
        return $this->fetch($sql);
    }

    //not logged in customers
    public function displayCartNull_cls($ipadd){
        $sql = "SELECT `cart`.`s_id`, `cart`.`ip_add`, `cart`.`qty`, `services`.`service_title`, `services`.`service_price`, `services`.`service_image` FROM `cart`
        JOIN `services` on (`cart`.`s_id` = `services`.`service_id`)
        WHERE `cart`.`ip_add` = '$ipadd'";

        return $this->fetch($sql);
    }

    //delete from cart
    //logged in customers
    public function deleteCart_cls($cid,$pid){
        $sql = "DELETE FROM `cart` WHERE `c_id`='$cid' AND `s_id`='$pid'";

        //run the query
        return $this->query($sql);
    }

    //not logged in customers
    public function deleteCartNull_cls($ipadd, $sid){
        $sql = "DELETE FROM `cart` WHERE `ip_add`='$ipadd' AND `s_id`='$sid'";

        //run the query
        return $this->query($sql);
    }

    //get cart total
    //logged in customers
    public function cartValue_cls($cid){
        $sql="SELECT SUM(`services`.`service_price`*`cart`.`qty`) as Result
        FROM `cart` JOIN `services` ON (`services`.`service_id` = `cart`.`s_id`) WHERE `cart`.`c_id`='$cid'";

        return $this->fetchOne($sql);
    }

    //not logged in customers
    public function cartValueNull_cls($ipadd){
        $sql="SELECT SUM(`services`.`service_price`*`cart`.`qty`) as Result
        FROM `cart` JOIN `services` ON (`services`.`service_id` = `cart`.`s_id`) WHERE `cart`.`ip_add`='$ipadd'";

        return $this->fetchOne($sql);
    } 

    //function to get all appointments in the database
    public function appointments_cls(){
        $sql="SELECT * FROM `appointments` inner join customer on appointments.customer_id = customer.customer_id 
        inner join services on appointments.service_id = services.service_id  ORDER BY appointments.appointment_date DESC";
        return $this->fetch($sql);
    }
    //function to delete the cart of a user
    public function emptyCart_cls($cid){
        $sql = "DELETE FROM `cart` WHERE `c_id`='$cid'";
        return $this->query($sql);
    }
    
    // fucntion to add a payment
    public function addPayment_cls($amt, $cid, $appo_id, $currency, $pay_date){
        $sql = "INSERT INTO `payment`(`amt`, `customer_id`, `order_id`, `currency`, `payment_date`) VALUES ('$amt','$cid','$appo_id','$currency','$pay_date')";
        return $this->query($sql);
    }

    //select all payments
    public function selectPayments_cls(){
       $sql="SELECT * FROM `payment` inner join appointments on payment.customer_id = appointments.customer_id  order by payment_date DESC";
        return $this->fetch($sql);
    }
    
}

?>