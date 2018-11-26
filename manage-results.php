<?php
include 'includes/session.php';
include 'includes/dbcon.php';
$msg = "";
$error = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Manage Students</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
    <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
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
    #inputdefault {
      margin-bottom: 20px; 
  }
</style>
</head>
<body class="top-navbar-fixed">
    <div class="main-wrapper">
        <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php');?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('includes/leftbar.php');?>
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Manage Students</h2>
                            </div>
                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li> Students</li>
                                    <li class="active">Manage Students</li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                    <section class="section">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>View Students Info</h5>
                                                <hr>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Enter Symbol Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" id="inputdefault" name="symnum" placeholder="Enter your symbol number">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Choose semester</label>
                                                    <div class="col-sm-10">
                                                     <select class="form-control" name="semester" id="inputdefault" >
                                                       <option value="0">choose semester</option>
                                                       <option value="1">first</option>
                                                       <option value="2">second</option>
                                                       <option value="3">third</option>
                                                       <option value="4">fourth</option>
                                                       <option value="5">fifth</option>
                                                       <option value="6">sixth</option>
                                                       <option value="7">seventh</option>
                                                       <option value="8">eighth</option>
                                                   </select>
                                               </div>
                                           </div>
                                           <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary" id="inputdefault">Search Result</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="panel-body p-20">
                                    <?php

                                    if (isset($_POST['submit'])) {
                                        $symnum = $_POST['symnum'];
                                        $semester = $_POST['semester'];
                                        $qry = "SELECT subject_detail.sub_name,subject_detail.sub_code,result.th_marks,result.asst_marks,result.pr_marks FROM subject_detail JOIN result ON subject_detail.sub_code = result.sub_code WHERE result.symbol_num = '$symnum' AND result.sem_id = '$semester'";
                                        $run = mysqli_query($con, $qry);
                                        $result = mysqli_num_rows($run);
                                        $cnt=1;
                                        if ($result < 1) {
                                            ?>
                                            <script>
                                                alert('No Data Found');
                                                            // window.open('manage-results.php','_self ');
                                                        </script>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2">#</th>
                                                                    <th rowspan="2">Subject</th>
                                                                    <th colspan="3">Marks Obtained</th>
                                                                    <th rowspan="2">Action</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Asst</th><th>Sem</th><th>Practical</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                                <tr>
                                                                    <th rowspan="2">#</th>
                                                                    <th rowspan="2">Subject</th>
                                                                    <th colspan="3">Marks Obtained</th>
                                                                    <th rowspan="2">Action</th>
                                                                </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                <?php
                                                    while($row=mysqli_fetch_assoc($run)){  //generating loop to get all users data from table
                                                        ?>
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt);  ?></td>
                                                            <td><?php echo $row['sub_name']; ?></td>
                                                            <td><?php echo $row['asst_marks']; ?></td>
                                                            <td><?php echo $row['th_marks']; ?></td>
                                                            <td><?php echo $row['pr_marks']; ?></td>
                                                            <td>
                                                                <a href="edit-result.php?subjectcode=<?php echo $row['sub_code'];?>&amp;symbolnum=<?php echo $symnum; ?>" class="btn btn-success" style="border-radius: 50%"><i class="fa fa-pencil" title="Edit Record"></i> </a>
                                                            </td>
                                                        </tr>
                                                        <?php $cnt=$cnt+1;} ?>
                                                    </tbody>
                                                </table>
                                                <?php

                                            }
                                        }

                                        ?>
                                        <!-- /.col-md-12 -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-6 -->
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-md-6 -->
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
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/pace/pace.min.js"></script>
<script src="js/lobipanel/lobipanel.min.js"></script>
<script src="js/iscroll/iscroll.js"></script>
<!-- ========== PAGE JS FILES ========== -->
<script src="js/prism/prism.js"></script>
<script src="js/DataTables/datatables.min.js"></script>
<!-- ========== THEME JS ========== -->
<script src="js/main.js"></script>
<script>
    $(function($) {
        $('#example').DataTable();
        $('#example2').DataTable( {
            "scrollY":        "300px",
            "scrollCollapse": true,
            "paging":         false
        } );
        $('#example3').DataTable();
    });
</script>
</body>
</html>
