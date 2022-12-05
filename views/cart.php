<?php
require('../controllers/service_controller.php');
require('../controllers/cart_controller.php');

session_start();

include('menu.php');
?>

<div class="main">
    
  <section class="module">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h1 class="module-title font-alt">Checkout</h1>
        </div>
      </div>
    
      <hr class="divider-w pt-20">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-striped table-border checkout-table">
            <tr>
              <th class="hidden-xs">service</th>
              <th>Description</th>
              <th class="hidden-xs">Price</th>
              <th>sessions</th> 
              <th>Remove session</th>
            </tr>
            
            <?php  
            // getting the details of the cart
              if (isset($_SESSION['user_id'])){
                  $cid = $_SESSION['user_id'];
                  $cart = displayCart_ctr($cid);
                  $checkOutAmt = cartValue_ctr($cid);
                  
              }
            else{
                $ipadd = getRealIpAddr();
                $cart = displayCartNull_ctr($ipadd);
                $checkOutAmt = cartValueNull_ctr($ipadd);
              
            }
          
            foreach ($cart as $session){
            ?>
            
            <tr>  
              <td class="hidden-xs"><a href=<?php echo "single_service.php?id=".$session['s_id'];?>><img src=<?= $session['service_image'];?> alt="therapy session"/></a></td>
              <td>
                <h5 class="service-title font-alt"><?=$session['service_title'];?></h5>
              </td>
              <td class="hidden-xs">
                <h5 class="service-title font-alt"><?=$session['service_price'];?></h5>
              </td>
              <td>
                
              </td>

              <td class="pr-remove"><a href= <?php echo "../actions/cart_process.php?deleteid=".$session['s_id'] ;?> title="Remove"><i class="fa fa-times"></i></a></td>
              
            </tr>
            
              
              <?php }?>  
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 ">
          <div class="form-group">
          <a href='shop.php#services'> <button class="btn btn-lg btn-block btn-round btn-d" type="submit" > <i class="" style="font-size:20px"></i> go back to therapy services</button></a>
          </div>
        </div>
      </div>

      <script> 
        function updatecart(j){
          $.ajax({
            url:'../actions/update_cart.php',
            type:'POST',
            data:{
              'sid':j.getAttribute('data-sid'),
              'cid':j.getAttribute('data-cid'),
              'ipadd':j.getAttribute('data-ipadd'),
              'qty':j.value
            
              },
              success: function(data){
              if(data.success == true){ 
                  setTimeout(function(){
                      location.reload(); 
                  }, 5000); 
              }
            }
           
              
          });
        }
      </script>
      
      <hr class="divider-w">
      <div class="row mt-70">
        <div class="col-sm-5 col-sm-offset-7">
          <div class="shop-Cart-totalbox">
            <h4 class="font-alt">Cart Totals</h4>
            <table class="table table-striped table-border checkout-table">
              <tbody>
      
                <tr class="shop-Cart-totalprice">
                  <th>Total Amount :</th>
                  <td><h5 class="product-title font-alt"><?=$checkOutAmt["Result"];?></h5></td>
                </tr>
              </tbody>
            </table>
            <a class="btn btn-lg btn-block btn-round btn-d" href="payment.php?amount=<?=$checkOutAmt["Result"]?>">Pay to confirm your appointment</a> 
          </div>
        </div>
      </div>
    </div>
  </section>      
</div>

<?php include_once('footer.php');?>
