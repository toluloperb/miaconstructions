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
                    <h1>Available Courses</h1>

                    <div class="" id="courseModal">
                        
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