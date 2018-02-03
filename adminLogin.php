<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id="adminLoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#008CBA; color:#FFF;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="font-variant:small-caps;font-size:24px;"><i class="fa fa-sign-in"></i> Admin Login</h4>
      </div>
      <div class="modal-body">
	  <div class="row">
		<div class="col-md-12">
		
		<input type="text" class="form-control input-lg" id="uname" placeholder="Username" style="border-radius:0;">
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
		<input type="password" class="form-control input-lg" id="pword" placeholder="Password" style="border-radius:0;">
		</div>
		</div>
      </div>
      <div class="modal-footer">
        <span class="pull-left">
			<div id="logMsg" style="color:red;"></div>
		</span>
        <button type="button" class="button-blue" id="btnLogin"><i class="fa fa-sign-in"></i> Login</button>
      </div>
    </div>
  </div>
</div>