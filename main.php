<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <title>Campus connect</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="images/logo.png" rel="shortcut icon">
  <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="Assets/css/style.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  
  <script src="Assets/js/jquery.min.js"></script>
  <script src="Assets/js/bootstrap.min.js"></script>
  
</head>
<body>
<?php include('adminLogin.php');?>
<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="images/aclc-logo.png" class="img-responsive" width="100px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#adminLoginModal" data-toggle="modal" data-target="#adminLoginModal"><i class="fa fa-sign-in"></i> Admin</a></li>
        
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
<div class="col-md-4"></div>
<div class="col-md-4">
  <h3 class="margin"><i class="fa fa-wifi"></i> Campus connect</h3>
  <img src="images/Laptop-wifi-icon.png" class="img-responsive margin" style="display:inline" alt="Wifi" width="350" height="350">
  </div>
 <div class="col-md-4">
 <form id="studLoginform">
	<div class="panel panel-primary" style="border-radius:0;">
  <div class="panel-heading"><h3 style="text-align:left; font-variant:small-caps"><i class="fa fa-users" style="color:#FFF;"></i> Student Login</h3></div>
  
  <div class="panel-body">
  <div class="col-md-12">
	<div id="loginMsg"></div>
  </div>
  <div class="col-md-12">
		<input type="text" class="form-control input-lg" style="border-radius:0;" name="stidno" placeholder="Student ID no. EX(C14-XXX-XXXXX)">
  </div>
  <div class="col-md-12" style="margin-top:10px;">
		<input type="password" class="form-control input-lg" style="border-radius:0;" name="lname" placeholder="Password (Lastname)">
  </div>
  <div class="col-md-6" style="margin-top:10px;">
  
  </div>
  <div class="col-md-6" style="margin-top:10px;">
	<button class="button-blue" type="submit"><i class="fa fa-sign-in"></i> Login</button>
  </div>
  </div>
</div>
</form>
 </div>
</div>
<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>&copy; Campus connect <?php echo date('Y')?>. Allright reserve</p> 
</footer>

</body>
<script src="Assets/js/script.js"></script>
</html>
<?php }
else if ($_SESSION['lvl'] == 1){
	header("location: admin.php");
}
else {
	header("location:student.php");
}?>
