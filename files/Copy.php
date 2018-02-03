<?php $aclc = "Today is february 29 if it is february 29 it it is leap year";
      $count=10;
	  echo $aclc.'<br>';
	  echo 'Counter ='.'&nbsp;'. $count .'<br>';
	  echo 'Number Of Character = '.strlen($aclc).'<br>';
	  echo 'Number of words = '.str_word_count($aclc).'<br>';
	  echo strpos($aclc,'leap').'<br>';
	  echo strrev($aclc).'<br>';
	  echo str_replace($aclc,'February','pebrero');
	  
		?>
	<?php 	
	$counter =15;
	$i=0;
	echo '<br>For Loop<br>';
	for($i;$i<=$counter ;$i++){
		  echo $i.'<br>';
	  }
	  echo'while Loop<br>';
	  $i=0;
	while($i<=$counter){
		echo $i.'<br>';
		$i++;
		
		}
	  ?>