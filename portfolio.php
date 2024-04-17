<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("config/dbcon.php");
?>

<section class="landingScreen pagesbanner">
    <div class="container">
        <h3>Portfolio</h3>
        <p>Holla! We got some sweet stuffs for your eyes.</p>
    </div>
</section>

<!-- If Get is set -->
<?php
    if(isset($_GET['q']))
    {
        $q = $_GET['q'];

        $string=str_replace("_"," ",$q);

        ?>
            <section class="content clients">
                <div class="selectCategory" id="cate_button">
                    <p><?= $string ?></p>
                    <p id="open">&#x25BC;</p>
                </div>

                <div class="selectCategory" id="cate_button_close" style="display:none;">
                    <p><?= $string ?></p>
                    <p id="close">&#x25B2;</p>
                </div>
                <div class="top projectsmenus">
                    <a href="?q=graphic_designs">Graphic Designs</a>
                    <a href="?q=web_development">Web Development</a>
                    <a href="?q=social_media">Social Media</a>
                    <a href="?q=logo_designs">Brand Identity/Logo Design</a>
                    <a href="?q=printings">Printings & Billboards</a>
                    <a href="?q=digital_marketing">Digital Marketing</a>
                </div>

                <div class="top projectsmenus" id="projectsmenus" style="display:none">
                    <a href="?q=graphic_designs">Graphic Designs</a>
                    <a href="?q=web_development">Web Development</a>
                    <a href="?q=social_media">Social Media</a>
                    <a href="?q=brand_identity/logo">Brand Identity/Logo Design</a>
                    <a href="?q=printings">Printings & Billboards</a>
                    <a href="?q=digital_marketing">Digital Marketing</a>
                </div>

                <div class="projects children">
                    <?php
                        $select = "SELECT * FROM portfolio WHERE cate = '$string' ORDER BY id DESC";
                        $select_run = mysqli_query($con, $select);

                        if(mysqli_num_rows($select_run) > 0)
                        {
                            foreach($select_run as $data)
                            {
                                ?>
                                    <div class="eachproject">
                                        <?php
                                            $uniqId = $data["uniq_id"];
                                            $selectimg = "SELECT * FROM projects WHERE uniq_id= '$uniqId' ORDER BY id DESC LIMIT 1";
                                            $selectimg_run = mysqli_query($con, $selectimg);

                                            if($selectimg_run)
                                            {
                                                foreach($selectimg_run as $imgdata)
                                                {
                                                    ?>
                                                        <a href="project?id=<?= $uniqId ?>" class="backgroundImage"><div class="backgroundImage" style="background: url(uploads/<?= $imgdata['images'] ?>)"></div></a>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        <div class="descript">
                                            <p><?= $data["title"] ?></p>
                                            <div class="actions">
                                                <p><i class="fa fa-thumbs-up"></i> <?= $data["likes"] ?></p>
                                                <p><i class="fa">&#xf06e;</i> <?= $data["views"] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                <!-- <a href=""><button class="button">Explore</button></a> -->
            </section>
        <?php
    }
    else
    {
        ?>
            <section class="content clients">
                <div class="selectCategory" id="cate_button">
                    <p>Select a Category</p>
                    <p id="open">&#x25BC;</p>
                </div>

                <div class="selectCategory" id="cate_button_close" style="display:none;">
                    <p>Select a Category</p>
                    <p id="close">&#x25B2;</p>
                </div>
                <div class="top projectsmenus" id="projectsmenus">
                    <a href="?q=graphic_designs">Graphic Designs</a>
                    <a href="?q=web_development">Web Development</a>
                    <a href="?q=social_media">Social Media</a>
                    <a href="?q=logo_designs">Brand Identity/Logo Design</a>
                    <a href="?q=printings">Printings & Billboards</a>
                    <a href="?q=digital_marketing">Digital Marketing</a>
                </div>

                <div class="top projectsmenus" id="projectsmenus" style="display:none">
                    <a href="?q=graphic_designs">Graphic Designs</a>
                    <a href="?q=web_development">Web Development</a>
                    <a href="?q=social_media">Social Media</a>
                    <a href="?q=logo_designs">Brand Identity/Logo Design</a>
                    <a href="?q=printings">Printings & Billboards</a>
                    <a href="?q=digital_marketing">Digital Marketing</a>
                </div>

                <div class="projects children">
                    <?php
                        $select = "SELECT * FROM portfolio ORDER BY id DESC";
                        $select_run = mysqli_query($con, $select);

                        if(mysqli_num_rows($select_run) > 0)
                        {
                            foreach($select_run as $data)
                            {
                                ?>
                                    <div class="eachproject">
                                        <?php
                                            $uniqId = $data["uniq_id"];
                                            $selectimg = "SELECT * FROM projects WHERE uniq_id= '$uniqId' ORDER BY id DESC LIMIT 1";
                                            $selectimg_run = mysqli_query($con, $selectimg);

                                            if($selectimg_run)
                                            {
                                                foreach($selectimg_run as $imgdata)
                                                {
                                                    ?>
                                                        <a href="project?id=<?= $uniqId ?>" class="backgroundImage"><div class="backgroundImage" style="background: url(uploads/<?= $imgdata['images'] ?>)"></div></a>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        <div class="descript">
                                            <p><?= $data["title"] ?></p>
                                            <div class="actions">
                                                <p><i class="fa fa-thumbs-up"></i> <?= $data["likes"] ?></p>
                                                <p><i class="fa">&#xf06e;</i> <?= $data["views"] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                <!-- <a href=""><button class="button">Explore</button></a> -->
            </section>
        <?php
    }
?>

<?php
    include("includes/footer.php");
?>