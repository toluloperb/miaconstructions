<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("config/dbcon.php");
?>

<section class="landingScreen pagesbanner">
    <div class="container">
        <h3>Academia</h3>
        <p>Become a Certified Tech Geek! Learn a Skill!</p>
        <a href="student-portal" target="_blank"><button class="button" style="background-color: #fff; color: #000;">Login as a student</button></a>
    </div>
</section>

<section class="adsAcademia Desktop">
    <a href="free-training"><div class="adsContainer">
        <img src="assets/images/fibe academy free-training.jpg" alt="">
    </div></a>
</section>

<section class="adsAcademia Mobile">
    <a href="free-training"><div class="adsContainer">
        <img src="assets/images/fibe academy free-training 1x1.jpg" alt="">
    </div></a>
</section>

<section class="content clients">
    <div class="top">
        <h3>Pick a Skill &#128523;</h3>
        <!-- <p>Projects featured today by our curators</p> -->
    </div>
    <div class="courses_container">
        <div class="courserow">
            <?php
                $import = "SELECT * FROM courses";
                $import_run = mysqli_query($con, $import);

                if(mysqli_num_rows($import_run) > 0)
                {
                    foreach($import_run as $data)
                    {
                        ?>
                            <a href="enroll"><div class="eachcourse">
                                <div class="bkgImg" style="background-image: url(uploads/<?= $data['image'] ?>);"></div>
                                <h3><?= $data['course_title'] ?></h3>
                                <p><?= nl2br($data['course_desc']) ?></p>
                                <hr>
                                <div class="starrow">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <p>(200,000)</p>
                                </div>
                                <p><strong>&#x20A6; <?= number_format($data['price']) ?></strong></p>
                                <p>+&#x20A6; 5,000 Application Fee</p>
                            </div></a>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</section>

<?php
    include("includes/footer.php");
?>