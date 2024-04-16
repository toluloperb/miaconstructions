<?php
    session_start();
    if (isset($_SESSION['auth']))
    {
        include("includes/header.php");
        include("includes/navbar.php");
        include("includes/sidebar.php");
        include("../config/dbcon.php");

        ?>
            <main>
                <?php
                    if(isset($_GET["p"]))
                    {
                        $id = $_GET["p"];
                        $select = "SELECT * FROM updates WHERE id = '$id' ORDER BY id DESC LIMIT 1";
                        $select_query = mysqli_query($con, $select);

                        if(mysqli_num_rows($select_query) > 0)
                        {
                            foreach($select_query as $data)
                            {
                                ?>
                                    <div class="storyControls" style="display: flex; flex-direction: row; align-items: center;">
                                        <input name="action" style="width: 70px; padding: 7px; border-radius: 7px; 
                                        border: 1px solid #e8e8e8; color: #333; margin-bottom: 10px; margin-right: 10px;" onclick="history.back()" 
                                        type="submit" value="&#8592; Back"/>

                                        <button style="width: 70px; padding: 7px; border-radius: 7px; 
                                        border: 1px solid #e8e8e8; color: #333; margin-bottom: 10px" id="editPostBtn">&#9998; Edit</button>
                                    </div>
                                    <div class="contentContainer readStory" style="height: auto;">
                                        <?php
                                            if(isset($_SESSION['status']))
                                            {
                                                $response = $_SESSION['status'];
                                                if($response)
                                                {
                                                    ?>
                                                        <div class="alert" id="alert" role="alert">
                                                            <p><?= $response ?></p>
                                                        </div>
                                                    <?php
                                                    unset($_SESSION['status']);
                                                }
                                            }
                                        ?>
                                        <div class="updateImg readImg" style="background: url('../uploads/<?= $data["image"] ?>')"></div>
                                        <h3><?= $data["title"] ?></h3>
                                        <p><?= nl2br ($data["story"]) ?></p>
                                    </div>

                                    <div class="alert updatesContainer" id="editPost">
                                        <button id="closePostEditBtn" style=""><i class="fas fa-times-circle"></i> Close</button>
                                        <h3>Add New Update</h3>
                                        <form action="../functions/adminFunction.php" method="post" enctype="multipart/form-data">
                                            <div class="newPostFrom">
                                                <input type="text" value="<?= $data["id"] ?>" name="post_id" hidden>
                                                <div class="postform2parts">
                                                    <div>
                                                        <label for="">Title</label>
                                                        <input type="text" name="title" value="<?= $data["title"] ?>" readonly>
                                                    </div>

                                                    <div>
                                                        <label for="">Post Story</label>
                                                        <textarea id="test" name="updateStory" placeholder="Start Typing">
                                                            <?= ($data["story"]) ?>
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="postform2parts">
                                                    <div class="imageAndPrev">
                                                        <div class="theImgForm">
                                                            <label for="">Upload Image</label>
                                                            <input type="file" name="image" id="" onchange="readURL(this);"/> <span value="<?= $data["image"] ?>"></span> 
                                                        </div>

                                                        <div class="theImgForm">
                                                            <label for="">Preview Image</label>
                                                            <img src="../uploads/<?= $data["image"] ?>" id="blah">
                                                        </div>
                                                    </div>
                                                </div>                                
                                            </div>
                                            <div class="buttons">
                                                <button type="submit" name="submitUpdate">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "No record found";
                        }
                    }
                    else
                    {
                        ?>
                            <section class="contentContainer">
                                <?php
                                    if(isset($_SESSION['status']))
                                    {
                                        $response = $_SESSION['status'];
                                        if($response == "Success0.5")
                                        {
                                            ?>
                                                <div class="alert" id="alert" role="alert" style="background: red;">
                                                    <p><i class="fas fa-exclamation-triangle"></i> Email Saved but not sent!</p>
                                                </div>
                                            <?php
                                            unset($_SESSION['status']);
                                        }
                                        else if($response == "Success")
                                        {
                                            ?>
                                                <div class="alert" id="alert" role="alert">
                                                    <p><i class="fa fa-check_circle"></i> Successful</p>
                                                </div>
                                            <?php
                                            unset($_SESSION['status']);
                                        }
                                        else if($response == "Error")
                                        {
                                            ?>
                                                <div class="alert" id="alert" role="alert" style="background: red;">
                                                    <p>Error</p>
                                                </div>
                                            <?php
                                            unset($_SESSION['status']);
                                        }
                                    }
                                ?>
                                <div class="toppings">
                                    <h3>Updates</h3>
                                    <?php
                                        if(isset($_SESSION['status']))
                                        {
                                            ?>
                                                <div class="alert" id="alert" role="alert">
                                                    <p><?= $_SESSION['status'] ?></p>
                                                </div>
                                            <?php
                                            unset($_SESSION['status']);
                                        }
                                    ?>
                                    <div class="toppingsPro" style="display: flex; flex-direction:row;">
                                        <button id="addnewUpdate">+ Add New</button>
                                    </div>
                                </div>

                                <div class="alert updatesContainer" id="newPost">
                                    <button id="closePostFormBtn" style=""><i class="fas fa-times-circle"></i> Close</button>
                                    <h3>Add New Update</h3>
                                    <form action="../functions/adminFunction.php" method="post" enctype="multipart/form-data">
                                        <div class="newPostFrom">
                                            <div class="postform2parts">
                                                <div>
                                                    <label for="">Title</label>
                                                    <input type="text" name="title" required>
                                                </div>

                                                <div>
                                                    <label for="">Post Story</label>
                                                    <textarea id="test" name="updateStory" placeholder="Start Typing"></textarea>
                                                </div>
                                            </div>

                                            <div class="postform2parts">
                                                <div class="imageAndPrev">
                                                    <div class="theImgForm">
                                                        <label for="">Upload Image</label>
                                                        <input type="file" name="image" id="" onchange="readURL(this);">
                                                    </div>

                                                    <div class="theImgForm">
                                                        <label for="">Preview Image</label>
                                                        <img src="" id="blah">
                                                    </div>
                                                </div>
                                            </div>                                
                                        </div>
                                        <div class="buttons">
                                            <button type="submit" name="submitNewUpdate">Submit</button>
                                        </div>
                                    </form>
                                </div>

                                <?php
                                    $per_page = 6;
                                    $pageno = 0;
                                    $currentpage = 1;
                                    if(isset($_GET['pageno']))
                                    {
                                        $pageno = $_GET['pageno'];
                                        if($pageno <= 0)
                                        {
                                            $pageno = 0;
                                            $currentpage = 1;
                                        }
                                        else
                                        {
                                            $currentpage = $pageno;
                                            $pageno--;
                                            $pageno = $pageno * $per_page;
                                        }
                                    }
                                    $record = mysqli_num_rows(mysqli_query($con, "SELECT id, title FROM updates"));
                                    $pagi = ceil($record/$per_page);

                                    $select = "SELECT * FROM updates ORDER BY id DESC LIMIT $pageno, $per_page";
                                    $select_query = mysqli_query($con, $select);

                                    ?>
                                        <div class="content updatesContainer">
                                            <?php
                                                if(mysqli_num_rows($select_query) > 0)
                                                {
                                                    while($row=mysqli_fetch_assoc($select_query))
                                                    {
                                                        ?>
                                                            <div class="eachNewsContainer">
                                                                <a href="?p=<?= $row["id"] ?>"><div class="eachNews">
                                                                    <div class="updateImg" style="background: url('../uploads/<?= $row["image"] ?>')">
                                                                    </div>
                                                                    <div class="updateTitle">
                                                                        <h3><?= $row["title"] ?></h3>
                                                                        <p style="font-size: 9pt; color:#555; margin-top: 4px;">24th March 2024 | 03:23PM</p>
                                                                    </div>
                                                                </div></a>
                                                            </div>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    ?> <p>No records</p> <?php
                                                }
                                            ?>
                                        </div>
                                    <?php
                                ?>

                                <div class="toppings pagiButtons">
                                    <?php
                                        for($i = 1; $i <= $pagi; $i++)
                                        {
                                            $class = '';
                                            if($currentpage == $i)
                                            {
                                                $class = "activePgClass";
                                                ?>
                                                    <div class="buttons">
                                                        <a href="javascript:void(0)"><button id="<?= $class ?>"><?= $i ?></button></a>
                                                    </div>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                    <div class="buttons">
                                                        <a href="?pageno=<?= $i ?>"><button><?= $i ?></button></a>
                                                    </div>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </section>
                        <?php
                    }
                ?>
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