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

    else
    {
        header("Location: ../.");
        die();
    }
?>