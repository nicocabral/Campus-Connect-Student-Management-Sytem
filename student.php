<?php 
error_reporting(0);
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password']) && $_SESSION['lvl']==2){
	include('includes/conn.php');
	$studentquery = mysql_query("SELECT * FROM studentrec WHERE studid = '".$_SESSION['id']."'") or die (mysql_query());
	if(mysql_num_rows($studentquery)>0){
		while($studrows = mysql_fetch_array($studentquery)){?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <title>Campus connect</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="images/logo.png" rel="shortcut icon">
  <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="Assets/css/dropzone.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="Assets/css/style.css">
  <script src="Assets/js/jquery.min.js"></script>
  <script src="Assets/js/bootstrap.min.js"></script>
  <script src="Assets/js/dropzone.js"></script>
  
</head>
<body>
<?php include('logoutModalstudent.php');
include('gradeModal.php');
include('sendfileModal.php');
include('sendMsgModal.php');
?>
<!-- Navbar -->
<nav class="navbar navbar-default" style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
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
	  <li><a href="javscript:void(0);">Welcome! <?php echo $studrows['lname'].', '.$studrows['fname'].' '.$studrows['mname'];?></a></li>
        <li><a href="#logoutModal" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out"></i> Logout</a></li>
        
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
<div class="col-md-3">

<div class="list-group" style="text-align:left;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
  <a href="student.php" class="list-group-item active">
   <i class="fa fa-dashboard"></i>
	Dashboard
  </a>
  <a href="javascript:void(0)" id="grade" class="list-group-item"><i class="fa fa-list-alt"></i> Grade</a>
  <a href="javascript:void(0)" id="message" class="list-group-item"><i class="fa fa-envelope"></i> Message</a>
  <a href="#logouModal" data-toggle="modal" data-target="#logoutModal" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
</div>
</div>
<div class="col-md-9">
<div id="studentcontent">
  <h3 class="margin"><i class="fa fa-wifi"></i> Campus connect</h3>
  <img src="images/Laptop-wifi-icon.png" class="img-responsive margin" style="display:inline" alt="Wifi" width="350" height="350">
  </div>
 </div>
 </div>
</div>
<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>&copy; Campus connect <?php echo date('Y')?>. Allright reserve</p> 
</footer>

</body>
<script src="Assets/js/student.js"></script>
</html>
<?php }}else {
session_destroy();}
}
else if ($_SESSION['lvl'] = 1){
	header("location: admin.php");
}
else {
	session_destroy();
	header("location:main.php");
}?>
