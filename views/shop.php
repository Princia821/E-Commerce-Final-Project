<?php 
require('../controllers/service_controller.php');
require('../controllers/cart_controller.php');
session_start(); 
include('menu.php');
?>

<section class="home-section home-fade home-full-height" id="home">
  <div class="hero-slider">
    <ul class="slides">
      <li class="bg-dark-30 bg-dark shop-page-header" style="background-image:url(&quot;../assets/images/landing/Tbcg.jpg&quot;);">
        <div class="titan-caption">
          <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-1">This is letsheal</div> 
            <div class="font-alt mb-30 titan-title-size-3"> you can find all therapy services at letsheal</div>
            <div class="font-alt mb-40 titan-title-size-1">Your one stop therapy services website</div>
        </div>
      </li>
  
    </ul>
  </div>
</section>

<div class="main">
          
  <section class="module-small" id="services">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt">Our services</h2> 
        </div>

        <form class="form-inline" method="get" action="../actions/search.php">
          <input class="form-control" type="search" placeholder="Search"  name="searchTerm">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search"><i class ="fa fa-search"></i></button>
        </form>
      </div>
      
      <div class="row multi-columns-row">
        
        <?php
         
          $services=select_all_services_ctr();
          
          //GENERATE IP ADDRESS OF THE USER
          $ipadd=getRealIpAddr();
          
          if(isset($_SESSION['user_id'])) {
            $cid=$_SESSION['user_id'];
          }
          else{$cid=null;}
          
          $qty=1;

          $limit = 10; 
       
          foreach ($services as $service){
            $id=$service['service_id'];

        ?>
        
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="shop-item">
          <h4 class="shop-item-title font-alt"><a href="single_service.php?id=<?= $id;?>" ><?= $service['service_title']?></a></h2>GHC <?= $service['service_price']?> 
        <br> <br>
            <div class="shop-item-image"><img src=<?php echo $service['service_image'];?> />
              
            </div>

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
          
          <?php }; ?>

  </section>
<hr class="divider-w">

<?php include('../views/footer.php');?>   
  </section>  
