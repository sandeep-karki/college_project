<?php
include 'includes/session.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;*/
include 'PHPMailer/class.phpmailer.php';
include 'PHPMailer/class.smtp.php';
//Load Composer's autoloader
require 'C:\xampp\htdocs\FinalProject2\PHPMailer\PHPMailerAutoload.php';
// require 'C:\xampp\htdocs\FinalProject2/';
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;        maharjanshona12@gmail.com                       // Enable verbose debug output
    $htmlversion="<h1>Hello dear students!!! <br><br><p>Your awaited result has been published. You can view your result from the official website of TU.</p><br><br><h3>Fingeres crossed!!!</h3> ";
    $textversion="Hello dear students!!! ./r/n Your awaited result has been published. You can view your result from following link ./r/n Fingeres crossed!!!";
try{
    $mail->isSMTP(); 
    $mail->SMTPDebug = 1;                                     // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sthasushree@gmail.com';                 // SMTP username
    $mail->Password = 'd0s0mething';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('sthasushree@gmail.com','Sender');

        //database
        include 'includes/dbcon.php';

    //initializing variables
        $ebatch = "";
        $msg = "";
        $error = "";

        $errors = array(); //creating $errors as an array variable.

       
    if (isset($_POST['entbatch'])) {
        $ebatch = mysqli_real_escape_string($con, $_POST['batch']);
        

        //echo 'success';
        //ensure that the form field are filled properly(form validation)...
    
           

    /*** prepare the select statement ***/
             $stmt = "SELECT email FROM registration WHERE batch= '$ebatch' ";
     
            /*** execute the prepared statement ***/
            $run = mysqli_query($con,$stmt);
            if (!$run) {
                die ('SQL Error: ' . mysqli_error($con));
            }
            $email =array();
            //$arrlength = count($email);
            //$row = array();     
            while($row = mysqli_fetch_array($run)) {
               
                $email = $row['email'];
                //echo $arrlength;
                $mail->addAddress($email);  
                        }   // Add a recipient
                            
}
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'TU BSC CSIT result has been published';
        $mail->Body    = $htmlversion;
        $mail->AltBody = $textversion;

        if(!$mail->send()) {
            $_SESSION['error'] = 'Message could not be sent.please try again.';
            @header('location:sendmail.php');
            exit();
            // $_SESSION['error'] = 'Mailer Error: ' . $mail->ErrorInfo;
            //echo 'Not sent: <pre>'.print_r(error_get_last(), true).'</pre>';

        } else {
            $_SESSION['success'] ='Message has been sent :)';
            @header('location:sendmail.php');
        exit();
        }
        
    }catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        /*--------------------- for sending mail close ------------------*/

}
?>