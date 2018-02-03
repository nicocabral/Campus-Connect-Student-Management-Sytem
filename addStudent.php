<!-- Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#008CBA; color:#FFF;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="font-variant:small-caps;font-size:24px;"><i class="fa fa-plus"></i> Add Student record</h4>
      </div>
	  
	  <form id="addstudentForm">
      
	  <div class="modal-body">
	  <div class="row">
		<div class="col-md-12">
		<div id="logMsg"></div>
		<input type="text" class="form-control input-lg" id="stidno" name="stidno" placeholder="Student id no." style="border-radius:0;" required>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
		<div class="col-md-6">
		<input type="text" class="form-control input-lg" id="fname" name="fname" placeholder="First name" style="border-radius:0;" required>
		</div>
		
		<div class="col-md-6">
		<input type="text" class="form-control input-lg" id="lname" name="lname" placeholder="Last name" style="border-radius:0;"required>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
		<div class="col-md-6">
		<input type="text" class="form-control input-lg" id="mname" name="mname" placeholder="Middle name" style="border-radius:0;" required>
		</div>
		<div class="col-md-6">
		<input type="text" class="form-control input-lg" id="bdate" name="bdate" placeholder="Birthday" style="border-radius:0;" required>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
		<div class="col-md-6"> 
		<textarea class="form-control" style="border-radius;:0;" name="address" placeholder="Address" required></textarea>
		</div>
		<div class="col-md-6">
		<input type="text" class="form-control input-lg" id="contact" name="contact" placeholder="Contact no" style="border-radius:0;" required>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
		<div class="col-md-6">
		<input type="email" class="form-control input-lg" id="email" name="email" placeholder="Email" style="border-radius:0;" required>
		</div>
		<div class="col-md-6">
		<select class="form-control input-lg" style="border-radius:0;" name="course" required>
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
		<select class="form-control input-lg" name="year" required> 
			<option>Select year</option>
			<option value="1st year">1st year</option>
			<option value="2nd year">2nd year</option>
			<option value="3rd year">3rd year</option>
			<option value="4th year">4th year</option>
		</select>
		</div>
		<div class="col-md-6">
		<select class="form-control input-lg" name="section" required>
			<option>Select section</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
		</select>
		</div>
		</div>
      </div>
      <div class="modal-footer">
        
		<button type="reset" class="button-white">Clear</button>
        <button type="submit" class="button-blue"><i class="fa fa-download"></i> Save</button>
      </div>
	  </form>
    </div>
  </div>
</div>
<script>
	  $(function(){
		 $('#bdate').datepicker(); 
	  });
	  </script>