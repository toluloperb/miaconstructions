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

<section class="content clients">
    <div class="top">
        <h3>Pick a Skill &#128523;</h3>
        <!-- <p>Projects featured today by our curators</p> -->
    </div>
    <div class="courses_container">
        <div class="courserow">
            <a href="enroll"><div class="eachcourse">
                <div class="bkgImg" style="background-image: url(assets/images/gfx.jfif);"></div>
                <h3>Graphics Designing</h3>
                <p>The Ultimate Graphic Design Course Which Covers Photoshop, Illustrator, InDesign, Design Theory, Branding, Logo Design</p>
                <hr>
                <div class="starrow">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <p>(200,000)</p>
                </div>
                <p><strong>&#x20A6; 75,000</strong></p>
                <p>+&#x20A6; 5,000 Application Fee</p>
            </div></a>
        </div>
    </div>
</section>

<?php
    include("includes/footer.php");
?>