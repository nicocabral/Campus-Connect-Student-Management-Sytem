<?php include('includes/conn.php');
if(isset($_GET['str'])){
	$filter = mysql_real_escape_string($_GET['str']);
	$query = "SELECT * FROM subject WHERE subjectcode LIKE '%$filter%' OR description LIKE '%$filter%'";
}else {
	$query ="SELECT * FROM subject order by subjectcode";
}
			$result = mysql_query($query) or die (mysql_error());
			if(mysql_num_rows($result)>0){
				while($resrows = mysql_fetch_array($result)){
					?>
					<tr style="cursor:pointer;" ondblclick="myFunction(<?php echo $resrows['subid']?>,'<?php echo $resrows['subjectcode']?>','<?php echo $resrows['description']?>','<?php echo $resrows['units']?>','<?php echo intval($_GET['id'])?>')">
					<td><?php echo $resrows['subjectcode']?></td>
					<td><?php echo $resrows['description']?></td>
					<td><?php echo $resrows['units']?></td>
					</tr>
					<?php
				}
			}else {
				echo '<tr><td colspan="3">No record found</td></tr>';
			}?>