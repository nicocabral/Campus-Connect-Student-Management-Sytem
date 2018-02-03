<div class="panel panel-primary">
	<div class="panel-heading"><i class="fa fa-envelope"></i> Message module</div>
	<div class="panel-body">
	<div class="row">
	<div class="col-md-4" style="color:#000;">
		<ul class="list-group">
		  <li class="list-group-item" onclick="viewMyinbox()" style="cursor:pointer;">
			<span class="badge" style="color:#FFF; background-color:red;"><?php 
			session_start();
			include('includes/conn.php');
			$sqlq = mysql_query("SELECT COUNT(*) as new FROM message WHERE mstatus = 'New' AND recieverid='".$_SESSION['id']."'") or die (mysql_error());
			if($newmsg = mysql_fetch_array($sqlq)){
				echo $newmsg['new'].' New message';
			}
			?></span>
			Inbox
		  </li>
</ul>
<hr>
<div class="col-sm-12" style="color:#000;">
<input type="search" onkeyup="searchStudent(this.value)" class="form-control" style="border-radius:0;" placeholder="Search student id no or lastname..">
<div style="height:200px;" style="margin-top:10px;">
<ul class="list-group" style="margin-top:10px;"  id="sres">
<?php include('includes/conn.php');

$query = mysql_query("SELECT * FROM studentrec WHERE studid != '".$_SESSION['id']."' order by lname") or die (mysql_error());
if(mysql_num_rows($query)>0){
	while($row = mysql_fetch_array($query)){?>		 
		 <li class="list-group-item" style="font-size:12px;cursor:pointer;" onclick="msgOptions(<?php echo $row['studid']?>)">
		 <?php echo $row['studentidno'].' '.$row['lname'].', '.$row['fname'];?>
		  </li>
		
<?php }
}?>
</ul>
</div>
</div>
	</div>
	<div class="col-md-8">
	<div id="msgOptionsContent"></div>
	<div id="optionContent"></div>
	</div>
	</div>
	
	</div>
	
</div>
<script>
function searchStudent(str){
	$.ajax({
		url:'result.php?str='+str,
		type:'POST',
		cache:false,
		success:function(html){
			$('#sres').html(html);
			
		}
	})
	
	return false;
}
function msgOptions(id){
	$.ajax({
		url:'messageOption.php?id='+id,
		type:'POST',
		cache:false,
		success:function(html){
			$('#msgOptionsContent').html(html);
		}
	})
	return false;
}
function myOption(id){
	$('#sendModal').modal('show');
	$.ajax({
		url:'sento.php?id='+id,
		type:'POST',
		cache:false,
		success:function(html){
			$('#sendto').html(html);
		}
	})
	return false;
}
function optionMsg(id){
	$('#sendMsgModal').modal('show');
	$.ajax({
		url:'messageContent.php?id='+id,
		type:'POST',
		cache:false,
		success:function(html){
			$('#sendMsgto').html(html);
		}
	})
	return false;
}
function sendMsg(){
	var c = $('#msgcontent').val();
	$.ajax({
		url:'process/sendMessage.php?content='+c,
		type:'POST',
		cache:false,
		success:function(data){
			alert(data);
		}
	})
	
	return false;
}
function viewMyinbox(){
	$.ajax({
		url:'viewInbox.php',
		type:'GET',
		cache:false,
		success:function(html){
			$('#msgOptionsContent').html(html);
		}
	})
	return false;
}
function markasread(id){
		$.ajax({
			url:'process/markasread.php?id='+id,
			type:'POST',
			cache:false,
			success:function(){
				viewMyinbox();
			}
		})
		return false;
	}
function deleteMsg(id){
	var x = confirm("Delete this message?");
	if(x==true){
		$.ajax({
			url:'process/deleteMsg.php?id='+id,
			type:'POST',
			cache:false,
			success:function(){
				viewMyinbox();
			}
		})
	}else {
		return false;
	}
		return false;
	}

</script>