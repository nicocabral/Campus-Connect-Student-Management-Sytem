function loadStudentrec(){
	$.ajax({
		url:'studentreccontent.php',
		type:'GET',
		cache:false,
		success:function(html){
			$('#studentrec').html(html);
		}
	})
	return false;
}
$(document).ready(function(){
	
	$(function(){
	$('#student').click(function(){
		$.ajax({
			url:'studentModule.php',
			type:'GET',
			cache:false,
			success:function(html){
				$('#content').html(html);
				loadStudentrec();
				
			}
		})
		return false;
	})
	
	
	})
});
function studrecord(){
	$.ajax({
			url:'studentModule.php',
			type:'GET',
			cache:false,
			success:function(html){
				$('#content').html(html);
				loadStudentrec();
				
			}
		})
		
	return false;
}
$("#addstudentForm").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'process/addstudentrecprocess.php',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	     $("#logMsg").empty();
	     $("#logMsg").html(data);
		 loadStudentrec();
	  }
	  });
	  return false;
	});

$('#stidno').keypress(function(){
	$('#logMsg').empty();
});
function loadSubject(){
	$.ajax({
		url:'subjectrecord.php',
		type:'GET',
		cache:false,
		success:function(html){
			$('#subjectRec').html(html)
		}
	})
	return false;
}
function loadGrade(){
	$.ajax({
		url:'gradeRecord.php',
		type:'GET',
		cache:false,
		success:function(html){
			$('#gradeRec').html(html);
		}
	})
	return false;
}
$(function(){
	$('#subject').click(function(){
		$.ajax({
			url:'subjectModule.php',
			type:'GET',
			cache:false,
			success:function(html){
				$('#content').html(html);
				loadSubject();
			}
		});
		return false;
	});
	$('#grade').click(function(){
		$.ajax({
			url:'gradeModule.php',
			type:'GET',
			cache:false,
			success:function(html){
				$('#content').html(html);
				loadGrade();
			}
		})
	});
	
	
})


$("#addSubjectForm").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'process/addSubjectprocess.php',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	     $("#subMsg").empty();
	     $("#subMsg").html(data);
		 loadSubject();
	  }
	  });
	  return false;
	});

$('#scode').keypress(function(){
	$('#subMsg').empty();
});

function myFgSearch(){
	
		var sem = $('#gsem').val();
		var gyf = $('#gyear').val();
		var gyt = $('#gyearto').val();
		var sgid = $('#sgid').val();
		$.ajax({
			url:'updateSgrade.php?sem='+sem+'&gyf='+gyf+'&gyt='+gyt+'&sgid='+sgid,
			type:'POST',
			cache:false,
			success:function(html){
				$('#searchSubjectres').html(html);
			}
		});
		
	
	return false;
}
function viewFgSearch(){
	
		var sem = $('#gsem').val();
		var gyf = $('#gyear').val();
		var gyt = $('#gyearto').val();
		var sgid = $('#sgid').val();
		$.ajax({
			url:'viewSgrade.php?sem='+sem+'&gyf='+gyf+'&gyt='+gyt+'&sgid='+sgid,
			type:'POST',
			cache:false,
			success:function(html){
				$('#searchSubjectres').html(html);
			}
		});
		
	
	return false;
}
$(function(){
	$('#myprofile').click(function(){
	$('#myProfileModal').modal('show');
	return false;
	})
})
$("#cnadpForm").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'process/candpprocess.php',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	    alert(data);
	  }
	  });
	  return false;
	});