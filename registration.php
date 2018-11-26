<?php
include 'includes/dbcon.php';
include 'includes/session.php';

$msg = "";
$error = "";

if(isset($_POST['submit']))
{
	$symnumber = mysqli_real_escape_string($con, $_POST['symbol_number']);
	$regnumber = mysqli_real_escape_string($con, $_POST['registration_number']);
	$studentname = mysqli_real_escape_string($con, $_POST['student_name']);
	$collegename=mysqli_real_escape_string($con, $_POST['college_name']);
	$email = mysqli_real_escape_string($con, $_POST['email_id']);
	$contnumber = mysqli_real_escape_string($con, $_POST['contact_number']);
	$batch = mysqli_real_escape_string($con, $_POST['batch']);

	$user_check_query = "SELECT * FROM registration WHERE symbol_num = '$symnumber' OR registration_num= '$regnumber' LIMIT 1";
	$result = mysqli_query($con, $user_check_query);
	$student = mysqli_fetch_assoc($result);

	if ($student) {

		if ($student['registration_num'] == $regnumber || $student['symbol_num'] == $symnumber ) {

			$error = "student already exists with this registration number or symbol number";

		}

	}else{

		$qry = "INSERT INTO registration (symbol_num, registration_num, student_name, college_name, email, contact_num, batch) VALUES ('$symnumber', '$regnumber', '$studentname', '$collegename', '$email', '$contnumber', '$batch')";
		$run = mysqli_query($con, $qry);

		if ($run == true) {

			$msg = "student registered successfully";

		}else{

			$error="Something went wrong. Please try again"; 
			
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMS Admin| Student Admission< </title>
	<link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
	<link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
	<link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
	<link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
	<link rel="stylesheet" href="css/prism/prism.css" media="screen" >
	<link rel="stylesheet" href="css/select2/select2.min.css" >
	<link rel="stylesheet" href="css/main.css" media="screen" >
	<script src="js/modernizr/modernizr.min.js"></script>
</head>
<body class="top-navbar-fixed">
	<div class="main-wrapper">

		<!-- ========== TOP NAVBAR ========== -->
		<?php include('includes/topbar.php');?> 
		<!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
		<div class="content-wrapper">
			<div class="content-container">

				<!-- ========== LEFT SIDEBAR ========== -->
				<?php include('includes/leftbar.php');?>  
				<!-- /.left-sidebar -->

				<div class="main-page">

					<div class="container-fluid">
						<div class="row page-title-div">
							<div class="col-md-6">
								<h2 class="title">Student Admission</h2>

							</div>

							<!-- /.col-md-6 text-right -->
						</div>
						<!-- /.row -->
						<div class="row breadcrumb-div">
							<div class="col-md-6">
								<ul class="breadcrumb">
									<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

									<li class="active">Student Admission</li>
								</ul>
							</div>

						</div>
						<!-- /.row -->
					</div>
					<div class="container-fluid">

						<div class="row">
							<div class="col-md-12">
								<div class="panel">
									<div class="panel-heading">
										<div class="panel-title">
											<h5>Fill the Student info</h5>
										</div>
									</div>
									<div class="panel-body">
										<?php if($msg){?>
											<div class="alert alert-success left-icon-alert" role="alert">
												<strong>Well done!</strong><?php echo htmlentities($msg); ?>
												</div><?php } 
												else if($error){?>
													<div class="alert alert-danger left-icon-alert" role="alert">
														<strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
													</div>
												<?php } ?>
												<form class="form-horizontal" method="post">

													<div class="form-group">
														<label for="default" class="col-sm-2 control-label">Student Name</label>
														<div class="col-sm-10">
															<input type="text" name="student_name" class="form-control" id="fullanme" required="required" autocomplete="off" onchange="return validate_studentname(this.value)">
															<span class="text-danger font-weight-blod" id="snameERR"></span>
														</div>
													</div>

													<div class="form-group">
														<label for="default" class="col-sm-2 control-label">College Name</label>
														<div class="col-sm-10">
															<input type="text" name="college_name" class="form-control" id="rollid"  required="required" autocomplete="off">
														</div>
													</div>

													<div class="form-group">
														<label for="default" class="col-sm-2 control-label">Email Id</label>
														<div class="col-sm-10">
															<input type="email" name="email_id" class="form-control" id="email" required="required" autocomplete="off">
														</div>
													</div>

													<div class="form-group">
														<label for="default" class="col-sm-2 control-label">Registration Number</label>
														<div class="col-sm-10">
															<input type="text" name="registration_number" class="form-control" id="email" required="required" autocomplete="off">
														</div>
													</div>

													<div class="form-group">
														<label for="default" class="col-sm-2 control-label">Symbol Number</label>
														<div class="col-sm-10">
															<input type="number" name="symbol_number" class="form-control" id="email" required="required" autocomplete="off">
														</div>
													</div>

													<div class="form-group">
														<label for="default" class="col-sm-2 control-label">Contact Number</label>
														<div class="col-sm-10">
															<input type="number" name="contact_number" class="form-control" id="email" required="required" autocomplete="off">
														</div>
													</div>

													<div class="form-group">
														<label for="default" class="col-sm-2 control-label">Batch</label>
														<div class="col-sm-10">
															<input type="number" name="batch" class="form-control" id="email" required="required" autocomplete="off">
														</div>
													</div>

													<div class="form-group" id="showBtn">
														<div class="col-sm-offset-2 col-sm-10">
															<button type="submit" name="submit" class="btn btn-primary">Register</button>
														</div>
													</div>
												</form>

											</div>
										</div>
									</div>
									<!-- /.col-md-12 -->
								</div>
							</div>
						</div>
						<!-- /.content-container -->
					</div>
					<!-- /.content-wrapper -->
				</div>
				<!-- /.main-wrapper -->
				<script src="js/jquery/jquery-2.2.4.min.js"></script>
				<script src="js/bootstrap/bootstrap.min.js"></script>
				<script src="js/pace/pace.min.js"></script>
				<script src="js/lobipanel/lobipanel.min.js"></script>
				<script src="js/iscroll/iscroll.js"></script>
				<script src="js/prism/prism.js"></script>
				<script src="js/select2/select2.min.js"></script>
				<script src="js/main.js"></script>
				<script>
					var sname = 1;
					function validate_studentname(val) {
						 pat_sname=/^[a-zA-Z ]+$/;
						 if (val != "") {
						 	if (pat_sname.test(val)) {
						 		document.getElementById('snameERR').innerHTML = "";
						 		sname = 1;
						 	}else{
						 		document.getElementById('snameERR').innerHTML = "invalid student name";
						 		sname = 0;
						 	}
						 }else{
						 	document.getElementById('snameERR').innerHTML = "student name is required";
						 	sname = 0;
						 }
						 if (sname == 1) {
						 	$('#showBtn').fadeIn('slow');
						 }else{
						 	$('#showBtn').hide();
						 }
					}
					$(function($) {
						$(".js-states").select2();
						$(".js-states-limit").select2({
							maximumSelectionLength: 2
						});
						$(".js-states-hide").select2({
							minimumResultsForSearch: Infinity
						});
					});
				</script>
			</body>
			</html>
