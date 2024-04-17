<?php
session_start();
include ('../config/dbcon.php');

ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '55M');

if(isset($_POST["addProject"]))
{
    $title = $_POST["title"];
    $cate = $_POST["cate"];
    $desc = $_POST["desc"];
    $uniqId = rand(000000, 999999);

    $imageCount = count($_FILES['images']["name"]);
    $image_ext = substr(md5(microtime()),rand(0,26),5);
	for($i=0;$i<$imageCount;$i++)
	{
		$imageName = $uniqId.$image_ext[$i];
		$imagetmpName = $_FILES["images"]["tmp_name"][$i];
		$targetPath = "../uploads/".$imageName;

		if(move_uploaded_file($imagetmpName,$targetPath))
		{
			$insert = "INSERT into projects (images,uniq_id) 
                VALUE ('$imageName','$uniqId')";
            $insert_run = mysqli_query($con, $insert);
		}
	}
    if($insert_run)
    {
        $insert = "INSERT into portfolio (uniq_id,title,cate,description) 
                VALUE ('$uniqId','$title','$cate','$desc')";
        $insert_run = mysqli_query($con, $insert);

        $_SESSION['status'] = "Project Added Successfully";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
    }
}

header("Location: ../.");
die();
?>