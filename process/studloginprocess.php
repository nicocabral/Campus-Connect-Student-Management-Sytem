<?php 
	session_start();
	include('../includes/conn.php');
	$studidno = mysql_real_escape_string(trim($_POST['stidno']));
	$lname = mysql_real_escape_string(trim($_POST['lname']));
	if(empty($studidno)){
		echo '<p style="color:red;font-size:16px;"><i class="fa fa-exclamation-circle"></i> Please dont leave a blank fields</p>';
	}
	else if(empty($lname)){
		echo '<p style="color:red;font-size:16px;"><i class="fa fa-exclamation-circle"></i> Please dont leave a blank fields</p>';
	}
	else {
		$query = mysql_query("SELECT * FROM studentrec WHERE studentidno = '$studidno' AND lname = '$lname'") or die (mysql_error());
		if(mysql_num_rows($query)>0){
			while($row = mysql_fetch_array($query)){
				$_SESSION['username'] = $row['studentidno'];
				$_SESSION['password'] = $row['lname'];
				$_SESSION['lvl'] = 2;
				$_SESSION['id'] = $row['studid'];
				echo '<script>window.location.href="student.php"</script>';
			}
		}else{
			echo '<p style="color:red;font-size:16px;"><i class="fa fa-exclamation-circle"></i> Not found pleaase try again!</p>';
		}
	}
?>