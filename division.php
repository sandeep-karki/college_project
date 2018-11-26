<?php 

if ($percentage >= 80) {
	echo "distinction";
}elseif ($percentage >= 75 && $percentage < 80) {
	echo "first";
}elseif ($percentage >= 60 && $percentage < 75) {
	echo "second";
}else{
	echo "third";
}
?>