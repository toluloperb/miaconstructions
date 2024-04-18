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
                    <div class="toppings">
                        <h3>Bookings & Enquiries</h3>
                    </div>
                    <div class="tables">
                        <table>
                            <tr>
                                <th class="table_sn">S/N</th>
                                <th>Full Names</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Service</th>
                                <th>Budget</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                $select = "SELECT * FROM bookings ORDER BY id DESC";
                                $select_run = mysqli_query($con, $select);

                                if(mysqli_num_rows($select_run) > 0)
                                {
                                    foreach($select_run as $data)
                                    {
                                        ?>
                                            <tr>
                                                <td><?= $data['id'] ?></td>
                                                <td><?= $data['full_names'] ?></td>
                                                <td><?= $data['email'] ?></td>
                                                <td><?= $data['phone'] ?></td>
                                                <td><?= $data['company'] ?></td>
                                                <td><?= $data['service'] ?></td>
                                                <td><?= $data['budget'] ?></td>
                                                <td class="actions bookbtn">
                                                    <a href="?id=<?= $data['id'] ?>"><button id="openModal">View</button></a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </section>
            </main>

            <?php
                if(isset($_GET["id"]))
                {
                    $id = $_GET["id"];
                    $select = "SELECT * FROM bookings WHERE id = '$id' ORDER BY id DESC";
                    $select_run = mysqli_query($con, $select);

                    if(mysqli_num_rows($select_run) > 0)
                    {
                        foreach($select_run as $detaileddata)
                        {
                            ?>
                                <main class="modalContainer" id="modal">
                                    <section class="contentContainer">
                                        <div class="toppings modal">
                                            <h3>About</h3>
                                            <a href="bookings"><button id="closemodal" class="button"><i class="material-icons">cancel</i></button></a>
                                        </div>
                                        <div class="aboutEnq">
                                            <div class="enqDeet">
                                                <p class="head"><strong>ABOUT COMPANY/PROJECT</strong></p>
                                                <p><?= nl2br($detaileddata["about"]) ?></p>
                                            </div>

                                            <div class="enqDeet">
                                                <p class="head"><strong>COMPANY NAME</strong></p>
                                                <p class="bottom"><?= nl2br($detaileddata["company"]) ?></p>

                                                <p class="head"><strong>FULL NAMES</strong></p>
                                                <p class="bottom"><?= $detaileddata["full_names"] ?></p>

                                                <p class="head"><strong>PHONE NUMBER</strong></p>
                                                <p class="bottom"><?= $detaileddata["phone"] ?></p>

                                                <p class="head"><strong>EMAIL</strong></p>
                                                <p class="bottom"><?= $detaileddata["email"] ?></p>

                                                <p class="head"><strong>SERVICE REQUESTED FOR</strong></p>
                                                <p class="bottom"><?= $detaileddata["service"] ?></p>

                                                <p class="head"><strong>BUDGET</strong></p>
                                                <p class="bottom"><?= $detaileddata["budget"] ?></p>
                                            </div>
                                        </div>
                                    </section>
                                </main>
                            <?php
                        }
                    }
                }
            ?>
        <?php

        include("includes/footer.php");
    }
    else
    {
        header("Location: login?error=Login to continue");
        exit();
    }
?>