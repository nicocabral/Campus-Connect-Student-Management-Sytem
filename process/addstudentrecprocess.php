<?php include('../includes/conn.php');
$studid = mysql_real_escape_string(trim($_POST['stidno']));
$fname = mysql_real_escape_string(trim($_POST['fname']));
$lname = mysql_real_escape_string(trim($_POST['lname']));
$mname = mysql_real_escape_string(trim($_POST['mname']));
$bdate = mysql_real_escape_string(trim($_POST['bdate']));
$address = mysql_real_escape_string(trim($_POST['address']));
$contact = mysql_real_escape_string(trim($_POST['contact']));
$email = mysql_real_escape_string(trim($_POST['email']));
$course = mysql_real_escape_string(trim($_POST['course']));
$year = mysql_real_escape_string(trim($_POST['year']));
$section = mysql_real_escape_string(trim($_POST['section']));

if(empty($studid) || empty($fname) || empty($lname) || empty($mname) || empty($bdate) || empty($address) || empty($contact) || empty($contact) || empty($email) || empty($course) || empty($year) || empty($section)){
	echo '<p style="color:red;">Please check your fields</p>';
}else {
	$check = mysql_query("SELECT * FROM studentrec WHERE studentidno = '$studid '") or die (mysql_error());
	if(mysql_num_rows($check)>0){
		echo '<p style="color:red"><i class="fa fa-exclamation-circle"></i> '.$studid.' '.$lname.','.$fname.' '.$mname.' is already save</p>';
	}else {
		$sql = mysql_query("INSERT INTO studentrec VALUES (NULL,'$studid','$fname','$lname','$mname','$bdate','$address','$contact','$email','$course','$year','$section','New')") or die (mysql_error());
		if($sql == true){
			echo '<p style="color:green;"><i class="fa fa-check"></i> '.$studid.' save!</p>';
		}else {
			echo mysql_error();
		}
	}
}?>