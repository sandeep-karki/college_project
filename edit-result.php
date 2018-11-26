<?php
include 'includes/session.php';
include 'includes/dbcon.php';
$subcode = $_REQUEST['subjectcode'];
$symnum = $_REQUEST['symbolnum'];
$msg = "";
$error = "";
if(isset($_POST['submit']))
{
$asstmarks = mysqli_real_escape_string($con, $_POST['asstmarks']);
$semmarks = mysqli_real_escape_string($con, $_POST['semmarks']);
$prmarks = mysqli_real_escape_string($con, $_POST['prmarks']);

$qry = "UPDATE `result` SET `th_marks`='$semmarks',`pr_marks`='$prmarks',`asst_marks`='$asstmarks' WHERE `sub_code`='$subcode' AND `symbol_num`='$symnum'";
$run = mysqli_query($con, $qry);
if ($run == true) {
    $msg = "Data updated successfully.";
}else{
    $error = "Error in updating data";
}
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin|  Student result info < </title>
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
                                    <h2 class="title">Student Result Info</h2>

                                </div>

                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="manage-results.php"><i class="fa fa-arrow-left"></i> back</a></li>

                                        <li class="active">Result Info</li>
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
                                                <h5>Update the Result info</h5>
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
                                                // $subcode = $_REQUEST['subjectcode'];
                                                $qry = "SELECT result.asst_marks,result.th_marks,result.pr_marks,subject_detail.sub_name FROM result JOIN subject_detail ON result.sub_code = subject_detail.sub_code WHERE result.sub_code = '$subcode' AND result.symbol_num = '$symnum'";
                                                $run = mysqli_query($con, $qry);
                                                $result = mysqli_num_rows($run);
                                                $data = mysqli_fetch_assoc($run);
                                                ?>
                                                <h5><?php echo $data['sub_name']; ?></h5>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Asst mark</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="asstmarks" value="<?php echo($data['asst_marks']) ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Sem Marks</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="semmarks" value="<?php echo($data['th_marks']) ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Practical Marks</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="prmarks"value="<?php echo($data['pr_marks']) ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" name="submit" class="btn btn-primary">update Result</button>
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
