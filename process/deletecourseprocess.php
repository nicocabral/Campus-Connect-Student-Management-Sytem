<?php 
include('../includes/conn.php');
$id=intval($_GET['id']);
$sql = mysql_query("DELETE FROM course WHERE courseid = '$id'") or die (mysql_error());
if($sql == true){
	echo '<p style="color:green;">Deleted successfully!</p>';
}else {
	echo '<p style="color:red">'.mysql_error().'</p>';
}
?>