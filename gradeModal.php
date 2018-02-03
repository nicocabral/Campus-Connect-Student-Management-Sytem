<!-- Modal -->
<div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#008CBA; color:#FFF;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="font-variant:small-caps;font-size:24px;"><i class="fa fa-list-alt"></i>  Grade Module</h4>
      </div>
      <div class="modal-body">
	  <div class="row">
		<div class="col-md-4">
		<p style="color:#000;">Select sem</p>
		<select class="form-control" style="border-radius:0;" id="sem">
			<option>Select sem</option>
			<option value="1st Sem">1st Sem</option>
			<option value="2nd Sem">2nd Sem</option>
		</select>
		</div>
		
		<div class="col-md-4">
		<p style="color:#000;">Select year From</p>
		<select class="form-control" id="yearfrom"  style="border-radius:0;">
			
			<?php 
			$year = date('Y');
			for($i=2010;$i<$year;$i++){
				echo '<option value="'.$i.'">'.$i.'</option>';
			}?>
		</select>
		</div>
		<div class="col-md-4">
		<p style="color:#000;">Select year to</p>
		<select class="form-control"  style="border-radius:0;" id="yearto">
			<?php 
			$year = date('Y');
			for($i=2010;$i<=$year;$i++){
				echo '<option value="'.$i.'">'.$i.'</option>';
			}?>
		</select>
		</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="table-responsive" id="viewgradeCOntent">
				
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="button-blue" onclick="viewGrade()"><i class="fa fa-search"></i> View grade</button>
      </div>
    </div>
  </div>
</div>