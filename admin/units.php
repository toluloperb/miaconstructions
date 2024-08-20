<?php
    session_start();
    include('../config/dbcon.php');
    include('includes/header.php');
    include('includes/navbar.php');

    if (isset($_SESSION['auth']))
    {
        ?>
            <main>
                <?php include('includes/sidebar.php'); ?>
                <div class="mainContainer">
                    <?php
                        if(isset($_SESSION['status']))
                        {
                            ?>
                                <div id="fade" class="sessionMsg">
                                    <p><i class="fa fa-info-circle"></i> <?= $_SESSION['status'] ?></p>
                                </div>
                            <?php
                            unset($_SESSION['status']);
                        }
                    ?>
                </div>

                <!-- Add Unit Modal -->
                <div class="modalContainer" id="modalContainer">
                    <div class="alignleft">
                        <div class="row">
                            <h3>Create new unit</h3>
                            <i class="fa fa-times-circle" id="closeModal"></i>
                        </div>

                        <hr class="mainhr">

                        <p class="minitext">Units are where your members & other executives communicate.</p>
                        <form action="" method="POST">
                            <div class="formfield">
                                <label for="">Unit Name</label>
                                <input type="text" id="unit_name" placeholder="e.g. Ushering" required>
                            </div>

                            <div class="formfield">
                                <label for="">Description</label>
                                <input type="text" id="unit_desc" placeholder="What is this unit about?">
                            </div>

                            <input type="text" id="status" class="status" value="Show" hidden>

                            <div class="row">
                                <div class="column">
                                    <label><strong>Set as Hidden</strong></label>
                                    <label class="minitext" for="">When a unit is set to hidden, it can only be seen by a super admin.</label>
                                </div>
                                <i class="fa fa-toggle-off" id="status-off"></i>
                                <i class="fa fa-toggle-on" id="status-on" style="display: none;"></i>
                            </div>

                            <hr class="mainhr">

                            <button type="submit" class="button createUnit">Create</button>
                        </form>
                    </div>
                </div>

                <?php
                    if(isset($_GET['unit']))
                ?>
            </main>
        <?php
    }
    else
    {
        header("Location: login");
        exit();
    }
?>

<?php include('includes/footer.php'); ?>