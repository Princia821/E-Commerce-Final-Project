<?php
require('../controllers/service_controller.php');
require('../controllers/cart_controller.php');

session_start();

if(!isset($_SESSION['user_id'])){
  $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

  $_SESSION['qty']="";
  $_SESSION['desc']="";
  
}

include_once('menu.php');
?>
<div class="main">
  <section class="module">
    <div class="container"> 
      <?php
      $service=select_one_service_ctr($_GET['id']);
      $cat=$service['service_cat'];
      $price=$service['service_price'];
      $id=$_GET['id']; 
        
      $ipadd=getRealIpAddr();
        if(isset($_SESSION['user_id'])) {
          $cid=$_SESSION['user_id'];
        }
        else{$cid=null;}
      
        $qty=1;
      
      ?>
      <div class="row">
        <div class="col-sm-6 mb-sm-40"><a class="gallery"><img src=<?= $service['service_image']; ?> alt="Single service Image"/></a>
          <div class="row" style= "padding-top:5%; "> 
           
            <div class="cart" style="padding-top:5%">
              <div>
                  <h4>Choose Appointment Date</h4>

                  <form action="../actions/add_to_cart.php?sid=" method="POST">
                    <label for="appointment">Date:</label>
                    <input type="date" id="appointment" name="appointment"><br><br>
                    <input type="hidden" value="<?php echo $id; ?>" name="sid"> </input>
                    <input type="hidden" value="<?php echo $ipadd; ?>" name="ipadd"> </input>
                    <input type="hidden" value="<?php echo $cid; ?>" name="cid"> </input>
                    <input type="hidden" value="<?php echo $qty; ?>" name="qty"> </input>
                    <button type="submit" class="btn btn-round btn-b"><span><i class="icon-calendar"></i> &nbsp; Book an Appointment</span></button>
                  </form>
                </div><br><br>
            </div>

          </div>
        </div>
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-12">
              <h1 class="service-title font-alt"><?= $service['service_title']; ?></h1>
            </div>
        </div>
          
        <div class="row mb-20">
          <div class="col-sm-12">
            <div class="price font-alt"><span class="amount"><?= $service['service_price']; ?> GHC</span></div>
          </div>
        </div>

        <div class="row mb-20">
          <div class="col-sm-12">
            <div class="description">
              <p><?= $service['service_desc']; ?></p> 
            </div>
          </div>
        </div> 

    </div>   
  </section> 

<?php include('footer.php');?>