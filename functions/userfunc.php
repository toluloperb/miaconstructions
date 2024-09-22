<?php
    session_start();
    include("../config/dbcon.php");

    if(isset($_POST["book"]))
    {
        $full_names	= $_POST["full_names"];
        $email	= $_POST["email"];
        $phone	= $_POST["phone"];
        $company	= $_POST["company"];
        $about	= $_POST["about"];
        $service	= $_POST["service"];
        $budget	= $_POST["budget"];

        $insertBook = "INSERT into bookings (full_names,email,phone,company,about,service,budget)
                        VALUES ('$full_names','$email','$phone','$company','$about','$service','$budget')";
        $insertBookRun = mysqli_query($con, $insertBook);

        if($insertBookRun)
        {
            ?>
                Good
            <?php
        }
        else
        {
            $_SESSION['status'] = 'Error Submittion';
            header("Location " . $_SERVER['HTTP_REFERER']);
            die();
        }

    }

    else if(isset($_POST["getQuote"]))
    {
        $full_names	= $_POST["full_names"];
        $email	= $_POST["email"];
        $phone	= $_POST["phone"];
        $company	= $_POST["company"];
        $about	= $_POST["about"];
        $service	= $_POST["service"];
        $budget	= "Get Quote";

        $insertBook = "INSERT into bookings (full_names,email,phone,company,about,service,budget)
                        VALUES ('$full_names','$email','$phone','$company','$about','$service','$budget')";
        $insertBookRun = mysqli_query($con, $insertBook);

        if($insertBookRun)
        {
            $_SESSION['status'] = 'Success';
            header("Location: ../book-success");
            die();
        }
        else
        {
            $_SESSION['status'] = 'Submission Error';
            header("Location " . $_SERVER['HTTP_REFERER']);
            die();
        }

    }

    if(isset($_POST['submitsurvey']))
    {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        $audience = $_POST['audience'];
        $color = $_POST['color'];
        $note = $_POST['info'];
        $class = $_POST['class'];
        $link_id = $_POST['link_id'];

        $info = str_replace("'", "''", "$note");

        $insertSurvey = "INSERT into survey_report (fullname,email,mode,audience,color,info,class,link_id)
                        VALUES ('$fullname','$email','$type','$audience','$color','$info','$class','$link_id')";
        $insertSurveyRun = mysqli_query($con, $insertSurvey);

        if($insertSurveyRun)
        {
            $updateStatus = "UPDATE base_links SET status = 'Completed' WHERE link_id = '$link_id'";
            $updateStatusRun = mysqli_query($con, $updateStatus);

            if($updateStatusRun)
            {
                $url = "http://localhost/";
                $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
                
                $cURL = $root."survey?id=$link_id";
                if($root == $url)
                {
                    header("Location:  $url/fibe/survey?id=$link_id");
                }
                else
                {
                    header("Location:  $cURL");
                }
                
            }
        }
    }

    else if(isset($_POST['submitStudentregister']))
    {
        $full_name = $_POST["full_name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $marital_status = $_POST["marital_status"];
        $disability = $_POST["disability"];
        $religion = $_POST["religion"];
        $sfull_name = $_POST["sfull_name"];
        $semail = $_POST["semail"];
        $sphone = $_POST["sphone"];
        $saddress = $_POST["saddress"];
        $srelationship = $_POST["srelationship"];
        $sjob = $_POST["sjob"];
        $kfull_name = $_POST["kfull_name"];
        $kemail = $_POST["kemail"];
        $kphone = $_POST["kphone"];
        $kaddress = $_POST["kaddress"];
        $krelationship = $_POST["krelationship"];
        $course_of_study = $_POST["course_of_study"];
        $allergies = $_POST["allergies"];
        $edu_status = $_POST["edu_status"];
        $job_status = $_POST["job_status"];

        $price = $_POST['price'];

        $passport = $_FILES["passport"]["name"];
        $passport_tmp = $_FILES['passport']['tmp_name'];

        $path = "../uploads/".$passport;

        // Check if email exists
        $check = "SELECT * FROM students WHERE email = '$email'";
        $checkrun = mysqli_query($con, $check);

        if(mysqli_num_rows($checkrun) > 0)
        {
            $_SESSION['status'] = "User already exist";
            header("Location:" . $_SERVER['HTTP_REFERER']);
            die();
        }
        else
        {
            $submitapplication = "INSERT into students (full_name, email, phone, address, dob, gender, marital_status, 
                                disability, religion, sfull_name, semail, sphone, saddress, srelationship, sjob, kfull_name, 
                                kemail, kphone, kaddress, krelationship, course_of_study, passport,allergies,job_status,edu_status) VALUES ('$full_name', '$email', 
                                '$phone', '$address', '$dob', '$gender', '$marital_status', '$disability', '$religion', '$sfull_name', '$semail', '$sphone', 
                                '$saddress', '$srelationship', '$sjob', '$kfull_name', '$kemail', '$kphone', '$kaddress', '$krelationship', '$course_of_study', 
                                '$passport','$allergies','$job_status','$edu_status')";
            $submitapplicationrun = mysqli_query($con, $submitapplication);

            if($submitapplicationrun)
            {
                move_uploaded_file($passport_tmp, $path);
                $_SESSION['price']= $price;
                $_SESSION['email']= $email;
                $_SESSION['phone']= $phone;
                header("Location: ../payment-details");
            }
            else
            {
                header("Location:" . $_SERVER['HTTP_REFERER']);
                die();
            }
        }
    }

    else if(isset($_POST['freeBtn']))
    {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $interest = $_POST['interest'];

        // Check if email exist
        $check = "SELECT * FROM free_training WHERE email = '$email'";
        $check_run = mysqli_query($con, $check);
        
        if(mysqli_num_rows($check_run) > 0)
        {
            echo "Fail";
        }
        else
        {
            $insert_free_training = "INSERT INTO free_training (fullname,email,interest) VALUES ('$fullname','$email','$interest')";
            $insert_free_training_run = mysqli_query($con, $insert_free_training);

            if($insert_free_training_run)
            {
                echo "Success";
            }
            else
            {
                echo "Fail";
            }
        }
    }

    else
    {
        header("Location: ../.");
        die();
    }
?>