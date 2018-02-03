<!-- Modal -->
<div class="modal fade" id="addSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	
      <div class="modal-header" style="background-color:#008CBA; color:#FFF;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="font-variant:small-caps;font-size:24px;"><i class="fa fa-list-alt"></i> Subject listing</h4>
      </div>
	  <form id="addSubjectForm">
      <div class="modal-body">
	  <div class="row">
		<div class="col-md-12">
		<div id="subMsg"></div>
		<label style="color:#000;">Subject code</label>
		<input type="text" class="form-control input-lg" id="scode" name="scode" style="border-radius:0;" required>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
		<label style="color:#000;">Description</label>
		<input type="text" class="form-control input-lg" name="des" style="border-radius:0;"required>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
		<label style="color:#000;">Units</label>
		<input type="number" class="form-control input-lg" name="units" style="border-radius:0;"required>
		</div>
		</div>
		
      </div>
      <div class="modal-footer">
		<button type="reset" class="button-white">Clear</button>
        <button type="submit" class="button-blue" id="btnsaveSubject"><i class="fa fa-download"></i> Save</button>
      </div>
	  </form>
    </div>
  </div>
</div>