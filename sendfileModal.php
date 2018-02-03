<!-- Modal -->
<div class="modal fade" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#008CBA; color:#FFF;">
        <a href="student.php"  class="close" aria-label="Close" style="text-decoration:none;color:#FFF;"><span aria-hidden="true">&times;</span></a>
        <h4 class="modal-title" id="myModalLabel" style="font-variant:small-caps;font-size:24px;"><i class="fa fa-file"></i>  Send files</h4>
      </div>
      <div class="modal-body">
	  <div class="row">
	  <div class="col-md-12" style="color:#000;">
		<form action="process/sendFiles.php" class="dropzone" method="post" enctype="multipart/form-data">
		</form>
		</div>
		</div>
		<div class="row" style="margin-top:10px;">
			<div id="sendto"></div>
		</div>
      </div>
     
    </div>
  </div>
</div>