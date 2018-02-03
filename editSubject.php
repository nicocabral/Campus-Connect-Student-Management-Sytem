<div class="panel panel-primary" style="font-size:15px;font-variant:small-caps;">
	<div class="panel-heading">
		<h5 style="text-align:left;"><strong><i class="fa fa-edit"></i> Edit Subject</strong></h5>
	</div>
	<div class="panel-body" >
	<form id="updateSubForm">
		<?php include('includes/conn.php');
		$getId = intval($_GET['id']);
		$sql = mysql_query("SELECT * FROM subject WHERE subid = '$getId'") or die (mysql_error());
		if(mysql_num_rows($sql)>0){
			while($subrows = mysql_fetch_array($sql)){
				?>
				<div class="row">
					<div class="col-md-12">
					
						<label style="color:#000;">Subject Code</label>
						<input type="text" class="form-control input-md" style="border-radius:0;" name="scode" value="<?php echo $subrows['subjectcode']?>" required>
						<input type="hidden" style="border-radius:0;" name="id" value="<?php echo $subrows['subid']?>" required>
						
					</div>
				</div>
				<div class="row"style="margin-top:10px;">
					<div class="col-md-12">
						<label style="color:#000;">Subject Description</label>
						<input type="text" class="form-control input-md" style="border-radius:0;" name="des" value="<?php echo $subrows['description']?>" required>
						
					</div>
				</div>
				<div class="row"style="margin-top:10px;">
					<div class="col-md-12">
						<label style="color:#000;">Units</label>
						<input type="number" class="form-control input-md" style="border-radius:0;" name="units" value="<?php echo $subrows['units']?>" required>
						
					</div>
				</div>
				<div class="row"style="margin-top:10px;">
					<div class="col-md-12">
						
						<button class="button-blue"type="submit" style="font-size:12px;"><i class="fa fa-upload"></i> Update</button>
					
					
				
						<a class="button-red" onclick="deleteSubject(<?php echo $subrows['subid']?>)" style="font-size:12px;text-decoration:none;color:#FFF;"><i class="fa fa-trash"></i> Delete</a>
					
					</div>
				</div>
				
				<?php
			}
		}?>
		</form>
	</div>
</div>
<script>

$("#updateSubForm").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'process/Updatesubprocess.php',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	     $("#message").empty();
	     $("#message").html(data);
		 loadSubject();
	  }
	  });
	  return false;
	});

function deleteSubject(id){
	var x = confirm("Are you sure you want to delete this subject?");
	if(x==true){
	$.ajax({
		url:'process/deletesubjectProcess.php?id='+id,
		type:'POST',
		cache:false,
		success:function(data){
			$('#message').html(data);
			$.ajax({
			url:'subjectModule.php',
			type:'GET',
			cache:false,
			success:function(html){
				$('#content').html(html);
				loadSubject();
			}
		});
		}
	});
	return true;
	}
	return false;
}
</script>