<?php

require('../controllers/service_controller.php'); 
include('../views/menu.php');
?>

      <div class="main">
        <section class="module bg-dark-30" data-background="../assets/images/landing/login.JPG">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
      
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row-center">
              <div class="col-sm-5 col-sm-offset-1 mb-sm-40">
                <h4 class="font-alt">Login</h4>
                <hr class="divider-w mb-10">
                <form class="form" method="post" id='form' action="loginprocess.php" >

                  <div class="form-group">
                    <input class="form-control" type="email" name="email"  placeholder="email" id="email" />
                  </div>

                  <div class="form-group">
                    <input class="form-control" type="password" name="pswd" placeholder="Password" id="pswd" />
                  </div>

                  <div class="form-group">
                    <button class="btn btn-round btn-b" type="submit" name="login" id="button">Login</button>
                  </div>

                  <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>

                </form>
              </div>
    
            </div>
          </div>
        </section>
    <?php include('../views/footer.php')?>
  </body>
</html>