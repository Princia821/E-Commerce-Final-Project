<?php
require('../controllers/service_controller.php'); 
session_start(); 
include_once('menu.php');
if(!isset($_GET['searchTerm'])){
    header("location:../index.php");
}
?>
      
<div class="main">
  <section class="module-small">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt">Search Results</h2>
        </div>
        
        <form class="form-inline" method="get" >
          <input class="form-control" type="search" placeholder="Search"  name="searchTerm">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search"><i class ="fa fa-search"></i></button>
        </form>
      </div>
  
      <?php  
        $service_name=$_GET['searchTerm']. "%";
        $result=search_ctr($service_name);
        
        if(!empty($result)){
          foreach ($result as $key => $service){
              $id=$service['service_id'];

      ?>

      <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="shop-item">
          <h4 class="shop-item-title font-alt"><a href="single_service.php?id=<?= $id;?>" ><?= $service['service_title']?></a></h2>GHC <?= $service['service_price']?> 
        <br> <br>
            <div class="shop-item-image"><img src=<?php echo $service['service_image'];?> /> 
            </div>

      <?php }} ?>
      
    </div>
  </section>        
</div>
           
<hr class="divider-w">
<?php include('../views/footer.php');?>