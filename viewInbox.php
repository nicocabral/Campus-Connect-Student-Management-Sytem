<div class="table responsive">
<table class="table table-hover table-bordered table-condensed" width="100%;" style="color:#000;">
<thead>
	<tr>
		<th>FROM</th>
		<th>CONTENT</th>
		<th>DATE</th>
		<th>STATUS</th>
		<th><center><i class="fa fa-gear"></i></center></th>
	</tr>
</thead>
<tbody style="font-size:16px;">
<?php 
	session_start();
	include('includes/conn.php');
	$sql = mysql_query("SELECT studentrec.*,message.* FROM message LEFT JOIN studentrec ON message.recieverid = studentrec.studid WHERE message.recieverid = '".$_SESSION['id']."' order by message.mstatus") or die (mysql_error());
	if(mysql_num_rows($sql)>0){
		while($row = mysql_fetch_array($sql)){ ?>
		
		<tr style="color:#000;">
			<td><?php include('includes/conn.php');
			$query = mysql_query("SELECT studentrec.studid,studentrec.lname as lastname,studentrec.fname as firstname,studentrec.mname as middlename,message.* FROM message LEFT JOIN studentrec ON message.senderid = studentrec.studid WHERE message.senderid = '".$row['senderid']."' order by message.mstatus LIMIT 1") or die (mysql_error());
			while($rows = mysql_fetch_array($query)){
				echo $rows['lastname'].', '.$rows['firstname'];
			}
			?></td>
			<td><a href="download.php?link=<?php echo $row['content']?>" style="text-decoration:none;color:#000;"> <?php echo $row['content']?></a></td>
			<td><?php echo $row['datesend']?></td>
			<td><?php echo $row['mstatus']?></td>
			<td>
			<center>
			<div class="btn-group" role="group" aria-label="...">
			<button class="btn btn-primary btn-sm" style="border-radius:0;" onclick="markasread(<?php echo $row['mid']?>)"><i class="fa fa-check"></i> </button>
			<button class="btn btn-danger btn-sm" style="border-radius:0;" onclick="deleteMsg(<?php echo $row['mid']?>)"><i class="fa fa-trash"></i></button></div></center></td>
		</tr>
		<?php
		}
	}
?>
</tbody>
</table>
</div>
<script>
	
</script>