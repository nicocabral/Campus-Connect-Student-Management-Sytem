
<div class="panel panel-primary"style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
<div class="panel-heading"><h3><i class="fa fa-user"></i> Student record</h3></div>
<div class="panel-body">
<form id="updateRecform">
<?php include('includes/conn.php');
$getId = intval($_GET['id']);
$sqlquery = mysql_query("SELECT * FROM studentrec WHERE studid = '$getId'") or die (mysql_error());
if(mysql_num_rows($sqlquery)>0){
	while($studrow = mysql_fetch_array($sqlquery)){?>
<div class="row">
		<div class="col-md-12">
		<div id="message"></div>
		<label style="color:#000; text-align:left;">Student ID no.</label>
		<input type="text" class="form-control input-lg" value="<?php echo $studrow['studentidno']?>" id="stidno" name="vstidno" placeholder="Student id no." style="border-radius:0;" required>
		<input type="hidden" value="<?php echo $studrow['studid']?>" id="idno" name="vidno" style="border-radius:0;" required>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
		<div class="col-md-6">
		<label style="color:#000;text-align:left;">First name</label>
		<input type="text" class="form-control input-lg" id="fname" name="vfname" value="<?php echo $studrow['fname']?>" placeholder="First name" style="border-radius:0;" required>
		</div>
		
		<div class="col-md-6">
		<label style="color:#000;text-align:left;">Last name</label>
		<input type="text" class="form-control input-lg" id="lname" name="vlname" value="<?php echo $studrow['lname']?>" placeholder="Last name" style="border-radius:0;"required>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
		<div class="col-md-6">
		<label style="color:#000;text-align:left;">Middle name</label>
		<input type="text" class="form-control input-lg" id="mname" name="vmname" value="<?php echo $studrow['mname']?>" placeholder="Middle name" style="border-radius:0;" required>
		</div>
		<div class="col-md-6">
		<label style="color:#000;text-align:left;">Birthdate</label>
		<input type="text" class="form-control input-lg" id="dob" name="vbdate" value="<?php echo $studrow['bdate']?>" placeholder="Birthday" style="border-radius:0;" required>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
		<div class="col-md-6">
		<label style="color:#000;text-align:left;">Address</label>		
		<textarea class="form-control" style="border-radius;:0;" name="vaddress"  placeholder="Address" required><?php echo $studrow['address']?></textarea>
		</div>
		<div class="col-md-6">
		<label style="color:#000;text-align:left;">Contact</label>
		<input type="text" class="form-control input-lg" id="contact" name="vcontact" value="<?php echo $studrow['contact']?>" placeholder="Contact no" style="border-radius:0;" required>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
		<div class="col-md-6">
		<label style="color:#000;text-align:left;">Email</label>
		<input type="email" class="form-control input-lg" id="email" name="vemail" value="<?php echo $studrow['email']?>" placeholder="Email" style="border-radius:0;" required>
		</div>
		<div class="col-md-6">
		<label style="color:#000;text-align:left;">Course</label>
		<select class="form-control input-lg" style="border-radius:0;" name="vcourse" required>
		<option value="<?php echo $studrow['course']?>"><?php echo $studrow['course']?></option>
		<option>Select course</option>
		<?php include('../includes/conn.php');
			$query = mysql_query("SELECT * FROM course order by course") or die (mysql_error());
			if(mysql_num_rows($query)>0){
				while($row = mysql_fetch_array($query)){
					echo '<option value="'.$row['course'].'">'.$row['course'].'</option>';
				}
			}
			
		?>
		</select>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
		<div class="col-md-6">
		<label style="color:#000;text-align:left;">Year</label>
		<select class="form-control input-lg" name="vyear" required> 
		<option value="<?php echo $studrow['year']?>"><?php echo $studrow['year']?></option>
			<option>Select year</option>
			<option value="1st year">1st year</option>
			<option value="2nd year">2nd year</option>
			<option value="3rd year">3rd year</option>
			<option value="4th year">4th year</option>
		</select>
		</div>
		<div class="col-md-6">
		<label style="color:#000;text-align:left;">Section</label>
		<select class="form-control input-lg" name="vsection" required>
		<option value="<?php echo $studrow['section']?>"><?php echo $studrow['section']?></option>
			<option>Select section</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
		</select>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
			<div class="col-md-6">
			</div>
			<div class="col-md-6">
				<button class="button-white" onclick="studrecord()">Cancel</button>
				<button class="button-blue" type="submit"><i class="fa fa-upload"></i> Update</button>
				<button class="button-red" onclick="deletestudrec(<?php echo $studrow['studid'];?>)"><i class="fa fa-trash"></i> Delete</button>
			</div>
			
		</div>
		
<?php }} else {
	echo '<div class="row">
		<div class="col-md-12">
			<h3 style="color:red;">Record does not exist</h3>
		</div>
	</div>';
}?>
</form>
</div>
		</div>
	<script>
	  $(function(){
		 $('#dob').datepicker(); 
	  });
	  function studrecord(){
	$.ajax({
			url:'studentModule.php',
			type:'GET',
			cache:false,
			success:function(html){
				$('#content').html(html);
				loadStudentrec();
				
			}
		})
		
	return false;
}
	  $("#updateRecform").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'process/updatestudentrecprocess.php',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	    studrecord();
		 $('#message').html(data);
		 
	  }
	  });
	  return false;
	});
function deletestudrec(id){
	var x = confirm('Are you sure you want to delete this record?');
	if(x==true){
	$.ajax({
		url:'process/deletestudentrecprocess.php?id='+id,
		type:'POST',
		cache:false,
		success:function(data){
			alert("Delete successfully!");
		}
	})
	}else {
		return false;
	}
	return false;
}
	  </script>