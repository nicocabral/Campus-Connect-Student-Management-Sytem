<?php include('includes/conn.php');
$getID = intval($_GET['id']);
$sql = mysql_query("SELECT * FROM studentrec WHERE studid = '$getID'") or die (mysql_error());
if(mysql_num_rows($sql)>0){
	while($row = mysql_fetch_array($sql)){
		?>
<div class="row">
<div class="col-md-3">
	<p style="text-align:left;color:#000;">Student ID no.</p>
</div>
<div class="col-md-9">
	<p style="text-align:left;color:#000;"><strong><?php echo $row['studentidno']?></strong></p>
</div>
</div>
<div class="row">
<div class="col-md-3">
	<p style="text-align:left;color:#000;">Student name</p>
</div>
<div class="col-md-9">
	<p style="text-align:left;color:#000;"><strong><?php echo $row['lname'].', '.$row['fname'].' '.$row['mname'].' &emsp;'.$row['year'].' '.$row['section'];?></strong></p>
</div>
</div>	
<hr>
<div class="row">
<div class="col-md-4">
	<p style="text-align:left;color:#000;">Select Sem</p>
	<select class="form-control" style="border-radius:0;" id="gsem">
		<option value="1st Sem">1st Sem</option>
		<option value="2nd Sem">2nd Sem</option>
	</select>
</div>

<div class="col-md-8">
	<p style="text-align:left;color:#000;">Select Year</p>
	<div class="col-md-4">
		<select style="color:#000;" class="form-control" style="border-radius:0;" id="gyear">
		<?php 
		$year = date('Y');
		for($i=2010;$i<$year;$i++){?>
		<option value="<?php echo $i?>"><?php echo $i;?></option>
		<?php }?>
		</select>
	</div>
	<div class="col-md-2">
		<p style="color:#000;text-align:right;">to</p>
	</div>
	<div class="col-md-4">
		<select style="color:#000;"class="form-control" style="border-radius:0;" id="gyearto">
		<?php 
		$year = date('Y');
		for($i=2010;$i<=$year;$i++){?>
		<option value="<?php echo $i?>"><?php echo $i;?></option>
		<?php }?>
		</select>
	</div>
	<div class="col-md-2">
		<input type="hidden" value="<?php echo $row['studid']?>" id="sgid">
		<button class="btn btn-primary" style="border-radius:0;" onclick="myFgSearch()"><i class="fa fa-search"></i></button>
	
	</div>
	
</div>
</div>		
<hr>
<div class="row">
<div class="table-responsive" id="searchSubjectres"></div>


</div>
		
<?php }}?>