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

else if(isset($_POST["click_btn"]))
{
    $id = $_POST['id'];

    $selectdetails = "SELECT * FROM survey_report WHERE id = '$id' LIMIT 1";
    $selectdetailsrun = mysqli_query($con, $selectdetails);

    if(mysqli_num_rows($selectdetailsrun) > 0)
    {
        foreach($selectdetailsrun as $data)
        {
            $mode = $data['mode'];
            
            ?>
                <h3 style="width: 500px; text-align: center">Survery Response for a <?= $mode ?> <?= $data['class'] ?></h3>
                <br>
                <div class="row spacebetween">
                    <p>Full Name</p>
                    <p><?= $data['fullname'] ?></p>
                </div>

                <hr class="hrmain">

                <div class="row spacebetween">
                    <p>Email</p>
                    <p><?= $data['email'] ?></p>
                </div>

                <hr class="hrmain">

                <div class="row spacebetween">
                    <p>Description</p>
                    <p style="max-width: 300px; max-height: 200px; overflow:auto;"><?= nl2br($data['info']) ?></p>
                </div>

                <hr class="hrmain">

                <div class="row spacebetween">
                    <p>Audience</p>
                    <p><?= $data['audience'] ?></p>
                </div>

                <hr class="hrmain">

                <div class="row spacebetween">
                    <p>Brand Color</p>
                    <div class="row">
                        <p><?= $data['color'] ?></p>
                        <div class="view_color" style="background-color: <?= $data['color'] ?>;"></div>
                    </div>
                </div>

                <hr class="hrmain">

                <div class="row spacebetween">
                    <p>Created at</p>
                    <?php 
                        $date = strtotime($data['date']); 
                    ?>
                    <p><?= date("d-m-Y H:i:s", $date) ?> </p>
                </div>

                <?php
                    $key = $data['link_id'];

                    $selectid = "SELECT * FROM base_links WHERE link_id = '$key' LIMIT 1";
                    $selectidrun = mysqli_query($con, $selectid);
                
                    if(mysqli_num_rows($selectidrun) > 0)
                    {
                        foreach($selectidrun as $dataid)
                        {
                            ?>
                                <div class="row spacebetween">
                                    <strong><p></p></strong>
                                    <?php 
                                        if($dataid['status'] == 'revoked')
                                        {
                                            ?>
                                                <strong><p class="button" style="background-color: red; color: #fff;"><?= $dataid['status'] ?></p></strong>
                                            <?php
                                        }
                                        else if($dataid['status'] == 'Completed')
                                        {
                                            ?>
                                                <strong><p class="button" style="background-color: green; color: #fff;"><?= $dataid['status'] ?></p></strong>
                                            <?php
                                        }
                                        else if($dataid['status'] == '')
                                        {
                                            ?>
                                                <strong><p class="button" style="background-color: orange; color: #fff;">Awaiting</p></strong>
                                            <?php
                                        }
                                    ?>
                                </div>
                            <?php
                        }
                    }
                ?>
            <?php
        }
    }
}

else if(isset($_POST['generate_link']))
{
    function generateRandomString($length = 24) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    
    $link_id = generateRandomString();
    $type = $_POST['type'];

    if($type == '')
    {
        ?>
            <h3>Error</h3>
            <div class="row">
                <p>The Type of Service is no selected</p>
            </div>
        <?php
    }
    else
    {
        $insert = "INSERT into base_links (link_id,type) 
                VALUE ('$link_id','$type')";
        $insert_run = mysqli_query($con, $insert);
        if($insert_run)
        {
            $url = "http://localhost/";
            $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

            if($root == $url)
            {
                ?>
                    <h3>Generated url is:</h3>
                    <div class="row">
                        <p class="button"><?= $url ?>fibe/survey?id=<?= $link_id ?></p>
                        <p>Copy</p>
                    </div>
                <?php
            }
            else
            {
                ?>
                    <h3>Generated url is:</h3>
                    <div class="row">
                        <p class="button"><?= $root ?>survey?id=<?= $link_id ?></p>
                        <p>Copy</p>
                    </div>
                <?php
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