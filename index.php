<?php
$display='d-none';
$notice="";
if(isset($_GET['notice']) && $_GET['notice'] == "login_error")
{
    $display='danger';
    $notice="INVALID USERNAME OR PASSWORD";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>A.A.O MARKETING INVENTORY SYSTEM</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    .loginform
    {
        width:50%;
        margin:auto;
        margin-top: 200px;
    }
        
    </style>
</head>

<body class="fix-header fix-sidebar">
        <!-- End Page wrapper  -->
   
   <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">A.A.O MARKETING INVENTORY SYSTEM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
              <!--  <li class="nav-item">
            <a href="register.php" class="nav-link" href="#">Sign up</a>
          </li>
    <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
        </ul>
        
      </div>
    </nav>

<div class="loginform container">
  <div class="card">
  <div class="card-body">
   <h2 class="tr"> A.A.O MARKETING INVENTORY SYSTEM
  <script language="JavaScript" type="text/javascript">
        TrustLogo("https://bsit-blog.ezyro.com/comodo_secure_seal_76x26_transp.png", "CL1", "none");
    </script>
</h2>
  </div>
</div>
<form method="POST" action="brain/controller.php">
     <div class="alert alert-<?php echo $display?>"><?php echo $notice ?></div>
      <input type="hidden" name="request" value="login">
       <div id="result_auth"></div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address or Username</label>
            <input type="text" class="form-control" name="username" aria-describedby="emailHelp" value="<?php echo $val=(isset($_GET['user']))?$_GET['user']:''?>" placeholder="Username">
            <small id="emailHelp" class="form-text text-muted" style="color:#dee0e2 !important;">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Login</button>
</form> <br>    
<!--<a href="register.php">
        <button class="btn btn-primary btn-block">Register</button></a> -->
    
</div>
<br><br>
   <footer class="footer"> A.A.O MARKETING INVENTORY SYSTEM © 2018 All rights reserved. </footer>
    
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>