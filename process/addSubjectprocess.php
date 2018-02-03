<?php include('../includes/conn.php');
$scode = mysql_real_escape_string(trim($_POST['scode']));
$des = mysql_real_escape_string(trim($_POST['des']));
$u = mysql_real_escape_string(trim($_POST['units']));

if(empty($scode) || empty($des) || empty($u)){
	echo '<p style="color:red;">Please check your fields</p>';
}else {
	$check = mysql_query("SELECT * FROM subject WHERE subjectcode = '$scode '") or die (mysql_error());
	if(mysql_num_rows($check)>0){
		echo '<p style="color:red"><i class="fa fa-exclamation-circle"></i> '.$scode.' '.$des.' is already save</p>';
	}else {
		$sql = mysql_query("INSERT INTO subject VALUES (NULL,'$scode','$des','$u')") or die (mysql_error());
		if($sql == true){
			echo '<p style="color:green;"><i class="fa fa-check"></i> '.$scode.' '.$des.' save!</p>';
		}else {
			echo mysql_error();
		}
	}
}?>