<?php
ob_start();
session_start();
include 'includes/dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Result Management System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
    <link rel="stylesheet" href="css/icheck/skins/flat/blue.css" >
    <link rel="stylesheet" href="css/main.css" media="screen" >
    <script src="js/modernizr/modernizr.min.js"></script>
</head>
<body class="">
    <div class="main-wrapper">

        <div class="login-bg-color bg-black-300">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel login-box">
                        <div class="panel-heading">
                            <div class="panel-title text-center">
                                <h4>Result Alert System</h4>
                            </div>
                            <?php include 'includes/notification.php'; ?>
                        </div>
                        <div class="panel-body p-20">
                            <form action="result.php" method="post" onsubmit="return formValidation();">
                                <div class="form-group">
                                    <label for="sel1">Semester</label>
                                  <select class="form-control" name="semester" id="sem">
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
                                <span id="semERR" class="text-danger font-weight-bold"></span>
                            </div>
                            <div class="form-group">
                              <label for="rollid">Enter your symbol number</label>
                              <input type="text" class="form-control" id="symnum" placeholder="symbol number" autocomplete="off" name="symnum" maxlength="4">
                              <span id="symnumERR" class="text-danger font-weight-bold"></span>
                          </div>
                         <div class="form-group mt-20">
                            <div class="">
                                <button type="submit" class="btn btn-success btn-labeled pull-right" name="search">Search<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                         <a href="index.php">Back to Home</a>
                     </div>
                 </form>
                 <hr>
             </div>
         </div>
     </div>
     <!-- /.col-md-6 col-md-offset-3 -->
 </div>
 <!-- /.row -->
</div>
<!-- /. -->
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
<script src="js/icheck/icheck.min.js"></script>

<!-- ========== THEME JS ========== -->
<script src="js/main.js"></script>
<script>
    $(function(){
        $('input.flat-blue-style').iCheck({
            checkboxClass: 'icheckbox_flat-blue'
        });
    });

    function formValidation() {

      var semvalue = document.getElementById('sem').value;
      var symnumvalue = document.getElementById('symnum').value;
      var pat_symbol = /^\d{4}$/;

      if (semvalue == 0) {
        document.getElementById('semERR').innerHTML="choose semester";
        return false;
      }

      if (symnumvalue != "") {
        if (!(symnumvalue.match(pat_symbol))) {
          document.getElementById('symnumERR').innerHTML = "invalid symbol number";
          return false;
        }
      }else{
        document.getElementById('symnumERR').innerHTML = "give symbol number";
        return false;
      }
    }
</script>

<!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>
</html>
<?php ob_flush(); ?>