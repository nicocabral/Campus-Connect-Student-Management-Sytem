
<div class="panel panel-default"  style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
  <div class="panel-heading" style="text-align:left;color:#008CBA;font-variant:small-caps;">
  <div class="row">
  <div class="col-md-6"><i class="fa fa-list-ul"></i> Grade Module</div>
  <div class="col-md-6"><div class="col-sm-4"></div>
  <div class="col-sm-8"><input type="search" onkeyup="searchGrade(this.value)"class="form-control" style="border-radius:0" placeholder="Search student id no or last name"></div></div></div></div>
  <div class="panel-body" style="height:auto;">
  <div class="row">
  <div class="col-md-12" style="margin-top:10px;">
<div id="message"></div>
	<div class="table-responsive" style="height:350px;" id="studrecordcontent">
		<table class="table table-striped table-bordered table-condensed table-hover " width="100%;" style="color:#000;">
		
				<tr style="background-color:#008CBA;color:#FFF; font-size:14px;">
				<th>Student id no</th>
				<th>Student name</th>
				<th>Year and Section</th>
				<th><center><i class="fa fa-gear"></i></center></th></tr>
		
			<tbody id="gradeRec">
				
			</tbody>
		</table>
	</div>
	</div>
	
   </div>
  </div>
</div>
<script>
function searchGrade(str){
	$.ajax({
		url:'gradeRecord.php?str='+str,
		type:'POST',
		cache:false,
		success:function(html){
			$('#gradeRec').html(html);
		}
	})
	return false;
}
function editGrade(id){
	$('#updateGradeModal').modal('show');
		$.ajax({
			url:'studentGrade.php?id='+id,
			type:'POST',
			cache:false,
			success:function(html){
				$('#gUpdate').html(html);
			}
		})
	return false;
}
function viewGrade(id){
	$('#updateGradeModal').modal('show');
	$.ajax({
			url:'viewstudentGrade.php?id='+id,
			type:'POST',
			cache:false,
			success:function(html){
				$('#gUpdate').html(html);
			}
		})
	return false;
}

</script>
