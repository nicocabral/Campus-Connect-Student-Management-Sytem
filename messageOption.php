<div class="col-md-12">
	<?php 
	session_start();
	include('includes/conn.php');
	$query = mysql_query("SELECT * FROM studentrec WHERE studid = '".intval($_GET['id'])."'") or die (mysql_error());
	if($sqlrows = mysql_fetch_array($query)){
		echo '<p style="color:#000;">Create message to: <strong>'.$sqlrows['lname'].', '.$sqlrows['fname'].' '.$sqlrows['mname'].'</strong></p><hr>';
		$_SESSION['recieverid'] = $sqlrows['studid'];
	}?>
</div>
	<div class=" btn-group" role="group" aria-label="...">

  <button type="button" class="button-blue" onclick="myOption(<?php echo intval($_GET['id'])?>)"> <i class="fa fa-file"></i> Send Files</button>
  <button type="button" class="button-blue" onclick="optionMsg(<?php echo intval($_GET['id'])?>)"><i class="fa fa-send"></i> Send Message</button>
  
</div>
<div class="col-md-12">
	<p style="color:#000;"><em>Options here</em></p>
</div>
