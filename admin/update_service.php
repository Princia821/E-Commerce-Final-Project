<?php
session_start();

if(isset($_SESSION['user_id'])){
  //if user is not admin redirect to home page
  if($_SESSION['user_role'] == 1){
    header("Location:../index.php");
  }
}
else{
  //login first to access admin page
  header("Location:../login/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>letsheal</title> 

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  </nav>
 

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-lightgreen bg-lightgreen my-1 mx-1 mb-1 rounded elevation-4">
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
          <li class="nav-item menu-open">
            
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
           
              <li class="nav-item">
                <a href="./payments.php" class="nav-link ">
                  <i class="fas fa-money-check-alt nav-icon"></i>
                  <p>Payments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./category.php" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./brand.php" class="nav-link ">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./services.php" class="nav-link active">
                  <i class="fas fa-warehouse nav-icon"></i>
                  <p>Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./customers.php" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../login/logout.php" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>

    </div>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper px-3">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Service</h1>
          </div>
        </div>
      </div>
    </div>
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <div class="card text-center w-50 mx-auto">
              <div class="card-header">
                <h3 class="card-title">Update Service</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                
                <?php 
                require_once("../controllers/service_controller.php");
                $id=$_GET['id'];
                $service=select_one_service_ctr($id);
                $categories = displaycategories_ctr();
                $brands =displayBrands_ctr();
                $a_cat=select_one_category_ctr($service['service_cat']);
                $a_brand=select_one_brand_ctr($service['service_brand']);
                ?>

  
   

        <form form method="post" action="../actions/editservice.php" enctype="multipart/form-data">
            <div class="form-group">
            <label>ServiceName</label>
            <input type="text" class="form-control" id="sname" name="sname"value="<?php echo $service['service_title'] ?>">
            </div>
            <div class="form-group">
            <label>Service Price (Ghc)</label>
            <input type="number" class="form-control" id="sprice" name="sprice"value="<?php echo $service['service_price'] ?>">
            </div>
            <div class="form-group">
            <label for="form-scat">Service Category</label>
            <select class="form-control" id="form-scat" name="scat">
            <option value="<?php echo $service['service_cat'] ?>" > <?php echo $a_cat['cat_name'] ?></option>
             <?php
              foreach($categories as $cat){
                  echo "<option value=".$cat['cat_id'].">".$cat['cat_name']."</options>";
              }
            ?>
            </select>
            </div>
            <div class="form-group">
            <label for="pbrand">Service Brand</label>
            <select class="form-control" id="sbrand" name="sbrand">
            <option value="<?php echo $service['service_brand'] ?>" ><?php echo $a_brand['brand_name'] ?></option>
             <?php
              foreach($brands as $brand){
                  echo "<option value=".$brand['brand_id']."> ".$brand['brand_name']."</options>";
              }
            ?>
            </select>
            </div>
            <div class="form-group">
            <label for="pdesc">Service Description</label>
            <input class="form-control" id="sdesc" type="text" name="sdesc" value="<?php echo $service['service_desc'] ?>"></input>
            </div>
          
            <div class="form-group">
            <label for="pimg">Service Image</label>
            <input type="file" class="form-control-file" id="pimg" name="img">
            </div>
            <div class="form-group">
            <label>Service Keyword</label>
            <input class="form-control" type="hidden" name="id" value="<?php echo $service['service_id'] ?>">
            <input type="text" class="form-control" id="skeyword" name="skeyword" value="<?php echo $service['service_keywords'] ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="updateservice">Update Service</button>
        </form>
        
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
        </div>
      
      </div>
    </section>
   
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

</body>
</html>
