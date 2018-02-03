<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#f44336; color:#FFF;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="font-variant:small-caps;font-size:24px;"><i class="fa fa-exclamation-circle"></i> Confirmation message</h4>
      </div>
      <div class="modal-body">
	  <div class="row">
		<div class="col-md-12">
			<h3 style="font-variant:small-caps;color:#f44336;">Are you sure you want to logout?</h3>
		
		</div>
		</div>
		
      </div>
      <div class="modal-footer">
        <a href="process/logoutprocess.php?logout=<?php echo $_SESSION['id']?>" style="text-decoration:none;color:#FFF;"type="button" class="button-red"><i class="fa fa-sign-in"></i> Logout</a>
      </div>
    </div>
  </div>
</div>