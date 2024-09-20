<?php
    session_start();
    include ('../config/dbcon.php');

    // 200 - User Not Found
    // 300 - Open New Input

    if(isset($_POST["generateotp"]))
    {
        $email = $_POST["email"];

        $check_if_password_exist = "SELECT * FROM students WHERE email = '$email'";
        $check_if_password_exist_run = mysqli_query($con, $check_if_password_exist);

        if(mysqli_num_rows($check_if_password_exist_run) > 0)
        {
            foreach($check_if_password_exist_run as $verify)
            {
                $password = $verify["password"];

                if($password == "")
                {
                    $otp = rand(000000, 999999);

                    $update = "UPDATE students SET otp='$otp' WHERE email = '$email'";
                    $update_run = mysqli_query($con, $update);
                }
            }
        }
        else
        {
            echo "200";
        }
    }

    else if(isset($_POST["verify"]))
    {
        $email = $_POST["email"];
        $otp = $_POST["otp"];

        $check_if_otp_exist = "SELECT * FROM students WHERE email = '$email' LIMIT 1";
        $check_if_otp_exist_run = mysqli_query($con, $check_if_otp_exist);

        if($check_if_otp_exist_run)
        {
            foreach($check_if_otp_exist_run as $verify)
            {
                $token = $verify["otp"];

                if($token == "$otp")
                {
                    $_SESSION['auth'] = true;
                    $_SESSION['auth_email'] = "$email";
                }
                else
                {
                    echo "200";
                }
            }
        }
    }
?>