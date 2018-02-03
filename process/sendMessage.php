<?php session_start();
	include('../includes/conn.php');
	$getC = mysql_real_escape_string(trim($_GET['content']));
	$query = mysql_query("INSERT INTO message VALUES (NULL,'".$_SESSION['id']."','".$_SESSION['rid']."','$getC',NULL,'New')") or die (mysql_error());
	if($query == true){
		unset($_SESSION['rid']);
		echo 'Message sent!';
	}
?>