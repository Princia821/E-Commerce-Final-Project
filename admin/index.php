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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-lightgreen bg-lightgreen my-1 mx-1 mb-1 rounded elevation-4">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item menu-open">
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link active">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="./payments.php" class="nav-link ">
                  <i class="fas fa-wallet nav-icon"></i>
                  <p>Payments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./category.php" class="nav-link">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./brand.php" class="nav-link ">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./services.php" class="nav-link">
                  <i class="fas fa-toolbox nav-icon"></i>
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
            <h1 class="m-0">Appointments</h1>
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
           <div class="card text-center">
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th class = "text-center"> Appointment_id</th>
                    <th class = "text-center"> Customer_id</th>
                    <th class = "text-center"> Service_name</th>
                    <th class = "text-center"> Appointment_date</th>
                    </tr>

                  </thead>
                  <tbody>

                  <?php
                  require_once("../controllers/cart_controller.php");
                 
                  $appoint=appointments_ctr(); 
                  if(!empty($appoint)){
                      foreach($appoint as $app){  
                     ?>
                         
                          <tr>
                            <!-- s -->
                              <td class = "text-center"> <?=$app['appointment_id']?> </td>
                              <td class = "text-center"> <?=$app['customer_id']?></td>
                             <td class = "text-center"> <?=$app['service_title']?></td> 
                              <td class = "text-center"> <?=$app['appointment_date']?></td>
                          </tr>
                         
                      <?php }
                  }
                  else{ ?>
                    
                      <tr>
                      <td>No appointments at the moment</td>
                      
                    </tr>

                    
                  <?php }
                ?>
                </table>
              </div>
            
            </div>
        
          </div>
          
        </div>
       
      </div>
    </section>
   
  </div>
   <!-- Modal -->
   <div class="modal fade" id="custInfo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Customer Info</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
        <form >
        <div class="form-group">
            <label>Customer Name</label>
            <input type="text" class="form-control" id="cname" name="cname" disabled>
        </div>
        <div class="form-group">
            <label>Customer Email</label>
            <input type="text" class="form-control"  id="email" name="email" disabled>
        </div>
        <div class="form-group">
            <label>Customer Contact</label>
            <input type="number" class="form-control"  id="contact" name="contact" disabled>
        </div>
          
          
        
        </form> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
  <script>

  $(document).ready(function(){
      $('.cid').on('click',function(){
          $('#custInfo').modal('show');
          var name = $('.cid').data('cname');
          var email = $('.cid').data('email');
          var contact = $('.cid').data('contact');
      
          $('input[name="cname"]').val(name);
          $('input[name="email"]').val(email);
          $('input[name="contact"]').val(contact);
          
          

      });
  });

</script>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>letsheal</strong> 
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">

  </aside>
 
</div>



<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

</body>
</html>