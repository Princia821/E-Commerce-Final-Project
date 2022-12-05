<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>letsheal</title>
   
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Default stylesheets-->
    <link href="../assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="../assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="../assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="../assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="../assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="../assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="../assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="../assets/css/colors/default.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    
    
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top " role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="#">letsheal</a> 
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li ><a  href="../views/shop.php" >Home</a> 
                <li class= "dropdown"><a  class="dropdown-toggle" href="./shop.php" >services</a>
                
                <ul class="dropdown-menu">

                <?php 
                $categories=displayCategories_ctr(); 

                foreach($categories as $cat){?>
                    
                      <li><a href="../views/service.php?cat= <?= $cat['cat_id']?> "><?=$cat['cat_name']?></a></li>
                
                <?php }?>
                </ul>
                </li>

                <li class= "dropdown"><a  class="dropdown-toggle" href="./shop.php" ><i class="fa fa-user" aria-hidden="true"></i> My Account</a>
                  <ul class="dropdown-menu">
                                     
                    <?php if(isset($_SESSION['user_id'])) {
                            if(($_SESSION['user_role']) == 0){?>
                              <li ><a  href="../admin/index.php" >Dashboard</a></li>
                              <li><a href="../login/logout.php">Logout</a></li>
                              <?php } else{?>
                    
                                <li><a href="../login/logout.php">Logout</a></li>
                                
                            <?php }
                            
                          }else{?>
                              <li><a href="../login/login.php">Login</a></li>
                              <li><a href="../login/register.php">register</a></li>
                           
                             <?php }?>
                    </ul>
                </li>

                <li><a  href="cart.php" ><i class="fa fa-shopping-cart" style="font-size:20px"></i></a> </li>
                
          </div>
        </div>
      </nav>