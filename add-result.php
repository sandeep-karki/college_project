<?php
//turn off error reporting
include 'includes/session.php';
include 'includes/dbcon.php';
$msg = "";
$error = "";
if (isset($_POST['submit'])) {
    $fileName = $_FILES['exam_result']['name'];
    $fileTempName = $_FILES['exam_result']['tmp_name'];
    if (!empty($fileName)) {
        //find the extension of file.
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        //define allowed extension.
        $allowedExtension = array('csv','xlsx');
        if (!in_array($fileExtension, $allowedExtension)) {
            $error = "Only csv file are allowed to upload";
        } else {
            $header = null;
            $data = array();
            if (($handle = fopen($fileTempName, 'r')) !== false) {
                while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                    if (!$header) {
                        $header = $row;
                    } else {
                        $data[] = array_combine($header, $row);
                    }
                }
                fclose($handle);
            }

            foreach ($data as $data) {
                $symbolNum = $data['symbol_num'];
                $semId = $data['sem_id'];
                $subjectCode = $data['sub_code'];
                $theory = $data['th_marks'];
                $practical = $data['pr_marks'];
                $assessment = $data['asst_marks'];
                $qry = "INSERT INTO result(symbol_num, sem_id, sub_code, th_marks, pr_marks, asst_marks) VALUES('$symbolNum', '$semId', '$subjectCode', '$theory', '$practical', '$assessment')";
                $run = mysqli_query($con, $qry);
            }
            if (!$run) {
                $error = "Error in uploding file.Please review the indexing of your file or student may not be registered with this symbol number";
            } else {
                $msg = "file uploaded successfully";
            }
        }
    } else {
        $error = "Please choose a file";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS Admin| Add Result </title>
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
                            <h2 class="title">Declare Result</h2>
                        </div>
                        <!-- /.col-md-6 text-right -->
                    </div>
                    <!-- /.row -->
                    <div class="row breadcrumb-div">
                        <div class="col-md-6">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                <li class="active">Student Result</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <?php if ($msg) {
                                        ?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                            </div><?php
                                        } elseif ($error) {
                                            ?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                            </div>
                                            <?php
                                        } ?>
                                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Upload Result</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="exam_result" >
                                                </div>
                                            </div>
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Declare Result</button>
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