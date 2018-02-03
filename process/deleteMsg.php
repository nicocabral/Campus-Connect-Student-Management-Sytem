<?php include('../includes/conn.php');
$id = intval($_GET['id']);
$query = mysql_query("DELETE FROM message WHERE mid = '$id'") or die (mysql_error());?>