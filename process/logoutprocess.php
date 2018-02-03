<?php 
error_reporting(0);
session_start();
if(isset($_GET['logout'])){
	session_destroy();
	$session = array_keys($_SESSION);
	foreach($session as $keys){
		unset($_SESSION[$keys]);
	}
	header("location:../index.php");
}?>