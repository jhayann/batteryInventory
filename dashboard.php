<?php
session_start();
include('brain/config.php');
include('brain/functions.php');

/* include hashids lib */


/* create the class object with minimum hashid length of 8 
$hashids = new Hashids\Hashids('this is my salt', 8);
/* encode several numbers into one id (length of id is going to be at least 8) 
$id = $hashids->encode(1337);
/* decode the same id 
$numbers = $hashids->decode($id);
/* `$numbers` is always an array 
var_dump($id, $numbers);
exit;
*/
$key = $_SESSION['username'];
$meta = $_SESSION;
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
else if(isset($_GET['notice']) && $_GET['notice'] == "product_deleted")
{
    $disp = "success";
    $notice = "The product has been deleted";
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
    
	<link href="vendor/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
      <link href="datatables//buttons.bootstrap.min.css" rel="stylesheet">
      <link href="datatables/buttons.dataTables.min.css" rel="stylesheet">
         
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
          <script src="datatables/jquery.dataTables.min.js"></script>
      <script src="datatables/dataTables.bootstrap4.min.js"></script>
      
         <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>

    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
  
	<style>
	.list-group-item
	{
		color:forestgreen;
	}
        
        #notice{
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
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
       <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="modal" data-target="#modal-notification">
            <i class="fas fa-bell fa-fw" style="color:white"></i>
            <span class="badge badge-danger badge-notif"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> 
       
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
    <?php 
        if($_SESSION['role'] == "admin")
        {
            $page = "admin";
            include'inc/'.$page.'_menu.php';
        } else {
            $page = "staff";
            include'inc/'.$page.'_menu.php';
        }
    
    
    ?>
</ul>

<div class="modal" id="modal-notification" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">SYSTEM NOTIFICATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-height:300px;overflow-y: scroll">
      <div class="notification-body">
          </div>  
           
      </div>
      <div class="modal-footer">
        


        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="dashboard.php"><?= isset($_GET['page']) ? _crypt($_GET['page'],'d') : "ANALYTICS" ?></a>
              
            </li>
          </ol>

   
    
          <!-- Page Content -->
                      <div class="notifier"></div>
					  
           <div class="" id="main_panel">
               <div class="container" style="margin:auto;width:50%;">
                   <div class="alert alert-<?=$disp?>" id="notice"><?=$notice?> </div>
               </div>
                <?php 
                
                    if(isset($_GET['page']))
                        {
                       
                        $page = _crypt(urldecode($_GET['page']),'d');
                       
                         $dir = 'pages/'.$page.'.php';
                       
                            if(is_readable($dir)){
                                try{
                                  require_once ("./$dir");
                                }catch(Exception $e){
                                      //
                                }
                            } else {
                                include('pages/404.php');
                            }
                        
                        }
                        else
                        {
                            include('pages/reports.php');
                        
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
   
  
$('#modal-notification').on('shown.bs.modal', function (e) {
    getNotif();

});

function getNotif()
{
    $.ajax({
     method:"post",
     url:"brain/controller.php",
     data: {request:'notif'},
     success: function(data)
     {
         $('.notification-body').html(data);
     }

 }); 
}
function delNotif(e)
{
    $.ajax({
     method:"post",
     url:"brain/controller.php",
     data: {request:'delnotif',id:e},
     success: function(data)
     {
        getNotif();
        countNotif();
     }

 });
}

function countNotif()
{  
    $.ajax({
     method:"post",
     url:"brain/controller.php",
     data: {request:'countnotif'},
     success: function(data)
     {
         $('.badge-notif').html(data);
     }

 }); 
}

$(document).ready(function(){
    countNotif();
});
   
 </script>
    
  </body>

</html>
