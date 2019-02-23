<?php
session_start();
include('brain/config.php');
include('brain/functions.php');
if(!isset($_SESSION['username']))
{
    header('location:index.php');
}

if(isset($_GET['logout'])) 
{
    include_once('logout.php');
}
$disp= "d-none";
$notice ="";
if(isset($_GET['notice']) && $_GET['notice'] == "product_saved")
{
    $disp = "success";
    $notice = "The product you added has been saved";
}
else if(isset($_GET['notice']) && $_GET['notice'] == "product_updated")
{
    $disp = "success";
    $notice = "The product you added has been updated";
}
else if(isset($_GET['notice']) && $_GET['notice'] == "supplier_added")
{
     $disp = "success";
    $notice = "The supplier has been added";
}
    else if(isset($_GET['notice']) && $_GET['notice'] == "supplier_updated")
{
     $disp = "success";
    $notice = "The supplier has been updated";
}
    else if(isset($_GET['notice']) && $_GET['notice'] == "profile_updated")
{
     $disp = "success";
    $notice = "Your profile has been updated";
}
else if(isset($_GET['notice']) && $_GET['notice'] == "purchase_complete")
{
    $disp = "success";
    $notice = "TRANSACTION COMPLETED";
}
else if(isset($_GET['notice']) && $_GET['notice'] == "purchase_failed")
{
    $disp = "danger";
    $notice = "TRANSACTION INCOMPLETE. FAILED";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $_SESSION['username']?> - Dashboard </title>

    <!-- Bootstrap core CSS-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	 <link href="assets/css/helper.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<link href="vendor/sweetalert/sweetalert.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
       <script src="vendor/jquery/jquery.min.js"></script>
       <script src="assets/js/bootstrap.bundle.min.js"></script>
       <script src="js/popper.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
     <script src="vendor/chart.js/Chart.min.js"></script>
	 <script src="vendor/sweetalert/sweetalert.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin.min.js"></script>
  
	<style>
	.list-group-item
	{
		color:forestgreen;
	}
        
	</style>
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark static-top"  style="background-color: darkcyan;">

      <a class="navbar-brand mr-1" href="index.html">A.A.O MARKETING INVENTORY SYSTEM</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

     

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
     <!--   <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw" style="color:white"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> -->
       
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"  style="color:white"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addcredit">My Account</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">
<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="list-group-item sidebar-separator-title text-muted align-items-center menu-collapsed d-flex">
        <small>MAIN MENU</small>
    </li>
    <li class="nav-item">
        <a class="nav-link bg-dark" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt mr-3"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-dark list-group-item" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-tasks fa-fw mr-3"></span>
            <span>PRODUCTS</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 52px, 0px);">
            <h6 class="dropdown-header">OPTION:</h6>
            <a class="dropdown-item" href="?page=addproduct" id="">Add product</a>
            <a class="dropdown-item" href="?page=listproduct">Manage Product</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-dark list-group-item" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-credit-card fa-fw mr-3"></span>
            <span>SUPPLIER</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 52px, 0px);">
            <h6 class="dropdown-header">Supplier option:</h6>
           <!-- <a class="dropdown-item" href="?page=addsupplier" data-toggle="modal" data-target="#addcredit">Add supplier</a> -->
           <a class="dropdown-item" href="?page=addsupplier">Add supplier</a>
            <a class="dropdown-item" href="?page=listsupplier">Manage supplier</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-dark list-group-item" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-shopping-cart fa-fw mr-3"></span>
            <span>ORDER</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 52px, 0px);">
            <h6 class="dropdown-header">Order option:</h6>
           <a class="dropdown-item" href="?page=neworder">New order</a>
            <a class="dropdown-item" href="?page=listorder">Order list</a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-dark list-group-item" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-user fa-fw mr-3"></span>
            <span>Manage Accounts</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 52px, 0px);">
            <h6 class="dropdown-header">Users Option:</h6>
            <a class="dropdown-item" href="?page=user_list">USERS LIST</a>
            <a class="dropdown-item" href="?page=add_user">Add user</a>

        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-dark list-group-item" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-chart-line fa-fw mr-3"></span>
            <span>Point of Sales</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 52px, 0px);">
            <h6 class="dropdown-header">POS Option:</h6>
            <a class="dropdown-item" href="?page=pos">POS </a>
            <a class="dropdown-item" href="?page=transaction">Purchases</a>

        </div>
    </li>
   <!-- <li class="nav-item">
        <a class="nav-link bg-dark list-group-item" href="?page=logs">
            <i class="fas fa-fw fa-envelope mr-3"></i>
            <span>Logs</span>

        </a>
    </li> -->
</ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="dashboard2.php">Dashboard</a>
              
            </li>
          </ol>

          <div class="row">
                    <div class="col-md-6">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart  f-s-40 color-primary"></i></span>
                                </div>&nbsp;
                                <div class="media-body media-text-right">
                                    <h2><?php   countProducts()  ?></h2>
                                    <p class="m-b-0">PRODUCTS</p>
                                </div>
                            </div>
                        </div>
                    </div>
           
                    <div class="col-md-6">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>&nbsp;
                                <div class="media-body media-text-right">
                                    <h2><?php  
    
    countUsers() ?></h2>
                                    <p class="m-b-0">USERS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
          <!-- Page Content -->
                      <div class="notifier"></div>
					  <br>
           <div class="" id="main_panel">
               <div class="container" style="margin:auto;width:50%;">
                   <div class="alert alert-<?=$disp?>"><?=$notice?> </div>
               </div>
                <?php 
                        if(isset($_GET['page']) && $_GET['page'] == "addproduct")
                        {
                            include('pages/addproduct.php');
                        }
                        else if(isset($_GET['page']) && $_GET['page'] == "listproduct")
                        {
                            include('pages/listproduct.php');
                        }
                        else if(isset($_GET['page']) && $_GET['page'] == "editproduct")
                        {
                            include('pages/editproduct.php');
                        }
                        else if(isset($_GET['page']) && $_GET['page'] == "addsupplier")
                        {
                            include('pages/addsupplier.php');
                        }
                        else if(isset($_GET['page']) && $_GET['page'] == "listsupplier")
                        {
                            include('pages/listsupplier.php');
                        }
                        else if(isset($_GET['page']) && $_GET['page'] == "editsupplier")
                        {
                            include('pages/editsupplier.php');
                        }
                        else if(isset($_GET['page']) && $_GET['page'] == "neworder")
                        {
                            include('pages/neworder.php');
                        }
                        else if(isset($_GET['page']) && $_GET['page'] == "listorder")
                        {
                            include('pages/listorder.php');
                        }
                        else if(isset($_GET['page']) && $_GET['page'] == "editorder")
                        {
                            include('pages/editorder.php');
                        }
                        else if(isset($_GET['page']) && $_GET['page'] == "add_user")
                        {
                            include('pages/adduser.php');
                        }
                        else if(isset($_GET['page']) && $_GET['page'] == "user_list")
                        {
                            include('pages/userlist.php');
                        }
                        else if(isset($_GET['page']) && $_GET['page'] == "pos")
                        {
                            include('pages/POS.php');
                        }
                        else if(isset($_GET['page']) && $_GET['page'] == "transaction")
                        {
                            include('pages/listpurchases.php');
                        }
                ?>
            </div>
        </div>
        <!-- /.container-fluid -->



      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?logout=ref">Logout</a>
          </div>
        </div>
      </div>
    </div>
   
    <!-- Modal -->
<div class="modal fade" id="addcredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">UPDATE YOUR ACCOUNT:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
            $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param("s",$_SESSION['username']);
                $stmt->execute();
          $result = $stmt->get_result();
          $pf = $result->fetch_assoc();
        
          ?>
        <form method="POST" action="brain/controller.php">
           <input type="hidden" name="request" value="updateprofile">
            <div class="form-group row">
                <label for="user" class="col-sm-3 col-form-label">Username: </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="users" value="<?= $pf['username'] ?>" autocomplete="off" name="username" required>
                    <div class="list-group" id="userlist" >        
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="user" class="col-sm-3 col-form-label">Password: </label>
                <div class="col-sm-9">
                    <input type="password" class="form-control"  value="12345678" autocomplete="off" name="password" required>
                    <div class="list-group" id="userlist" >        
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Firstname</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?= $pf['firstname'] ?>" name="fname"  required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Middlename</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?= $pf['middlename'] ?>" name="mname"  required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Lastname</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?= $pf['lastname'] ?>" name="lname"  required>
                </div>
            </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?= $pf['email'] ?>" name="email"  required>
                </div>
            </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Mobile</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?= $pf['mobile'] ?>" name="mobile"  required>
                </div>
            </div>
         <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Save changes</button>
      </div>
         </form>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript-->
 <script>
         //bar chart
	var ctx1 = document.getElementById( "barChartE" );
        var ctx2 = document.getElementById( "barChartW" );
        
            $.ajax({
                  url:"brain/controller.php",
                    method:"POST",
                    data:{request:"stockCondition"},
                    success: function(data){
                        
                        var desc = [];
			             var q = [];
                        var e = $.parseJSON(data);
                        for(var i = 0; i < e.length; i++) {       
                           
                            desc.push(e[i].description);
                           q.push(e[i].quantity);
                        }
                          function getMax(q){
                return Math.max.apply(null, q);
                }
                var tts =getMax(q) +100;
	//    ctx.height = 200;
	var myChart = new Chart( ctx1, {
		type: 'bar',
		data: {
			labels: desc,
			datasets: [
				{
					label: "Stocks Condition",
					data: q,
					borderColor: "rgba(237, 230, 94, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(58, 209, 96, 0.5)"
                }]
		},
		options: {
			scales: {
				yAxes: [ {
					ticks: {
						beginAtZero: true,
                        max: tts
					}
                                } ]
			}
		}
	} );
                        
                },
                error: function(e)
                {
                    alert(e);
                } // success
            }); //ajax
  
    
   
 </script>
    
  </body>

</html>
