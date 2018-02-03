<!-- Modal -->
<div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#008CBA; color:#FFF;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="font-variant:small-caps;font-size:24px;"><i class="fa fa-list-alt"></i> Course listing</h4>
      </div>
      <div class="modal-body">
	  <div class="row">
		<div class="col-md-12">
		<div id="courseMsg"></div>
		<input type="text" class="form-control input-lg" id="coursename" placeholder="Add Course" style="border-radius:0;">
		<span class="pull-right" style="margin-top:10px;"><button type="button" class="button-blue" id="btnCourse"><i class="fa fa-save"></i> Save</button></span>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<div class="table-responsive" style="height:250px;">
				<table class="table table-bordered table-striped table-condensed table-hover" width="100%;" style="color:#000;">
					<thead>
						<tr>
							<th>Course</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="coursecontent"></tbody>
				</table>
			</div>
		</div>
		</div>
      </div>
      
    </div>
  </div>
</div>