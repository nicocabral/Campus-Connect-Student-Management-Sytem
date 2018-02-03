<?php include('../includes/conn.php');
$getStid = intval($_POST['gstudid']);
$getSem = mysql_real_escape_string($_POST['getSem']);
$getGyf = mysql_real_escape_string($_POST['getGyf']);
$getGyt = mysql_real_escape_string($_POST['getGyt']);
$year = $getGyf.'-'.$getGyt;
$count = 0;
$check = mysql_query("SELECT * FROM studentgrade WHERE studid ='$getStid' AND sem = '$getSem' AND year = '$year'") or die (mysql_error());
if(mysql_num_rows($check)>0){
while($row = mysql_fetch_array($check)){
	$count++;
	$grade = $_POST['grade'.$count];
	$subid = $_POST['subid'.$count];
	$query = mysql_query("UPDATE studentgrade SET grade = '$grade' WHERE gradeid = '".$row['gradeid']."'") or die (mysql_error());
		
}
echo 'Grade Updated successfully!';	
}else{
$sql = mysql_query("SELECT * FROM studentsubject WHERE studentid = '$getStid' AND sem = '$getSem' AND year = '$year'") or die (mysql_error());
while($row = mysql_fetch_array($sql)){
	$count++;
	$grade = $_POST['grade'.$count];
	$subid = $_POST['subid'.$count];
	$query = mysql_query("INSERT INTO studentgrade VALUES (NULL,'$getStid','$subid','$grade','$getSem','$year','Updated',NULL)") or die (mysql_error());
		
}
echo 'Grade Updated successfully!';
}
?>