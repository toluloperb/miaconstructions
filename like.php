<?php
    include("config/dbcon.php");
    $uniqid = $_POST["uniq_id"];

    $updateProject = "UPDATE portfolio SET likes = likes + 1 WHERE uniq_id = '$uniqid' LIMIT 1";
    $updateProject = mysqli_query($con, $updateProject);
?>