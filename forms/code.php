<?php
session_start();
include ('dbcon.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
require 'vendor/autoload.php';


function  sendemail_verification($name,$email,$verify)
{
    
//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);  
    $mail->isSMTP(); 
    $mail->SMTPAuth   = true; 
    //Send using SMTP
    $mail->SMTPDebug = 3;

    $mail->Host = 'smtp.example.com';                     //Set the SMTP server to send through  
    $mail->Username   = 'owoyemiidrisolamilekan@gmail.com';                     //SMTP username
    $mail->Password   = '08170585143'; 
    
    //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;
    //Recipients
    $mail->setFrom('owoyemiidrisolamilekan@gmail.com', $name);
    $mail->addAddress($email);     //Add a recipient
   

 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email verification from SCHOOL QUIZ';
    $email_template = "
    <h2>You have registered with SCHOOL QUIZ</h2>
    <h5>Verify your email address and Login in with the below link</h5>
    <br><br>
    <a href='http://localhost/School_project/forms/verify_email.php?token=$verify'>Click here</a>
    
    ";
    

    $mail->Body = $email_template;
  //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
  //  echo 'Message has been sent';


}




if(isset($_POST['register_btn']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify = md5(rand());

    sendemail_verification("$name", "$email", "$verify");
    echo "sennt or not";

    // //CHECK IF USER EXIST

    // $check_email_query = "SELECT email FROM user WHERE email = '$email' LIMIT 1";
    // $query_run = mysqli_query($conn, $check_email_query);

    // if(mysqli_num_rows($query_run) > 0)

    // {
       
    //     $_SESSION['status'] = "Email already Exist";
    //     header("location: register.php");
    // }
    // else
    // {
    //     //REGISTER USER INTO THE DATABASE

    //     $query = "INSERT INTO user (name,phone,email,password,verify) VALUES ('$name', '$phone', '$email', '$password', '$verify')";

    //     $query_run = mysqli_query($conn, $query);
    
    //     if($query)
    //     {
         
    //         sendemail_verification("$name", "$email", "$verify");
    //         $_SESSION['status'] = "Registered Successfully";
    //         header("location: register.php");
    //     }
    //     else{
       
    //         $_SESSION['status'] = "Error Occured";
    //         header("location: register.php");
    //     }

    // }

   

}


?>