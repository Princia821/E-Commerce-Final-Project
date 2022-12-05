<?php

require('../controllers/cart_controller.php');
session_start();
// initialize a client url which we will use to send the reference to the paystack server for verification
$curl = curl_init();

// set options for the curl session insluding the url, headers, timeout, etc
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

// get the response and store
$response = curl_exec($curl);
// if there are any errors
$err = curl_error($curl);
// close the session
curl_close($curl);

// convert the response to PHP object
$decodedResponse = json_decode($response);

if(isset($decodedResponse->data->status) && $decodedResponse->data->status == 'success'){
    
    $email = $_GET['email'];
    $cid=$_SESSION['user_id'];
    $appointment_date=date("Y/m/d");
    $sid=$_GET['sid']; 
    $qty=$_GET['qty'];
    $amount=$_GET['amount'];

        // insert payment details
        $addPayment=addPayment_ctr($amount,$cid,$recent['recent'],"GHC",$appointment_date);
        if($addPayment){ 
            echo "payment verified successfully ";
  
        }else{
            echo"payment failed";
        }
    //}
    
}else{
    // if verification failed
    echo $response;
}

?>