<?php include('../includes/conn.php');
$id = mysql_real_escape_string(trim($_POST['vidno']));
$studid = mysql_real_escape_string(trim($_POST['vstidno']));
$fname = mysql_real_escape_string(trim($_POST['vfname']));
$lname = mysql_real_escape_string(trim($_POST['vlname']));
$mname = mysql_real_escape_string(trim($_POST['vmname']));
$bdate = mysql_real_escape_string(trim($_POST['vbdate']));
$address = mysql_real_escape_string(trim($_POST['vaddress']));
$contact = mysql_real_escape_string(trim($_POST['vcontact']));
$email = mysql_real_escape_string(trim($_POST['vemail']));
$course = mysql_real_escape_string(trim($_POST['vcourse']));
$year = mysql_real_escape_string(trim($_POST['vyear']));
$section = mysql_real_escape_string(trim($_POST['vsection']));

if(empty($studid) || empty($fname) || empty($lname) || empty($mname) || empty($bdate) || empty($address) || empty($contact) || empty($contact) || empty($email) || empty($course) || empty($year) || empty($section)){
	echo '<p style="color:red;">Please check your fields</p>';
}else {
	include('../includes/conn.php');
		$sql = mysql_query("UPDATE studentrec SET studentidno = '$studid',
												  fname = '$fname',
												  lname = '$lname',
												  mname = '$mname',
												  bdate = '$bdate',
												  address = '$address',
												  contact = '$contact',
												  email = '$email',
												  course = '$course',
												  year = '$year',
												  section = '$section' WHERE studid = '$id'") or die (mysql_error());
		if($sql == true){
			echo '<p style="color:green;"><i class="fa fa-check"></i> '.$studid.' updated!</p>';
		}else {
			echo mysql_error();
		}
	
}?>