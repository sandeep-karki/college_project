 <?php 
ob_start();
include 'includes/dbcon.php';
include 'includes/session.php';
// include '../inc/template_header.php';

// include '../inc/navigation.php';

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
								<h2 class="title">Email Notification</h2>

							</div>

							<!-- /.col-md-6 text-right -->
						</div>
						<div class="row breadcrumb-div">
							<div class="col-md-6">
								<ul class="breadcrumb">
									<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

									<li class="active">Send Email</li>
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
											 <?php include 'includes/notification.php' ?>
											<h5>Enter the batch</h5>
										</div>
									</div>
									<div class="panel-body">
										
									<div class="form-container">
										
										<form action="email.php" method="post">
											<!-- display validation error -->
											<div class="input-group">
												
												<input type="number" required="" name="batch" value="<?php echo($batch); ?>">
											</div>
											<div class="input-group">
												<button type="submit" class="btn btn-primary" name="entbatch">enter</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
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

</body>
</html>
	
<?php ob_flush(); ?>