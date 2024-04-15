<?php
    include("includes/header.php");
    include("includes/navbar.php");
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
                    <a href="?q=logo_designs">Brand Identity/Logo Design</a>
                    <a href="?q=printings">Printings & Billboards</a>
                    <a href="?q=digital_marketing">Digital Marketing</a>
                </div>

                <div class="projects children">
                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href=""><button class="button">Explore</button></a>
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
                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>

                    <div class="eachproject">
                        <div class="backgroundImage"></div>
                        <div class="descript">
                            <p>Project title</p>
                            <div class="actions">
                                <p><i class="fa fa-thumbs-up"></i> 120</p>
                                <p><i class="fa">&#xf06e;</i> 200</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href=""><button class="button">Explore</button></a>
            </section>
        <?php
    }
?>

<?php
    include("includes/footer.php");
?>