<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("config/dbcon.php");
?>

<section class="landingScreen pagesbanner">
    <div class="container">
        <h3>Academia</h3>
        <p>Become a Certified Tech Geek! Learn a Skill!</p>
    </div>
</section>

<section class="content clients">
    <div class="top">
        <h3>Pick a Skill &#128523;</h3>
        <!-- <p>Projects featured today by our curators</p> -->
    </div>
    <div class="projects children">
        <?php
            $select = "SELECT * FROM portfolio ORDER BY id DESC LIMIT 8";
            $select_run = mysqli_query($con, $select);

            if(mysqli_num_rows($select_run) > 0)
            {
                foreach($select_run as $data)
                {
                    ?>
                        <div class="eachproject">
                            <?php
                                $uniqId = $data["uniq_id"];

                                $key = 'Trodpen2022*??-23';

                                $encrypt = base64_encode(openssl_encrypt($uniqId, 'aes-128-cbc', $key, 0, 5555555555555555));
                                
                                $selectimg = "SELECT * FROM projects WHERE uniq_id= '$uniqId' ORDER BY id DESC LIMIT 1";
                                $selectimg_run = mysqli_query($con, $selectimg);

                                if($selectimg_run)
                                {
                                    foreach($selectimg_run as $imgdata)
                                    {
                                        ?>
                                            <a href="project?id=<?= $encrypt ?>" class="backgroundImage"><div class="backgroundImage" style="background: url(uploads/<?= $imgdata['images'] ?>)"></div></a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    <?php
                }
            }
        ?>
    </div>
</section>

<?php
    include("includes/footer.php");
?>