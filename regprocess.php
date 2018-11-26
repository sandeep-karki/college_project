<?php 

if(isset($_POST['submit']))
{
	$studentname = mysqli_real_escape_string($con, $_POST['student_name']);
	$collegename=mysqli_real_escape_string($con, $_POST['college_name']);
	$email = mysqli_real_escape_string($con, $_POST['email_id']);
	$regnumber = mysqli_real_escape_string($con, $_POST['registration_number']);
	$symnumber = mysqli_real_escape_string($con, $_POST['symbol_number']);
	$batch = mysqli_real_escape_string($con, $_POST['batch']);

	$user_check_query = "SELECT * FROM registrations WHERE symbol_num = '$symnumber' OR registration_num= '$regnumber' LIMIT 1";
	$result = mysqli_query($con, $user_check_query);
	$student = mysqli_fetch_assoc($result);

	if ($student) {

		if ($student['registration_num'] == $regnumber || $student['symbol_num'] == $symnumber ) {

			$error = "student already exists with this registration number or symbol number";
		}

	}else{
		$sql = "INSERT INTO registrations(student_name, college_name, email, registration_num, symbol_num, batch) VALUES ('$studentname','$collegename','$email','$regnumber','$symnumber','$batch')";
		$run = mysqli_query($con, $sql);
		
		if ($run == true) {
			$msg = "student registered successfully";
		}else{
			$error="Something went wrong. Please try again"; 
		}
	}
}

?>