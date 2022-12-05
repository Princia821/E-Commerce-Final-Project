<?php
session_start();

if(isset($_SESSION['user_id'])){
  //if user is not admin redirect to home page
  if($_SESSION['user_role']==1){
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
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-lightgreen bg-lightgreen my-1 mx-1 mb-1 rounded elevation-4">

    <!-- Sidebar -->
    <div class="sidebar bg-lightgreen">
   
 
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
                <a href="../actions/logout.php" class="nav-link">
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
            <h1 class="m-0">Services</h1> 
          </div>
        </div>
      </div>
    </div>
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          
            <div class="ml-2" >
              <a href='addservice.php'><button type='button' class='btn bg-lightblue ml-0 mb-2'>Add Service</button></a>
            </div>
          
          <div class="col-12">
            <div class="card text-center">
              <div class="card-header">
                <h3 class="card-title">All Services</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th> Service</th>
                    <th> Service Name</th> 
                    <th> Edit Service</th>
                    <th> Delete Service</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                    require('../controllers/service_controller.php');
                    $services=select_all_services_ctr(); 
                    if(!empty($services)){
                        foreach($services as $serv){
                            echo 
                            "
                            <tr>
                                <td class='hidden-xs'><img src={$serv['service_image']} width='60' height='50' alt='therapy session' /></td>
                                <td>{$serv['service_title']}</td>
                                <td><a style ='color: blue;' href='update_service.php?id={$serv['service_id']}'>
                                <i class='fa fa-edit'></i></a></td>
                                <td><a style ='color: red;' href='../actions/editservice.php?deleteID={$serv['service_id']}'><i class='fa fa-trash'></i></a></td>
                            </tr>
                            ";
                        }
                    }
                    else{
                        echo 
                        "
                
                        <tr>
                        <td>No  Services Inserted Yet</td>
                        
                        </tr>

                        ";
                    }
                ?>
                </table>
              </div>
            </div>  
          </div> 
        </div>
      </div>
    </section>
 
  </div>
 
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

</div>



<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

</body>

<?php
    if(isset($_SESSION["error_message"])){
        $message = $_SESSION["error_message"];
        echo "<script>
            swal('Error!', '".$message."', 'error');
            </script>";
        unset($_SESSION["error_message"]);  
    } 
    
    if(isset($_SESSION["success_message"])){
        $message = $_SESSION["success_message"];
        echo "<script>
            swal('Done!', '".$message."', 'success');
            </script>";
        unset($_SESSION["success_message"]);
      }  
?>

</html>