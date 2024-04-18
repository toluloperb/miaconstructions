<?php
    session_start();
    include("includes/header.php");
    include("includes/navbar.php");
?>

<?php
    if(isset($_SESSION["status"]))
    {
        ?>
            <div class="successContainer">
                <img src="assets/images/success1.png" alt="">
                <h3>Success</h3>
                <p>Your form was submitted and received successfully, we'll be in touch with you shortly.</p>
                <p>Thank You</p>
            </div>
        <?php
    }
    else
    {
        header("Location: .");
        die();
    }
?>

<?php
    include("includes/footer.php");
?>