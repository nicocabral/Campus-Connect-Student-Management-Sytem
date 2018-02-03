
<div class="panel panel-default"  style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
  <div class="panel-heading" style="text-align:left;color:#008CBA;font-variant:small-caps;">
  <div class="row">
  <div class="col-md-6"><i class="fa fa-list-alt"></i> Subject Module</div>
  <div class="col-md-6"><div class="col-sm-4"></div>
  <div class="col-sm-8"><input type="search" onkeyup="searchSubject(this.value)"class="form-control" style="border-radius:0" placeholder="Search here..."></div></div></div></div>
  <div class="panel-body" style="height:auto;">
  <div class="row">
  <div class="col-md-6">
 
  <div class="btn-group pull-left">
    <button class="button-blue" id="btnSubject">Add Subject</button>

  </div>
  </div>
   
  </div>

  <div class="row">
  <div class="col-md-6" style="margin-top:10px;">
<div id="message"></div>
	<div class="table-responsive" style="height:350px;" id="studrecordcontent">
	
			

		<table class="table table-striped table-bordered table-condensed table-hover " width="100%;" style="color:#000;">
		
				<tr style="background-color:#008CBA;color:#FFF; font-size:14px;">
				<th>Subject code.</th>
				<th>Description.</th>
				<th>Units</th>
				<th><center><i class="fa fa-gear"></i></center></th></tr>
		
			<tbody id="subjectRec">
				
			</tbody>
		</table>
	</div>
	</div>
	<div class="col-md-6">
		<div id="editSubject"></div>
	</div>
   </div>
  </div>
</div>
<script>
$('#btnSubject').click(function(){
		
		$('#addSubject').modal('show');
		
		return false;
	});
function editSubject(id){
	$.ajax({
		url:'editSubject.php?id='+id,
		type:'POST',
		cache:false,
		success:function(html){
			$('#editSubject').html(html);
		}
	})
	
	return false;
}
function searchSubject(str){
	$.ajax({
		url:'subjectrecord.php?str='+str,
		type:'POST',
		cache:false,
		success:function(html){
			$('#subjectRec').html(html);
		}
	})
	
	return false;
}
</script>
