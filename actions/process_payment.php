<?php

require('../controllers/cart_controller.php');
session_start();

$curl = curl_init();

// set options for the client url 
curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.paystack.co/transaction/verify/{$_GET['reference']}",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd",
    "Cache-Control: no-cache",
),
));


$response = curl_exec($curl);

$err = curl_error($curl);

curl_close($curl);


$decodedResponse = json_decode($response);


if(isset($decodedResponse->data->status) && $decodedResponse->data->status == 'success'){
    // get form values
    $email = $_GET['email'];
    $cid=$_SESSION['user_id'];
    $appointment_date=date("Y/m/d");
    $ord_stat='pending';

    if($addorder){
      
        $amount=cartValue_ctr($cid); 

        // insert payment details
        $addPayment=addPayment_ctr($amount['Result'],$cid,$recent['recent'],"GHC",$appointment_date);
        if($addPayment){
            
            $delete=emptyCart_ctr($cid);
            if($delete){
                echo "payment verified successfully and insertion complete";
                
            }
        }else{
            echo"payment failed";
        }
    }
    
}else{
   
    echo $response;
}

?>