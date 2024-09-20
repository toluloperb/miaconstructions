<?php
    session_start();
    if (isset($_SESSION['auth']))
    {
        include("includes/header.php");
        include("includes/navbar.php");
        include("includes/sidebar.php");
        include("../config/dbcon.php");

        ?>
            <!-- Modal -->
            <div class="viewModal" id="viewModalview">
                <div>
                    <button class="button closebtnView" id="closebtnView"><i class="fa fa-close"></i></button>
                </div>
                <div class="modalContentContainer">

                </div>
            </div>
            <main>
                <section class="">
                    <h1>Survey Response for Web Application Projects</h1>

                    <div class="toppings">
                        <p>25 Responses</p>
                        <form class="glinkform" action="" method="post">
                            <p>Generate a survey link</p>
                            
                            <div class="row" style="margin-top: 10px;">
                                <div class="formfield">
                                    <select name="type" id="type" required>
                                        <option value="" selected disabled>Select Type of Service</option>
                                        <option value="Website Development">Website Development</option>
                                    </select>
                                </div>
                                <button type="button" id="generatelink" class="button">Generate Link</button>
                            </div>
                        </form>
                    </div>

                    <div class="history">
                        <div class="historyrow">
                            <p class="this">Full name</p>
                            <p class="worth">Type of Website</p>
                            <p class="amount">Description</p>
                        </div>
                        <hr>
                        
                        <?php
                            $selectsurvey_response = "SELECT * FROM survey_report ORDER BY id DESC";
                            $selectsurvey_responserun = mysqli_query($con, $selectsurvey_response);

                            if(mysqli_num_rows($selectsurvey_responserun) > 0)
                            {
                                foreach($selectsurvey_responserun as $data)
                                {
                                    ?>
                                        <a value="" data-toggle="viewModal" data-target="viewModalview" id="eachreport" class="eachreplink"><div class="historyrow eachreport">
                                            <p class="this"><?= $data['fullname'] ?> </p>
                                            <p class="worth"><strong><span><?= $data['mode'] ?> <?= $data['class'] ?></span></strong></p>
                                            <div class="amount">
                                                <p class=" eclipse_text" ><?= $data['info'] ?></p>
                                            </div>
                                            <p class="id" style="display: none;"><?= $data['id'] ?></p>
                                        </div></a>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </section>
            </main>
        <?php

        include("includes/footer.php");
    }
    else
    {
        header("Location: login?error=Login to continue");
        exit();
    }
?>