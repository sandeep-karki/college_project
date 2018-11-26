<?php 

$asstTotalMarks = array();


if (!($cn_marks[0]<8)) {
	array_push($asstTotalMarks, $cn_marks[0]);
}

if (!($sam_marks[0]<8)) {
	array_push($asstTotalMarks, $sam_marks[0]);
}

if (!($daa_marks[0]<8)) {
	array_push($asstTotalMarks, $daa_marks[0]);
}

if (!($ai_marks[0])<8) {
	array_push($asstTotalMarks, $ai_marks[0]);
}

if (!($egov_marks[0])<8) {
	array_push($asstTotalMarks, $egov_marks[0]);
}

if (!($wn_marks[0])<8) {
	array_push($asstTotalMarks, $wn_marks[0]);
}

$count = count($asstTotalMarks);

$asstTotal = 0;
for ($i=0; $i < $count; $i++) { 
	$asstTotal = $asstTotal + $asstTotalMarks[$i];

}
echo $asstTotal;

?>