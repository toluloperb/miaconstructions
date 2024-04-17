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

                $selectimg = "SELECT * FROM portfolio WHERE uniq_id= '$uniqid' LIMIT 1";
                $selectimg_run = mysqli_query($con, $selectimg);

                if($selectimg_run)
                {
                    foreach($selectimg_run as $imgdata)
                    {
                        ?>
                            <div class="prevmenus">
                                <a>
                                    <i class="fa fa-eye"> <?= $imgdata['views'] ?></i>
                                    <p>Seen</p>
                                </a>

                                <a href="javascript:history.go(-1)">
                                    <i class="fa fa-arrow-left"></i>
                                    <p>Go Back</p>
                                </a>

                                <a href="portfolio">
                                    <i class="fa fa-arrow-right"></i>
                                    <p>See more</p>
                                </a>

                                <a href="">
                                    <i class="fa fa-heart-o"></i>
                                    <p>Like</p>
                                </a>
                            </div>
                        <?php
                    }
                }

                $updateProject = "UPDATE portfolio SET views = views + 1 WHERE uniq_id = '$uniqid'";
                $updateProject = mysqli_query($con, $updateProject);

                if($updateProject)
                {
                    $selectimg = "SELECT * FROM projects WHERE uniq_id= '$uniqid' ORDER BY id DESC";
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