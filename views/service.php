<?php
require('../controllers/service_controller.php');
require('../controllers/cart_controller.php');
session_start();
include('menu.php');

$cat = $_GET['cat']; 
$category = select_one_category_ctr($cat);

?>

<div class="main">
  <section class="module-small">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt"><?= $category['cat_name'] ?></h2>
        </div>

        <form class="form-inline" method="get" action="../actions/search.php">
          <input class="form-control" type="search" placeholder="Search" name="searchTerm">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search"><i class="fa fa-search"></i></button>
        </form>
      </div>

      <div class="row multi-columns-row">
        <?php

        $services = select_by_category_ctr($cat);
        $ipadd = getRealIpAddr();

        if (isset($_SESSION['user_id'])) {
          $cid = $_SESSION['user_id'];
        } else {
          $cid = null;
        }
        $qty = 1;
        foreach ($services as $service) {
          $id = $service['service_id'];

        ?>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="shop-item">
            <h4 class="shop-item-title font-alt"><a href="single_service.php?id=<?= $id; ?>"><?= $service['service_title'] ?></a></h4 >GHC <?= $service['service_price'] ?>
              <div class="shop-item-image"><img src=<?php echo $service['service_image']; ?>>
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
      </div>
      <div class="row mt-30">
        <div class="col-sm-12 align-center"><a class="btn btn-b btn-round" href="shop.php#services">See all services</a></div>
      </div>
    </div>
  </section>
</div>

<?php include('../views/footer.php'); ?>