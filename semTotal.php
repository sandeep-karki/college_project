<?php

$semTotalMarks = array();

if (!($cn_marks[1]<24)) {
	array_push($semTotalMarks, $cn_marks[1]);
}

if (!($sam_marks[1]<24)) {
	array_push($semTotalMarks, $sam_marks[1]);
}

if (!($daa_marks[1]<32)) {
	array_push($semTotalMarks, $daa_marks[1]);
}

if (!($ai_marks[1]<32)) {
	array_push($semTotalMarks, $ai_marks[1]);
}

if (!($egov_marks[1]<24)) {
	array_push($semTotalMarks, $egov_marks[1]);
}

if (!($wn_marks[1]<24)) {
	array_push($semTotalMarks, $wn_marks[1]);
}


$count = count($semTotalMarks); //it helps to find the number of index

$semTotal = 0;
for ($i=0; $i < $count; $i++) { 
	$semTotal = $semTotal + $semTotalMarks[$i];

}
echo $semTotal;

?>