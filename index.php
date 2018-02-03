<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	session_destroy();
	$sessions = array_keys($_SESSION);
	foreach($sessions as $keys){
		unset($_SESSION[$keys]);
	}
	header("location:main.php");
}
else if($_SESSION['lvl'] =='1'){
	header("location:admin.php");
}
else if($_SESSION['lvl'] == '2') {
	header('location:student.php');
}
else {
	session_destroy();
	header("location:main.php");
}

?>