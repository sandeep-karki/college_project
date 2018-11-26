<?php 
	include 'includes/dbcon.php';
	$symnumber=$_GET['symnum'];
	$qry = "DELETE  FROM registration WHERE symbol_num=$symnumber";
	$run = mysqli_query($con, $qry);
	if ($run == true) {

		session_start();
		$_SESSION['success'] = "student record deleted successfully";
		@header('location:manage-students.php');
		exit();
		
	}else{

		session_start();
		$_SESSION['error'] = "error in deleting the data";
		@header('location:manage-students.php');
		exit();
	}
 ?>