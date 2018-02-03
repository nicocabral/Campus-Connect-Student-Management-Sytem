<p style="color:#000;font-size:14px;text-align:left;"><em><i class="fa fa-edit"></i> Create message</em></p>
	<hr>
	
	<?php 
	session_start();
	include('includes/conn.php');
$id = intval($_GET['id']);
$query = mysql_query("SELECT * FROM studentrec WHERE studid = '$id'") or die (mysql_error());
while($studrows = mysql_fetch_array($query)){
	$_SESSION['rid'] = $studrows['studid'];
	?>
	
		<div class="col-md-2">
			<p style="color:#000;">Send to:</p>
		</div>
		<div class="col-md-10">
			<p style="color:#000;"><?php echo $studrows['lname'].', '.$studrows['fname'].' '.$studrows['mname'];?></p>
		</div>
		
	<?php
}
?>
<div class="col-md-12">
	<textarea class="form-control input-lg" style="border-radius:0;" cols="50" rows="5" placeholder="Enter your message here..." id="msgcontent"></textarea><hr>
	</div>
	<div class="col-md-12">
	<div class="pull-right btn-group" role="group" aria-label="...">
	<button type="reset" class="button-blue">Clear</button>
  <button type="button" class="button-blue" onclick="sendMsg()"><i class="fa fa-send"></i> Send Message</button>
  </div>
</div>