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
        $info = $_POST['info'];
        $class = $_POST['class'];
        $link_id = $_POST['link_id'];

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

    else
    {
        header("Location: ../.");
        die();
    }
?>