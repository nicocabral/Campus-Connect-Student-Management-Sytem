<?php include('../includes/conn.php');
if(isset($_POST['save'])){
	$studid = intval($_POST['studentid']);
	$sem = mysql_real_escape_string($_POST['sem']);
	$year = mysql_real_escape_string(trim($_POST['year']));
	if(empty($sem)){
		echo '<script>alert("Please enter sem");window.location.href="../admin.php";</script>';
		exit();
	}
	else if(empty($year)){
		echo '<script>alert("Please enter year");window.location.href="../admin.php";</script>';
		exit();
	}else {
		$query = mysql_query("SELECT * FROM studentsubject WHERE studentid = '$studid' AND sem = '$sem' AND  year = '$year'") or die (mysql_error());
		if(mysql_num_rows($query)>0){
			echo '<script>alert("Already save in the database");window.location.href="../admin.php";</script>';
		}else {
			for($i=0;$i<count($_POST['subjectID']);$i++){
				$sqlquery = mysql_query("INSERT INTO studentsubject VALUES (NULL,'$studid','".$_POST['subjectID'][$i]."','Enrolled','$sem','$year')") or die (mysql_error());
			
			}
			if($sqlquery == true ){
				echo '<script>alert("Save successfully");window.location.href="../admin.php";</script>';
			}
		}
	}
}?>