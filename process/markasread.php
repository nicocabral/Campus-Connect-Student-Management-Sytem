<?php 
include('../includes/conn.php');
$getMid = intval($_GET['id']);
$query = mysql_query("UPDATE message SET mstatus = 'Read' WHERE mid = '$getMid'") or die (mysql_error());
?>