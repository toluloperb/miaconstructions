<?php
    if($webroot = "http://localhost/fibe")
    {
        ?>
            <div class="navbar">
                <div class="logoContainer">
                    <a href="<?= $webroot ?>"><img src="assets/images/fibe logo.png" alt=""></a>
                </div>
                <div class="menuContainer">
                    <li>
                        <a class="link" href="<?= $webroot ?>">Home</a>
                        <a href="<?= $webroot ?>#services" class="link">Services</a>
                        <a class="link" href="portfolio">Portfolio</a>
                        <a class="link" href="career">Career</a>
                        <a href="" style="padding: none; border: none"><button>Get a Quote</button></a>
                    </li>
                </div>
                <div class="logoContainer menu">
                    <img id="menuBtn" src="assets/images/menu-open.png" alt="">
                    <img style="display: none;" id="menuBtnClose" src="assets/images/menu-close.png" alt="">
                </div>
            </div>

            <div class="mobile_menu_container" id="mobile_menu_container">
                <li>
                    <a href="<?= $webroot ?>">Home</a>
                    <a href="<?= $webroot ?>#services">Services</a>
                    <a href="portfolio">Portfolio</a>
                    <a href="career">Career</a>
                    <a href=""><button>Get a Quote</button></a>
                </li>
            </div>
        <?php
    }
    else if($webroot = "http://fibebusinessagency.com")
    {
        ?>
            <div class="navbar">
                <div class="logoContainer">
                    <a href="<?= $webroot ?>"><img src="assets/images/fibe logo.png" alt=""></a>
                </div>
                <div class="menuContainer">
                    <li>
                        <a class="link" href="<?= $webroot ?>">Home</a>
                        <a href="<?= $webroot ?>#services" class="link">Services</a>
                        <a class="link" href="portfolio">Portfolio</a>
                        <a class="link" href="career">Career</a>
                        <a href="" style="padding: none; border: none"><button>Get a Quote</button></a>
                    </li>
                </div>
                <div class="logoContainer menu">
                    <img id="menuBtn" src="assets/images/menu-open.png" alt="">
                    <img style="display: none;" id="menuBtnClose" src="assets/images/menu-close.png" alt="">
                </div>
            </div>

            <div class="mobile_menu_container" id="mobile_menu_container">
                <li>
                    <a href="<?= $webroot ?>">Home</a>
                    <a href="<?= $webroot ?>#services">Services</a>
                    <a href="portfolio">Portfolio</a>
                    <a href="career">Career</a>
                    <a href=""><button>Get a Quote</button></a>
                </li>
            </div>
        <?php
    }
?>