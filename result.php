<?php
ob_start();
error_reporting(0);
session_start();
include 'includes/dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Result Management System</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
</head>
<body>
  <div class="col-md-12">
    <h2 class="title" align="center">Result Alert System</h2>
  </div>
  <?php
  if (isset($_POST['search'])) {
    $semester = $_POST['semester'];
    $symnum=$_POST['symnum'];

    $registration_join_result_qry = "SELECT registration.student_name,registration.symbol_num,registration.registration_num,registration.college_name from registration join result on registration.symbol_num=result.symbol_num where result.symbol_num='$symnum' and result.sem_id='$semester';";

    $subjectdetail_join_result_query = "SELECT subject_detail.sub_code,subject_detail.sub_name,result.th_marks,result.pr_marks,result.asst_marks from subject_detail join result on subject_detail.sub_code=result.sub_code where result.sem_id='$semester' and result.symbol_num='$symnum'";

    $fullmarks_join_result_query = "SELECT result.sub_code,full_marks.asst_full,full_marks.th_full,full_marks.pr_full from full_marks join result on full_marks.sub_code=result.sub_code where result.sem_id='$semester' and result.symbol_num='$symnum'";

    $passmarks_join_result_query = "SELECT result.sub_code,pass_marks.asst_pass,pass_marks.th_pass,pass_marks.pr_pass from pass_marks join result on pass_marks.sub_code=result.sub_code where result.sem_id='$semester' and result.symbol_num='$symnum'";

    $majorsub_query = "SELECT result.sub_code,majmin.major_minor from majmin join result on result.sub_code=majmin.sub_code where majmin.symbol_num='$symnum' and result.sem_id='$semester' and majmin.major_minor='major'";
    $minorsub_query = "SELECT result.sub_code,majmin.major_minor from majmin join result on result.sub_code=majmin.sub_code where majmin.symbol_num='$symnum' and result.sem_id='$semester' and majmin.major_minor='minor'";


    $run1 = mysqli_query($con, $registration_join_result_qry);
    $run2 = mysqli_query($con, $subjectdetail_join_result_query);
    $run3 = mysqli_query($con, $fullmarks_join_result_query);
    $run4 = mysqli_query($con, $passmarks_join_result_query);
    $run5 = mysqli_query($con, $majorsub_query);
    $run6 = mysqli_query($con, $minorsub_query);

    if (mysqli_num_rows($run3) > 0) {
      $data3 = array();
      while ($row3=mysqli_fetch_assoc($run3)) {
        $data3[]=$row3;
      }
    }
    if (mysqli_num_rows($run4) > 0) {
      $data4 = array();
      while ($row4=mysqli_fetch_assoc($run4)) {
        $data4[]=$row4;
      }
    }
        $result1 = mysqli_fetch_assoc($run1);
        $result5 = mysqli_fetch_assoc($run5);//for major
        $result6 = mysqli_fetch_assoc($run6);//for minor
        
        /*if (mysqli_num_rows($run5) > 0) {
            $data5 = array();
            while ($row5=mysqli_fetch_assoc($run5)) {
                $data5[]=$row5;
            }
          }*/
        /*echo "<pre>";
        print_r($data5);
        echo "</pre>";
        die();*/
        /*$arraydata5 = array();
        for ($i=0; $i < mysqli_num_rows($run5) ; $i++) { 
            $arraydata5[] = $data5[$i]['sub_code'];
          }*/
        /*var_dump($arraydata5);
        die();*/
        /*$stringdata5 = implode(",", $arraydata5); 
        $explodearraydata5 = explode(",", $stringdata5);*/
        /*echo "<pre>";
        print_r($explodearraydata5);
        echo "</pre>";*/

        ?>

        <!DOCTYPE html>
        <html>
        <head>
         <title>result view page</title>
         <link rel="stylesheet" href="assets/css/bootstrap.min.css">
       </head>
       <body>
         <div class="container">
           <table class="table table-responsive table-bordered">
             <thead>
               <tr>
                 <th colspan="10"><center>COMPULSARY</center></th>
               </tr>
               <tr>
                 <th rowspan="2"><center>Course</center></th>
                 <th colspan="3"><center>full marks</center></th>
                 <th colspan="3"><center>pass marks</center></th>
                 <th colspan="3"><center>marks obtained</center></th>
               </tr>
               <tr>
                 <th>Asst</th><th>Sem</th><th>Practical</th>
                 <th>Asst</th><th>Sem</th><th>Practical</th>
                 <th>Asst</th><th>Sem</th><th>Practical</th>
               </tr>
               </thead><?php
               if (mysqli_num_rows($run2) > 0) {
                $data2 = array();
                while ($row2=mysqli_fetch_assoc($run2)) {
                  $data2[]=$row2;
                }
                       /* echo "<pre>";
                        print_r($data2);
                        echo "</pre>";
                        die();*/
                       /* if (in_array($data2[0]['sub_code'], $explodearraydata5)) {
                            echo "yes in array";
                        }else{
                            echo "not in array";
                          }*/
                        /*for ($i=0; $i < mysqli_num_rows($run2) ; $i++) { 
                            $arraydata2 = array($data2[$i]['sub_code'],);
                        }
                        var_dump($arraydata2);
                        die();*/
                        /*$result = array_intersect($data5, $data2);
                        echo "<pre>";
                        print_r($result);
                        echo "</pre>";
                        die();*/
                        /*$result = !empty(array_intersect($data5, $data2));
                        print_r($result);
                        die();*/
                        $asst_total = 0;
                        $sem_total = 0;
                        $prac_total = 0;
                        $asst_obtain = 0;
                        $sem_obtain = 0;
                        $prac_obtain = 0;
                        $result = "";
                        $count = mysqli_num_rows($run2);
                        for ($i=0; $i < $count ; $i++) {
                         ?>
                         <tbody>  
                          <?php if (($data2[$i]['sub_code'] == $result5['sub_code']) || ($data2[$i]['sub_code'] == $result6['sub_code'])) { 
                            if ($data2[$i]['sub_code'] == $result5['sub_code']) {?>
                              <tr>
                                <th colspan="10"><center>ELECTIVE AND EXTRA ELECTIVE (MAJOR)</center></th>
                              </tr>
                              <?php
                            }else{?>
                              <tr>
                                <th colspan="10"><center>ELECTIVE AND EXTRA ELECTIVE (MINOR)</center></th>
                              </tr>
                            <?php }
                          } ?> 
                          <tr>
                           <th><?php echo $data2[$i]['sub_name']; ?></th>
                           <th><?php echo $data3[$i]['asst_full']; ?></th><th><?php echo $data3[$i]['th_full']; ?></th><th><?php echo $data3[$i]['pr_full']; ?></th>
                           <th><?php echo $data4[$i]['asst_pass']; ?></th><th><?php echo $data4[$i]['th_pass']; ?></th><th><?php echo $data4[$i]['pr_pass']; ?></th>
                           <?php
                           if ($data2[$i]['asst_marks'] != '-') {

                             if ($data2[$i]['asst_marks'] < $data4[$i]['asst_pass']) {
                               ?>
                               <th><?php echo $data2[$i]['asst_marks']; ?><span style="color: red">&nbsp;*</span></th>
                               <?php 
                               if ($data2[$i]['sub_code'] != $result6['sub_code']) {
                                 $result = "fail"; 
                               }
                               ?>
                               <?php
                             }else{
                               ?>
                               <th><?php echo $data2[$i]['asst_marks']; ?></th>
                               <?php
                             }
                           }else{
                            ?>
                            <th><?php echo $data2[$i]['asst_marks']; ?></th>
                            <?php
                          }

                          if ($data2[$i]['th_marks'] != '-') {

                           if ($data2[$i]['th_marks'] < $data4[$i]['th_pass']) {
                             ?>
                             <th><?php echo $data2[$i]['th_marks']; ?><span style="color: red">&nbsp;*</span></th>
                             <?php 
                             if ($data2[$i]['sub_code'] != $result6['sub_code']) {
                                 $result = "fail"; 
                             }
                             ?>
                             <?php
                           }else{
                             ?>
                             <th><?php echo $data2[$i]['th_marks']; ?></th>
                             <?php
                           }
                         }else{
                          ?>
                          <th><?php echo $data2[$i]['th_marks']; ?></th>
                          <?php
                        }
                        if ($data2[$i]['pr_marks'] != '-') {

                         if ($data2[$i]['pr_marks'] < $data4[$i]['pr_pass']) {
                           ?>
                           <th><?php echo $data2[$i]['pr_marks']; ?><span style="color: red">&nbsp;*</span></th>
                           <?php 
                           if ($data2[$i]['sub_code'] != $result6['sub_code']) {
                               $result = "fail"; 
                           }
                           ?>
                           <?php
                         }else{
                           ?>
                           <th><?php echo $data2[$i]['pr_marks']; ?></th>
                           <?php
                         }
                       }else{
                         ?>
                         <th><?php echo $data2[$i]['pr_marks']; ?></th>
                         <?php
                       }
                       ?>
                     </tr>
                     <?php
                     if ($data2[$i]['sub_code'] !== $result6['sub_code']) {
                       $asst_total = $asst_total+$data3[$i]['asst_full'];
                       $sem_total = $sem_total+$data3[$i]['th_full'];
                       $prac_total = $prac_total+$data3[$i]['pr_full'];
                       $asst_obtain = $asst_obtain+$data2[$i]['asst_marks'];
                       $sem_obtain = $sem_obtain+$data2[$i]['th_marks'];
                       $prac_obtain = $prac_obtain+$data2[$i]['pr_marks'];
                     }

                   } ?>                               
                   <tr>
                     <td><strong>TOTAL</strong></td>
                     <th><?php echo $asst_total; ?></th>
                     <th><?php echo $sem_total; ?></th>
                     <th><?php echo $prac_total; ?></th>
                     <th colspan="3"></th>
                     <th><?php echo $asst_obtain; ?></th>
                     <th><?php echo $sem_obtain; ?></th>
                     <th><?php echo $prac_obtain; ?></th>
                   </tr>
                   <tr>
                     <td><strong>GRAND TOTAL</strong></td>
                     <th colspan="3" style="text-align: center;"><?php echo($asst_total+$sem_total+$prac_total); ?></th>
                     <th colspan="3"></th>
                     <th colspan="3" style="text-align: center;"><?php echo ($asst_obtain+$sem_obtain+$prac_obtain); ?></th>
                   </tr>
                   <tr>
                     <th colspan="10"></th>
                   </tr>
                   <tr>
                     <?php 
                     if ($result) {
                       ?>
                       <th colspan="10">RESULT : <span style="color: red;"><?php echo "$result"; ?></span><br>PERCENTAGE : &nbsp;<?php include 'percentage.php'; ?></span><br>DIVISION : &nbsp;<?php include 'division.php'; ?><br>NAME : &nbsp; <?php echo $result1['student_name']; ?><br>COLLEGE : &nbsp; <?php echo $result1['college_name']; ?></span></th>
                       <?php
                     }else{
                       $result = "pass";
                       ?>
                       <th colspan="10">RESULT : <span style="color: green;"><?php echo "$result"; ?></span><br>PERCENTAGE : &nbsp;<?php include 'percentage.php'; ?><br>DIVISION : &nbsp;<?php include 'division.php'; ?><br>NAME : &nbsp; <?php echo $result1['student_name']; ?><br>COLLEGE : &nbsp; <?php echo $result1['college_name']; ?></th>
                     </tr>
                     <?php
                   }
                   ?>
                 </tbody>
               </table>
             </div>
           </body>
           </html>
           <div class="form-group">
             <div class="col-sm-6">
              <a href="index.php">Back to Home</a>
            </div>
          </div>
          <?php
        }else{
          $_SESSION['error']="no record found";
          header('location:find-result.php');
          exit();
        }
      }

      ?>

      <!-- ========== COMMON JS FILES ========== -->
      <script src="js/jquery/jquery-2.2.4.min.js"></script>
      <script src="js/bootstrap/bootstrap.min.js"></script>
      <script src="js/pace/pace.min.js"></script>
      <script src="js/lobipanel/lobipanel.min.js"></script>
      <script src="js/iscroll/iscroll.js"></script>

      <!-- ========== PAGE JS FILES ========== -->
      <script src="js/prism/prism.js"></script>

      <!-- ========== THEME JS ========== -->
      <script src="js/main.js"></script>
      <script>
        $(function($) {

        });
      </script>

      <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

    </body>
    </html>
    <?php ob_flush(); ?>


