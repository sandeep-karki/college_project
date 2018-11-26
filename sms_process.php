<?php 
include 'includes/dbcon.php';
include 'includes/session.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['entbatch'])){
	 $ebatch = mysqli_real_escape_string($con, $_POST['batch']);
     $sem= $_POST['semester'];
        
        $contact=array();
       
        $query="SELECT contact_num from registration where batch='$ebatch'";
        $run=mysqli_query($con,$query);
        while($data=mysqli_fetch_assoc($run)){
        	$contact[] =  $data['contact_num'];
        	$to=implode(",",$contact);
        }

            $text =  $sem." sem  ".$ebatch." batch result has been published.Please visit our official site to view your result.Thank you";
            $args = http_build_query(array(
                    'token' => 'xqFRvDXDZjk4oJVR4aI8',
                    'from' => 'Demo',
                    'to' => $to,
                    'text' => $text));

            $url = "http://api.sparrowsms.com/v2/sms/";

            # Make the call using API.
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // Response
            $response = curl_exec($ch);
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if ($status_code == '200') {
                $_SESSION['success'] = "Result Notice Successfully send...";
                header('location:sendsms.php');
            }else{
                $_SESSION['error'] = "SMS Failed to send...";
                     header('location:sendsms.php');
             }
        }
?>