<form method="post" action="process/savestudentsubjectprocess.php">
<?php include('includes/conn.php');
	$getID = intval($_GET['id']);
	$sql = mysql_query("SELECT * FROM studentrec WHERE studid = '$getID'") or die (mysql_error());
	if(mysql_num_rows($sql)>0){
		while($row = mysql_fetch_array($sql)){
			?>
	<div class="row">
<div class="col-md-3">
	<p style="text-align:left;color:#000;">Student ID no.</p>
</div>
<div class="col-md-9">
	<p style="text-align:left;color:#000;"><strong><?php echo $row['studentidno']?></strong></p>
	<input type="hidden" value="<?php echo $row['studid']?>" id="studentid" name="studentid">
</div>
</div>
<div class="row">
<div class="col-md-3">
	<p style="text-align:left;color:#000;">Student name</p>
</div>
<div class="col-md-9">
	<p style="text-align:left;color:#000;"><strong><?php echo $row['lname'].', '.$row['fname'].' '.$row['mname'].' &emsp;'.$row['year'].' '.$row['section'];?></strong></p>
</div>
</div>
<div class="row">
<p><em>Student Subjects</em></p>
	<div class="col-md-6">
		
		<input type="search" class="form-control" placeholder="Search subject code or subject description" style="border-radius:0;" onkeyup="searchStudentSubject(this.value)">
		
	</div>
</div>
<div class="row"style="margin-top:10px;">
	
	<div class="col-md-6">
	
	<em style="text-align:left;font-size:12px;">Double click to add subject on the list</em>
	
	<div class="table-responsive">
		<table class="table  table-condensed table-bordered" width="100%;">
			<thead>
				<tr  style="background-color:#008CBA;color:#FFF;">
					<th>Subject code</th>
					<th>Description</th>
					<th>Units</th>
				</tr>
			</thead>
			<tbody id="studSubjectList">
			<?php include('includes/conn.php');
			$query = mysql_query("SELECT * FROM subject order by subjectcode") or die (mysql_error());
			if(mysql_num_rows($query)>0){
				while($rows = mysql_fetch_array($query)){
					?>
					<tr style="cursor:pointer;" ondblclick="myFunction(<?php echo $rows['subid']?>,'<?php echo $rows['subjectcode']?>','<?php echo $rows['description']?>','<?php echo $rows['units']?>','<?php echo $row['studid']?>')">
					<td><?php echo $rows['subjectcode']?></td>
					<td><?php echo $rows['description']?></td>
					<td><?php echo $rows['units']?></td>
					</tr>
					<?php
				}
			}?>
				
			
			</tbody>
		</table>
	</div>
	</div>
	<div class="col-md-6">
	<br>
		<div class="table-responsive">
			<table class="table table-condensed table-bordered" width="100%;">
				<thead>
					<tr style="background-color:#008CBA;color:#FFF;">
						<th>Subject list</th>
						<th><center><i class="fa fa-gear"></i></center></th>
					</tr>
				</thead>
				<tbody id="mysubjectList"></tbody>
			</table>
			
		</div>
	
	</div>
</div>		
<div class="row">
	<div class="col-md-6">
		<p style="color:#FFF;text-align:left;">Sem</p>
		<select class="form-control" style="border-radius:0;" required name="sem">
			<option value="1st Sem">1st Sem</option>
			<option value="2nd Sem">2nd Sem</option>
		</select>
	</div>
	<div class="col-md-6">
	
		<p style="color:#FFF;text-align:left;">Year</p>
		<input type="text" placeholder="2016-2017" class="form-control" style="border-radius:0;" required name="year">
	</div>
</div>
<div class="row" style="margin-top:10px;">
	<div class="col-md-6"></div>
	<div class="col-md-6">
	<button class="button-white" name="save"><i class="fa fa-save"></i> Save</button></div>

</div>
			
			<?php
			
		}
	}
?>
</form>
<script>
function searchStudentSubject(str){
	var id = $('#studentid').val();
		$.ajax({
			url:'searchResultStudentsubject.php?str='+str+'&id='+id,
			type:'POST',
			cache:false,
			success:function(html){
				$('#studSubjectList').html(html);
			}
			
		});
	
	return false;
}
function myFunction(id,subcode,des,u,sid){
	$('#mysubjectList').append('<tr style="color:#FFF;"><td>'+subcode+' - '+des+' <input type="hidden" value="'+id+'" name="subjectID[]"><input type="hidden" value="'+sid+'" name="sid[]"></td><td><center><button class="btn btn-danger btn-sm" style="border-radius:0;" id="remove">&times;</button></center></td></tr>')
	
	return false;
}
$(function(){
	$('#mysubjectList').delegate('#remove','click',function(){
		$(this).parent().parent().parent().remove();
	})
})
</script>