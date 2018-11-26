<?php
include 'includes/session.php';
include 'includes/dbcon.php';
$msg = "";
$error = "";
$symnumber=$_GET['symnum'];

if(isset($_POST['submit']))
{
    $studentname=$_POST['student_name'];
    $collegename=$_POST['college_name']; 
    $stuemail=$_POST['emailid']; 
    $regnumber=$_POST['reg_number']; 
    $symbolnumber=$_POST['symbol_number']; 
    $stucontact=$_POST['stu_contact']; 
    $stubatch=$_POST['stu_batch']; 

    $qry = "UPDATE registration SET student_name='$studentname', college_name='$collegename', email='$stuemail',  registration_num='$regnumber', symbol_num='$symbolnumber', contact_num='$stucontact',batch='$stubatch' WHERE symbol_num='$symnumber'";
    $run = mysqli_query($con, $qry);
    
    if ($run == true) {
        $msg="Student info updated successfully";
    }else{
        $error = "Error in updating student info";
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS Admin| Edit Student < </title>
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
                                            <?php 

                                            $qry = "SELECT * FROM registration WHERE symbol_num = '$symnumber'";
                                            $run = mysqli_query($con, $qry);
                                            $cnt=1;
                                            $data = array();
while($row=mysqli_fetch_assoc($run)){  //generating loop to get all users data from table
    $data[]=$row;
} 

foreach($data as $key => $result)
{  
    ?>


    <div class="form-group">
        <label for="default" class="col-sm-2 control-label">Student Name</label>
        <div class="col-sm-10">
            <input type="text" name="student_name" class="form-control" id="student_name" value="<?php echo $result['student_name']; ?>" required="required" autocomplete="off">
        </div>
    </div>

    <div class="form-group">
        <label for="default" class="col-sm-2 control-label">College Name</label>
        <div class="col-sm-10">
            <input type="text" name="college_name" class="form-control" id="college_name" value=" <?php echo $result['college_name']; ?> " required="required" autocomplete="off">
        </div>
    </div>

    <div class="form-group">
        <label for="default" class="col-sm-2 control-label">Email id</label>
        <div class="col-sm-10">
            <input type="email" name="emailid" class="form-control" id="email" value="<?php echo $result['email']; ?>" required="required" autocomplete="off">
        </div>
    </div>

    <div class="form-group">
        <label for="default" class="col-sm-2 control-label">Symbol Number</label>
        <div class="col-sm-10">
            <input type="number" name="symbol_number" class="form-control" id="symbol_number" value="<?php echo $result['symbol_num']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="date" class="col-sm-2 control-label">Registration Number</label>
        <div class="col-sm-10">
            <input type="text"  name="reg_number" class="form-control" value="<?php echo $result['registration_num']; ?>" id="reg_number">
        </div>
    </div>   

    <div class="form-group">
        <label for="date" class="col-sm-2 control-label">Contact Number</label>
        <div class="col-sm-10">
            <input type="number"  name="stu_contact" class="form-control" value="<?php echo $result['contact_num']; ?>" id="stu_contact">
        </div>
    </div>

    <div class="form-group">
        <label for="date" class="col-sm-2 control-label">Batch</label>
        <div class="col-sm-10">
            <input type="number"  name="stu_batch" class="form-control" value="<?php echo $result['batch']; ?>" id="stu_batch">
        </div>
    </div>

<?php } ?>                                                    


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
