<?php

require('../controllers/service_controller.php'); 
include('../views/menu.php');
?>

      <div class="main">
        <section class="module bg-dark-30" data-background="../assets/images/Landing/login.jpg"> </section>
        <section class="module">
          <div class="container">
            <div class="row-center">
    
              <div class="col-sm-5">
                <h4 class="font-alt">Register</h4>
                <hr class="divider-w mb-10">
                <form class="form" method="post" name="register"  action="../login/registerprocess.php">

                <div class="form-group">
				        <label for="fname">Full Name</label>
				        <input class="form-control" type="text" placeholder="Full Name" name="fname" id="name">
				        <small id="fullNameError"></small>
			          </div>

                <div class="form-group">
				        <label for="email">Email address</label>
				        <input class="form-control" type="text" name="email" placeholder="email"  id="email">
				        <small id="emailError"></small>
			          </div>

                <div class="form-group">
				        <label for="pswd">Password</label>
				        <input class="form-control" type="password" name="pswd" placeholder="password " id="pswd">
				        <small id="passwordError"></small>
			          </div>

                <div class="form-group">
				        <label for="confpswd">Confirm Password</label>
				        <input class="form-control" type="password" name="confpswd" placeholder="Confirm password" id="confpswd">
				        <small id="confirmPasswordError"></small>
			          </div>

                <div class="form-group">
				        <label for="country">Country</label>
				        <input class="form-control" type="text" name="country" placeholder="country"  id="country">
				        <small id="countryError"></small>
			          </div>

                <div class="form-group">
				        <label for="city">City</label>
				        <input class="form-control" type="text" name="city" placeholder="City" id="city">
				        <small id="cityError"></small>
			          </div>

                <div class="form-group">
				        <label for="contact">Phone number</label>
				        <input class="form-control" type="text" name="contact" placeholder=" your contact" id="contact">
				        <small id="contactError"></small>
                </div>

                  <div class="form-group">
                    <button class="btn btn-block btn-round btn-b" type="submit" name="register" id="button" >Register</button>
                  </div>

                  <p class="login-register-text">Already have an account? <a href="login.php">Login Here</a>.</p>

                </form>
              </div>
            </div>
          </div>
        </section>

    <?php include('../views/footer.php')?>
  </body>
</html>
