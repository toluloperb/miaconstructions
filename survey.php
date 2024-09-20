<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("config/dbcon.php");
    ?>
        <?php
            if(isset($_GET['id']))
            {
                $key = $_GET['id'];

                $select_query = "SELECT * FROM base_links WHERE link_id = '$key' AND status = ' '";
                $select_query_run = mysqli_query($con, $select_query);

                if(mysqli_num_rows($select_query_run) > 0)
                {
                    foreach($select_query_run as $data)
                    {
                        ?>
                            <title><?= $data['type'] ?> Survey | FIBE Business Agency</title>

                            <div class="body-section">
                                <div class="sectionHeaderContainer">
                                    <h3><?= $data['type'] ?> Client Survey</h3>
                                    <p>Let's know you, let's get to understand your project. Kindly provide us with detailed information as this will also
                                        help us to determine a pocket friendly quote, delivery time, recommended solutions & expected deliverables.
                                    </p>
                                </div>

                                <div class="area">
                                    <div class="navigations">
                                        <p><i>Navigations</i></p>
                                        <a href="survey?id=<?= $key ?>"><p>Survey Form</p></a>
                                        <br>
                                        <a href="articles?web"><p>Article</p></a>
                                        <a><p>- Type of Web Application</p></a>
                                        <a><p>- Why choose a country?</p></a>
                                        <a><p>- Why should you know your audience?</p></a>
                                        <a><p>- Brand colors</p></a>
                                        <a><p>- Detailed info Guide</p></a>
                                    </div>
                                    <div class="surveyarea">
                                        <h3>Kindly fill out the survey below</h3>
                                        <form action="functions/userfunc.php" method="post">
                                            <div class="formrow">
                                                <div class="formfield">
                                                    <label for="">Full Name</label>
                                                    <input type="text" name="fullname" required>
                                                </div>

                                                <div class="formfield">
                                                    <label for="">Email</label>
                                                    <input type="email" name="email" required>
                                                </div>
                                            </div>

                                            <div class="formrow">
                                                <div class="formfield">
                                                    <label for="">Type of Web Application</label>
                                                    <select name="type" id="type">
                                                        <option value="" selected disabled>Select</option>
                                                        <option value="Ecommerce">Ecommerce</option>
                                                        <option value="Real Estate">Real Estate</option>
                                                        <option value="Medical & Health Matters">Medical & Health Matters</option>
                                                        <option value="Religion">Religion</option>
                                                        <option value="Foundation (NGO)">Foundation (NGO)</option>
                                                        <option value="Finance">Finance</option>
                                                        <option value="Academics & Education">Academics & Education</option>
                                                        <option value="Transportation">Transportation</option>
                                                        <option value="Communication">Communication</option>
                                                    </select>
                                                </div>

                                                <div class="formfield">
                                                    <label for="">Country</label>
                                                    <input type="text" name="country" required>
                                                </div>
                                            </div>

                                            <div class="formrow">
                                                <div class="formfield">
                                                    <label for="">Who are your audience?</label>
                                                    <input type="text" name="audience" required>
                                                </div>

                                                <div class="formfield">
                                                    <label for="">Choose a brand Color</label>
                                                    <input type="color" name="color" required style="padding: 0;">
                                                </div>
                                            </div>

                                            <div class="formfield bigform">
                                                <label for="">Detailed info <a href="">See Guide</a></label>
                                                <i>Should Contain: ~ What you do ~ How you'ld want your Web App to function ~ Features - Other Brands that offers similar services</i>
                                                <textarea name="info" id="" placeholder="Should Contain: ~ What you do ~ How you'ld want your Web App to function ~ Features - Other Brands that offers similar services"></textarea>
                                            </div>

                                            <input type="text" name="class" value="<?= $data['type'] ?>" hidden>
                                            <input type="text" name="link_id" value="<?= $key ?>" hidden>

                                            <button type="submit" name="submitsurvey" class="button">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                }
                else
                {
                    $key = $_GET['id'];

                    $select_query = "SELECT * FROM base_links WHERE link_id = '$key'";
                    $select_query_run = mysqli_query($con, $select_query);

                    if(mysqli_num_rows($select_query_run) > 0)
                    {
                        foreach($select_query_run as $data)
                        {
                            ?>
                                <div class="body-section">
                                    <div class="sectionHeaderContainer">
                                        <h3><?= $data['type'] ?> Client Survey</h3>
                                        <p>Let's know you, let's get to understand your project. Kindly provide us with detailed information as this will also
                                            help us to determine a pocket friendly quote, delivery time, recommended solutions & expected deliverables.
                                        </p>
                                    </div>

                                    <div class="area">
                                        <div class="surveyarea">
                                            <h1>This Survey has been Completed! It will only take 24hrs, and we'll be in touch with you.</h1>
                                        </div>
                                        <div class="navigations">
                                            <p><i>Navigations</i></p>
                                            <a href="survey?id=<?= $key ?>"><p>Survey Form</p></a>
                                            <br>
                                            <a href="articles?web"><p>Article</p></a>
                                            <a><p>- Type of Web Application</p></a>
                                            <a><p>- Why choose a country?</p></a>
                                            <a><p>- Why should you know your audience?</p></a>
                                            <a><p>- Brand colors</p></a>
                                            <a><p>- Detailed info Guide</p></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                }
            }
        ?>
    <?php

    include("includes/footer.php");
?>