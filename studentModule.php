<style>
@table_width: 750px;
@table_body_height: 300px;
@column_one_width: 200px;
@column_two_width: 200px;
@column_three_width: 350px;

.fixed_headers {
  width: @table_width;
  table-layout: fixed;
  border-collapse: collapse;
  
  th { text-decoration: underline; }
  th, td {
    padding: 5px;
    text-align: left;
  }
  
  td:nth-child(1), th:nth-child(1) { min-width: @column_one_width; }
  td:nth-child(2), th:nth-child(2) { min-width: @column_two_width; }
  td:nth-child(3), th:nth-child(3) { width: @column_three_width; }

  thead {
    background-color: @header_background_color;
    color: @header_text_color;
    tr {
      display: block;
      position: relative;
    }
  }
  tbody {
    display: block;
    overflow: auto;
    width: 100%;
    height: @table_body_height;
    tr:nth-child(even) {
      background-color: @alternate_row_background_color;
    }
  }
}

.old_ie_wrapper {
  height: @table_body_height;
  width: @table_width;
  overflow-x: hidden;
  overflow-y: auto;
  tbody { height: auto; }
}


</style>
<div class="panel panel-default"  style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
  <div class="panel-heading" style="text-align:left;color:#008CBA;font-variant:small-caps;">
  <div class="row">
  <div class="col-md-6"><i class="fa fa-user"></i> Student Module</div>
  <div class="col-md-6"><div class="col-sm-4"></div>
  <div class="col-sm-8"><input type="search" onkeyup="searchData(this.value)"class="form-control" style="border-radius:0" placeholder="Search here..."></div></div></div></div>
  <div class="panel-body" style="height:400px;">
  <div class="row">
  <div class="col-md-12">
 
  <div class="btn-group pull-left">
    <button class="button-blue" id="addstudent">Add Student</button>
	<button class="button-blue" id="course">Course</button>
  </div>
  </div>
   
  </div>

  <div class="row">
  <div class="col-md-12" style="margin-top:10px;">
<div id="message"></div>
	<div class="table-responsive fixed_headers" style="height:350px;" id="studrecordcontent">
	
			

		<table class="table table-striped table-bordered table-condensed table-hover " width="100%;" style="color:#000;">
		
				<tr style="background-color:#008CBA;color:#FFF; font-size:14px;"><th>Student no.</th>
				<th>Student name.</th>
				<th>Student Course.</th>
				<th>Student Year & Section.</th>
				<th><center><i class="fa fa-gear"></i></center></th></tr>
		
			<tbody id="studentrec">
			
			</tbody>
		</table>
	</div>
	</div>
	
   </div>
  </div>
</div>
<script>
$('#addstudent').click(function(){
		$('#addStudentModal').modal('show');
	return false;
	});
$('#course').click(function(){
	$('#courseModal').modal('show');
	$.ajax({
		url:'coursecontent.php',
		type:'GET',
		cache:false,
		success:function(html){
			$('#coursecontent').html(html);
		}
	})
	return false;
});
function loadCourse(){
	$.ajax({
		url:'coursecontent.php',
		type:'GET',
		cache:false,
		success:function(html){
			$('#coursecontent').html(html);
		}
	});
	return false;
}
$('#btnCourse').click(function(){
	var course = $('#coursename').val();
	$.ajax({
		url:'process/addcourseprocess.php?c='+course,
		type:'POST',
		cache:false,
		success:function(data){
			$('#courseMsg').html(data);
			document.getElementById('coursename').value="";
			loadCourse();
		}
	});
	return false;
});
$('#coursename').keypress(function(){
	$('#courseMsg').empty();
	
});
function deleteCourse(id){
	var x = confirm('Are you sure you want to delete this course?');
	if(x == true){
		$.ajax({
			url:'process/deletecourseprocess.php?id='+id,
			type:'POST',
			cache:false,
			success:function(data){
				$('#courseMsg').html(data);
				loadCourse();
			}
		});
	}
	else {
		return false;
	}
	return false;
}
function searchData(str){
	$.ajax({
	url:'studentreccontent.php?str='+str,
	type:'POGETST',
	cache:false,
	success:function(html){
		$('#studentrec').html(html);
	}
	})
	return false;
}
function viewstudrec(id){
	
	$.ajax({
		url:'studrecContent.php?id='+id,
		type:'POST',
		cache:false,
		success:function(html){
			$('#content').html(html);
			
		}
	})
	
	return false;
}
function studSubject(id){
	$.ajax({
		url:'addStudentSubject.php?id='+id,
		type:'POST',
		cache:false,
		success:function(html){
			$('#content').html(html);
		}
	})
	
	return false;
}

</script>
