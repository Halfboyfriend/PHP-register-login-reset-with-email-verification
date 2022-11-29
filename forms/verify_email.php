<?php
session_start();
include ('dbcon.php');

if(isset($_GET['token']))
{
    $token = $_GET['token'];
    $verify_query = "SELECT verify,verify_status FROM user WHERE verify = '$token' LIMIT 1";
    $verify_query_run = mysqli_query($conn, $verify_query);

    if(mysqli_num_rows($verify_query_run) > 0)
    {
        $row = mysqli_fetch_array($verify_query_run);
        if($row['verify_status'] == "0")
        {
            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE user SET verify_status = '1' WHERE verify = '$clicked_token' LIMIT = 1";

            $update_query_run = mysqli_query($conn, $update_query);

            if($update_query_run)
            {
                $_SESSION['status'] = "Your account has been verified successfully";
                header("location: login.php");
            exit(0);

            }else{
                $_SESSION['status'] = "Verification Failed";
                header("location: login.php");
                exit(0);
            }

        }else{

            $_SESSION['status'] = "Email Already Verified, Please login";
            header("location: login.php");
        exit(0);
        }
    }
    else{
        $_SESSION['status'] = "ACCESS DENIED";
        header("location: login.php");
    }
}



?>