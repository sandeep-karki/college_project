<?php
ob_start();
include('includes/session.php');
include('includes/dbcon.php');
$msg = "";
$error = "";
if(isset($_POST['Update']))
{
    $subjectcode = mysqli_real_escape_string($con, $_POST['subjectcode']);
    $symnum = mysqli_real_escape_string($con, $_POST['symbolnum']);
    $majmin = mysqli_real_escape_string($con, $_POST['majmin']);
    
    $qry = "UPDATE majmin SET sub_code='$subjectcode', symbol_num='$symnum', major_minor='$majmin' WHERE sub_code='$subjectcode'";
    $run = mysqli_query($con, $qry);
    if ($run) {
        $msg = "Data updated successfully.";
    }else{
        echo "error";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin Update Subject </title>
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
                                    <h2 class="title">Update Subject</h2>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Subjects</li>
                                        <li class="active">Update Subject</li>
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
                                                <h5>Update Subject</h5>
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
                                                $sid=$_GET['subjectid'];
                                                $qry = "SELECT * from majmin where sub_code='$sid'";
                                                $run = mysqli_query($con, $qry);
                                                $cnt=1;
                                                $data = array();
                                                while($row=mysqli_fetch_assoc($run)){  //generating loop to get all users data from table
                                                $data[]=$row;
                                                }
                                                foreach($data as $key => $result)
                                                {   ?>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Subject Code</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="subjectcode" value="<?php echo $result['sub_code']; ?>" class="form-control" id="default" placeholder="Subject Name" required="required" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Symbol Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="symbolnum" class="form-control" value="<?php echo $result['symbol_num']; ?>"  id="default" placeholder="Subject Code" required="required" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Major Minor</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="majmin" class="form-control" value="<?php echo $result['major_minor']; ?>"  id="default" placeholder="Subject Code" required="required">
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" name="Update" class="btn btn-primary">Update</button>
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
    <?php ob_flush(); ?>