<table class="table table-bodered table-hover table-condensed" width="100%;">
<thead>
	<tr style="background-color:#008CBA;color:#FFF;">
		<th>Subject code</th>
		<th>Description</th>
		<th>Units</th>
		<th>Grade</th>
	</tr>
</thead>
<tbody style="color:#000;">
<?php session_start();
include('includes/conn.php');
$getSem = mysql_real_escape_string(trim($_GET['sem']));
$getYt = mysql_real_escape_string(trim($_GET['yt']));
$getYf = mysql_real_escape_string(trim($_GET['yf']));
$sid = intval($_SESSION['id']);
$year = $getYf.'-'.$getYt;
$query = mysql_query("SELECT subject.*,studentgrade.* FROM studentgrade LEFT JOIN subject ON studentgrade.subjectid = subject.subid
					WHERE studentgrade.sem = '$getSem' AND studentgrade.year = '$year' AND studentgrade.studid = '$sid'") or die (mysql_error());
if(mysql_num_rows($query)>0){
	while($rows = mysql_fetch_array($query)){?>
	<tr>
		<td><?php echo $rows['subjectcode']?></td>
		<td><?php echo $rows['description']?></td>
		<td><?php echo $rows['units']?></td>
		<td><?php echo $rows['grade']?></td>
	</tr>
<?php }
}else {
	echo '<tr><td colspan="4" style="color:red;text-align:center;">No record found</td></tr>';
}?>
</tbody>
</table>