<ul class="list-group" style="margin-top:10px;">
<?php session_start();
include('includes/conn.php');
if(isset($_GET['str'])){
	$filter = mysql_real_escape_string($_GET['str']);
	$query1 = "SELECT * FROM studentrec WHERE studid LIKE '%$filter%' OR lname LIKE '%$filter%'";
	$res = mysql_query($query1) or die (mysql_error());
if(mysql_num_rows($res)>0){
	while($rows = mysql_fetch_array($res)){?>
	
	<li class="list-group-item" style="font-size:12px;cursor:pointer" onclick="msgOptions(<?php echo $rows['studid']?>)">
	 <?php echo $rows['studentidno'].' '.$rows['lname'].', '.$rows['fname'];?></li>
	
	
	
<?php }}else {
	echo '<li class="list-group-item"><p style="font-size:12px;color:red;">No record found</p></li>';
}
}
else{
	$query1 = "SELECT * FROM studentrec WHERE studid != '".$_SESSION['id']."' order by lname asc";
	$res = mysql_query($query1) or die (mysql_error());
if(mysql_num_rows($res)>0){
	while($rows = mysql_fetch_array($res)){?>
	
	<li class="list-group-item" style="font-size:12px;cursor:pointer" onclick="msgOptions(<?php echo $row['studid']?>)">
	 <?php echo $rows['studentidno'].' '.$rows['lname'].', '.$rows['fname'];?></li>
	
	
	
<?php }}else {
	echo '<li class="list-group-item"><p style="font-size:12px;color:red;">No record found</p></li>';
}
}
?>

</ul>