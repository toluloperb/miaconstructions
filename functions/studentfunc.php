<?php
    session_start();
    include ('../config/dbcon.php');

    // 200 - User Not Found
    // 300 - Open New Input

    

    if(isset($_POST["verify"]))
    {
        $email = $_POST['email'];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];

        $student_no = rand(000000000,999999999);

        if($cpassword == $password)
        {
            $check_if_email_exist = "SELECT * FROM students WHERE email = '$email' LIMIT 1";
            $check_if_email_exist_run = mysqli_query($con, $check_if_email_exist);

            if($check_if_email_exist_run)
            {
                foreach($check_if_email_exist_run as $verify)
                {
                    $currentpassword = $verify['password'];

                    if($currentpassword == "")
                    {
                        // Update Password
                        $update_password = "UPDATE students SET password = '$password', student_no = '$student_no' WHERE email='$email'";
                        $update_password_run = mysqli_query($con, $update_password);

                        if($update_password_run)
                        {
                            header("Location: ../student-portal");
                        }
                        
                    }
                    else 
                    {
                        $_SESSION['status'] = "Seems you forgot your password!";
                        header("Location: ../student-portal/recovery");
                        die();
                    }
                }
            }
        }
        else
        {
            $_SESSION['status'] = "Password do not match!";
            header("Location:".$_SERVER['HTTP_REFERER']);
            die();
        }
    }
    else if(isset($_POST["recover"]))
    {
        $randotp = rand(00000, 99999);
        $email = $_POST['email'];

        $update_token = "UPDATE students SET otp='$randotp' WHERE email='$email'";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run)
        {
            $_SESSION['email'] = "$email";
            header("Location: ../student-portal/setnewpass");
        }
    }
    else if(isset($_POST['newpasswordset']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if($cpassword == $password)
        {
            $update_password = "UPDATE students SET password='$password' WHERE email='$email'";
            $update_password_run = mysqli_query($con, $update_password);

            if($update_password_run)
            {
                $_SESSION['email'] = "$email";
                header("Location: ../student-portal/");
            }
        }
        else
        {
            $_SESSION['status'] = "Password do not match!";
            header("Location:".$_SERVER['HTTP_REFERER']);
            die();
        }
    }
?>