<?php 
include('includes/conn.php');
$sql = mysql_query("SELECT * FROM course order by course") or die (mysql_error());
if(mysql_num_rows($sql)>0){
	while($row = mysql_fetch_array($sql)){
		echo '<tr>
			<td>'.$row['course'].'</td>
			<td><center><button class="btn btn-danger" style="border-radius:0;" onclick="deleteCourse('.$row['courseid'].')"><i class="fa fa-trash"></i></button></center></td>
		</tr>';
	}
}else {
	echo '<tr>
		<td colspan="2"><p style="color:red;text-align:center;">No available record</p></td>
	</tr>';
}
?>