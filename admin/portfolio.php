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
                <section class="contentContainer">
                    <?php
                        if(isset($_GET["add"]))
                        {
                            ?>
                                <div class="toppings">
                                    <h3>Add new project</h3>
                                    <a href="portfolio"><button>Back</button></a>
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
                                </div>
                                <section class="formContainer">
                                    <form action="../functions/postfunc" method="post" enctype="multipart/form-data">
                                        <div class="inputrow">
                                            <div>
                                                <label for="">Project Title</label>
                                                <input required type="text" name="title">
                                            </div>

                                            <div>
                                                <label for="">Select Category</label>
                                                <select name="cate" id="">
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="Graphics Designing">Graphics Designing</option>
                                                    <option value="Brand Identity/Logo">Brand Identity/Logo</option>
                                                    <option value="Web Development">Web Development</option>
                                                    <option value="Digital Marketing">Digital Marketing</option>
                                                    <option value="Social Media">Social Media</option>
                                                    <option value="printings">Printings & Billboards</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="inputrow">
                                            <div style="width: 100%; margin-right: 0;">
                                                <label for="">Images</label>
                                                <input required type="file" name="images[]" multiple>
                                            </div>
                                        </div>

                                        <div class="textarea">
                                            <div>
                                                <label for="">Say something about the project</label>
                                                <textarea name="desc" placeholder="Start typing..."></textarea>
                                            </div>
                                        </div>

                                        <div class="inputrow">
                                            
                                        </div>
                                        <button required type="submit" class="button" name="addProject">Add Project</button>
                                    </form>
                                </section>
                            <?php
                        }
                        else
                        {
                            ?>
                                <div class="toppings">
                                    <h3>Portfolio</h3>
                                    <!-- <?php
                                        $string = rand(0000, 9999);
                                        $add = hash('sha256',$string);
                                    ?> -->
                                    <a href="?add"><button>Add New</button></a>
                                </div>
                                <div class="tables">
                                    <table>
                                        <tr>
                                            <th class="table_sn">S/N</th>
                                            <th>Project Title</th>
                                            <th>Category</th>
                                            <th>Views</th>
                                            <th>Likes</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php
                                            $select = "SELECT * FROM portfolio ORDER BY id DESC";
                                            $select_run = mysqli_query($con, $select);

                                            if(mysqli_num_rows($select_run) > 0)
                                            {
                                                foreach($select_run as $data)
                                                {
                                                    ?>
                                                        <tr>
                                                            <td><?= $data['id'] ?></td>
                                                            <td><?= $data['title'] ?></td>
                                                            <td><?= $data['cate'] ?></td>
                                                            <td><?= $data['views'] ?></td>
                                                            <td><?= $data['likes'] ?></td>
                                                            <td class="actions">
                                                                <button>View</button>
                                                                <button>Delete</button>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </table>
                                </div>
                            <?php
                        }
                    ?>
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