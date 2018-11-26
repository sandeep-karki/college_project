<?php
include('includes/session.php');
include('includes/dbcon.php');
$msg = "";
$error = "";
if(isset($_POST['submit']))
{
$symbolnumber = mysqli_real_escape_string($con, $_POST['symbolnum']);
$subjectcode = mysqli_real_escape_string($con, $_POST['subjtcode']);
$majorminor = mysqli_real_escape_string($con, $_POST['majmin']);
$qry="INSERT INTO `majmin` (`id`, `major_minor`, `symbol_num`, `sub_code`) VALUES (NULL, '$majorminor', '$symbolnumber', '$subjectcode')";
/*var_dump($qry);
die();*/
$run = mysqli_query($con, $qry);
if ($run) {
$msg = "Data inserted successfully";
}else{
$error = "Error in data insetion";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SMS Admin Create Class</title>
<link rel="stylesheet" href="css/bootstrap.css" media="screen" >
<link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
<link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
<link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
<link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
<link rel="stylesheet" href="css/main.css" media="screen" >
<script src="js/modernizr/modernizr.min.js"></script>
<style>
.errorWrap {
padding: 10px;
margin: 0 0 20px 0;
background: #fff;
border-left: 4px solid #dd3d36;
-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
padding: 10px;
margin: 0 0 20px 0;
background: #fff;
border-left: 4px solid #5cb85c;
-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>
</head>
<body class="top-navbar-fixed">
<div class="main-wrapper">
<!-- ========== TOP NAVBAR ========== -->
<?php include('includes/topbar.php');?>
<!-----End Top bar>
<!- ========== WRAPPER FR BOTH SIDEBARS & MAIN CONTENT ========== -->
<div class="content-wrapper">
<div class="content-container">
<!-- ========== LEFT SIDEBAR ========== -->
<?php include('includes/leftbar.php');?>
<!-- /.left-sidebar -->
<div class="main-page">
<div class="container-fluid">
    <div class="row page-title-div">
        <div class="col-md-6">
            <h2 class="title">Add Major Minor Subjects</h2>
        </div>

    </div>
    <!-- /.row -->
    <div class="row breadcrumb-div">
        <div class="col-md-6">
            <ul class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Classes</a></li>
                <li class="active">Create Class</li>
            </ul>
        </div>

    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<section class="section">
    <div class="container-fluid">


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h5>Give Major Minor</h5>
                        </div>
                    </div>
                    <?php if($msg){?>
                        <div class="alert alert-success left-icon-alert" role="alert">
                            <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                            </div><?php }
                            else if($error){?>
                                <div class="alert alert-danger left-icon-alert" role="alert">
                                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                </div>
                            <?php } ?>

                            <div class="panel-body">
                                <form method="post">
                                    <div class="form-group has-success">
                                        <label for="success" class="control-label">Symbol Number</label>
                                        <div class="">
                                            <input type="text" name="symbolnum" class="form-control" required="required" maxlength="4">
                                            <span class="help-block"><b class="text-warning">Warning-</b> Registered students symbol number are only allowed</span>
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="success" class="control-label">Subject Code</label>
                                        <div class="">
                                            <input type="text" name="subjtcode" required="required" class="form-control">
                                            <span class="help-block"><b class="text-warning">Warning-</b> Make sure the subject code you gave must be a registered subject code</span>
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="success" class="control-label">Major/Minor</label>
                                        <div class="">
                                            <input type="text" name="majmin" class="form-control" required="required">
                                            <span class="help-block">Eg- major,minor</span>
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <div class="">
                                            <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-8 col-md-offset-2 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.section -->
        </div>
        <!-- /.main-page -->
    </div>
    <!-- /.content-container -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- /.main-wrapper -->
<!-- ========== COMMON JS FILES ========== -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui/jquery-ui.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/pace/pace.min.js"></script>
<script src="js/lobipanel/lobipanel.min.js"></script>
<script src="js/iscroll/iscroll.js"></script>
<!-- ========== PAGE JS FILES ========== -->
<script src="js/prism/prism.js"></script>
<!-- ========== THEME JS ========== -->
<script src="js/main.js"></script>
<!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>
</html>