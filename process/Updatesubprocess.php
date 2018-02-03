<?php include('../includes/conn.php');
$scode = mysql_real_escape_string(trim($_POST['scode']));
$des = mysql_real_escape_string(trim($_POST['des']));
$u = mysql_real_escape_string(trim($_POST['units']));
$id  = intval($_POST['id']);
if(empty($scode) || empty($des) || empty($u)){
	echo '<p style="color:red;">Please check your fields</p>';
}else {
	
		$sql = mysql_query("UPDATE subject SET subjectcode = '$scode',
										       description = '$des',
											   units = '$u' WHERE subid = '$id'") or die (mysql_error());
		if($sql == true){
			echo '<p style="color:green;"><i class="fa fa-check"></i> '.$scode.' '.$des.' updated!</p>';
		}else {
			echo mysql_error();
		}
	
}?>