<?php
if(isset($_GET['link']))
{
    $var_1 = $_GET['link'];
//    $file = $var_1;

    $f=$_GET['link'];
   
        header('Content-disposition: attachment; filename="'.$f.'"');
		header("Content-type: application/octent-strem");
		header('Content-length='.filesize($f));
        readfile($f);
       
} //- the missing closing brace
?>