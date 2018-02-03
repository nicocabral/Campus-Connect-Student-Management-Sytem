<form id="updatesGradeForm">
<div class="col-md-12">
<p id="gradeMSg"></p>

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
$query = mysql_query("SELECT subject.*,studentgrade.* FROM studentgrade LEFT JOIN subject ON studentgrade.subjectid = subject.subid WHERE studentgrade.studid = '$getSgid' AND studentgrade.sem = '$getSem' AND studentgrade.year = '$year'") or die (mysql_error());
if(mysql_num_rows($query)>0){
	while($sqlrows = mysql_fetch_array($query)){
		$count++;?>
		<tr style="color:#000;">
			<td><?php echo $sqlrows['subjectcode'];?>
				
			</td>
			<td><?php echo $sqlrows['description'];?></td>
			<td><center><?php echo $sqlrows['units'];?></center></td>
			<td><center><p style="color:#000;"><?php echo $sqlrows['grade']?></p></center></td>
		
		</tr>
		
		<?php
	}
}else {
	echo '<tr><td colspan="4"><center><p style="color:red;">No record found</p></center></td></tr>';
}
?>
</table>
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