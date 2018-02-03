<?php include('includes/conn.php');
$id = intval($_GET['id']);
$query = mysql_query("SELECT * FROM studentrec WHERE studid = '$id'") or die (mysql_error());
while($studrows = mysql_fetch_array($query)){
	?>
	<div class="row">
	<div class="col-md-12">
		<div class="col-md-2">
			<p style="color:#000;">Send to:</p>
		</div>
		<div class="col-md-10">
			<p style="color:#000;"><?php echo $studrows['lname'].', '.$studrows['fname'].' '.$studrows['mname'];?></p>
		</div>
		</div>
	</div>
	
	
	
	
	
	<?php
}
?>