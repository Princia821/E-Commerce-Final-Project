<?php

require_once("../classes/cart_class.php");

     
    // method to get the IP adress of the client
    function getRealIpAddr(){
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
        $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

   //method to insert into the cart
    function insertServiceIntoCart_ctr($sid, $ipadd, $cid, $qty){
        $cart_instance = new cart_class();
        return $cart_instance->insertServiceIntoCart_cls($sid, $ipadd, $cid,$qty);
    }

    //for customers who haven't logged in. //ALL USERS MUST LOGIN TO BE ALLOWED TO ADD TO CART
    function insertServiceIntoCartNull_ctr($sid, $ipadd, $qty){
        $cart_instance = new cart_class();
        return $cart_instance->insertServiceIntoCartNull_cls($sid, $ipadd, $qty);
    }

    //check for duplicate
    //logged in customers
    function checkDuplicate_ctr($sid, $cid){
        $cart_instance = new cart_class();
        return $cart_instance->checkDuplicate_cls($sid, $cid);
    }

    //not logged in customers
    function checkDuplicateNull_ctr($sid, $ipadd){
        $cart_instance = new cart_class();
        return $cart_instance->checkDuplicateNull_cls($sid, $ipadd);
    }
    
    //display cart
    //logged in customers
    function displayCart_ctr($cid){
        $cart_instance = new cart_class();
        return $cart_instance->displayCart_cls($cid);
    }

    //not logged in customers
    function displayCartNull_ctr($ipadd){
        $cart_instance = new cart_class();
        return $cart_instance->displayCartNull_cls($ipadd);
    }

    //not logged in customers
    function updateCartNull_ctr($ipadd, $sid, $qty){
        $cart_instance = new cart_class();
        return $cart_instance->updateCartNull_cls($ipadd, $sid, $qty);
    }

    //delete from cart
    //logged in customers
    function deleteCart_ctr($cid,$sid){
        $cart_instance = new cart_class();
        return $cart_instance->deleteCart_cls($cid,$sid);
    }

    //not logged in customers
    function deleteCartNull_ctr($ipadd, $sid){
        $cart_instance = new cart_class();
        return $cart_instance->deleteCartNull_cls($ipadd, $sid);
    }

    //get cart total
    //logged in customers
    function cartValue_ctr($cid){
        $cart_instance = new cart_class();
        return $cart_instance->cartValue_cls($cid);
    }

    //not logged in customers
    function cartValueNull_ctr($ipadd){
        $cart_instance = new cart_class();
        return $cart_instance->cartValueNull_cls($ipadd);
    }

    function appointments_ctr(){
        $cart_instance = new cart_class();
        return $cart_instance->appointments_cls(); 
    }

    function emptyCart_ctr($cid){
        $cart_instance = new cart_class();
        return $cart_instance->emptyCart_cls($cid);
    }

    function addPayment_ctr($amt, $cid, $appo_id, $currency, $pay_date){
        $cart_instance = new cart_class();
        return $cart_instance->addPayment_cls($amt, $cid, $appo_id, $currency, $pay_date);
    }
    //select all payments
    function selectPayments_ctr(){
        $cart_instance = new cart_class();
        return $cart_instance->selectPayments_cls();
    }
 
?>