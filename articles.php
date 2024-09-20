<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("config/dbcon.php");
    ?>
        <?php
            if(isset($_GET['web']))
            {
                ?>
                    <title>Web Applications | FIBE Business Agency</title>

                    <div class="body-section">
                        <div class="sectionHeaderContainer">
                            <h3>Web Applications</h3>
                            <p>Learn More - Article</p>
                        </div>

                        <div class="area">
                            <div class="navigations">
                                <p><i>Navigations</i></p>
                                <a onclick="history.back()"><p>Survey Form</p></a>
                                <br>
                                <a href="articles?web"><p>Article</p></a>
                                <a><p>- Type of Web Application</p></a>
                                <a><p>- Why choose a country?</p></a>
                                <a><p>- Why should you know your audience?</p></a>
                                <a><p>- Brand colors</p></a>
                            </div>
                            <div class="surveyarea">
                                <h3 id="type_of_web_application">Type of Web Application</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam maiores praesentium neque quasi, molestias 
                                    rerum fugiat minima molestiae aspernatur provident accusamus omnis architecto blanditiis doloribus a totam 
                                    quos temporibus sint? <br><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, modi molestias sapiente praesentium 
                                    reiciendis eaque iste delectus quis quaerat? Voluptates, saepe adipisci. Architecto, perferendis. Non facere 
                                    fuga ad consequatur assumenda?
                                </p>

                                <br><br>

                                <h3 id="country">Why choose a country?</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam maiores praesentium neque quasi, molestias 
                                    rerum fugiat minima molestiae aspernatur provident accusamus omnis architecto blanditiis doloribus a totam 
                                    quos temporibus sint? <br><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, modi molestias sapiente praesentium 
                                    reiciendis eaque iste delectus quis quaerat? Voluptates, saepe adipisci. Architecto, perferendis. Non facere 
                                    fuga ad consequatur assumenda?
                                </p>

                                <br><br>

                                <h3 id="audience">Why should you know your audience?</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam maiores praesentium neque quasi, molestias 
                                    rerum fugiat minima molestiae aspernatur provident accusamus omnis architecto blanditiis doloribus a totam 
                                    quos temporibus sint? <br><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, modi molestias sapiente praesentium 
                                    reiciendis eaque iste delectus quis quaerat? Voluptates, saepe adipisci. Architecto, perferendis. Non facere 
                                    fuga ad consequatur assumenda?
                                </p>

                                <br><br>

                                <h3 id="colors">Brand colors</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam maiores praesentium neque quasi, molestias 
                                    rerum fugiat minima molestiae aspernatur provident accusamus omnis architecto blanditiis doloribus a totam 
                                    quos temporibus sint? <br><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, modi molestias sapiente praesentium 
                                    reiciendis eaque iste delectus quis quaerat? Voluptates, saepe adipisci. Architecto, perferendis. Non facere 
                                    fuga ad consequatur assumenda?
                                </p>
                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>
    <?php

    include("includes/footer.php");
?>