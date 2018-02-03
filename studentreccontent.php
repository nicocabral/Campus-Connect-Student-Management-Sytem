<?php include('includes/conn.php');
if(isset($_GET['str'])){
	$str = mysql_real_escape_string(trim($_GET['str']));
	$sql = "SELECT * FROM studentrec WHERE studentidno LIKE '%$str%' OR fname LIKE '%$str%' OR lname LIKE '%$str%' OR mname LIKE '%$str%' OR course LIKE '%$str%'
			OR year LIKE '%$str%' order by lname";
}else{
$sql = "SELECT * FROM studentrec order by lname";
}
$result = mysql_query($sql) or die (mysql_error());
if(mysql_num_rows($result)>0){
	while($row = mysql_fetch_assoc($result)){
	?>
	<tr style="font-size:14px;">
	
			<td><?php echo $row['studentidno']?></td>
			<td><?php echo $row['lname'].', '.$row['fname'].' '.$row['mname'].'.';?></td>
			<td><?php echo $row['course']?></td>
			<td><?php echo $row['year'].'-'.$row['section'];?></td>
			<td><center><button onclick="viewstudrec(<?php echo $row['studid']?>);" class="btn btn-primary btn-sm" style="border-radius:0;"><i class="fa fa-search"></i> View</button> | <button class="btn btn-primary btn-sm" style="border-radius:0;" onclick="studSubject(<?php echo $row['studid']?>)">Add Subjects</button></center></td>
		
	</tr>
	<?php
}
}else {
	echo '<tr>
	<td colspan="5"><p style="color:red">No available record</p></td></tr>';
}

?>
