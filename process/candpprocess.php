<?php include('../includes/conn.php');

$uname = mysql_real_escape_string(trim($_POST['uname']));
$pword = mysql_real_escape_string(trim($_POST['pword']));
$confirm = mysql_real_escape_string(trim($_POST['cpword']));
$uid = intval($_POST['uid']);
if(empty($uname)){
	echo 'Please dont leave empty fields';
}else if (empty($pword)){
	echo 'Please dont leave empty fields';
}else if (empty($confirm)){
	echo 'Please dont leave empty fields';
}else if ($pword!=$confirm){
	echo 'Password did not match';
}else {
	$sql = mysql_query("UPDATE login SET username = '$uname', password = '$confirm' WHERE userid = '$uid'") or die (mysql_error());
	if($sql == true){
		echo 'Username and/or password updated! Please logout to take effect';
	}
}?>