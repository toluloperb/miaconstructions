<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("config/dbcon.php");
?>

<section class="landingScreen pagesbanner prevPage">
    <div class="preview">        
        <!-- If Get is set -->
        <?php
            if(isset($_GET['id']))
            {
                $uniqid = $_GET['id'];

                $key = 'Trodpen2022*??-23';

                $decrypt = openssl_decrypt(base64_decode($uniqid), 'aes-128-cbc', $key, 0, '5555555555555555');

                $selectimg = "SELECT * FROM portfolio WHERE uniq_id= '$decrypt' LIMIT 1";
                $selectimg_run = mysqli_query($con, $selectimg);

                if($selectimg_run)
                {
                    foreach($selectimg_run as $imgdata)
                    {
                        ?>
                            <div class="prevmenus">
                                <a>
                                    <i class="fa fa-eye"></i>
                                    <p><?= $imgdata['views'] ?> Seen</p>
                                </a>

                                <a href="javascript:history.go(-1)">
                                    <i class="fa fa-arrow-left"></i>
                                    <p>Go Back</p>
                                </a>

                                <a href="portfolio">
                                    <i class="fa fa-arrow-right"></i>
                                    <p>See more</p>
                                </a>

                                <form id="idForm" action="" method="post" style="">
                                    <input type="text" value="<?= $uniqid ?>" name="uniq_id" hidden>
                                    <a id="like" style="cursor: pointer;">
                                        <i id="heart" class="fa fa-heart-o"></i>
                                        <p id="likesCount"><?= $imgdata['likes'] ?> Likes</p>
                                    </a>
                                </form>
                            </div>
                        <?php
                    }
                }

                ?>
                    <div class="descriptionPrev">
                        <p><?= nl2br($imgdata['description']) ?></p>
                    </div>
                <?php

                $updateProject = "UPDATE portfolio SET views = views + 1 WHERE uniq_id = '$decrypt'";
                $updateProject = mysqli_query($con, $updateProject);

                if($updateProject)
                {
                    $selectimg = "SELECT * FROM projects WHERE uniq_id= '$decrypt' ORDER BY id DESC";
                    $selectimg_run = mysqli_query($con, $selectimg);

                    if($selectimg_run)
                    {
                        foreach($selectimg_run as $imgdata)
                        {
                            ?>
                                <div class="prevImage">
                                    <img src="uploads/<?= $imgdata['images'] ?>" alt="">
                                </div>
                            <?php
                        }
                    }
                }
            }
        ?>
    </div>
</section>

<?php
    include("includes/footer.php");
?>