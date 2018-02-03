<?php include('includes/conn.php');
if(isset($_GET['str'])){
	$str = mysql_real_escape_string(trim($_GET['str']));
	$sql = "SELECT * FROM studentrec WHERE studentidno LIKE '%$str%' OR lname LIKE '%$str%' order by lname";
}else{
$sql = "SELECT * FROM studentrec order by lname";
}
$result = mysql_query($sql) or die (mysql_error());
if(mysql_num_rows($result)>0){
	while($row = mysql_fetch_assoc($result)){
	?>
	<tr style="font-size:14px;">
	
			<td style="text-align:left;"><?php echo $row['studentidno']?></td>
			<td style="text-align:left;"><?php echo $row['lname'].', '.$row['fname'].' '.$row['mname'];?></td>
			<td style="text-align:left;"><?php echo $row['year'].' '.$row['section'];?></td>
			
			<td><center><button onclick="editGrade(<?php echo $row['studid']?>);" class="btn btn-primary btn-sm" style="border-radius:0;"><i class="fa fa-edit"></i> Update</button>
			<button onclick="viewGrade(<?php echo $row['studid']?>);" class="btn btn-primary btn-sm" style="border-radius:0;"><i class="fa fa-search"></i> View</button></center></td>
		
	</tr>
	<?php
}
}else {
	echo '<tr>
	<td colspan="4"><p style="color:red">No available record</p></td></tr>';
}

?>
