<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	session_destroy();
	$sessions = array_keys($_SESSION);
	foreach($sessions as $keys){
		unset($_SESSION[$keys]);
	}
	header("location:index.php");
}
else {
	if($_SESSION['lvl']==2){
		header('location:student.php');
	}
	include('includes/conn.php');
	$sql = mysql_query ("SELECT * FROM admin WHERE adminid = '".$_SESSION['id']."'") or die (mysql_error());
	if(mysql_num_rows($sql)>0){
		while($adminrow = mysql_fetch_array($sql)){
			?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Campus connect</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="images/logo.png" rel="shortcut icon">
  <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="Assets/css/style.css">
  <link rel="stylesheet" href="Assets/css/jquery-ui.css">
  <link rel="stylesheet" href="Assets/css/jquery-ui.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="Assets/js/jquery.min.js"></script>
  <script src="Assets/js/jquery-ui.js"></script>
  
  <script src="Assets/js/bootstrap.min.js"></script>
  
</head>
<body>
<?php include('logoutModal.php');
include('addStudent.php');
include('course.php');
include('viewStudent.php');
include('addSubject.php');
include('updateGrade.php');
include('myprofile.php');

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
        <li><a href="#adminLoginModal" data-toggle="modal" data-target="#adminLoginModal">Welcome Admin! <?php echo $adminrow['adminname'];?> </a></li>
		<li><a href="#logoutModal" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out"></i> Logout</a></li>
        
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
<div class="col-md-3">
<div class="list-group" style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); font-variant:small-caps;">
  <a href="index.php" class="list-group-item active" style="text-align:left;">
    <i class="fa fa-cube"></i> Dashboard
  </a>
  <a href="javascript:void(0);" id="student" class="list-group-item" style="text-align:left;"><i class="fa fa-user"></i> Student Module</a>
  <a href="javascript:void(0);" id="subject" class="list-group-item" style="text-align:left;"><i class="fa fa-list-alt"></i> Subject Module</a>
  <a href="javascript:void(0)" id="grade" class="list-group-item" style="text-align:left;"><i class="fa fa-list-ul"></i> Grade Module</a>

  <a href="javscript:void(0)" id="myprofile" class="list-group-item" style="text-align:left;"><i class="fa fa-gear"></i> Change Password</a>
   <a href="#logoutModal" data-toggle="modal" data-target="#logoutModal"class="list-group-item"style="text-align:left;"><i class="fa fa-sign-out"></i> Logout</a>
</div>
<div class="panel panel-default" style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
  <div class="panel-body">
    <p style="color:#000;">Last login: <?php include('includes/conn.php');
		$sql = mysql_query("SELECT * FROM login WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."'") or die (mysql_error());
		while($rows = mysql_fetch_array($sql)){
			echo $rows['timestamp'];
		}?></p>
  </div>
</div>
</div>
<div class="col-md-9">
<div id="content">
  <h3 class="margin"><i class="fa fa-wifi"></i> Campus connect</h3>
  <img src="images/Laptop-wifi-icon.png" class="img-responsive margin" style="display:inline" alt="Wifi" width="350" height="350">
  </div>
  </div>
</div>





<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>&copy; Campus connect <?php echo date('Y')?>. Allright reserve</p> 
</footer>

</body>
<script src="Assets/js/admin.js"></script>
</html>
<?php }}}?>
