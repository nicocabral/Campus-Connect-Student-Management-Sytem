
<?php 
session_start();

	if(!empty($_FILES)){
		include('../includes/conn.php');
		//image
                                $image = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                                $image_name = addslashes($_FILES['file']['name']);
                                $image_size = getimagesize($_FILES['file']['tmp_name']);
 								move_uploaded_file($_FILES["file"]["tmp_name"], "../files/" . $_FILES["file"]["name"]);
                 $location = "file/" . $_FILES["file"]["name"];
				 $getSid = intval($_SESSION['id']);
				 $rid = intval($_SESSION['recieverid']);
			$uploadquery = mysql_query("INSERT INTO message VALUES(NULL,'$getSid','$rid','$location',NULL,'New')") or die (mysql_error());
			if($uploadquery == true)
			{
				unset($_SESSION['recieverid']);
			}	
		else 
		echo mysql_error();
		}

?>
