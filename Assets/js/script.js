$(document).ready(function(){
	$(function(){
		$('#btnLogin').click(function(){
			var uname = $('#uname').val();
			var pass = $('#pword').val();
			if(uname == "" || uname == " "){
				return false;
			}
			else if (pass == "" || pass == " "){
				return false;
			}
			else {
				$.ajax({
					url:'process/loginprocess.php?u='+uname+'&p='+pass,
					type:'POST',
					cache:false,
					success:function(data){
						$('#logMsg').html(data);
						//alert(data)
					}
				});
			}
			return false;
		});
		$('#uname').keypress(function(){
			$('#logMsg').empty();
		})
		$('#pword').keypress(function(){
			$('#logMsg').empty();
		});
		
	});
});
$("#studLoginform").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'process/studloginprocess.php',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	   $('#loginMsg').empty();
	   $('#loginMsg').html(data);
	  }
	  });
	  return false;
	});