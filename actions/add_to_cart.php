<?php
require("../controllers/cart_controller.php");
require("../controllers/calendar_controller.php");

    //grab get data from links
    $sid = $_POST['sid'];
    $ipadd = $_POST['ipadd'];
    $cid = $_POST['cid'];
    $qty = $_POST['qty'];
    $appo = $_POST['appointment'];

    echo $appo;
    
    //check for log in
    if (empty($cid)){

        $isDuplicate = checkDuplicateNull_ctr($sid, $ipadd);
       
        //check if user has already added a service to the cart
        if (!empty($isDuplicate)){ 
            
            $qty=$isDuplicate['qty']+1;
            updateCartNull_ctr($ipadd, $sid, $qty);
            insertAppointment($appo,$cid, $sid); 
            
            echo "<script>
            alert('Service added to cart Successfully');
            window.location.href = '../views/shop.php';
            </script>";
            
        }
        else{
            
            // add to cart  for a user who is not logged in
            $insertIntoCart = insertServiceIntoCartNull_ctr($sid,$ipadd,$qty);
            insertAppointment($appo,$cid, $sid);
            
            if ($insertIntoCart){
                echo "<script>
                window.location.href='../views/shop.php';
                alert('Service Added to cart succesfully');
                </script>";
            }else{
                echo "<script>
                window.location.href='../views/shop.php';
                alert('Service could not be added to cart');
                </script>"; 
            }
        }
    }else{
       //check if user has already added a service to the cart
        $isDuplicate = checkDuplicate_ctr($sid, $cid);
        if ($isDuplicate){

            $qty=$isDuplicate['qty']+1;
            updateCart_ctr($cid, $sid, $qty);
            insertAppointment($appo,$cid, $sid);
            
            echo "<script>
            alert('Service added to cart Successfully');
            window.location.href = '../views/shop.php';
            </script>";

        }else{
            
            // add service to the cart
            $insertIntoCart = insertServiceIntoCart_ctr($sid, $ipadd, $cid, $qty);
            insertAppointment($appo,$cid, $sid);

            if ($insertIntoCart){
                echo "<script>
                window.location.href='../views/shop.php';
                alert('Service Added to cart succesfully');
                </script>";
            }else{
                echo "<script>
                // window.location.href='../views/shop.php';
                alert('Service could not be added to cart');
                </script>";
            }
         }
    }
?> 