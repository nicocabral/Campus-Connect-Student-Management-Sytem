<?php include('includes/conn.php');
if(isset($_GET['str'])){
	$str = mysql_real_escape_string(trim($_GET['str']));
	$sql = "SELECT * FROM subject WHERE subjectcode LIKE '%$str%' OR description LIKE '%$str%' order by description";
}else{
$sql = "SELECT * FROM subject order by description";
}
$result = mysql_query($sql) or die (mysql_error());
if(mysql_num_rows($result)>0){
	while($row = mysql_fetch_assoc($result)){
	?>
	<tr style="font-size:14px;">
	
			<td><?php echo $row['subjectcode']?></td>
			<td><?php echo $row['description'];?></td>
			<td><?php echo $row['units']?></td>
			
			<td><center><button onclick="editSubject(<?php echo $row['subid']?>);" class="btn btn-primary btn-sm" style="border-radius:0;"><i class="fa fa-edit"></i> Edit</button></center></td>
		
	</tr>
	<?php
}
}else {
	echo '<tr>
	<td colspan="4"><p style="color:red">No available record</p></td></tr>';
}

?>
