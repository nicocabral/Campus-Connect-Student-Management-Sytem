<?php include('../includes/conn.php');
	$getCourse = mysql_real_escape_string(trim($_GET['c']));
	if(empty($getCourse)){
		echo '';
		
	}else {
		$check = mysql_query("SELECT * FROM course WHERE course = '$getCourse'") or die (mysql_error());
		if(mysql_num_rows($check)>0){
			echo '<p style="color:red;">'.$getCourse.' already save</p>';
		}else{
		$sql = mysql_query("INSERT INTO  course VALUES (NULL,'$getCourse')") or die (mysql_error());
		if($sql == true){
			echo '<p style="color:green;">'.$getCourse.' Save!</p>';
		}else {
			echo mysql_error();
		}
		}
	}
?>