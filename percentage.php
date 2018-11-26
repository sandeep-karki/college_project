<?php 
	$total_marks = $asst_total+$sem_total+$prac_total;
	$total_obtained = $asst_obtain+$sem_obtain+$prac_obtain;
	$percentage = ($total_obtained/$total_marks)*100;
	echo $percentage;
 ?>