<form id="updatesGradeForm">
<div class="col-md-12">
<p id="gradeMSg"></p>
<input type="hidden" value="<?php echo $_GET['sem']?>" name="getSem">
<input type="hidden" value="<?php echo $_GET['gyf']?>" name="getGyf">
<input type="hidden" value="<?php echo $_GET['gyt']?>" name="getGyt">
</div>
<table class="table table-bodered table-condensed table-striped" style="color:#000;">
<tr style="background-color:#008CBA;color:#FFF;">
			<th>Subject Code</th>
			<th>Description</th>
			<th>Units</th>
			<th><center>Grade</center></th>
		</tr>
<?php include('includes/conn.php');
$getSgid = intval($_GET['sgid']);
$getSem = mysql_real_escape_string(trim($_GET['sem']));
$getgyf = mysql_real_escape_string(trim($_GET['gyf']));
$getgyt = mysql_real_escape_string(trim($_GET['gyt']));
$year = $getgyf.'-'.$getgyt;
$count = 0;
$query = mysql_query("SELECT subject.*,studentsubject.*,studentgrade.* FROM studentsubject LEFT JOIN subject on subject.subid = studentsubject.subjectid LEFT JOIN studentgrade ON studentsubject.subjectid = studentgrade.subjectid WHERE studentsubject.studentid = '$getSgid' AND studentsubject.sem = '$getSem' AND studentsubject.year = '$year'") or die (mysql_error());
if(mysql_num_rows($query)>0){
	while($sqlrows = mysql_fetch_array($query)){
		$count++;?>
		<tr style="color:#000;">
			<td><?php echo $sqlrows['subjectcode'];?>
				<input type="hidden" value="<?php echo $sqlrows['subid']?>" name="subid<?php echo $count;?>">
			</td>
			<td><?php echo $sqlrows['description'];?></td>
			<td><center><?php echo $sqlrows['units'];?></center></td>
			<td><center><input type="number" class="form-control" style="border-radius:0;"step="any" value="<?php echo $sqlrows['grade']?>" name="grade<?php echo $count;?>">
			<input type="hidden" class="form-control" style="border-radius:0;" name="gstudid" value="<?php echo $sqlrows['studentid']?>"></center></td>
		
		</tr>
		
		<?php
	}
}else {
	echo '<tr><td colspan="4"><center><p style="color:red;">No record found</p></center></td></tr>';
}
?>
</table>


<div class="col-md-12">
<div class="col-md-6"></div>
<div class="col-md-6">
<center>
	<button class="button-blue" type="submit"><i class="fa fa-upload" onclick="btnUpdatesGrade();"></i> Update</button>
</center>
<br>
	</div>
	</div>
</form>
<script>
$("#updatesGradeForm").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'process/updatesGradeprocess.php',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	    alert(data);
		 
	  }
	  });
	  return false;
	});

</script>