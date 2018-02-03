$(document).ready(function(){
	$('#grade').click(function(){
		$('#gradeModal').modal('show');
	});
	$('#message').click(function(){
	$.ajax({
		url:'studentMessage.php',
		type:'GET',
		cache:false,
		success:function(html){
			$('#studentcontent').html(html);
		}
	})
})
	
});
function viewGrade(){
	var sem = $('#sem').val();
		var yearTo = $('#yearto').val();
		var yearfrom = $('#yearfrom').val();
	
		$.ajax({
			url:'viewGradeQuery.php?sem='+sem+'&yt='+yearTo+'&yf='+yearfrom,
			type:'POST',
			cache:false,
			success:function(html){
				$('#viewgradeCOntent').html(html);
			}
		})
	return false;
}
$("div#myId").dropzone({ url: "/file/post" });