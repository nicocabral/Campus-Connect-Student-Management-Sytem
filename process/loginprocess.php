<?php 
session_start();
$getUname = mysql_real_escape_string(trim($_GET['u']));
$getPword = mysql_real_escape_string(trim($_GET['p']));
if(empty($getUname)){
	echo '';
}
else if(empty($getPword)){
	echo '';
}
else {
	include('../includes/conn.php');
	$query = mysql_query("SELECT * FROM login WHERE username = '$getUname' AND password = '$getPword'") or die (mysql_error());
	if(mysql_num_rows($query)>0){
		while($row = mysql_fetch_array($query)){
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['lvl'] = '1';
			$_SESSION['id'] = $row['userid'];
			echo '<script>window.location.href="admin.php";</script>';
		}
	}else {
		echo '<p style="font-size:13px;"><i class="fa fa-exclamation-circle"></i> Invalid username and/or password</p>';
	}
}
?>