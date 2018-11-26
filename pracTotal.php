<?php

$pracTotalMarks = array();

if (!($cn_marks[2]<8)) {
	array_push($pracTotalMarks, $cn_marks[2]);
}

if (!($sam_marks[2]<8)) {
	array_push($pracTotalMarks, $sam_marks[2]);
}

if (!($daa_marks[2]<8)) {
	array_push($pracTotalMarks, $daa_marks[2]);
}

if (!($ai_marks[2]<8)) {
	array_push($pracTotalMarks, $ai_marks[2]);
}

if (!($egov_marks[2]<8)) {
	array_push($pracTotalMarks, $egov_marks[2]);
}

if (!($wn_marks[2]<8)) {
	array_push($pracTotalMarks, $wn_marks[2]);
}

$count = count($pracTotalMarks);

$pracTotal = 0;
for ($i=0; $i < $count; $i++) { 
	$pracTotal = $pracTotal + $pracTotalMarks[$i];

}
echo $pracTotal;


?>