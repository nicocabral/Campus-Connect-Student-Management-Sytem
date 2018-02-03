<!-- Modal -->
<div class="modal fade" id="myProfileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:#000;"><i class="fa fa-gear"></i> Change username and password</h4>
      </div>
	  <form id="cnadpForm">
      <div class="modal-body">
        <?php include('includes/conn.php');
		$cuandp = mysql_query("SELECT * FROM login WHERE userid = '".$adminrow['adminid']."'") or die (mysql_error());
		while($crow = mysql_fetch_array($cuandp)){?>
		<div class="row">
			<div class="col-md-12">
				<label style="color:#000;font-size:17px;">Username</label>
				<input type="text" class="form-control" style="border-radius:0;" name="uname" value="<?php echo $crow['username']?>" required>
				<input type="hidden" class="form-control" style="border-radius:0;" name="uid" value="<?php echo $crow['userid']?>" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label style="color:#000;font-size:17px;">Password</label>
				<input type="password" class="form-control" style="border-radius:0;" name="pword" value="<?php echo $crow['password']?>" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label style="color:#000;font-size:17px;">Confirm password</label>
				<input type="password" class="form-control" style="border-radius:0;" name="cpword" required>
			</div>
		</div>
		<?php }?>
      </div>
      <div class="modal-footer">
        <button type="button" class="button-white" data-dismiss="modal">Close</button>
        <button type="submit" class="button-blue">Save changes</button>
      </div>
	  </form>
    </div>
  </div>
</div>